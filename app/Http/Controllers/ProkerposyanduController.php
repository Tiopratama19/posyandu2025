<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Prokerposyandu;
use App\Http\Controllers\Controller;

class ProkerposyanduController extends Controller
{
    public function index()
    {
        $data = Prokerposyandu::all();
        // dd($data);
        return view("admin.prokerposyandu", compact("data"));
    }

    public function tambah()
    {
        return view("admin.insertprokerposyandu");
    }

    public function insert(Request $request)
    {
        if($request->ajax()){
            $request->validate([
                'image'=>'required|mimes:jpg,jpeg,png,gif,svg'
             ]);
             if($image = $request->file('image')){
                $imageName = time().'-'.uniqid().'.'.$image->getClientOriginalExtension();
                $image->move('edukasikegiatan', $imageName);
             }
             Prokerposyandu::create([
                'Nama' => $request->Nama,
                'Tanggal' => $request->Tanggal,
                'Kegiatan' => $request->Kegiatan,
                'Caption' => $request->Caption,
                'image'=>$imageName,
                'Status' => $request->Status,
                'StatusLanding' => $request->jenis_edukasi,
                'StatusKegiatan' => $request->jenis_edukasi_kegiatan
             ]);

             return response()->json([
                'status'=>'success'
             ]);
        }

        $request->validate([
            'Tipe' => 'required',
            'edukasi' => 'nullable|required_if:Tipe,Edukasi',
            'kegiatan' => 'nullable|required_if:Tipe,Proker',
            'tanggal' => 'nullable|required_if:Tipe,Proker|date',
            'jenis_edukasi' => 'nullable|required_if:Tipe,Edukasi',
            'jenis_edukasi_kegiatan' => 'nullable|required_if:Tipe,Kegiatan',
            'Caption' => 'required',
            'image' => 'required|image',
        ]);

        $imageName = null;

        if ($image = $request->file('image')){
            $imageName = time().'-'.uniqid().'.'.$image->getClientOriginalExtension();
            $image->move('edukasikegiatan', $imageName);
        }

        Prokerposyandu::create([
            'Tanggal' => $request->tanggal,
            'Nama' => $request->edukasi,
            'image' => $imageName,
            'Kegiatan' => $request->kegiatan,
            'Caption' => $request->Caption,
            'Status' => $request->Tipe,
            'StatusLanding' => $request->jenis_edukasi,
            'StatusKegiatan' => $request->jenis_edukasi_kegiatan
        ]);

        return to_route('prokerposyandu')->with('success', 'Proker telah ditambahkan');
    }

    public function tampildata($id)
    {
        $data = Prokerposyandu::find($id);
        // dd($data);
        return view('admin.tampilproker', compact('data'));
    }

    public function updatedata(Request $request, $id)
    {

        if (empty($request->file('image'))) {
            $data = Prokerposyandu::find($id);
            $data->update([
                'Nama' => $request->Nama,
                'Tanggal' => $request->Tanggal,
                'Kegiatan' => $request->Kegiatan,
                'Caption' => $request->Caption,
                'Status' => $request->Status,
                'StatusLanding' => $request->jenis_edukasi,
                'StatusKegiatan' => $request->jenis_edukasi_kegiatan,
            ]);
            return response()->json([
                'status'=>'success'
            ]);
        } else {
            if($image = $request->file('image')){
                $imageName = time().'-'.uniqid().'.'.$image->getClientOriginalExtension();
                $image->move('edukasikegiatan', $imageName);
             }

            $data = Prokerposyandu::find($id);
            $data->update([
                'Nama' => $request->Nama,
                'Tanggal' => $request->Tanggal,
                'Kegiatan' => $request->Kegiatan,
                'Caption' => $request->Caption,
                'image'=>$imageName,
                'Status' => $request->Status,
                'StatusLanding' => $request->jenis_edukasi,
                'StatusKegiatan' => $request->jenis_edukasi_kegiatan
            ]);
            return response()->json([
                'status'=>'success'
            ]);
        }
    }

    public function deletedata($id)
    {
        $data = Prokerposyandu::find($id);
        $data->delete();

        return redirect()->route('prokerposyandu')->with('success', 'Proker telah dihapus');
    }
}
