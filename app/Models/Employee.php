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

    protected $guard = "employee";

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
        'password'
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

    protected $casts = [
        'password' => 'hashed'
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
}
