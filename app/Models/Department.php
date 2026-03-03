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
        'head_of_department_id',
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
        return $this->belongsToMany(Faculty::class, 'department_faculty');
    }

    public function courses()
    {
        return $this->hasMany(Course::class);
    }
    
    public function headOfDepartment()
    {
        return $this->belongsTo(Faculty::class, 'head_of_department_id');
    }
}
