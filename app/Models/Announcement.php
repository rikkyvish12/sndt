<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Announcement extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'content',
        'link',
        'link_text',
        'is_active',
        'order',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    /**
     * Get active announcements ordered by order field
     */
    public static function getActiveAnnouncements()
    {
        return self::where('is_active', true)
                    ->orderBy('order', 'asc')
                    ->orderBy('created_at', 'desc')
                    ->get();
    }
}
