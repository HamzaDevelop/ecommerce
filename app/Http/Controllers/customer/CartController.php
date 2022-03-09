<?php

namespace App\Http\Controllers\customer;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Utilities\CommonHelper;
use Illuminate\Support\Facades\App;
use Illuminate\Http\Request;

class CartController extends Controller
{
    
    public function __construct(){
        // 
    }

    public function index()
    {

        return view('CustomerTemplate.cart');
    }
}
