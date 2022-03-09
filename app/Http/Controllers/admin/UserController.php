<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Utilities\CommonHelper;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function __construct(){
        //
    }

    public function adminUsers(){

        $users = User::where('role', CommonHelper::ADMIN_USER_ROLE)->get();
        
        return view('AdminTemplate.users.admin-users', compact('users'));

    }

    public function buyerUsers(){

        $users = User::where('role', CommonHelper::BUYER_USER_ROLE)->get();
        
        return view('AdminTemplate.users.buyer-users', compact('users'));

    }

    public function registerAdmin(){
        
        return view('AdminTemplate.users.register-admin');

    }

    public function deleteAdminUser($user_id){
        
        if(!$user = User::find($user_id)){

            session()->flash('error','User Not Found!');
            return redirect()->back(); 
        } else {
            if(!$user->delete()){
                session()->flash('error','Unknown error occured While removing!');
                return redirect()->back();    
            } else {
                session()->flash('success','User Removed Successfully!');
                return redirect()->back();
            }
        }

    }

    public function updateAdminUser($user_id){
        
        $user = User::find($user_id);

        return view('AdminTemplate.users.update-user-form', compact('user'));

    }

    public function userUpdate (Request $request){
        
        $request->validate([
            'id' => 'required',
            'name' => 'required',
            'email' => 'required|email',
            'user_image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
           
        $data = $request->all();

        $imageName = null;

        if(isset($data['user_image'])){
            
            $imageName = time().'-'.$data['name'].'.'.$request->user_image->extension();  

            $request->user_image->move(public_path('images'), $imageName);

            $update = User::where('id', $data['id'])->update([
                'name' => $data['name'],
                'email' => $data['email'],
                'user_image' => $imageName
            ]);
        } else{
            $update = User::where('id', $data['id'])->update([
                'name' => $data['name'],
                'email' => $data['email']
            ]);
        }
        
        if (!$update){
            
            session()->flash('error','Unknown error occured While updating!');

            return redirect()->back()->withInput();

        }

        session()->flash('success','Admin User has been Updated Successfully!');
         
        return redirect("admin/users");

    }

    public function adminRegister(Request $request){
        
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'user_image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
           
        $data = $request->all();

        $imageName = null;

        if(isset($data['user_image'])){
            
            $imageName = time().'-'.$data['name'].'.'.$request->user_image->extension();  

            $request->user_image->move(public_path('images'), $imageName);
        }

        if(!$this->create($data, $imageName)){
            session()->flash('error','Unknown error occured While registration!');
            return redirect()->back()->withInput();    
        }

        session()->flash('success','New Admin User has been Added Successfully!');
         
        return redirect("admin/users");
    }

    public function create($data, $imageName = null){
        
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'user_image' => $imageName
        ]);

    }
}
