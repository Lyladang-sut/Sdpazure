<?php

namespace App\Traits;

use Illuminate\Http\Request;

date_default_timezone_set("Asia/Bangkok");
trait GenerateImageTrait
{

    public function generate($model, $upload_path, $prefix_name)
    {
        $datas = $model::all();
        $success = 0;
        $fail = 0;
        foreach ($datas as $item) {
            // $image = $model::find($item->ID);

            // if (file_exists(public_path($image->photo))) {

            //     if (!unlink(public_path($image->photo))) {
            //         ++$fail;
            //     } else {
            //         ++$success;
            //     }
            // }

            $base64_string = $item->Image;
            $name = $upload_path . str_random(20) . date('mdYHis') . uniqid() . $prefix_name.'.png';
            $file = fopen(public_path($name), "wb");
            fwrite($file, $base64_string);
            fclose($file);
            $item->photo = $name;
            $item->save();
        }
        echo ($success . 'succeed ' . $fail . ' fail!');
    }
}
