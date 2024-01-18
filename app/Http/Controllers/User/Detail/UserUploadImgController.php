<?php

namespace App\Http\Controllers\User\Detail;

use App\Http\Controllers\Controller;
use App\Http\Requests\ImagesTrainRequest;
use App\Services\Employee\EmployeeService;
use App\Services\Useruploadimage\UserUploadImgService;


class UserUploadImgController extends Controller
{
    protected $employeeService;
    protected $userService;
    public function __construct(EmployeeService $employeeService, UserUploadImgService $userService)
    {
        $this->employeeService = $employeeService;
        $this->userService = $userService;
    }
    public function getEmployeeInfor()
    {
        $idUser = $this->userService->getIdUser();
        $user = $this->employeeService->getById($idUser);
        $images = $this->userService->getImages();
        return view('user.pages.employee_Infor', ['images' => $images], compact('user', 'images', 'idUser'));
    }

    public function imageUpload(ImagesTrainRequest $request)
    {
        if (!$request->hasFile('image')) {
            return redirect()->back()->withErrors('Error');
        }
        $imageNames = $this->userService->uploadImages($request->image);
        return redirect()->back()->withSuccess('You have successfully uploaded images')->with('image', $imageNames);
    }

    public function deleteImage($imageName)
    {
        $imageDeleted = $this->userService->deleteImage($imageName);
        if ($imageDeleted) {
            return redirect()->back()->withSuccess('The image has been deleted successfully');
        } else {
            return redirect()->back()->withErrors('Cannot find the image to delete');
        }
    }
    


}
