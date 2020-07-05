<?php

namespace App\Imports;

use App\Siswa;
use Maatwebsite\Excel\Concerns\ToModel;

class SiswaImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Siswa([
            return new Siswa([
                'induk' => $row[1],
                'nama' => $row[2], 
                'kelas' => $row[3], 
            ]);
        ]);
    }
}
