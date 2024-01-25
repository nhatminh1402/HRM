<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Salary extends Model
{
    use HasFactory;

    protected $fillable = [
        'code_salary',
        'monthly_salary',
        'workday',
        'real_leaders',
        'employee_id'
    ];

    public function employee()
    {
        return $this->belongsTo(Employee::class, 'employee_id');
    }


    public function scopeSearchByMonthYear(mixed $query, $month, $year)
    {
        return ($month && $year)
            ? $query->whereRaw('MONTH(created_at)) = ? OR YEAR(created_at)) = ?', [$month, $year])
            : $query;
    }

    public function scopeSearchByNameEmployee($query, $key)
    {
        return $key ? $query->whereHas('employee', function ($query) use ($key) {
            $query->where('full_name', 'LIKE', '%' . str_replace('%', '\\%', $key) . '%');
        })->latest('id') : $query;
    }
    public function scopeSearchByNamePosition($query, $key)
    {
        return $key ? $query->whereHas('employee', function ($query) use ($key) {
            $query->whereHas('position', function ($query) use ($key) {
                $query->where('name', 'LIKE', '%' . str_replace('%', '\\%', $key) . '%');
            });
        })->latest('id') : $query;
    }

    public function scopeSearchByMonthSalary(mixed $query, $key)
    {
        return $key ? $query->where('monthly_salary', 'LIKE', '%' . str_replace('%', '\\%', $key) . '%')->latest('id') : $query;
    }

    public function scopeSearchByCreatedAt(mixed $query, $key)
    {
        return $key ? $query->where('created_at', 'LIKE', '%' . str_replace('%', '\\%', $key) . '%')->latest('id') : $query;
    }

    public function scopeSearchByCodeSalary(mixed $query, $key)
    {
        return $key ? $query->where('code_salary', 'LIKE', '%' . str_replace('%', '\\%', $key) . '%')->latest('id') : $query;
    }

    public function scopeSearchByWorkDay(mixed $query, $key)
    {
        return $key ? $query->where('workday', 'LIKE', '%' . str_replace('%', '\\%', $key) . '%')->latest('id') : $query;
    }
}
