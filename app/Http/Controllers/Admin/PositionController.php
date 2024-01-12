<?php

namespace App\Http\Controllers\Admin;

use App\Helpers;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CreatePositionRequest;
use App\Http\Requests\Admin\UpdatePositionRequest;
use App\Services\PositionService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

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
    public function index()
    {
        $prefix = 'MCV';

        $employeeCode = $this->positionService->getEmployeeCode($prefix);

        $positions = $this->positionService->getAll();

        return view('admin.pages.employee_management.index', compact('positions', 'employeeCode'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreatePositionRequest $request)
    {
        $data = $request->all();

        if (isset($data['description'])) {
            $data['description'] = preg_replace('/<p[^>]*>/', '', $data['description']);
            $data['description'] = preg_replace('/<\/p>/', '', $data['description']);
        }

        $this->positionService->create($data);
        return redirect()->route('admin.employee.home')->with('success', 'Create position success!');
    }

    /**
     * Show the form for creating a new resource.
     */
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
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
        $position = $this->positionService->edit($id);

        return view('admin.pages.employee_management.edit_position', compact('position'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePositionRequest $request, $id)
    {
        try {
            $data = $request->all();

            if (isset($data['description'])) {
                $data['description'] = preg_replace('/<p[^>]*>/', '', $data['description']);
                $data['description'] = preg_replace('/<\/p>/', '', $data['description']);
            }

            $position = $this->positionService->update($data, $id);

            return redirect()->route('admin.employee.home')
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
        //
    }
}
