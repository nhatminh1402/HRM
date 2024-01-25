<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Leave extends Model
{
    use HasFactory;
    protected $table = 'leaves';
    protected $fillable = [
        'employee_id',
        'description',
        'start_leave',
        'end_leave',
        'number_days',
        'status'
    ];
    function employee()
    {
        return $this->belongsTo(Employee::class,'employee_id','id');
    }
}
