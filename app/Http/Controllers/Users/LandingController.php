<?php

namespace App\Http\Controllers\Users;

use Illuminate\Http\Request;
use App\Models\Kegiatankader;
use App\Http\Controllers\Controller;
use App\Models\Anggota;
use App\Models\Informasi;
use App\Models\Jadwalkonseling;
use App\Models\Kategori;
use App\Models\PesertaKegiatan;
use App\Models\Prokerposyandu;
use Carbon\Carbon;
use App\Models\Dokumentasi;
class LandingController extends Controller
{
    function index()
    {
        $now = Carbon::now();

        $jadwals = JadwalKonseling::whereYear('TanggalKegiatan', $now->year)
            ->whereMonth('TanggalKegiatan', $now->month)
            ->orderBy('TanggalKegiatan', 'desc')
            ->with('dokumentasi')
            ->get();

        $dokumentasi = Dokumentasi::whereIn('jadwal_id', $jadwals->pluck('id'))
            ->orderBy('created_at', 'desc') 
            ->get();

        $data = [
            'counseling' => Jadwalkonseling::whereYear('TanggalKegiatan', Carbon::now()->year)
            ->orderByRaw("
                CASE
                    WHEN TanggalKegiatan >= ? THEN 1 -- Tanggal mendatang atau hari ini
                    ELSE 2 -- Tanggal yang sudah terlewat
                END ASC,
                CASE
                    WHEN TanggalKegiatan >= ? THEN TanggalKegiatan -- Urutkan tanggal mendatang dari yang terdekat
                    ELSE TanggalKegiatan
                END DESC", [
                Carbon::today(), Carbon::today()
            ])
            ->get(),
            'prokerposyandu' => Informasi::where('jenis', 'kegiatan')->orderBy('created_at', 'ASC')->get(),
            'edukasi' => Informasi::where('jenis', 'edukasi')->orderBy('created_at', 'ASC')->get(),
            'anggota' => Anggota::get()->groupBy('jabatan'),
            'kategori' => Kategori::get(),
            'dokumentasi' => $dokumentasi,
            'jadwals' => $jadwals 
        ];

        return view('users.index', $data);
    }

    function detail($id)
    {
        $data = [
            'prokerposyandu' => Prokerposyandu::orderBy('created_at', 'ASC')->where('Status', 'Edukasi')
                ->where('id', $id)
                ->first()
        ];

        return view('users.edukasi.detail', $data);
    }

    public function storePeserta(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required',
            'nik' => 'required',
            'email' => 'required|email',
            'id_informasi' => 'required',
        ]);

        PesertaKegiatan::create($validated);

        return redirect()->back()->with('success', 'Peserta telah didaftarkan')->with('id_informasi', $request->id_informasi);
    }
}