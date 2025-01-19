<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jadwalkonseling extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function pesertaKonselings()
    {
        return $this->hasMany(PesertaKonseling::class, 'id_konselings', 'id');
    }
}