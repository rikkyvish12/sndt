<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Faculty extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name',
        'last_name',
        'photo',
        'email',
        'phone',
        'date_of_birth',
        'employee_id',
        'department_id',
        'designation',
        'joining_date',
        'qualification',
        'specialization',
        'address',
        'city',
        'state',
        'postal_code',
        'country',
        'is_active',
    ];

    protected $casts = [
        'date_of_birth' => 'date',
        'joining_date'  => 'date',
        'is_active'     => 'boolean',
    ];

    // Relationships
    public function departments()
    {
        return $this->belongsToMany(Department::class, 'department_faculty');
    }

    public function department()
    {
        return $this->belongsTo(Department::class, 'department_id');
    }

    public function currentDepartment()
    {
        return $this->belongsToMany(Department::class, 'department_faculty');
    }
}
