<?php

namespace App\Http\Controllers\Utilities;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class CommonHelper extends Controller
{

    public const PER_PAGE = 5;

    public const ADMIN_USER_ROLE = 1;

    public const BUYER_USER_ROLE = 2;

    public static function getDefaultLang(){
        return 'en';
    }

    public static function setLocale($langId = null){
        
        if($langId){
            session()->put('language', $langId);    
        } else{
            session()->put('language', Self::getDefaultLang());
        }

        return redirect()->back();
    }
}
