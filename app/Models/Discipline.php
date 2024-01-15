<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Discipline extends Model
{
    use HasFactory;

    protected $table = "disciplines";

    protected $fillable = [
        'code_discipline',
        'name',
        'description',
        'employee_id',
    ];

    /**
     * The employee that belong to the Discipline
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function employee(): HasMany
    {
        return $this->hasMany(Employee::class);
    }
}
