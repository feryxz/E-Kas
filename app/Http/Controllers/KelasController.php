<?php

namespace App\Http\Controllers;

use App\Siswa;
use Illuminate\Http\Request;
use App\Kelas;
use App\Exports\SiswaExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;

class KelasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $kelas = Kelas::all();
        $data = Siswa::all();
        return view('admin.kelas.index', compact('data','kelas'));
    }

    public function import_excel()
	{
		return Excel::download(new SiswaExport, 'siswa.xlsx');
	}

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $kelas = Kelas::all();
        return view('admin.kelas.add', compact('kelas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'nama' => 'required',
        ]);

        $post = Kelas::create([
            'nama' => $request->nama,
        ]);

        return redirect()->back()->with('success', 'Kelas berhasil disimpan');
    }

    
    public function edit($id)
    {   
        $kelas = Kelas::findorfail($id);
        return view('admin.kelas.edit', compact('kelas','kelas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'nama' => 'required',
        ]);

        $kelas = [
            // 'induk' => $request->induk,
            'nama' => $request->nama,
        ];

        Kelas::whereId($id)->update($kelas);
        return redirect()->back()->with('success', 'Data berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $siswa = Kelas::findorfail($id);
        $siswa->delete();

        return redirect()->route('kelas.index')->with('success', 'Data berhasil dihapus');
    }
}
