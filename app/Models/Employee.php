<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;
    protected $table = 'employees';
    protected $fillable = [
        'full_name',
        'gender',
        'image',
        'nick_name',
        'dob',
        'birth_place',
        'nationality',
        'marriage_status',
        'religion',
        'nation',
        'status',
        'identify_number',
        'card_issuance_date',
        'place_of_card_issuance',
        'id_position',
        'user_id',

    ];
}
