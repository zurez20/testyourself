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
            $uploadDir = public_path($uploadpath);

            if (!file_exists($uploadDir)) {
                mkdir($uploadDir, 0777, true);
            }
            $name = time() . '-' . $fieldName . '-' . $file->getClientOriginalName();
            $imagePath = $uploadpath . '/' . $name;
            $file->move($uploadDir, $name);
            chmod($uploadDir . '/' . $name, 0777);

            return $imagePath;
        }

        return null;
    }


    // Update File
    function updateUploadFile($request, $fieldName, $uploadpath, $oldImage)
    {
        if ($request->hasFile($fieldName)) {
            $file = $request->file($fieldName);

            // Absolute path
            $uploadDir = public_path($uploadpath);

            // Create dir if needed
            if (!file_exists($uploadDir)) {
                mkdir($uploadDir, 0777, true);
            }

            $name = time() . '-' . $fieldName . '-' . $file->getClientOriginalName();
            $imagePath = $uploadpath . '/' . $name;

            // Move and set permissions
            $file->move($uploadDir, $name);
            chmod($uploadDir . '/' . $name, 0777);

            // Delete old file safely
            $oldFilePath = public_path($oldImage);
            if (file_exists($oldFilePath) && is_writable($oldFilePath)) {
                @unlink($oldFilePath);
            }

            return $imagePath;
        }
    }
}
