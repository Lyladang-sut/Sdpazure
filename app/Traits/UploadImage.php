<?php

namespace App\Traits;

use Illuminate\Http\Request;

date_default_timezone_set("Asia/Bangkok");
trait UploadImage
{

    public function uploadImage($data, $upload_path, $prefix_name)
    {
        $file = $data;
        $name = str_random(20) . date('mdYHis') . uniqid() . $prefix_name.'.png';
        $destinationPath = public_path($upload_path);
        $file->move($destinationPath, $name);

        $photoName = $upload_path . $name;
        return $photoName;
    }

    public function uploadImageBase64($data, $upload_path, $prefix_name)
    {
        $name = $upload_path . str_random(20) . date('mdYHis') . uniqid() . $prefix_name.'.png';
        $file = fopen(public_path($name), "wb");
        $data = explode(',', $data);
        fwrite($file, base64_decode($data[1]));
        fclose($file);
        return $name;
    }

    public function removeImage($image_path)
    {
        if (file_exists(public_path($image_path))) {
            unlink(public_path() . $image_path);
        }
    }
}
