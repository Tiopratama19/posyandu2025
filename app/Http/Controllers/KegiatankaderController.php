<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kegiatankader;
use App\Http\Controllers\Controller;

class KegiatankaderController extends Controller
{
    public function index()
    {
        $data = Kegiatankader::all();
        // dd($data);
        return view("admin.kegiatankader", compact("data"));
    }

    public function tambah()
    {
        return view("admin.insertkegiatankader");
    }

    public function insert(Request $request)
    {
        if ($request->ajax()) {
            $request->validate([
                'image' => 'required|mimes:jpg,jpeg,png,gif,svg,webp'
            ]);
            if ($image = $request->file('image')) {
                $imageName = time() . '-' . uniqid() . '.' . $image->getClientOriginalExtension();
                $image->move('kader', $imageName);
            }
            Kegiatankader::create([
                'Nama' => $request->Nama,
                'Tanggal' => $request->Tanggal,
                'Jabatan' => $request->Jabatan,
                'UraianKegiatan' => $request->UraianKegiatan,
                'image' => $imageName,
                'caption' => $request->caption
            ]);
            return response()->json([
                'status' => 'success'
            ]);
        }
        // dd($data);
        return redirect()->route('kegiatankader')->with('success', 'Kegiatan telah ditambahkan');
    }

    public function tampildata($id)
    {
        $data = Kegiatankader::find($id);
        // dd($data);
        return view('admin.tampilkegiatan', compact('data'));
    }

    public function updatedata(Request $request, $id)
    {
        if (empty($request->file('image'))) {
            $data = Kegiatankader::find($id);
            $data->update([
                'Nama' => $request->Nama,
                'Tanggal' => $request->Tanggal,
                'Jabatan' => $request->Jabatan,
                'UraianKegiatan' => $request->UraianKegiatan,
                'image' => $imageName,
                'caption' => $request->caption
            ]);
            return response()->json([
                'status' => 'success'
            ]);
        } else {
            if ($image = $request->file('image')) {
                $imageName = time() . '-' . uniqid() . '.' . $image->getClientOriginalExtension();
                $image->move('edukasikegiatan', $imageName);
            }

            $data = Kegiatankader::find($id);
            $data->update([
                'Nama' => $request->Nama,
                'Tanggal' => $request->Tanggal,
                'Jabatan' => $request->Jabatan,
                'UraianKegiatan' => $request->UraianKegiatan,
                'image' => $imageName,
                'caption' => $request->caption
            ]);
            return response()->json([
                'status' => 'success'
            ]);
        }
    }

    public function deletedata($id)
    {
        $data = Kegiatankader::find($id);
        $data->delete();

        return redirect()->route('kegiatankader')->with('success', 'Kegiatan telah dihapus');
    }
}
