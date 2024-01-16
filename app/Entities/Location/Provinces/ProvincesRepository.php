<?php

namespace App\Entities\Location\Provinces;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class ProvincesRepository.
 *
 * @package namespace App\Entities\Location\Provinces;
 */
class ProvincesRepository extends Model implements Transformable
{
    use TransformableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [];

}
