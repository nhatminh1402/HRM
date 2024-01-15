<?php

namespace App\Repositories\Location\Ward;

use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Interface WardRepository.
 *
 * @package namespace App\Repositories\Location\Ward;
 */
interface WardRepository extends RepositoryInterface
{
    public function getWardsByDistrcitId($district_id);
}
