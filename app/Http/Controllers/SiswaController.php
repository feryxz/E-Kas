<?php

namespace App\Http\Controllers;

use App\Siswa;
use Illuminate\Http\Request;
use App\Kelas;
use App\Exports\SiswaExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;
use PDF;

class SiswaController extends Controller
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
        return view('admin.siswa.index', compact('data','kelas'));
    }
    
    public function export_excel()
	{
        return Excel::download(new SiswaExport, 'laporan-siswa'. date('Y-m-d H:i:s') .'.xlsx');
    }
    
    public function export_pdf()
	{
        $siswa = Siswa::all();

        $pdf = PDF::loadview('admin.siswa.pdf',['data'=>$siswa]);
        return $pdf->download('laporan-total-siswa-'.date('Y-m-d H:i:s').'.pdf');
	}

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $kelas = Kelas::all();
        return view('admin.siswa.add', compact('kelas'));
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
            'induk' => 'required|min:3|unique:siswas',
            'nama' => 'required',
            'kelas' => 'required',
        ]);

        $post = Siswa::create([
            'induk' => $request->induk,
            'nama' => $request->nama,
            'kelas_id' => $request->kelas,
        ]);

        return redirect()->back()->with('success', 'Postingan berhasil disimpan');
    }

    
    public function edit($id)
    {   
        $kelas = Kelas::all();
        $siswa = Siswa::findorfail($id);
        return view('admin.siswa.edit', compact('kelas','siswa'));
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
            'induk' => 'min:3',
            'nama' => 'required',
            'kelas' => 'required',
        ]);

        $siswa = [
            // 'induk' => $request->induk,
            'nama' => $request->nama,
            'kelas_id' => $request->kelas,
        ];

        Siswa::whereId($id)->update($siswa);
        return redirect()->route('siswa.index')->with('success', 'Data berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $siswa = Siswa::findorfail($id);
        $siswa->delete();

        return redirect()->route('siswa.index')->with('success', 'Data berhasil dihapus');
    }

    public function show()
    {
        //
    }
}
