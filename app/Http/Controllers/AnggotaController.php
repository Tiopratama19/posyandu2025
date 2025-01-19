<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use Illuminate\Http\Request;

class AnggotaController extends Controller
{
    public function index()
    {
        $data = Anggota::get();
        return view("admin.anggota.index", compact("data"));
    }

    public function create()
    {
        $form = [
            'title' => 'Tambah Anggota',
            'action' => route('anggota.store'),
            'method' => 'POST'
        ];

        return view("admin.anggota.form", compact("form"));
    }

    public function edit($id)
    {
        $form = [
            'title' => 'Edit Anggota',
            'action' => route('anggota.update', $id),
            'method' => 'PUT'
        ];

        $item = Anggota::find($id);

        return view("admin.anggota.form", compact('form', 'item'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required',
            'jabatan' => 'required',
            'tgl_bergabung' => 'required',
            'caption' => 'required',
            'photo' => 'required',
        ]);

        if ($request->file('photo')) {
            $validated['photo'] = $request->file('photo')->storeAs('photo', $request->file('photo')->hashName());
        }

        Anggota::create($validated);

        return redirect()->route('anggota.index')->with('success', 'Anggota berhasil ditambahkan!');
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'nama' => 'required',
            'jabatan' => 'required',
            'tgl_bergabung' => 'required',
            'caption' => 'required',
        ]);

        if ($request->file('photo')) {
            $validated['photo'] = $request->file('photo')->storeAs('photo', $request->file('photo')->hashName());
        }

        Anggota::find($id)
            ->update($validated);

        return redirect()->route('anggota.index')->with('success', 'Anggota berhasil diupdate!');
    }

    public function destroy($id)
    {
        Anggota::find($id)->delete();

        return redirect()->route('anggota.index')->with('success', 'Anggota berhasil dihapus!');
    }
}