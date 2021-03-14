<?php

namespace App\Http\Controllers;

use App\Models\Complaint;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;

class ComplaintController extends Controller
{

    public $path;
    public $page;
    public $dimen;

    public function __construct()
    {
        $this->dimen = 750;
        $this->page = 10;
        $this->path = public_path().'/img/pengaduan/';
    }

    public function create()
    {
        return view('dashboard.complaint.form');
    }

    public function index(Request $request)
    {
        $query = Complaint::query();
        if($request->get('name') && $request->get('name') != null) {
            $complaint = $query->where('name', 'LIKE', "%$request->get('name')%");
        }
        if($request->get('username') && $request->get('username') != null) {
            $username = $request->get('username');
            $complaint = $query->whereHas('User', function($query) use ($username) {
                $query->where('name', 'LIKE', '%'.$username.'%');
            });
        }
        if($request->get('pagination') && $request->get('pagination') != null) {
            $complaint = $query->paginate($this->page);
        } else {
            $complaint = $query->get();
        }
        return view('dashboard.complaint.list', compact('complaint'));
    }

    public function store(Request $request)
    {
        if(Auth::check()) {
            $complaint = new Complaint();
            $complaint->user_id = Auth::id();
            $complaint->name = Auth::user()->name;
            $complaint->nik = $request->nik;
            $complaint->report = $request->report;
            if($request->file('picture') != null) {
                if(!File::isDirectory($this->path)) {
                    File::makeDirectory($this->path, 0777, false);
                }
                $file = $request->file('picture');
                $fileName = 'Complaint-'.str_replace(' ', '_', Auth::user()->name).time().'-'.'-'.uniqid().'.'.$file->extension();
                $img = Image::make($file->path());
                $img->resize($this->dimen, $this->dimen, function($constraint) {
                    $constraint->aspectRatio();
                })->save($this->path.$fileName);
                $complaint->picture = $fileName;
            }
            $complaint->save();
            return redirect()->route('index.complaint')->with('success', 'Pengaduan Success');
        } else {
            return redirect()->route('loginView')->with('error', 'Login dulu');
        }
    }

    public function setStatus($id)
    {
        $complaint = Complaint::find($id);
        if($complaint->status == null || $complaint->status == 'close') {
            $complaint->status = 'open';
        } else {
            $complaint->status = 'close';
        }
        $complaint->save();
        return redirect()->back()->with('success', 'Status berhasil diubah');
    }

    public function show($id)
    {
        $complaint = Complaint::with('Respond', 'User', 'Respond.User')->where('id', $id)->first();
        return view('dashboard.complaint.show', compact('complaint'));
    }

    public function storeAdmin(Request $request)
    {
        if(Auth::check()) {
            $complaint = new Complaint();
            $complaint->user_id = Auth::id();
            $complaint->name = Auth::user()->name;
            $complaint->nik = $request->nik;
            $complaint->report = $request->report;
            if($request->file('picture') != null) {
                if(!File::isDirectory($this->path)) {
                    File::makeDirectory($this->path, 0777, false);
                }
                $file = $request->file('picture');
                $fileName = 'Complaint-'.str_replace(' ', '_', Auth::user()->name).time().'-'.'-'.uniqid().'.'.$file->extension();
                $img = Image::make($file->path());
                $img->resize($this->dimen, $this->dimen, function($constraint) {
                    $constraint->aspectRatio();
                })->save($this->path.$fileName);
                $complaint->picture = $fileName;
            }
            $complaint->save();
            return redirect()->route('list.complaint')->with('success', 'Pengaduan Success');
        } else {
            return redirect()->route('loginView')->with('error', 'Login dulu');
        }
    }

    public function destroy($id)
    {
        $complaint = Complaint::find($id);
        if($complaint->picture != null) {
            if(File::exists($this->path.$complaint->picture)) {
                unlink($this->path.$complaint->picture);
            }
        }
        $complaint->delete();
        return redirect()->back()->with('success', 'Berhasil Dihapus');
    }

    public function update(Request $request, $id)
    {
        if(Auth::check()) {
            $complaint = Complaint::find($id);
            $complaint->user_id = Auth::id();
            $complaint->name = Auth::user()->name;
            $complaint->nik = $request->nik;
            $complaint->report = $request->report;
            if($request->file('picture') != null) {
                if(!File::isDirectory($this->path)) {
                    File::makeDirectory($this->path, 0777, false);
                }
                $file = $request->file('picture');
                $fileName = 'Complaint-'.str_replace(' ', '_', Auth::user()->name).time().'-'.'-'.uniqid().'.'.$file->extension();
                $img = Image::make($file->path());
                $img->resize($this->dimen, $this->dimen, function($constraint) {
                    $constraint->aspectRatio();
                })->save($this->path.$fileName);
                $complaint->picture = $fileName;
            }
            $complaint->save();
            return redirect()->route('list.complaint')->with('success', 'Pengaduan Success');
        } else {
            return redirect()->route('loginView')->with('error', 'Login dulu');
        }
    }

    public function edit($id)
    {
        $complaint = Complaint::find($id);
        return view('dashboard.complaint.form', compact('complaint'));
    }
}
