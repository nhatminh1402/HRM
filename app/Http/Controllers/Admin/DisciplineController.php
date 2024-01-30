<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CreateDisciplineRequest;
use App\Services\Discipline\DisciplineService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

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
        $data = $request->all();
        $disciplineCretae = $this->disciplineService->create($data);
        return $this->senSuccessResponse($disciplineCretae, 'Kỷ luật đã thêm thành công', Response::HTTP_CREATED);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit()
    {
        $id = request()->idDiscipline;
        $discipline = $this->disciplineService->edit($id);
        $pageNumber = request('page');
        return response()->json(['discipline' => $discipline, 'pageNumber' => $pageNumber]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CreateDisciplineRequest $request)
    {
        $data = $request->all();
        $id = $request->idDiscipline;
        $discipline = $this->disciplineService->update($data, $id);
        $pageNumber = $request->input('page');
        return redirect()->route('admin.discipline.home', ['page' => $pageNumber])
            ->with('discipline', $discipline);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $this->disciplineService->delete($id);
        return redirect()->back();
    }
}
