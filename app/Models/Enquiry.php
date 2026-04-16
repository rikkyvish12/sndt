<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Enquiry extends Model
{
    protected $fillable = [
        'name',
        'phone',
        'email',
        'message',
        'status',
        'admin_notes',
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    // Status constants
    const STATUS_NEW = 'new';
    const STATUS_CONTACTED = 'contacted';
    const STATUS_RESOLVED = 'resolved';

    // Get status badge color
    public function getStatusBadgeAttribute(): string
    {
        return match($this->status) {
            self::STATUS_NEW => 'bg-primary',
            self::STATUS_CONTACTED => 'bg-warning',
            self::STATUS_RESOLVED => 'bg-success',
            default => 'bg-secondary',
        };
    }
}
