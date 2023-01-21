<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function addPost()
    {
        return view('welcome');
    }

    public function submitData(Request $request)
    {

        $validate = Validator::make($request->all(), [
            "title" => "required|min:4|max:20",
            "content" => "required"
        ], [
                
            ])->validate();

    }   
}