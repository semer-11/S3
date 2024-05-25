<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UploadController extends Controller
{
    public function save(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'image' => "required|image|mimes:jpeg,png,jpg"
        ]);

        if ($validation->fails()) {
            return response()->json([
                'status' => 'fail',
                'error' => $validation->errors()->first()
            ]);
        }

        $path = $request->file('image')->store('/user_uploads','public');

        return response()->json([
            'status' => 'success',
            'path' => env('APP_URL') . "/storage/$path"
        ]);
    }
}
