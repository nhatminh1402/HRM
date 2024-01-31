<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;
    protected $table= 'departments';
    protected $fillable=[
        'code_department',
        'name',
        'description',
    ];
    public function employee()
    {
        return $this->hasMany(Employee::class, 'department_id', 'id');
    }

    public function scopeSearchByCodeDeparment(mixed $query, string $key)
    {
        return trim($key) ? $query->where('code_department', 'like', '%' . $key . '%')->latest('id') : $query;
    }

    public function scopeSearchByName(mixed $query, string $key)
    {
        return trim($key) ? $query->where('name', 'like', '%' . $key . '%')->latest('id') : $query;
    }

    public function scopeSearchByDescription(mixed $query, string $key)
    {
        return trim($key) ? $query->where('description', 'like', '%' . $key . '%')->latest('id') : $query;
    }
}
