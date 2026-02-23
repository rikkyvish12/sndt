<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'code',
        'description',
        'head_name',
        'email',
        'phone',
        'location',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    // Relationships
    public function faculty()
    {
        return $this->hasMany(Faculty::class);
    }

    public function courses()
    {
        return $this->hasMany(Course::class);
    }
}
