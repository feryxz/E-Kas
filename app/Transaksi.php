<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Transaksi extends Model
{
    protected $guarded = [];

    public function student() {
    	return $this->belongsTo('App\Kelas', 'kelas_id');
    }

    public function savings() {
    	return $this->belongsTo('App\Saving', 'saving_id');
    }

    // public function kelas() {
    // 	return $this->belongsTo('App\Kelas');
    // }

    public function siswa()
    {
        return $this->belongsTo('App\Siswa', 'siswa_id', 'induk');
    }

    
}
