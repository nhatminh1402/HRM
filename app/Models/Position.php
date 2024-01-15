<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
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
        // 'employee_id',
        'salary_day'
    ];

    /**
     * Get the employee associated with the Position
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function employee(): BelongsToMany
    {
        return $this->belongsToMany(User::class);
    }
    public function scopeSearchByName(mixed $query, string $key)
    {
        return $key ? $query->where('name', 'like', '%' . $key . '%')->latest('id') : $query;
    }

    public function scopeSearchByDescription(mixed $query, string $key)
    {
        return $key ? $query->where('description', 'like', '%' . $key . '%')->latest('id') : $query;
    }
}
