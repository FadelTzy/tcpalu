<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prodi extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function fakultas()
    {
        return $this->hasOne(fakultas::class, 'kd_fak', 'kd_fak');
    }
}
