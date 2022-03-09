<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Utilities\CommonHelper;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{

    public function __construct(){
        //
    }
    
    public function index(){
        
        $user = Auth::user();

        return view('AdminTemplate.profile.profile', compact('user'));

    }
}
