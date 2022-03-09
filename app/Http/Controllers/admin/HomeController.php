<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Utilities\CommonHelper;
use Illuminate\Support\Facades\App;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{

    public function __construct(){
        //
    }

    public function index(){
        
        return view('AdminTemplate.dashboard');

    }

    public function error(){
        
        return view('AdminTemplate.404');

    }

    public function basicTable(){
        
        return view('AdminTemplate.basic-table');

    }

    public function blank(){
        
        return view('AdminTemplate.blank');

    }

    public function fontawesome(){
        
        return view('AdminTemplate.fontawesome');

    }

    public function page(){
        
        return view('AdminTemplate.index');

    }

    public function googleMap(){
        
        return view('AdminTemplate.map-google');

    }

    public function profile(){
        
        return view('AdminTemplate.profile');

    }
}
