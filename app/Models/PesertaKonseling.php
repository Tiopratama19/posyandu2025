<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PesertaKonseling extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $table = 'pesertakonselings';

    public function jadwalkonseling()
    {
        return $this->belongsTo(Jadwalkonseling::class, 'id_konselings', 'id');
    }
}