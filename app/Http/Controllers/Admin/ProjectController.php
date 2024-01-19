<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CreateOrUpdateProjectRequest;
use App\Services\Project\ProjectService;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    protected $projectService;
    public function __construct(ProjectService $projectService)
    {
        $this->projectService = $projectService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $prefix = 'MDA';
        $projectCode = $this->projectService->getProjectCode($prefix);
        $projects = $this->projectService->getAll();
        $employees = $this->projectService->getAllEmployee();

        if ($request->input('key')) {
            $projects = $this->projectService->searchProject($request->input('key'));
        }

        $pageNumber = $request->query('page');
        return view('admin.pages.project.index', compact('projectCode', 'employees', 'projects', 'pageNumber'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateOrUpdateProjectRequest $request)
    {
        $data = $request->all();
        $this->projectService->createProject($data);
        return redirect()->route('admin.project.home')->with('success', 'Create position success!');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $project = $this->projectService->edit($id);
        $pageNumber = request('page');
        $selectedEmployees = $project->employees->pluck('id')->toArray();
        $employees = $this->projectService->getAllEmployee();
        return view('admin.pages.project.edit_project', compact('project', 'pageNumber', 'selectedEmployees', 'employees'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CreateOrUpdateProjectRequest $request, string $id)
    {
        try {
            $data = $request->all();
            $project = $this->projectService->update($data, $id);
            $pageNumber = $request->input('page');
            return redirect()->route('admin.project.home', ['page' => $pageNumber])
                ->with('success', 'Cập nhật dự án thành công !')
                ->with('project', $project);
        } catch (\Exception $e) {
            return redirect()->back()
            ->with('error', 'Lỗi khi cập nhật dự án !' . $e->getMessage());
        }
    }

        /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $this->projectService->delete($id);
        return redirect()->back()->with('success', 'Xóa dự án thành công!');
    }
}
