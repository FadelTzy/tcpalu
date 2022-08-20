<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class questioner extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function prodi()
    {
        return $this->hasOne(prodi::class, 'kode_prodi', 'kdpstmsmh');
    }

    public function questionersatu()
    {
        return $this->hasOne(questionersatu::class, 'id_questioners', 'id');
    }
}
