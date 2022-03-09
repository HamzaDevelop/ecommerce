<?php

namespace App\Http\Controllers\customer;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Utilities\CommonHelper;
use Illuminate\Support\Facades\App;
use Illuminate\Http\Request;

class ContactUsController extends Controller
{
    
    public function __construct(){
        //
    }

    public function index()
    {
        // $user = $this->users->find($id);

        return view('CustomerTemplate.contact');
    }

}
