<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class MediaController extends Controller
{
    public function getImage($file_name)
    {
        $contents = Storage::disk('image')->path($file_name);
        return response()->file($contents);
    }

    public function getAvatar($file_name)
    {
        $contents = Storage::disk('avatar')->path($file_name);
        return response()->file($contents);
    }

    public function getFile($file_name)
    {
        $contents = Storage::disk('doc')->path($file_name);
        return response()->file($contents);
    }

    public function getContentImage($file_name)
    {
        $contents = Storage::disk('public_uploads')->path($file_name);
        return response()->file($contents);
    }

    public static function storeContentImage(Request $request)
    {
        $image = $request->file('upload');
        $image_name = $image->getClientOriginalName();
        $extension = $image->getClientOriginalExtension();
        $destinationPath = $request->disk;
        $image_name = $destinationPath . '/' . $image_name;

        if (Storage::disk('public_uploads')->exists($image_name)) {
            $now = \DateTime::createFromFormat('U.u', microtime(true));
            $image_name = $destinationPath . '/' . $now->format("Hisu") . '.' . $extension;
        }

        Storage::disk('public_uploads')->put($image_name, File::get($image));
        
        return response()->json(['filename'=> $image_name,'uploaded'=> 1,'url' => $request->root().'/media_content'.$image_name]);
    }
}
