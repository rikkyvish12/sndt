<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AnalyticsVisit extends Model
{
    use HasFactory;

    protected $table = 'analytics_visits';

    protected $fillable = [
        'session_id',
        'ip_address',
        'user_agent',
        'page_url',
        'page_title',
        'referrer',
        'device_type',
        'browser',
        'os',
        'country',
        'city',
        'started_at',
        'last_activity_at',
        'duration_seconds',
        'page_views_count',
    ];

    protected $casts = [
        'started_at' => 'datetime',
        'last_activity_at' => 'datetime',
        'duration_seconds' => 'integer',
        'page_views_count' => 'integer',
    ];

    /**
     * Get all page views for this visit
     */
    public function pageViews()
    {
        return $this->hasMany(AnalyticsPageView::class, 'session_id', 'session_id');
    }
}
