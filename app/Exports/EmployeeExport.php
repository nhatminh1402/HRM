<?php

namespace App\Exports;

use App\Models\Employee;
use App\Models\User;
use App\Services\Employee\EmployeeService;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class EmployeeExport implements FromView
{
    public function view(): View
    {
        $listEmployee = Employee::all();
        return view('export.list_employee', compact('listEmployee'));
    }
}
