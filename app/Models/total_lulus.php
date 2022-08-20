<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class total_lulus extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function univ()
    {
        return $this->hasOne(univ::class, 'kd_univ', 'kd_univ');
    }

    public function fakultas()
    {
        return $this->hasOne(fakultas::class, 'kd_fak', 'kd_fak');
    }

    public function prodi()
    {
        return $this->hasOne(Prodi::class, 'kode_prodi', 'kode_prodi');
    }
}
