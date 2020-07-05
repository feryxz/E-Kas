<?php

namespace App\Http\Controllers;

use App\Tabungan;
use Illuminate\Http\Request;
use App\Siswa;

class TabunganController extends Controller
{
    public function index()
    {
        $siswas = Siswa::with('transactions')->get();
        return view('admin.tabungan.index', compact('siswas'));
    }

}
