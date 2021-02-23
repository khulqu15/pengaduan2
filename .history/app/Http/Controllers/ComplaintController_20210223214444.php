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
    public $dimen;

    public function __construct()
    {
        $this->dimen = 750;
        $this->path = public_path().'/img/pengaduan/';
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

            }
        } else {
            return redirect()->route('loginView')->with('error', 'Login dulu');
        }
    }
}
