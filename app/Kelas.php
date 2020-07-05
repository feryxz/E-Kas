<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    protected $table = 'kelas';
    protected $guarded = [];

    public function siswas()
    {
        return $this->hasMany('App\Siswa');
    }
}
