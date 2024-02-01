<?php
namespace App\Services\Useruploadimage;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class UserUploadImgService
{
    public function getIdUser()
    {
        return Auth::guard('employee')->user()->id;
    }

    public function uploadImage($file)
    {
        if (!$file) {
            return ['status' => 'error', 'message' => 'No images uploaded'];
        }
        $imageName = Str::random(3) . '_' . $file->getClientOriginalName();
        $file->move(public_path('usersimages/' . $this->getIdUser()), $imageName);
        return ['status' => 'success', 'message' => 'Image uploaded successfully'];
    }

    public function fetchImages()
    {
        $images = File::allFiles(public_path('usersimages/' . $this->getIdUser()));
        $imageData = [];

        foreach ($images as $image) {
            $imageData[] = [
                'filename' => $image->getFilename(),
                'url' => asset('usersimages/' . $this->getIdUser() . '/' . $image->getFilename())
            ];
        }
        return ['status' => 'success', 'images' => $imageData];
    }

    public function deleteImage($imageName)
    {
        if ($imageName) {
            File::delete(public_path('usersimages/' . $this->getIdUser() . '/' . $imageName));
        }
        return ['status' => 'success', 'message' => 'Image deleted successfully'];
    }

}