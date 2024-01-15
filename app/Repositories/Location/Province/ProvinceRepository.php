<?php

namespace App\Repositories\Location\Province;

use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Interface ProvinceRepository.
 *
 * @package namespace App\Repositories\Location\Province;
 */
interface ProvinceRepository extends RepositoryInterface
{
    public function all($columns = ['*']);
    public function getDistrictsByProvinceId($province_id);
}
