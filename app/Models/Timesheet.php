<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Timesheet extends Model
{
    
    protected $table = 'timesheet';
    protected $fillable = [
        'employee_id'
    ];
    function employee()
    {
        return $this->belongsTo(Employee::class,'employee_id','id');
    }
}
