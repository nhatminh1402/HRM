<?php

namespace App\Http\Controllers\User\Detail;

use App\Http\Controllers\Controller;
use App\Services\Employee\EmployeeService;
use App\Services\Useruploadimage\UserUploadImgService;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

class UserUploadImgController extends Controller
{
    protected $employeeService;
    protected $userService;
    public function __construct(EmployeeService $employeeService, UserUploadImgService $userService)
    {
        $this->employeeService = $employeeService;
        $this->userService = $userService;
    }
    
    public function index()
    {
        return view('user.pages.images_trainModel');
    }

    public function upload(Request $request)
    {
        $file = $request->file('file');
        $response = $this->userService->uploadImage($file);
        return response()->json($response);
    }

    public function fetch()
    {
        $response = $this->userService->fetchImages();
        return response()->json($response);
    }

    public function delete(Request $request)
    {
        $imageName = $request->get('name');
        $response = $this->userService->deleteImage($imageName);
        return response()->json($response);
    }
}
