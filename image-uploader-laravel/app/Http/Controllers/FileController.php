<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FileController extends Controller
{
    public function upload(Request $request) {
        // Validate Image
        $request->validate([
            'avatar' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        $result = $request->file('image')->storeOnCloudinary('image-uploader');
        
        return response()->json([
            "url" => $result->getSecurePath()
        ]);
    }
}
