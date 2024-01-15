<?php

namespace App\Traits;

use Illuminate\Http\UploadedFile;

trait ImgProcess
{
    public function renameIMG(UploadedFile $fileIMG)
    {
        // lấy ra định dạng ảnh
        $file_extension = $fileIMG->extension();
        return "img-" . time() . "." . $file_extension;
    }

    public function saveImage(UploadedFile $fileIMG, $destinationPath, $file_name)
    {
        $fileIMG->move(public_path($destinationPath), $file_name);
    }
}
