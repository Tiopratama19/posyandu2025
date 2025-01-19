<?php

namespace App\Http\Controllers;

use App\Models\Dataremaja;
use App\Models\Riwayat;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RiwayatController extends Controller
{
    public function index()
    {
        $data = Riwayat::all();

        return view("admin.riwayat", compact("data"));
    }

    public function riwayatdetail(Dataremaja $dataremaja)
    {
        $data = $dataremaja->riwayat()->get();

        return view("admin.riwayat", compact("data", "dataremaja"));
    }

    public function riwayatCreate(Dataremaja $dataremaja)
    {
        return view("admin.riwayat-create", compact("dataremaja"));
    }

    public function riwayatStore(Request $request,Dataremaja $dataremaja)
    {
        $request->validate([
            'tanggal' => 'required|date',
            'bb' => 'required',
            'tb' => 'required',
            'ttd' => 'required|max:255',
            'lila' => 'required|max:255',
            'lp' => 'required|max:255',
            'anemia' => 'required|max:255',
        ]);

        $dataremaja->riwayat()->create([
            'Tanggal' => $request->tanggal,
            'BB' => $request->bb,
            'TB' => $request->tb,
            'TTD' => $request->ttd,
            'LILA' => $request->lila,
            'LP' => $request->lp,
            'Anemia' => $request->anemia
        ]);

        return to_route("riwayatdetail", $dataremaja->id)->with('success', 'Data Remaja telah ditambahkan');
    }

    public function tambah()
    {
        return view("admin.insertriwayat");
    }

    public function insert(Request $request)
    {
        $data = Riwayat::create($request->all());
        // dd($data);
        return redirect()->route('riwayatdetail',$data->id_dataremaja)->with('success', 'Data Remaja telah ditambahkan');
    }

    public function tampildata($id)
    {
        $data = Riwayat::find($id);
        // dd($data);
        return view('admin.tampilriwayat', compact('data'));
    }

    public function updatedata(Request $request, $id)
    {
        $data = Riwayat::find($id);
        $data->update($request->all());

        return redirect()->route('riwayatdetail',$data->id_dataremaja)->with('success', 'Data Remaja telah diubah');
    }

    public function deletedata($id)
    {
        $data = Riwayat::find($id);
        $data->delete();

        return redirect()->route('riwayatdetail',$data->id_dataremaja)->with('success', 'Data Remaja telah dihapus');
    }
}
