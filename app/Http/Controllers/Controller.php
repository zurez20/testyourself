<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Customer;
use App\Models\Log as ModelsLog;
use Illuminate\Support\Facades\Log;
use App\Services\ApiService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

abstract class Controller
{
    protected $apiService;

    public function __construct(ApiService $apiService)
    {
        $this->apiService = $apiService;
    }
    function uploadFile($request, $fieldName, $uploadpath)
    {
        if ($request->hasFile($fieldName)) {
            $file = $request->file($fieldName);
            $name = time() . '-' . $fieldName . '-' . $file->getClientOriginalName();
            $imagePath = $uploadpath . '/' . $name;
            $file->move($uploadpath, $name);
            chmod($uploadpath . '/' . $name, 0777);
            return $imagePath;
        } else {
            return null;
        }
    }

    // Update File
    function updateUploadFile($request, $fieldName, $uploadpath, $oldImage)
    {
        if ($request->hasFile($fieldName)) {
            $file = $request->file($fieldName);
            $name = time() . '-' . $fieldName . '-' . $file->getClientOriginalName();
            $imagePath = $uploadpath . '/' . $name;
            $file->move($uploadpath, $name);
            chmod($uploadpath . '/' . $name, 0777);
            if (file_exists($oldImage)) {
                unlink($oldImage);
            }
            return $imagePath;
        } else {
            return $oldImage;
        }
    }
}
