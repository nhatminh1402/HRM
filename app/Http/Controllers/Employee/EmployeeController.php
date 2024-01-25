<?php

namespace App\Http\Controllers\Employee;

use App\Exports\EmployeeExport;
use App\Http\Controllers\Controller;
use App\Services\Employee\EmployeeService;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class EmployeeController extends Controller
{
    protected $employeeService;
    public function __construct(EmployeeService $employeeService)
    {
        $this->employeeService = $employeeService;
    }

    public function showAllEmployee()
    {
        $employees = $this->employeeService->showallemployee();
        return view('admin.pages.employee_management.list_employee', compact('employees'));
    }

    public function getDetailEmployee($id)
    {
        $employee = $this->employeeService->getById($id);
        return view('admin.pages.employee_management.detail_employee', compact('employee'));
    }

    public function searchEmploy(Request $request)
    {
        $key = $request->get('key');
        $key = str_replace('%', '\%', $key);
        $employees = $this->employeeService->searchEmploy($key);
        return view('admin.pages.employee_management.list_employee', compact('employees'));
    }

    public function export()
    {
        $keySearch = request()->keySearch;
        $dataExport = $this->employeeService->exportData($keySearch);
        $response = Excel::download(new EmployeeExport($dataExport), 'DANH_SACH_NHAN_VIEN.xlsx');
        ob_end_clean();
        return $response;
    }
}
