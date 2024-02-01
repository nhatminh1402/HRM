<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class SalaryExport implements FromView
{
    private $salaries;

    public function __construct($salaries)
    {
        $this->salaries = $salaries;
    }

    public function view(): View
    {
        return view('export.list_salary', ['salaries' => $this->salaries]);
    }
}
