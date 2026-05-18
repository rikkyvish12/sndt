<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AnalyticsVisit;
use App\Models\AnalyticsPageView;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class AnalyticsController extends Controller
{
    /**
     * Display analytics dashboard
     */
    public function index(Request $request)
    {
        $period = $request->input('period', '30'); // Default 30 days
        $startDate = now()->subDays($period);
        $endDate = now();

        // Live visitors now (active in last 5 minutes)
        $liveVisitors = AnalyticsVisit::where('last_activity_at', '>=', now()->subMinutes(5))
            ->distinct('session_id')
            ->count('session_id');

        // Today's statistics
        $todayVisitors = AnalyticsVisit::whereDate('started_at', today())
            ->distinct('session_id')
            ->count('session_id');

        $todayPageViews = AnalyticsPageView::whereDate('viewed_at', today())->count();

        $avgSessionDuration = AnalyticsVisit::whereDate('started_at', today())
            ->avg('duration_seconds');

        // Visitors & Page Views Trend (Last 30 Days)
        $trendData = $this->getTrendData($startDate, $endDate);

        // Most Popular Pages
        $popularPages = AnalyticsPageView::whereBetween('viewed_at', [$startDate, $endDate])
            ->select('page_url', 'page_title', DB::raw('count(*) as views'))
            ->groupBy('page_url', 'page_title')
            ->orderByDesc('views')
            ->limit(10)
            ->get();

        // Device Breakdown
        $deviceBreakdown = AnalyticsVisit::whereBetween('started_at', [$startDate, $endDate])
            ->select('device_type', DB::raw('count(*) as count'))
            ->groupBy('device_type')
            ->get()
            ->pluck('count', 'device_type')
            ->toArray();

        // Browser Breakdown
        $browserBreakdown = AnalyticsVisit::whereBetween('started_at', [$startDate, $endDate])
            ->select('browser', DB::raw('count(*) as count'))
            ->groupBy('browser')
            ->get()
            ->pluck('count', 'browser')
            ->toArray();

        // Top Traffic Sources (Referrers)
        $trafficSources = AnalyticsVisit::whereBetween('started_at', [$startDate, $endDate])
            ->whereNotNull('referrer')
            ->where('referrer', '!=', '')
            ->select('referrer', DB::raw('count(*) as count'))
            ->groupBy('referrer')
            ->orderByDesc('count')
            ->limit(10)
            ->get();

        // Peak Traffic Hours
        $peakHours = $this->getPeakHoursData($startDate, $endDate);

        // Department pages visits
        $departmentVisits = AnalyticsPageView::whereBetween('viewed_at', [$startDate, $endDate])
            ->where('page_url', 'like', '%/department/%')
            ->select('page_url', 'page_title', DB::raw('count(*) as views'))
            ->groupBy('page_url', 'page_title')
            ->orderByDesc('views')
            ->limit(10)
            ->get();

        return view('admin.analytics.dashboard', compact(
            'liveVisitors',
            'todayVisitors',
            'todayPageViews',
            'avgSessionDuration',
            'trendData',
            'popularPages',
            'deviceBreakdown',
            'browserBreakdown',
            'trafficSources',
            'peakHours',
            'departmentVisits',
            'period'
        ));
    }

    /**
     * Get trend data for visitors and page views
     */
    protected function getTrendData($startDate, $endDate)
    {
        $driver = DB::getDriverName();
        
        // Use database-specific date function
        $dateFunction = $driver === 'sqlite' 
            ? "date(started_at)" 
            : "DATE(started_at)";
        
        $visitorsByDate = AnalyticsVisit::whereBetween('started_at', [$startDate, $endDate])
            ->select(DB::raw("{$dateFunction} as date"), DB::raw('count(distinct session_id) as visitors'))
            ->groupBy('date')
            ->orderBy('date')
            ->get()
            ->pluck('visitors', 'date');

        $dateFunctionViews = $driver === 'sqlite' 
            ? "date(viewed_at)" 
            : "DATE(viewed_at)";
        
        $pageViewsByDate = AnalyticsPageView::whereBetween('viewed_at', [$startDate, $endDate])
            ->select(DB::raw("{$dateFunctionViews} as date"), DB::raw('count(*) as views'))
            ->groupBy('date')
            ->orderBy('date')
            ->get()
            ->pluck('views', 'date');

        // Fill in missing dates
        $dates = [];
        $visitors = [];
        $views = [];

        $currentDate = Carbon::parse($startDate);
        while ($currentDate <= $endDate) {
            $dateStr = $currentDate->format('Y-m-d');
            $dates[] = $currentDate->format('M d');
            $visitors[] = $visitorsByDate->get($dateStr, 0);
            $views[] = $pageViewsByDate->get($dateStr, 0);
            $currentDate->addDay();
        }

        return [
            'dates' => $dates,
            'visitors' => $visitors,
            'views' => $views,
        ];
    }

    /**
     * Get peak traffic hours data
     */
    protected function getPeakHoursData($startDate, $endDate)
    {
        $driver = DB::getDriverName();
        
        // Use database-specific hour extraction function
        $hourFunction = $driver === 'sqlite' 
            ? "cast(strftime('%H', started_at) as integer)" 
            : "HOUR(started_at)";
        
        $hourlyData = AnalyticsVisit::whereBetween('started_at', [$startDate, $endDate])
            ->select(DB::raw("{$hourFunction} as hour"), DB::raw('count(*) as count'))
            ->groupBy('hour')
            ->orderBy('hour')
            ->get()
            ->pluck('count', 'hour');

        $hours = [];
        $counts = [];

        for ($i = 0; $i < 24; $i++) {
            $hours[] = sprintf('%02d:00', $i);
            $counts[] = $hourlyData->get($i, 0);
        }

        return [
            'hours' => $hours,
            'counts' => $counts,
        ];
    }

    /**
     * Get analytics data via AJAX
     */
    public function getData(Request $request)
    {
        $period = $request->input('period', 30);
        $startDate = now()->subDays($period);
        $endDate = now();

        $data = [
            'liveVisitors' => AnalyticsVisit::where('last_activity_at', '>=', now()->subMinutes(5))
                ->distinct('session_id')
                ->count('session_id'),
            'trendData' => $this->getTrendData($startDate, $endDate),
            'peakHours' => $this->getPeakHoursData($startDate, $endDate),
        ];

        return response()->json($data);
    }
}
