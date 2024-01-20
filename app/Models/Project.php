<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Project extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'code_project',
        'name',
        'description'
    ];

    /**
     * The employees that belong to the Project
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function employees(): BelongsToMany
    {
        return $this->belongsToMany(Employee::class, 'employee_has_project', 'project_id', 'employee_id');
    }

    public function addEmployee(array $employeeIds)
    {
        return $this->employees()->sync($employeeIds);
    }

    public function removeAllEmployee()
    {
        return $this->employees()->detach();
    }

    public function scopeSearchByName(mixed $query, string $key)
    {
        return $key ? $query->where('name', 'LIKE', '%' . str_replace('%', '\\%', $key) . '%')->latest('id') : $query;
    }

    public function scopeSearchByDescription(mixed $query, string $key)
    {
        return $key ? $query->where('description', 'LIKE', '%' . str_replace('%', '\\%', $key) . '%')->latest('id') : $query;
    }
}
