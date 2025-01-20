<?php

namespace App\Http\Controllers;


use App\Models\Dataremaja;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\Jadwalkonseling;
use App\Models\PesertaKonseling;
use App\Http\Controllers\Controller;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\DB;
class JadwalKonselingController extends Controller
{
    public function index()
    {
        $data = Jadwalkonseling::orderBy('TanggalKegiatan', 'DESC')->get();
        // dd($data);
        return view("admin.jadwalkonseling", compact("data"));
    }

    public function tambah()
    {
        return view("admin.insertjadwalkonseling");
    }

    public function insert(Request $request)
    {
        // Validasi data inputan
        $request->validate([
            'TanggalKegiatan' => 'required|date',
            // tambahkan validasi lainnya jika diperlukan
        ]);

        // Ambil bulan dan tahun dari tanggal yang dimasukkan
        $tanggal = Carbon::parse($request->TanggalKegiatan);
        $bulan = $tanggal->month;
        $tahun = $tanggal->year;

        // Hitung jumlah jadwal konseling yang sudah ada untuk bulan ini
        $countJadwal = Jadwalkonseling::whereYear('TanggalKegiatan', $tahun)
            ->whereMonth('TanggalKegiatan', $bulan)
            ->count();

        // Cek jika sudah ada 2 jadwal pada bulan tersebut, kecuali jika override diaktifkan
        if ($countJadwal >= 1 && !$request->has('allow_extra')) {
            return redirect()->back()->with(
                'error',
                'Jadwal konseling maksimal hanya bisa dilakukan satu kali dalam satu bulan. Centang "Tambah jadwal ekstra" jika ingin menambah jadwal tambahan.'
            )->withInput();
        }

        // Simpan data jika validasi terpenuhi
        $data = Jadwalkonseling::create($request->all());

        return redirect()->route('jadwalkonseling')->with('success', 'Jadwal telah ditambahkan');
    }

    public function tampildata($id)
    {
        $data = Jadwalkonseling::find($id);
        // dd($data);
        return view('admin.tampiljadwal', compact('data'));
    }

    public function updatedata(Request $request, $id)
    {
        // Validasi data inputan
        $request->validate([
            'TanggalKegiatan' => 'required|date',
            // tambahkan validasi lainnya jika diperlukan
        ]);

        // Ambil bulan dan tahun dari tanggal yang dimasukkan
        $tanggal = Carbon::parse($request->TanggalKegiatan);
        $bulan = $tanggal->month;
        $tahun = $tanggal->year;

        // Cari jadwal yang ingin diupdate
        $jadwal = Jadwalkonseling::findOrFail($id);

        // Hitung jumlah jadwal konseling yang sudah ada di bulan ini, kecuali jadwal yang sedang diupdate
        $countJadwal = Jadwalkonseling::whereYear('TanggalKegiatan', $tahun)
            ->whereMonth('TanggalKegiatan', $bulan)
            ->where('id', '!=', $id)
            ->count();

        // Cek jika sudah ada 2 jadwal pada bulan tersebut, kecuali jika override diaktifkan
        if ($countJadwal >= 1 && !$request->has('allow_extra')) {
            return redirect()->back()->with(
                'error',
                'Jadwal konseling maksimal hanya bisa dilakukan satu kali dalam satu bulan. Centang "Tambah jadwal ekstra" jika ingin menambah jadwal tambahan.'
            )->withInput();
        }

        // Update data jika validasi terpenuhi
        $jadwal->update($request->all());

        return redirect()->route('jadwalkonseling')->with('success', 'Jadwal telah diperbarui');
    }

    public function generatePdf($id)
    {
        $jadwal = DB::table('jadwalkonselings as a')
        ->join('pesertakonselings as b', DB::raw('BINARY b.id_konselings'), '=', 'a.id')
        ->join('dataremajas as c', 'c.nik', '=', 'b.nik')
        ->select('a.id as id_konselings','a.*', 'b.*', 'c.TanggalLahir', 'c.TempatLahir', 'c.JenisKelamin')
        ->where('a.id', $id)
        ->first();

        $jumlahPeserta = DB::table('pesertakonselings')
        ->where('id_konselings', $jadwal->id_konselings)  
        ->count();

        $pesertaKonselings = DB::table('pesertakonselings as b')
        ->join('dataremajas as c', 'c.nik', '=', 'b.nik')
        ->where('b.id_konselings', $jadwal->id_konselings)
        ->select('b.*', 'c.TanggalLahir', 'c.TempatLahir', 'c.JenisKelamin', 'b.email')
        ->get();

        $data = [
            'jadwal' => $jadwal,
            'pesertaKonselings' => $pesertaKonselings,
            'jumlah_peserta' => $jumlahPeserta,
            'tanggal' => Carbon::parse($jadwal->TanggalKegiatan)->isoFormat('D MMMM Y'),
            'created_at' => now()->isoFormat('D MMMM Y')
        ];

        $pdf = Pdf::loadView('admin.jadwalkonselingprint', $data);

        return $pdf->download("jadwal_konseling_{$jadwal->id}.pdf");
    }

    public function deletedata($id)
    {

        $cek = PesertaKonseling::where('id_konselings', $id)->count();
        if ($cek > 0) {
            $data_peserta = PesertaKonseling::where('id_konselings', $id)->first();
            $data_peserta->delete();
        }

        $data = Jadwalkonseling::find($id);
        $data->delete();

        return redirect()->route('jadwalkonseling')->with('success', 'Jadwal telah dihapus');
    }

    public function tambahpeserta(Request $request, $id)
    {
        $peserta = PesertaKonseling::where('id_konselings', $id)
            ->where('nik', $request->nik)
            ->count();
        if ($peserta == 0) {
            $pesertakonselingnew = new PesertaKonseling;
            $pesertakonselingnew->nik = $request->nik;
            $pesertakonselingnew->nama = $request->nama;
            $pesertakonselingnew->email = $request->email;
            $pesertakonselingnew->id_konselings = $id;
            $pesertakonselingnew->save();
            return response()->json(['status' => 1], 201);
        } else {
            return response()->json(['status' => 2], 201);
        }
    }

    function getPeserta(Request $request, $id)
    {
        if (request()->ajax()) {
            $data = PesertaKonseling::where('id_konselings', $id)->get();

            return DataTables()->of($data)
                ->addColumn('nik', function ($data) {
                    return $this->sensor($data->nik);
                })
                ->addColumn('email', function ($data) {
                    return $this->sensor($data->email);
                })

                ->rawColumns(['nik', 'email'])
                ->addIndexColumn()
                ->make(true);
        }
    }

    public function getCounselingData()
    {
        $counseling = Jadwalkonseling::whereYear('TanggalKegiatan', Carbon::now()->year)
        ->where('TanggalKegiatan', '>=', Carbon::now()->subMonths(2))
        ->orderBy('TanggalKegiatan', 'DESC')
        ->get();
        
        return view('users.partials.counseling_list', compact('counseling'));
    }


    public function sensor($data = '')
    {
        if ($data == '') {
            return "-";
        } else {
            $sensor = substr($data, 0, 3);
            $censored = 'X';
            for ($i = 0; $i < strlen($data) - 4; $i++) {
                $censored .= "X";
            }
            return $sensor . $censored;
        }
    }
}