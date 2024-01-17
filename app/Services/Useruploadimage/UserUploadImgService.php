<?php
namespace App\Services\Useruploadimage;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;
class UserUploadImgService
{   
    public function getIdUser(){
        return Auth::guard('employee')->user()->id;
    }
    public function getImages()
    {
        $imageDirectory = public_path('usersimages/'.$this->getIdUser());
        $images = [];

        if (File::exists($imageDirectory)) {
            $imageFiles = File::files($imageDirectory);
            foreach ($imageFiles as $file) {
                $extension = strtolower($file->getExtension());
                if (in_array($extension, ['jpg', 'jpeg', 'png', 'gif', 'svg'])) {
                    $images[] = $file->getFilename();
                }
            }
        }

        return $images;
    }

    public function uploadImages($imageFiles)
    {
        $imageNames = [];

        foreach ($imageFiles as $value) {
            $imageName =    $value->getClientOriginalName();
            $value->move(public_path('usersimages/' . $this->getIdUser()), $imageName);

            $imageNames[] = $imageName;
        }
        return $imageNames;
    }

    public function deleteImage($imageName)
    {
        $imagePath = public_path('usersimages/' .$this->getIdUser(). '/' . $imageName);

        if (File::exists($imagePath)) {
            File::delete($imagePath);
            return true;
        } else {
            return false;
        }
    }
}