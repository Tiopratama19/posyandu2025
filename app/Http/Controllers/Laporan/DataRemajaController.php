<?php

namespace App\Http\Controllers\Laporan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDF;
use Illuminate\Support\Facades\Response;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;
class DataRemajaController extends Controller
{
    function downloadDataremaja($tglawal, $tglakhir)
    {
        app()->setLocale('id');

        try {
            // Parse the date formats
            $date1 = Carbon::createFromFormat('Y-m-d', $tglawal);
            $date2 = Carbon::createFromFormat('Y-m-d', $tglakhir);
        } catch (\Exception $e) {
            Log::error('Invalid date format: ' . $e->getMessage());
            return response()->json(['error' => 'Format tanggal tidak valid'], 400);
        }

        try {
            // Query to fetch data between given dates
            $remaja = DB::table('dataremajas')
                ->join('riwayats', 'dataremajas.id', '=', 'riwayats.id_dataremaja')
                ->select(
                    'dataremajas.*',
                    'dataremajas.id as id_remajas',
                    'riwayats.*'
                )
                ->whereBetween('riwayats.tanggal', [$tglawal, $tglakhir])
                ->get();
        } catch (\Exception $e) {
            Log::error('Database query failed: ' . $e->getMessage());
            return response()->json(['error' => 'Database query failed'], 500);
        }

        if ($remaja->isEmpty()) {
            return response()->json(['error' => 'Tidak ada data riwayat yang ditemukan untuk rentang tanggal yang diberikan'], 404);
        }

        $pdfPaths = [];
        foreach ($remaja as $value) {
            $getdataremaja = $value;

            try {
                $customPaper = [0, 0, 750, 2000];
                $pdf = PDF::loadView('laporan.dataremaja', ['remaja' => $getdataremaja])->setPaper($customPaper, 'portrait');

                $path = public_path('laporan/dataremaja');
                $filename = $getdataremaja->Nama . '_' . time() . '.pdf';
                $pdf->save($path . '/' . $filename);

                $pdfPaths[] = [
                    'url' => route('downloadPdf', ['filename' => $filename]),
                    'filename' => $filename
                ];
            } catch (\Exception $e) {
                Log::error('PDF generation failed: ' . $e->getMessage());
                return response()->json(['error' => 'PDF generation failed'], 500);
            }
        }

        if (!empty($pdfPaths)) {
            return response()->json(['pdfUrls' => $pdfPaths]);
        } else {
            return response()->json(['error' => 'No PDFs generated'], 500);
        }
    }

    // function generate($filename)
    // {
    //     $file = public_path('laporan/dataremaja/' . $filename);

    //     if (!file_exists($file)) {
    //         return response()->json(['error' => 'File not found'], 404);
    //     }

    //     return response()->download($file);
    // }
}
