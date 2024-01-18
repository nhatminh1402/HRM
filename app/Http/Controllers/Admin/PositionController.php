<?php

namespace App\Http\Controllers\Admin;

use App\Helpers;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CreatePositionRequest;
use App\Http\Requests\Admin\UpdatePositionRequest;
use App\Services\Position\PositionService;
use Illuminate\Http\Request;

class PositionController extends Controller
{
    protected $positionService;
    public function __construct(PositionService $positionService)
    {
        $this->positionService = $positionService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $prefix = 'MCV';
        $employeeCode = $this->positionService->getEmployeeCode($prefix);
        $positions = $this->positionService->getAll();

        if ($request->input('key')) {
            $positions = $this->positionService->searchPosition($request->input('key'));
        }

        $pageNumber = $request->query('page');
        return view('admin.pages.employee_management.index', compact('positions', 'employeeCode', 'pageNumber'));
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(CreatePositionRequest $request)
    {
        $data = $request->all();
        $this->positionService->create($data);
        return redirect()->route('admin.employee.home')->with('success', 'Create position success!');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $position = $this->positionService->edit($id);
        $pageNumber = request('page');
        return view('admin.pages.employee_management.edit_position', compact('position', 'pageNumber'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePositionRequest $request, $id)
    {
        try {
            $data = $request->all();
            $position = $this->positionService->update($data, $id);
            $pageNumber = $request->input('page');
            return redirect()->route('admin.employee.home', ['page' => $pageNumber])
                ->with('success', 'Cập nhật chức vụ thành công!')
                ->with('position', $position);

        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Lỗi khi cập nhật chức vụ: ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->positionService->delete($id);
        return redirect()->back()->with('success','Xóa chức vụ thành công!');
    }
}
