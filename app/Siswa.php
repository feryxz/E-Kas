<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    protected $guarded = [];

    public function kelas() {
    	return $this->belongsTo('App\Kelas');
    }
    
    public function savings() {
    	return $this->hasOne('App\Saving');
    }

    public function transactions() {
        return $this->hasMany('App\Transaksi','siswa_id','induk');
    }

}
