<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dokumentasi;
use Illuminate\Support\Facades\Storage;

class DokumentasiController extends Controller
{
    public function index($id)
    {
        $dokumentasi = Dokumentasi::where('jadwal_id', $id)->get();
        return view('admin.dokumentasi.index', compact('dokumentasi', 'id'));
    }

    public function store(Request $request, $id)
    {

        $request->validate([
            'images' => 'required|array',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'captions' => 'required|array',
        ]);
    
        $filePaths = [];
        foreach ($request->file('images') as $index => $image) {
            $path = $image->store('dokumentasi', 'public');
            $filePaths[] = $path;
    
            // Simpan data ke database
            Dokumentasi::create([
                'file_path' => $path,
                'description' => $request->captions[$index],
                'jadwal_id' => $id
            ]);
        }
    
        return response()->json([
            'message' => 'Dokumentasi berhasil diunggah',
            'data' => Dokumentasi::all(),
        ]);
    }

    public function destroy($id)
    {
        $dokumentasi = Dokumentasi::findOrFail($id);
        \Storage::disk('public')->delete($dokumentasi->file_path);
        $dokumentasi->delete();

        return response()->json([
            'message' => 'Gambar berhasil dihapus',
            'data' => Dokumentasi::where('jadwal_id', $dokumentasi->jadwal_id)->get(),
        ]);
    }

    public function destroyAll($id)
    {
        $dokumentasi = Dokumentasi::where('jadwal_id', $id)->get();
        foreach ($dokumentasi as $item) {
            Storage::disk('public')->delete($item->file_path);
            $item->delete();
        }

        return response()->json([
            'message' => 'Gambar berhasil dihapus',
            'data' => Dokumentasi::where('jadwal_id', $dokumentasi->jadwal_id)->get(),
        ]);
    }

    public function deleteSelected(Request $request)
    {
        try {
            $validated = $request->validate([
                'ids' => 'required|array',
                'ids.*' => 'integer', 
            ]);

        
            $ids = $validated['ids'];

            dd($ids);
            \Log::info('IDs received:', ['ids' => $ids]);

            if (!empty($ids)) {
                $jadwalId = Dokumentasi::whereIn('id', $ids)->value('jadwal_id');
                Dokumentasi::whereIn('id', $ids)->delete();

                $data = $jadwalId ? Dokumentasi::where('jadwal_id', $jadwalId)->get() : [];

                return response()->json([
                    'message' => 'Gambar berhasil dihapus',
                    'data' => $data,
                ]);
            }

            return response()->json(['message' => 'Data tidak valid.'], 400);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'message' => 'Validasi gagal.',
                'errors' => $e->errors(),
            ], 422);
        } catch (\Exception $e) {
            \Log::error('Error in deleteSelected:', ['error' => $e->getMessage()]);
            return response()->json([
                'message' => 'Terjadi kesalahan.',
            ], 500);
        }
    }


}
