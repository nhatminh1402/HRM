<?php

namespace App\Http\Controllers\Admin;

use App\Exports\SalaryExport;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\SalaryRequest;
use App\Services\Employee\EmployeeService;
use App\Services\Salary\SalaryService;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Maatwebsite\Excel\Facades\Excel;

class SalaryController extends Controller
{
    protected $salaryService;
    protected $employeeService;


    public function __construct(SalaryService $salaryService, EmployeeService $employeeService)
    {
        $this->salaryService = $salaryService;
        $this->employeeService = $employeeService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $salaries = $this->salaryService->getAll();
        $employeeNames = $this->salaryService->getAllEmployee();

        foreach ($employeeNames as $employee) {
            $workDay = $this->employeeService->getWorkingDaysInMonth($employee->id);

            if ($request->input('key')) {
                $salaries = $this->salaryService->searchSalary($request->input('key'));
            }

            return view('admin.pages.salary.index', compact('salaries', 'employeeNames'));
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $currentDate = Carbon::now()->format('Y-m-d H:i:s');
        $prefix = 'ML';
        $salaryCode = $this->salaryService->getSalaryCode($prefix);
        $employees = $this->salaryService->getAllEmployee();
        $countWorkDays = [];


        foreach ($employees as $employee) {
            $countWorkDays[$employee->id] = $this->employeeService->getWorkingDaysInMonth($employee->id);
        }

        $countWorkDaysString = json_encode($countWorkDays);

        return view('admin.pages.salary.cal-salary', compact('currentDate', 'salaryCode', 'employees', 'countWorkDaysString'));
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(SalaryRequest $request)
    {
        $data = $request->all();

        if (isset($data['selected_employees']) && !empty($data['selected_employees'])) {
            $employeeId = $data['selected_employees'];

            $salary = $this->salaryService->create($data, $employeeId);
            return redirect()->route('admin.salary.index')
                ->with('success', 'Cập nhật bảng lương thành công !')
                ->with('salary', $salary);
        }

        return response()->json(['message' => 'Không tìm thấy bảng lương!'], Response::HTTP_NOT_FOUND);
    }

    public function export()
    {
        $dataExport = $this->salaryService->exportData(request()->input('key'));
        $response = Excel::download(new SalaryExport($dataExport), 'salary.xlsx');
        ob_end_clean();
        return $response;
    }
}
