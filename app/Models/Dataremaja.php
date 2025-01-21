<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Dataremaja extends Model
{
    use HasFactory;

    protected $guarded = [];

    public static function rules($id = null)
    {
        return [
            'nik' => 'required|unique:Dataremaja,nik' . $id,
            'email' => 'required|unique:Dataremaja,email' . $id,
            'Nama' => 'required|unique:Dataremaja,Nama' . $id,
            'TempatLahir' => 'required|unique:Dataremaja,TempatLahir' . $id,
            'TanggalLahir' => 'required|unique:Dataremaja,TanggalLahir' . $id,
            'JenisKelamin' => 'required|unique:Dataremaja,JenisKelamin' . $id,
        ];
    }

    public function riwayat(): HasMany
    {
        return $this->hasMany(Riwayat::class, 'id_dataremaja');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'nik', 'nik');
    }
}