<?php


namespace App\Http\Libraries;


use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class Helpers
{

    /** Upload file
     * @param file $file
     * @param location
     * @return string
     */
    public function uploadFile($file = null, $location = null)
    {
        $path = '';
        if (!is_null($file) && !is_null($location)) {
            $file = $file;
            $path = $file->store('public/'.$location);
            return $path;
        }
        return $path;
    }
}
