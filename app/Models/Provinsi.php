<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Provinsi extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function kota()
    {
        return $this->hasMany(Kota::class, 'id_induk_wilayah', 'id_wil');
    }
}
