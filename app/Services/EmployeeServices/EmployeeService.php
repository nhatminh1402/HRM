<?php

namespace App\Services\EmployeeServices;

use App\Repositories\EmployeeRepository\EmployeeRepository;
use App\Traits\ImgProcess;
use Exception;
use Illuminate\Http\Response;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class EmployeeService
{
    use ImgProcess;

    protected $employeeRepository;

    public function __construct(EmployeeRepository $employeeRepository)
    {
        $this->employeeRepository = $employeeRepository;
    }

    public function showallemployee()
    {
        return $this->employeeRepository->showall();
    }

    public function getById($id)
    {
        return $this->employeeRepository->getById($id);
    }

    public function searchEmploy($key)
    {
        return $this->employeeRepository->search($key);
    }

    public function create(array $attributes)
    {
        try {
            DB::beginTransaction();
            $this->employeeRepository->create($attributes);
            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            File::delete(public_path('uploads/' . $attributes['image']));
            return response()->json(['error' => $e->getMessage()], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
