<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DepartmentContent extends Model
{
    use HasFactory;

    protected $fillable = [
        'department_id',
        'section',
        'content',
        'extra_data',
        'is_active',
        'order',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'extra_data' => 'array',
    ];

    // Relationships
    public function department()
    {
        return $this->belongsTo(Department::class);
    }
}
