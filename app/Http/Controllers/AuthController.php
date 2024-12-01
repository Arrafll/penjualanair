<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function __construct() {
    
    }
    

    public function auth(){
        $data = [
            'title' => 'Login'
        ];
        return view('auth.login', $data);
    }

    public function signin(Request $request){   
        
        $validated = $request->validate([
            'username' => 'required|max:25',
            'password' => 'required',
        ]);

        $username = $request->username;
        $password = $request->password;
        
        if (Auth::attempt(['username' => $username, 'password' => $password])) {
            $request->session()->regenerate();
           
            if(Auth::user()->role_id == 1) {
                return redirect('/admin_dashboard');
            } else {
                return redirect('/agent_dashboard');
            }
        }

        return redirect('/auth')->with('invalid', 'Username atau password tidak tedaftar.');
      
        
    }

    public function register(){
    
        $data = [
            'title' => 'Sign Up'
        ];

        return view('auth.register', $data);
    }

    
    public function createUser(Request $request){
       

        $username = $request->username;
        $password = $request->password;
        
        $validated = $request->validate([
            'fullname' => 'required|max:25',
            'username' => 'required|min:8|max:12',
            'password' => 'required|confirmed',
            'email'    => 'required|email',
            'password_confirmation' => 'required',
        ]);

        $data = [
            'name' => $request->fullname,
            'username' => $request->username,
            'password' => bcrypt($request->password),
            'email' => $request->email,
            'id_role' => 2,
        ];
        User::create($data);
        
        return redirect('/auth')->with('success', 'your message,here');   
    }

    public function logout(){
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        return redirect('/auth');
    }

    public function redirectLogged(){
        $user = Auth::user();
        $roleUser = $user->role_id;

        switch ($roleUser) {
            case 1:
                return redirect('/admin_dashboard');
                break;
            
            default:
                return redirect('/agent_dashboard');# code...
                break;
        }
    }
    
}
