<?php

namespace App\Models;

use App\Models\Presensi;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Peserta extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function presensi(): HasOne
    {
        return $this->hasOne(Presensi::class);
    }
}
