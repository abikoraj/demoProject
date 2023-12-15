<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function login(Request $request){
        if ($request->getMethod()== 'POST') {
            $request->validate([
                'phone' => 'required|numeric|starts_with:98,97|digits:10',
                'password' => 'required|min:8'
            ]);
            if (!Auth::attempt(['phone' => $request->phone, 'password' => $request->password])) {
                return back()->with('error', 'Phone Number or Password Wrong!');
            } else {
                if (Auth::user()->role == 1) {
                    return redirect()->route('admin.dashboard');
                } else {
                    return redirect()->route('user.dashboard');
                }
                
            }
            
        }else {
            return view('login');
        }
    }

    public function index(){
        return view('admin.users');
    }

    public function submit(Request $request){
        $request->validate([
            'name' => 'required|alpha',
            'phone' => 'required|numeric|starts_with:98,97|digits:10|unique:users,phone',
            'password' => 'required|min:8'
        ]);
        $user = new User();
        $user->name = $request->name;
        $user->phone = $request->phone;
        $user->password = $request->password;
        $user->role = 2;
        dd($user);
        // $user->save();
        return back()->with('message', 'User Added Successfully!');
    }

    public function userDashboard(){
        return view('front.dashboard');
    }

    public function adminDashboard(){
        return view('admin.dashboard');
    }
}
