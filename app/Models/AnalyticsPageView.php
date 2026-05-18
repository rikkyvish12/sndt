<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AnalyticsPageView extends Model
{
    use HasFactory;

    protected $table = 'analytics_page_views';

    protected $fillable = [
        'session_id',
        'page_url',
        'page_title',
        'ip_address',
        'user_agent',
        'referrer',
        'device_type',
        'browser',
        'viewed_at',
        'time_on_page_seconds',
    ];

    protected $casts = [
        'viewed_at' => 'datetime',
        'time_on_page_seconds' => 'integer',
    ];

    /**
     * Get the visit that owns this page view
     */
    public function visit()
    {
        return $this->belongsTo(AnalyticsVisit::class, 'session_id', 'session_id');
    }
}
