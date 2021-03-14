<?php

namespace App\Http\Controllers;

use App\Models\Respond;
use Illuminate\Http\Request;

class RespondController extends Controller
{

    public $res;

    public function __construct(Respond $respond)
    {
        $this->res = $respond;
    }

    public function store(Request $request)
    {
        $this->res->create($request->all());
        return redirect()->back()->with('success', 'Respond Berhasil Ditambahkan');
    }

    public function destroy($id)
    {
        $this->res->destroy($id);
        return redirect()->back()->with('success', 'Respond Berhasil Dihapus');
    }
}
