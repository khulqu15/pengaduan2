<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image;

class UserController extends Controller
{

    public $page;
    public $path;
    public $dimen;

    public function __construct()
    {
        $this->page = 10;
        $this->path = public_path().'/img/user/';
        $this->dimen = 750;
    }

    public function index(Request $request)
    {
        $query = User::query();
        if($request->get('name') && $request->get('name') != null && $request->get('name') != "null") {
            $user = $query->where('name', 'LIKE', "%".$request->get('name')."%");
        }
        if($request->get('level') && $request->get('level') != null && $request->get('level') != "null") {
            $user = $query->where('level', $request->get('level'));
        }
        if($request->get('pagination') && $request->get('pagination') != null) {
            $user = $query->paginate($this->page);
        } else {
            $user = $query->get();
        }
        return view('dashboard.user.list', compact('user'));
    }

    public function edit($id)
    {
        $user = User::find($id);
        return view('dashboard.user.form', compact('user'));
    }

    public function show($id)
    {
        $user = User::find($id);
        return view('dashboard.user.show', compact('user'));
    }

    public function update(Request $request, $id)
    {
        try {
            $user = User::find($id);
            $user->name = $request->name;
            $user->level = $request->level;
            $user->email = $request->email;
            if($request->file('avatar') && $request->file('avatar') != null ) {
                $file = $request->file('avatar');
                $fileName = str_replace(' ', '_', $request->name).'-'.time().'-'.uniqid().'.'.$file->extension();
                $img = Image::make($file->path());
                if(!File::isDirectory($this->path)) {
                    File::makeDirectory($this->path, 0777, false);
                }
                if($user->avatar != null) {
                    if(File::exists($this->path.$user->avatar)) {
                        unlink($this->path.$user->avatar);
                    }
                }
                $img->resize($this->dimen, $this->dimen, function($constraint) {
                    $constraint->aspectRatio();
                })->save($this->path.$fileName);
                $user->avatar = $fileName;
            }
            $user->save();
            return redirect()->route('list.user')->with('success', 'Berhasil Diupdate');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal Diupdate');
        }
    }

    public function profile()
    {
        if(Auth::check()) {
            $user = User::with('Respond', 'Complaint')->where('id', Auth::id())->first();
            if(Auth::user()->level == 'user') {
                return view('dashboard.profile', compact('user'));
            } else {
                return view('dashboard.profile', compact('user'));
            }
        }
    }

    public function updateProfile(Request $request)
    {
        try {
            $user = User::find(Auth::id());
            $user->name = $request->name;
            $user->email = $request->email;
            if($request->file('avatar') && $request->file('avatar') != null ) {
                $file = $request->file('avatar');
                $fileName = str_replace(' ', '_', $request->name).'-'.time().'-'.uniqid().'.'.$file->extension();
                $img = Image::make($file->path());
                if(!File::isDirectory($this->path)) {
                    File::makeDirectory($this->path, 0777, false);
                }
                if($user->avatar != null) {
                    if(File::exists($this->path.$user->avatar)) {
                        unlink($this->path.$user->avatar);
                    }
                }
                $img->resize($this->dimen, $this->dimen, function($constraint) {
                    $constraint->aspectRatio();
                })->save($this->path.$fileName);
                $user->avatar = $fileName;
            }
            $user->save();
            return redirect()->back()->with('success', 'Berhasil Diupdate');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal Diupdate');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('loginView')->with('success', 'Logout Berhasil');
    }

    public function destroy($id)
    {
        try {
            $user = User::find($id);
            if($user->avatar != null && File::exists($this->path.$user->avatar)) {
                unlink($this->path.$user->avatar);
            }
            $user->delete();
            return redirect()->back()->with('success', 'Berhasil Dihapus');
        } catch (\Exception $e) {
            return redirect()->back()->with('success', 'Gagal Dihapus');
        }
    }

    public function loginGet()
    {
        return view('auth.login');
    }

    public function loginPost(Request $request)
    {
        if(Auth::attempt($request->only(['email', 'password']))) {
            $user = Auth::user();
            if($user->level != 'admin' && $user->level != 'petugas') {
                return redirect()->route('home')->with('success', 'Login Success');
            } else {
                return redirect()->route('dashboard')->with('success', 'Login Success');
            }
        } else {
            return redirect()->back()->with('error', 'Invalid Email Password');
        }
    }

    public function registerGet()
    {
        return view('auth.register');
    }

    public function registerPost(Request $request)
    {
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->level = $request->level;
        $user->save();
        return redirect()->route('loginView')->with('success', 'Register Success');
    }
}
