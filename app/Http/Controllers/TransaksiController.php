<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Transaksi;
use App\Kelas;
use App\Siswa;
use App\Saving;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $siswas = Siswa::with('transactions')->Paginate(10);
        $data = Transaksi::paginate(10);
        // dd($siswas);
        // dd($siswas);
        return view('admin.transaksi.index', compact('siswas', 'data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $data = Transaksi::all();
        // $data = DB::table('transaksis')
        //         ->select('*')
        //         ->where('transaksis.siswa_id', 112)
        //         ->sum('amount')
        //         ->group_by('siswa_id')
        //         ->get();
        // dd($data);

        // $data1 = DB::table('transaksis')
        //         ->select('*')
        //         ->groupBy('siswa_id', , \DB::raw('count(amount) as totalamount'))
        //         ->whereRaw("DATE_FORMAT(dtCreated, '%w') = DATE_FORMAT(NOW(), '%w')")
        //         ->where('type', '=', '1')
        //         ->get();
        $siswas = Siswa::with('transactions')->get();
        // foreach ($data as $value) {
        //     $data1 = DB::select( DB::raw("SELECT *, SUM(amount) AS total_amount FROM `transaksis` WHERE siswa_id = $value->siswa_id AND DATE_FORMAT(created_at, 'CURDATE()') AND type = '1' GROUP BY siswa_id"));
        // }
        // dd($siswa);
        // foreach ($data as $value){
        //         $query1 = Transaksi::
        //         where('type', '1')
        //         ->where('siswa_id', '=', $value->siswa_id)
        //         ->whereDate('created_at', DB::raw('CURDATE()'))
        //         ->groupBy('siswa_id')
        //         ->sum('amount');
        // }
        // foreach ($data as $value){
        //     $query2 = Transaksi::
        //     where('type', '2')
        //     ->where('siswa_id', '=', $value->siswa_id)
        //     ->whereDate('created_at', DB::raw('CURDATE()'))
        //     ->groupBy('siswa_id')
        //     ->sum('amount');
        // }
        
        // $data1 = DB::table('transaksis')
        //         ->union($query1)
        //         ->union($query2)
        //         ->get();
        //     dd($data1);
        
        // $kelas = Kelas::all();

        // echo $data->siswa->nama;
        return view('admin.transaksi.add', compact('siswas'));
    }

    public function rekap()
    {
        //
    }

    
    public function store(Request $request)
    { 
        $student = Siswa::where('induk', $request->input('induk'))->first();
        if (empty($student)) {
    		$message = 'Siswa dengan nomor induk tersebut ' . $request->input('id') . ' tidak ditemukan.';
    		return redirect()->back()->with('success', $message);
    	}else {
    		if (($request->input('type') == 0) && ($request->input('amount') > $student->saldo)) {
    			$message = "Saldo tidak cukup!";
    			return redirect('transaksi/create')->with('success', $message);
    		} elseif(($request->input('type') == 0)) {
                

                $transaksi_created = Transaksi::create([
                    'siswa_id' => $request->induk,
                    'amount' => $request->amount,
                    'saving_id' => 0,
                    'type' => $request->type,
                ]);
                
                $total = $student->saldo - $request->amount;
                DB::table('siswas')->where('induk', $request->induk)->update([
                    'saldo' => $total,
                ]);
                
                
				
				// nama transaksi
				$namaTransaksi = "";
				if($request->input('type') == 1){
					$namaTransaksi = "Setor";
				}else{
					$namaTransaksi = "Tarik";
				}
				$message = "Informasi Nasabah | 
				No Induk = ".$student->id." |
				Waktu Transaksi = ".date('d M Y H:i:s')." |
				nama = ". $student->name ." |
				tipe = " . $namaTransaksi. " |
				saldo = " . $this->rupiah($request->input('amount')). " |
				total saldo = " . $this->rupiah($total) . " | ";
    			return redirect()->back()->with('success', $message);
    		}else{
                $transaksi_created = Transaksi::create([
                    'siswa_id' => $request->induk,
                    'amount' => $request->amount,
                    'saving_id' => 1,
                    'type' => $request->type,
                ]);
                
                $total = $student->saldo + $request->amount;
                DB::table('siswas')->where('induk', $request->induk)->update([
                    'saldo' => $total,
                ]);
                
                
				
				// nama transaksi
				$namaTransaksi = "";
				if($request->input('type') == 1){
					$namaTransaksi = "Setor";
				}else{
					$namaTransaksi = "Tarik";
				}
				$message = "Informasi Nasabah <br> 
				No Induk = ".$student->id." |
				Waktu Transaksi = ".date('d M Y H:i:s')." |
				nama = ". $student->nama ." |
				tipe = " . $namaTransaksi. " |
				saldo = " . $this->rupiah($request->input('amount')). " |
				total saldo = " . $this->rupiah($total) . " | ";
    			return redirect()->back()->with('success', $message);
            }
    	}
    }

    public function rupiah($angka){
		
		$hasil_rupiah = number_format($angka,0,'.',',');
		return $hasil_rupiah;
    }
    
    public function show(Transaksi $transaksi)
    {
        //
    }

    
    public function edit(Transaksi $transaksi)
    {
        //
    }

    
    public function update(Request $request, Transaksi $transaksi)
    {
        //
    }

    
    public function destroy(Transaksi $transaksi)
    {
        //
    }
}
