<?php

namespace App\Services\Discipline;

use App\Helpers;
use App\Models\Discipline;
use App\Repositories\Discipline\DisciplineRepository;
use PHPUnit\TextUI\Help;

/**
 * Class DesciplineService.
 */
class DisciplineService
{
    protected $disciplineRepository;

    public function __construct(DisciplineRepository $disciplineRepository) {
        $this->disciplineRepository = $disciplineRepository;
    }

    public function getAll()
    {
        return $this->disciplineRepository->getAll();
    }

    public function getDisciplineCode($prefix)
    {
        $employeeCode = Helpers::generateCode($prefix);

        return $employeeCode;
    }

    public function create(array $data)
    {
        $dataHtml = Helpers::stripHtmlTags($data);

        $prefix = 'MKL';
        if ($dataHtml) {
            $dataHtml['code_discipline'] = $this->getDisciplineCode($prefix);
        }

        $discipline = new Discipline();

        $discipline->fill($dataHtml);

        $discipline->save();

        return $discipline;
    }

    public function edit($id)
    {
        return $this->disciplineRepository->find($id);
    }

    public function update(array $data, $id)
    {
        $dataHtms = Helpers::stripHtmlTags($data);

        return $this->disciplineRepository->update($dataHtms, $id);
    }
}
