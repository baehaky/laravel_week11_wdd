<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Exception;

class Users extends Controller
{
    public function index(){
        return view('login');
    }

    public function logout_action(Request $request)
    {
        $request->session()->flush();
        $request->session()->regenerateToken();

        return redirect('/')->with('status', 'You have successfully logged out.');
    }

    public function login_action(Request $request){
        $username = $request->input('email');
        $password = md5($request->input('password'));
        
        try {
            $data = DB::table('data_login')->select('user_role')->where(
                ['email' => $username],
                ['password' => $password])->value('user_role');
            
                if($data == 'admin'){
                    $user = DB::table('data_user')->get();
                    return view('login_admin')->with('userdata', $user);
                } else if ($data == 'member'){
                    $user = DB::table('data_user')->select('first_name', 'last_name')->where(['email' => $username])->get();
                    return view('login_member')->with('userdata', $user);
                }
            
        } catch (Exception $e) {
            return back()->withErrors('An error occurred: ' . $e->getMessage());
        }
    }

}
