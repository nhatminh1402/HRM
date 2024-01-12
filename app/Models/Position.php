<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Foundation\Testing\WithFaker;

class Position extends Model
{
    use HasFactory, WithFaker;

    protected $table = "positions";

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
}
