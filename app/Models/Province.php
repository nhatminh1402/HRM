<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    protected $primaryKey = 'id';
    protected $fillable = ['name'];
    public function districts()
    {
        return $this->hasMany(District::class, 'province_id', 'id');
    }
}
