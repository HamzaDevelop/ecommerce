<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\Support\Facades\Auth;

class AdminHeader extends Component
{

    public $type;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($type = null)
    {
        if($type){
            $this->type = $type;
        }
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $username = Auth::user()->name;
        $userImage = Auth::user()->user_image;
        if($userImage){
            $userImage = '/images/'.$userImage;
        } else{
            $userImage = 'AdminAsset/plugins/images/users/varun.jpg';
        }
        return view('components.admin-header', compact('username', 'userImage'));
    }
}
