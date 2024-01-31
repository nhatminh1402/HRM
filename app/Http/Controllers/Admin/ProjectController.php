<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CreateOrUpdateProjectRequest;
use App\Http\Resources\Project\ProjectResource;
use App\Services\Project\ProjectService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

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
        $porjectCreate = $this->projectService->createProject($data);
        return $this->senSuccessResponse($porjectCreate, 'Thêm mới dự án thành công', Response::HTTP_CREATED);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit()
    {
        $id = request()->id;
        $project = $this->projectService->edit($id);
        $projectResource = new ProjectResource($project);
        return $this->senSuccessResponse($projectResource, 'success', Response::HTTP_OK);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CreateOrUpdateProjectRequest $request)
    {
        $data = $request->all();
        $id = $request->id;
        $project = $this->projectService->update($data, $id);
        $pageNumber = $request->input('page');
        return redirect()->route('admin.project.home', ['page' => $pageNumber])
            ->with('project', $project);
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
