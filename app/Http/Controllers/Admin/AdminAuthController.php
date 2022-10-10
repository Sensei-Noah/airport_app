<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;

class AdminAuthController extends Controller
{
    public function index(){
        $users = User::paginate('6');

        return view('pages.user.show_users', ['users' => $users]);
    }

    public function adminLogout()
    {
        auth()->guard('admin')->logout();
        Session::flush();
        Session::put('success', 'You are logged out successfully');
        return redirect('/');
    }
}
