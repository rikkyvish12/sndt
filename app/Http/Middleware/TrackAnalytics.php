<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\AnalyticsVisit;
use App\Models\AnalyticsPageView;
use Illuminate\Support\Facades\Log;

class TrackAnalytics
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Skip tracking for admin routes, assets, and API routes
        if ($this->shouldSkipTracking($request)) {
            return $next($request);
        }

        $response = $next($request);

        // Track analytics asynchronously after response is sent
        if (app()->runningUnitTests() === false) {
            register_shutdown_function(function () use ($request) {
                try {
                    $this->trackVisit($request);
                } catch (\Exception $e) {
                    Log::error('Analytics tracking failed: ' . $e->getMessage());
                }
            });
        }

        return $response;
    }

    /**
     * Determine if tracking should be skipped for this request
     */
    protected function shouldSkipTracking(Request $request): bool
    {
        // Skip admin routes
        if ($request->is('admin/*')) {
            return true;
        }

        // Skip AJAX requests
        if ($request->ajax() || $request->wantsJson()) {
            return true;
        }

        // Skip asset files
        $assetExtensions = ['js', 'css', 'png', 'jpg', 'jpeg', 'gif', 'ico', 'svg', 'woff', 'woff2', 'ttf', 'eot'];
        $path = $request->path();
        $extension = pathinfo($path, PATHINFO_EXTENSION);
        
        if (in_array($extension, $assetExtensions)) {
            return true;
        }

        return false;
    }

    /**
     * Track the visit and page view
     */
    protected function trackVisit(Request $request): void
    {
        $sessionId = $this->getSessionId($request);
        $userAgent = $request->userAgent() ?? '';
        $ipAddress = $request->ip();
        
        // Detect device type, browser, and OS
        $deviceType = $this->detectDeviceType($userAgent);
        $browser = $this->detectBrowser($userAgent);
        $os = $this->detectOS($userAgent);

        // Check if this is a new session or existing visit
        $visit = AnalyticsVisit::where('session_id', $sessionId)
            ->whereDate('started_at', today())
            ->first();

        $pageUrl = $request->fullUrl();
        $pageTitle = $this->extractPageTitle($request);
        $referrer = $request->header('referer');

        if (!$visit) {
            // Create new visit
            $visit = AnalyticsVisit::create([
                'session_id' => $sessionId,
                'ip_address' => $ipAddress,
                'user_agent' => $userAgent,
                'page_url' => $pageUrl,
                'page_title' => $pageTitle,
                'referrer' => $referrer,
                'device_type' => $deviceType,
                'browser' => $browser,
                'os' => $os,
                'started_at' => now(),
                'last_activity_at' => now(),
                'duration_seconds' => 0,
                'page_views_count' => 0,
            ]);
        } else {
            // Update existing visit
            $duration = $visit->last_activity_at->diffInSeconds(now());
            $visit->update([
                'last_activity_at' => now(),
                'duration_seconds' => $visit->duration_seconds + $duration,
                'page_views_count' => $visit->page_views_count + 1,
            ]);
        }

        // Create page view record
        AnalyticsPageView::create([
            'session_id' => $sessionId,
            'page_url' => $pageUrl,
            'page_title' => $pageTitle,
            'ip_address' => $ipAddress,
            'user_agent' => $userAgent,
            'referrer' => $referrer,
            'device_type' => $deviceType,
            'browser' => $browser,
            'viewed_at' => now(),
            'time_on_page_seconds' => 0, // Will be updated on next page view
        ]);
    }

    /**
     * Get or create session ID
     */
    protected function getSessionId(Request $request): string
    {
        if (!$request->session()->has('analytics_session_id')) {
            $request->session()->put('analytics_session_id', uniqid('session_', true));
        }

        return $request->session()->get('analytics_session_id');
    }

    /**
     * Detect device type from user agent
     */
    protected function detectDeviceType(string $userAgent): string
    {
        if (preg_match('/Mobile|Android|iPhone|iPad|iPod|Windows Phone/i', $userAgent)) {
            if (preg_match('/iPad|Tablet/i', $userAgent)) {
                return 'tablet';
            }
            return 'mobile';
        }
        
        return 'desktop';
    }

    /**
     * Detect browser from user agent
     */
    protected function detectBrowser(string $userAgent): string
    {
        if (preg_match('/Edg/i', $userAgent)) {
            return 'Microsoft Edge';
        } elseif (preg_match('/Chrome/i', $userAgent)) {
            return 'Chrome';
        } elseif (preg_match('/Safari/i', $userAgent)) {
            return 'Safari';
        } elseif (preg_match('/Firefox/i', $userAgent)) {
            return 'Firefox';
        } elseif (preg_match('/MSIE|Trident/i', $userAgent)) {
            return 'Internet Explorer';
        } elseif (preg_match('/Opera|OPR/i', $userAgent)) {
            return 'Opera';
        }
        
        return 'Other';
    }

    /**
     * Detect operating system from user agent
     */
    protected function detectOS(string $userAgent): string
    {
        if (preg_match('/Windows NT 10/i', $userAgent)) {
            return 'Windows 10/11';
        } elseif (preg_match('/Windows/i', $userAgent)) {
            return 'Windows';
        } elseif (preg_match('/Mac OS X/i', $userAgent)) {
            return 'macOS';
        } elseif (preg_match('/Android/i', $userAgent)) {
            return 'Android';
        } elseif (preg_match('/iOS|iPhone|iPad/i', $userAgent)) {
            return 'iOS';
        } elseif (preg_match('/Linux/i', $userAgent)) {
            return 'Linux';
        } elseif (preg_match('/Ubuntu/i', $userAgent)) {
            return 'Ubuntu';
        }
        
        return 'Other';
    }

    /**
     * Extract page title from request path
     */
    protected function extractPageTitle(Request $request): string
    {
        $path = $request->path();
        
        $titles = [
            '/' => 'Home',
            'about' => 'About Us',
            'contact' => 'Contact Us',
            'department' => 'Department Page',
            'course' => 'Course Page',
            'login' => 'Login',
        ];

        foreach ($titles as $key => $title) {
            if (str_starts_with($path, $key)) {
                return $title;
            }
        }

        return ucfirst($path);
    }
}
