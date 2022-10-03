<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminAuthController extends Controller
{
    public function getLogin(){
        return view('admin.auth.login');
    }

    public function postLogin(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if(auth()->guard('admin')->attempt(['email' => $request->input('email'), 'password' => $request->input('password')])){
            $user = auth()->guard('admin')->user();
            if($user->is_admin == 1){
                return redirect()->route('adminDashboard')-with('success', 'You are logged in successfully');
            }
        }else {
            return back()->with('error', 'Invalid email and password.');
        }
    }

    public function adminLogout(Request $request)
    {
        auth()->guard('admin')->logout();
        Session::flush();
        Session::put('success', 'You are logged out successfully');
        return redirect(route('adminLogin'));
    }
}
