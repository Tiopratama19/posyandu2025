<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Dataremaja extends Model
{
    use HasFactory;
    protected $fillable= [
        'NIK', 'Nama', 'TempatLahir', 'TanggalLahir', 'JenisKelamin'
    ];

    public static function rules($id = null)
    {
        return [
            'NIK' => 'required|unique:Dataremaja,NIK'. $id,
            'Nama' => 'required|unique:Dataremaja,Nama'. $id,
            'TempatLahir' => 'required|unique:Dataremaja,TempatLahir' . $id,
            'TanggalLahir' => 'required|unique:Dataremaja,TanggalLahir'. $id,
            'JenisKelamin' => 'required|unique:Dataremaja,JenisKelamin' . $id,
        ];
    }

    public function riwayat(): HasMany
    {
        return $this->hasMany(Riwayat::class, 'id_dataremaja');
    }
}
