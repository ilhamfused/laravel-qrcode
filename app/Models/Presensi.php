<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Presensi extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function peserta(): BelongsTo
    {
        return $this->belongsTo(Peserta::class);
    }
}
