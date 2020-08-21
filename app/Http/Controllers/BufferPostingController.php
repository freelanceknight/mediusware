<?php

namespace Bulkly\Http\Controllers;

use Bulkly\BufferPosting;
use Illuminate\Http\Request;

class BufferPostingController extends Controller
{
    //

    public function index(){
        //dd("INDEX");
        return view('pages.bufferPosting');
    }

    public function getBufferPosts(){
        return response()->json(['message'=>'Get Buffer Posts']);
    }
}
