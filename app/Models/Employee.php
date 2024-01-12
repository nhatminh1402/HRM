<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Authenticatable
{
    use HasFactory;

    protected $guard = "employee";
    protected $fillable = ['province_id','district_id','ward_id'];
    public function province()
    {
        return $this->belongsTo(Province::class,'province_id','id');
    }

    public function district()
    {
        return $this->belongsTo(District::class,'district_id','id');
    }

    public function ward()
    {
        return $this->belongsTo(Ward::class, 'ward_id','id');
    }
    
}
