<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Employee extends Authenticatable
{
    use HasFactory;

    protected $guard = 'employee';

    protected $fillable = [
        'full_name',
        'code_employee',
        'phone_number',
        'image',
        'email',
        'identify_number',
        'dob',
        'gender',
        'degree',
        'major',
        'department_id',
        'position_id',
        'province_id',
        'district_id',
        'ward_id',
        'password',
        'status',
        'basic_salary'
    ];

    public function province()
    {
        return $this->belongsTo(Province::class, 'province_id', 'id');
    }

    public function district()
    {
        return $this->belongsTo(District::class, 'district_id', 'id');
    }

    public function ward()
    {
        return $this->belongsTo(Ward::class, 'ward_id', 'id');
    }

    public function department()
    {
        return $this->belongsTo(Department::class, 'department_id', 'id');
    }

    public function position()
    {
        return $this->belongsTo(Position::class, 'position_id', 'id');
    }

    public function salary()
    {
        return $this->belongsTo(Salary::class, 'salary_id', 'id');
    }

    protected $casts = [
        'password' => 'hashed',
    ];

    /**
     * Get all of the discipline for the Employee
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function discipline(): BelongsToMany
    {
        return $this->belongsToMany(Discipline::class);
    }

    /**
     * The projects that belong to the Employee
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function projects(): BelongsToMany
    {
        return $this->belongsToMany(Project::class, 'employee_has_project', 'employee_id', 'project_id');
    }

    public function timeSheet()
    {
        return $this->hasMany(Timesheet::class, 'employee_id', 'id');
    }

    public function leave()
    {
        return $this->hasMany(Leave::class, 'employee_id', 'id');
    }
    public function timelines()
    {
        return $this->hasMany(Timeline::class, 'employee_id', 'id');
    }
}
