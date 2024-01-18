<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CreateDisciplineRequest;
use App\Services\Discipline\DisciplineService;
use Illuminate\Http\Request;

class DisciplineController extends Controller
{

    protected $disciplineService;

    public function __construct(DisciplineService $disciplineService)
    {
        $this->disciplineService = $disciplineService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $prefix = 'MKL';
        $disciplineCode = $this->disciplineService->getDisciplineCode($prefix);
        $disciplines = $this->disciplineService->getAll();

        if ($request->input('key')) {
            $disciplines = $this->disciplineService->searchDiscipline($request->input('key'));
        }

        $pageNumber = $request->query('page');
        return view('admin.pages.discipline.index', compact('disciplines', 'disciplineCode', 'pageNumber'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateDisciplineRequest $request)
    {
        $this->disciplineService->create($request->all());
        return redirect()->route('admin.discipline.home')->with('success', 'Create discipline succerss !');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $discipline = $this->disciplineService->edit($id);
        $pageNumber = request('page');
        return view('admin.pages.discipline.edit_discipline', compact('discipline', 'pageNumber'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CreateDisciplineRequest $request, string $id)
    {
        try {
            $data = $request->all();
            $discipline = $this->disciplineService->update($data, $id);
            $pageNumber = $request->input('page');
            return redirect()->route('admin.discipline.home', ['page' => $pageNumber])
                ->with('success', 'Cập nhật loại kỷ luật thành công !')
                ->with('discipline', $discipline);

        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Lỗi khi cập nhật loại kỷ luật !: ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $this->disciplineService->delete($id);
        return redirect()->back()->with('success', 'Xóa loại kỷ luật thành công!');
    }
}
