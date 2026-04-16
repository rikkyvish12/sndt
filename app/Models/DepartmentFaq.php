<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DepartmentFaq extends Model
{
    protected $fillable = [
        'department_id',
        'question',
        'answer',
        'category',
        'order',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'order' => 'integer',
    ];

    /**
     * Get the department that owns the FAQ.
     */
    public function department(): BelongsTo
    {
        return $this->belongsTo(Department::class);
    }
}
