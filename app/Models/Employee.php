<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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

    public function position()
    {
        return $this->belongsTo(Position::class, 'position_id', 'id');
    }
    
    public function departments()
    {
        return $this->belongsTo(Department::class, 'department_id', 'id');
    }

    protected $casts = [
        'password' => 'hashed'
    ];
}
