<?php

namespace App\Http\Controllers;

use App\Models\Dataremaja;
use Illuminate\Http\Request;
use PhpOffice\PhpSpreadsheet\IOFactory;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Mail\WelcomeMail;

class ImportController extends Controller
{
    public function import(Request $request)
    {
        try {
            $request->validate([
                'file' => 'required|mimes:xlsx,csv,ods|max:2048',
            ]);

            $file = $request->file('file');
            $path = $file->getRealPath();

            $spreadsheet = IOFactory::load($path);
            $sheet = $spreadsheet->getActiveSheet();
            $rows = $sheet->toArray(null, true, true, true);

            foreach ($rows as $key => $row) {
                if ($key == 1) continue; // Skip header baris pertama

                $validator = Validator::make($row, [
                    'A' => ['required', new NikValidation()],
                    'F' => 'required|email',
                ]);
        
                if ($validator->fails()) {
                    Log::warning('Validation failed for row ' . $key . ': ' . json_encode($validator->errors()));
                    continue;
                }

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

                if (!User::where('nik', $row['A'])->exists()) {
                    $randomPassword = Str::random(8);
                    $user = User::create([
                        'name' => $row['B'],
                        'nik' => $row['A'],
                        'email' => $row['F'],
                        'password' => Hash::make($randomPassword),
                        'type' => 0,
                    ]);
        
                    Mail::to($row['F'])->send(new WelcomeMail($randomPassword));
                }
            }

             return response()->json([
                'status' => 'success',
                'message' => 'Data berhasil diimpor'
            ], 200);
        } catch (\Exception $e) {
            Log::error('Import failed: ' . $e->getMessage());
            return response()->json([
                'status' => 'error',
                'message' => 'Terjadi kesalahan saat mengunggah file: ' . $e->getMessage()
            ], 500);
        }
    }
}