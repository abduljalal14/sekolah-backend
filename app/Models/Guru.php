<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{
    public function kelas()
    {
        return $this->belongsTo(Kelas::class);
    }
}
