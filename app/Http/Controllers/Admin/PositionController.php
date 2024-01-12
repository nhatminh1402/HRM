<?php

namespace App\Http\Controllers\Admin;

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

        $positions = $this->positionService->getAll();

        return view('admin.pages.employee_management.index', compact('positions'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreatePositionRequest $request)
    {
        $this->positionService->create($request->all());
        return redirect()->route('admin.employee.home')->with('success', 'Cretae positon success!');
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
            $position = $this->positionService->update($request->all(), $id);

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
