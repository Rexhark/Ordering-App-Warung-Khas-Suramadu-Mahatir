<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    // Return View
    public function indexDaftar(){
        return view('pages.daftar');
    }
    public function indexTambah(){
        return view('pages.tambah-user')->with('type_menu','components');
    }
    public function indexLogin(){
        return view('pages.login');
    }
    public function indexProfil(User $user){
        return view('pages.profil-user', compact(['user']))->with('type_menu','components');
    }
    
    // Daftar, Login, Logout, dan Edit Data
    public function daftarMain(Request $request){
        $validateData = $request->validate([
            'name' => 'required|max:255',
            'username' => 'required|unique:user',
            'email' => 'required|unique:user',
            'password' => 'required|min:8',
            'password_confirmation' => 'required|min:8|same:password',
            'image' => 'image|file'
        ]);

        if($request->file('image')){
            $validateData['image'] = $request->file('image')->store('profil'); 
        } else {
            $validateData['image'] = 'default/avatar-1.png';
        }

        $cekEmail = User::find($request->email);
        $cekUserName = User::find($request->username);
        if($cekEmail){  
            return redirect('login')->with('error','Email telah terdaftar!');            
        } else {
            if ($cekUserName){
                return redirect('login')->with('error','Username telah terpakai!');
            } else {
                $new = new User;
                $new->name = $request->name;
                $new->username = $request->username;
                $new->email = $request->email;
                $new->biography = $request->biography;
                $new->password = bcrypt($request->password);
                $new->image = $validateData['image'];
                $new->role = $request->role;
                $new->save();
                return redirect('home');
                // return redirect('home')->with('terdaftar','Akun berhasil dibuat!');
            }
        }
    }
    public function tambahUser(Request $request){
        $validateData = $request->validate([
            'name' => 'required|max:255',
            'username' => 'required|unique:user',
            'email' => 'required|unique:user',
            'password' => 'required|min:8',
            'image' => 'image|file',
            'role' => 'required'
        ]);

        if($request->file('image')){
            $validateData['image'] = $request->file('image')->store('profil'); 
        } else {
            $validateData['image'] = 'default/avatar-1.png';
        }

        $cekEmail = User::find($request->email);
        $cekUserName = User::find($request->username);
        if($cekEmail){  
            return redirect('dashboard/user')->with('error','Email telah terdaftar!');            
        } else {
            if ($cekUserName){
                return redirect('dashboard/user')->with('error','Username telah terpakai!');
            } else {
                $new = new User;
                $new->name = $request->name;
                $new->username = $request->username;
                $new->email = $request->email;
                $new->biography = $request->biography;
                $new->password = bcrypt($request->password);
                $new->image = $validateData['image'];
                $new->role = $request->role;
                $new->save();
                return redirect('dashboard/user')->with('success','Akun berhasil dibuat!');
            }
        }
    }
    public function edit(Request $request){
        
        $validateData = $request->validate([
            'name' => 'required',
            'username' => 'required',
            'email' => 'required',
            'image' => 'image|file'
        ]);

        if($request->file('image')){
            $validateData['image'] = $request->file('image')->store('profil'); 
        } else {
            $validateData['image'] = $request->image_lama;
        }

        $data = User::where('email', $request->email)->first();
        $pass = $data['password'];

        // Cek kesamaan password (kolom password_lama terisi)
        if($request->password_lama != '' || $request->password_lama != null){
            if(password_verify($request->password_lama, $pass) == false){ 
                return redirect('profil')->with('error','Password lama salah!');  
            }
            // Cek apakah kedua kolom password terisi
            if($request->password_baru != '' || $request->password_baru != null){
                // Cek kesamaan kedua kolom password
                if($request->password_baru == $request->password_lama){
                    return redirect('profil')->with('error','Password baru harus berbeda!'); 
                } 
            } else {
                return redirect('profil')->with('error','Kolom password baru belum diisi!'); 
            }
        }

        $user = User::find($request->id);
        $user->name = $request->name;
        $user->username = $request->username;
        $user->email = $request->email;
        if($request->password_lama != '' && $request->password_baru != ''){
            $user->password = bcrypt($request->password_baru);
        }
        $user->image = $validateData['image'];
        $user->biography = $request->biography;
        $user->save();
        return redirect('profil')->with('success','Data berhasil diedit!');

    }
    public function editProfil(Request $request){
        
        $validateData = $request->validate([
            'name' => 'required',
            'username' => 'required',
            'email' => 'required',
            'image' => 'image|file'
        ]);

        if($request->file('image')){
            $validateData['image'] = $request->file('image')->store('profil'); 
        } else {
            $validateData['image'] = $request->image_lama;
        }

        $data = User::where('email', $request->email)->first();
        $pass = $data['password'];

        // Cek kesamaan password (kolom password_lama terisi)
        if($request->password_lama != '' || $request->password_lama != null){
            if(password_verify($request->password_lama, $pass) == false){ 
                return redirect('dashboard/user/{user:username}')->with('error','Password lama salah!');  
            }
            // Cek apakah kedua kolom password terisi
            if($request->password_baru != '' || $request->password_baru != null){
                // Cek kesamaan kedua kolom password
                if($request->password_baru == $request->password_lama){
                    return redirect('dashboard/user/{user:username}')->with('error','Password baru harus berbeda!'); 
                } 
            } else {
                return redirect('dashboard/user/{user:username}')->with('error','Kolom password baru belum diisi!'); 
            }
        }

        $user = User::find($request->id);
        $user->name = $request->name;
        $user->username = $request->username;
        $user->email = $request->email;
        if(($request->password_lama != '' || $request->password_lama != null) && ($request->password_baru != '' || $request->password_baru != null)){
            $user->password = bcrypt($request->password_baru);
        }
        $user->image = $validateData['image'];
        $user->biography = $request->biography;
        $user->save();
        return redirect('dashboard/user/'.$user->username)->with('success','Data berhasil diedit!');

    }
    public function login(Request $request){

        $credentials = $request->validate([
            'email' => 'required|email:dns',
            'password' => 'required|min:8',
        ]);
        
        if (Auth::attempt($credentials)) {
        
            $user = User::where('email',$request->email)->first();
            $user->isOnline = 1;
            $user->save();

            $request->session()->regenerate();
            return redirect()->intended('home');
        }

        return back()->with('error','Gagal login');


    }
    public function logout(Request $request){
        $user = User::find(auth()->user()->id);
        $user->isOnline = 0;
        $user->save();

        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
    public function hapus(Request $request){
        $user = User::find($request->id);
        $user->delete();
        return redirect('dashboard/user')->with('success','Data berhasil dihapus!');
    }
    
    // Index User
    public function index(){
        $admin = User::where('role','admin')->paginate(10);
        $user = User::where('role','user')->paginate(10);
        return view('pages.user', compact(['admin','user']))->with('type_menu','components');
    }

}
