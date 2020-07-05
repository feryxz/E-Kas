<?php

namespace App\Http\Controllers;

use App\Saving;
use Illuminate\Http\Request;
use App\Siswa;
use DB;

class SavingController extends Controller
{
    public function create(siswa $siswa) {
        $saving = new Saving();
        $saving->balance = 0;
        $saving->siswa_id = $siswa->id;
        $saving->save();
        return true;
    }

    public function getAllSaving() {
    	$savings = Saving::all();
    	$data = array(
            'savings' => $savings,
            'page' => 'saving',
        );
        return view('saving.viewAll', $data);
    }

    public function getSaving($id) {
        $saving = Saving::where('siswa_id', $id)->first();
        // echo "hello";
        echo $saving->siswa->name;
    }		
}
