<?php

namespace App\Http\Controllers;

use App\Models\Dataremaja;
use Illuminate\Http\Request;
use PhpOffice\PhpSpreadsheet\IOFactory;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;

class ImportController extends Controller
{
    public function import(Request $request)
    {
        try {
            // Validasi file
            $request->validate([
                'file' => 'required|mimes:xlsx,csv,ods|max:2048',
            ]);

            $file = $request->file('file');
            $path = $file->getRealPath();

            // Memuat file Excel menggunakan PhpSpreadsheet
            $spreadsheet = IOFactory::load($path);
            $sheet = $spreadsheet->getActiveSheet();
            $rows = $sheet->toArray(null, true, true, true);

            // Loop untuk menyimpan data
            foreach ($rows as $key => $row) {
                if ($key == 1) continue; // Skip header baris pertama

                // Check if NIK already exists
                if (Dataremaja::where('NIK', $row['A'])->exists()) {
                    Log::warning('Duplicate NIK found: ' . $row['A']);
                    continue;
                }

                Dataremaja::create([
                    'NIK' => $row['A'],
                    'Nama' => $row['B'],
                    'TempatLahir' => $row['C'],
                    'TanggalLahir' => Carbon::parse($row['D']),
                    'JenisKelamin' => $row['E'],
                ]);
            }

             return response()->json([
                'status' => 'success',
                'message' => 'Data berhasil diimpor'
            ], 200);

            dd('haii');
        } catch (\Exception $e) {
            Log::error('Import failed: ' . $e->getMessage());
            return response()->json([
                'status' => 'error',
                'message' => 'Terjadi kesalahan saat mengunggah file: ' . $e->getMessage()
            ], 500);
        }
    }
}