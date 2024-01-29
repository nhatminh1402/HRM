<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Testing\WithFaker;

class Position extends Model
{
    use HasFactory, WithFaker;

    protected $table = "positions";
    protected $primaryKey = 'id';
    protected $fillable = [
        'code_position',
        'name',
        'description',
        'salary_day'
    ];

    /**
     * Get the employee associated with the Position
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function employees(): HasMany
{
    return $this->hasMany(Employee::class, 'position_id', 'id');
}

    public function scopeSearchByCodePosition(mixed $query, string $key)
    {
        return trim($key) ? $query->where('code_position', 'like', '%' . str_replace('%', '\\%', $key) . '%')->latest('id') : $query;
    }

    public function scopeSearchByName(mixed $query, string $key)
    {
        return trim($key) ? $query->where('name', 'like', '%' . str_replace('%', '\\%', $key) . '%')->latest('id') : $query;
    }

    public function scopeSearchByDescription(mixed $query, string $key)
    {
        return trim($key) ? $query->where('description', 'like', '%' . str_replace('%', '\\%', $key) . '%')->latest('id') : $query;
    }
}
