<?php

namespace App\Http\Controllers;

use App\Models\Complaint;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function home()
    {
        return view('welcome');
    }

    public function complaintIndex()
    {
        $complaint = Complaint::with('User')->where('status', 'open')->get();
        return view('pengaduanList', compact('complaint'));
    }

    public function complaintShow($id)
    {
        $complaint = Complaint::with('User', 'Respond')->where('id', $id)->where('status', 'open')->first();
        return view('pengaduanDetail', compact('complaint'));
    }

    public function pengaduanGet()
    {
        return view('pengaduan');
    }

    public function dashboard()
    {
        return view('dashboard.index');
    }
}
