<?php

namespace App\Http\Controllers\customer;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Utilities\CommonHelper;
use Illuminate\Support\Facades\App;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    
    public function __construct(){
        //
    }

    public function index()
    {
        // $user = $this->users->find($id);

        return view('CustomerTemplate.blog-archive');
    }

    public function blog_single()
    {
        // $user = $this->users->find($id);

        return view('CustomerTemplate.blog-single');
    }

}
