<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reward extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'code_reward', 'description'];

    public function scopeSearchByName($query)
    {
        if (request()->keySearch) {
            $keySearch = request()->keySearch;
            $query->where('name', 'like', '%' . $keySearch . '%');
        }
        return $query;
    }

    public function scopeSearchByDescription($query)
    {
        if (request()->keySearch) {
            $keySearch = request()->keySearch;
            $query->orWhere('description', 'like', '%' . $keySearch . '%');
        }
        return $query;
    }
}
