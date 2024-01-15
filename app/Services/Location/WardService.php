<?php

namespace App\Services\Location;

use App\Repositories\Location\Ward\WardRepository;

class WardService
{
    private $wardRepository;

    public function __construct(WardRepository $wardRepository)
    {
        $this->wardRepository = $wardRepository;
    }

    public function getWardsByDistrcitId($district_id)
    {
        return $this->wardRepository->getWardsByDistrcitId($district_id);
    }
}
