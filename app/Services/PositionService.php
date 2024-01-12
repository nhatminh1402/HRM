<?php

namespace App\Services;

use App\Models\Position;
use App\Repositories\PositionRepository;
use Exception;
use Illuminate\Http\Request;

/**
 * Class PositionService.
 */
class PositionService
{
    protected $positionRepository;

    public function __construct(PositionRepository $positionRepository)
    {
        $this->positionRepository = $positionRepository;
    }

    public function getAll()
    {
        return $this->positionRepository->getAll();
    }

    public function create(array $data)
    {
        $position = new Position();

        $position->fill($data);

        $position->save();
        
        return $position;
    }

    public function edit($id)
    {
        return $this->positionRepository->find($id);
    }

    public function update(array $data, $id)
    {
        return $this->positionRepository->update($data, $id);
    }
}
