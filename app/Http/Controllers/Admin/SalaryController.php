<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\Employee\EmployeeService;
use App\Services\Salary\SalaryService;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

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
    public function index()
    {
        $prefix = 'ML';
        $salary_code = $this->salaryService->getSalaryCode($prefix);
        $employeeNames = $this->salaryService->getAllEmployee();
        $positionname = $this->salaryService->getNamePosition();

        return view('admin.pages.salary.index', compact('salary_code'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $currentDate = Carbon::now()->format('d/m/Y');
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
    public function store(Request $request)
    {
        $data = $request->all();


        if (isset($data['selected_employees']) && !empty($data['selected_employees'])) {
            $employeeId = $data['selected_employees'];

            $salary = $this->salaryService->create($data, $employeeId);
            return redirect()->route('admin.salary.index')
                ->with('success', 'Cập nhật dự án thành công !')
                ->with('salary', $salary);
        }

        return response()->json(['message' => 'Không tìm thấy dự án!'], Response::HTTP_NOT_FOUND);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
