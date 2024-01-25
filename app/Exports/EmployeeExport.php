<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class EmployeeExport implements FromView
{
    private $dataExport;

    public function __construct($dataExport)
    {
        $this->dataExport = $dataExport;
    }

    public function view(): View
    {
        return view('export.list_employee', ['dataExport' => $this->dataExport]);
    }
}
