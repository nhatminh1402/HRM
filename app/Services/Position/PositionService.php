<?php

namespace App\Services\Position;

use App\Helpers;
use App\Models\Position;
use App\Repositories\Position\PositionRepository;
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

    public function all($columns = ['*'])
    {
        return $this->positionRepository->all($columns);
    }

    public function getEmployeeCode($prefix)
    {
        $employeeCode = Helpers::generateEmployeeCode($prefix);

        return $employeeCode;
    }

    public function create(array $data)
    {
        $dataHtml = Helpers::stripHtmlTags($data);

        $prefix = 'MCV';
        if ($dataHtml) {
            $dataHtml['code_position'] = $this->getEmployeeCode($prefix);
        }

        $position = new Position();

        $position->fill($dataHtml);

        $position->save();

        return $position;
    }

    public function edit($id)
    {
        return $this->positionRepository->find($id);
    }

    public function update(array $data, $id)
    {
        $dataHtml = Helpers::stripHtmlTags($data);

        return $this->positionRepository->update($dataHtml, $id);
    }

    public function searchPosition($key)
    {
        return $this->positionRepository->search($key);
    }

    public function delete($id)
    {
        return $this->positionRepository->delete($id);
    }
}
