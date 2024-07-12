<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CropImageUploadController extends Controller
{
    public function index()
    {
        return view('cropimage');
    }
}
