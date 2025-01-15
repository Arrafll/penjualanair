<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\UserData;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

use Illuminate\Support\Facades\File; 
use Intervention\Image\Laravel\Facades\Image;

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
                return redirect()->route('admin_dashboard');
            } else {
                return redirect('/customer_dashboard');
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
            'role_id' => 2,
        ];
        $user = User::create($data);

        $userData = [
            'user_id' => $user->id,
        ];

        UserData::create($userData);
        return redirect('/auth')->with('success', 'Akun berhasil dibuat.');   
    }

    public function logout(){
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        return redirect('/auth');
    }

    public function redirectLogged(){
        $user = Auth::user();
        if(!isset($user->role_id)) return redirect('/auth');
        $roleUser = $user->role_id;

        switch ($roleUser) {
            case 1:
                return redirect()->route('admin_dashboard');
                break;
            
            default:
                return redirect()->route('customer_dashboard');
                break;
        }
    }
    

    public function user_update_data(Request $request) {
        $rules = [
            'fullname' => 'required|max:25',
            'email' => [
                'required',
                'email',
                Rule::unique('users')->ignore(Auth::user()->id, 'id'),
            ],
            'telepon' => 'required|min:10|numeric',
            'handphone' => 'required|min:10|numeric',
            'alamat' => 'required|min:5',
            'kota' => 'required',
            'provinsi' => 'required',
            'kodepos' => 'required',
        ];

        $validMsg = [
              'kodepos.required' => 'Kolom kode pos tidak boleh kosong.',
              'required' => 'Kolom :attribute tidak boleh kosong.',
              'unique' => 'Data :attribute sudah terdaftar.',
              'min' => 'Data :attribute minimal :min karakter.',
              'max' => 'Data :attribute maksimal :max karakter.',
              'numeric' => 'Karakter :attribute harus berupa angka.'
        ];
        $this->validate($request, $rules, $validMsg);

        $userId = Auth::user()->id;

        $user = User::find($userId);
        $user->name = $request->fullname;
        $user->email = $request->email;
        $user->save();

        $id = $request->data_id;
        $userData = UserData::find($id);
        $userData->telepon = $request->telepon;
        $userData->no_hp = $request->handphone;
        $userData->alamat = $request->alamat;
        $userData->kota = $request->kota;
        $userData->provinsi = $request->provinsi;
        $userData->kode_pos = $request->kodepos;
        $userData->bio = $request->bio;

        if($request->hasFile('fotoprofil')) {

            if($userData->pic) {
                $path = public_path() . "/uploads/user-avatar/$userData->pic";
                File::delete($path);
            }
          
            $file = $request->file('fotoprofil');
            $imageName = $user->name.time().'.'.$file->getClientOriginalExtension();
            $image_resize = Image::read($file->getRealPath());              
            $image_resize->save(public_path('uploads/user-avatar/' .$imageName));
            $userData->pic = $imageName;
        }

        $userData->save();

        return redirect()->back()->with('successEdit', 'Data profil berhasil diperbarui.');
    }
    
}
