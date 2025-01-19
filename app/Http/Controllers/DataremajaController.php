<?php

namespace App\Http\Controllers;

use App\Models\Dataremaja;
use Illuminate\Http\Request;
use App\Rules\NikValidation;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
class DataremajaController extends Controller
{
    public function index()
    {
        $data = Dataremaja::all();
        // dd($data);
        return view("admin.dataremaja", compact("data"));
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate(Dataremaja::rules());

        $dataremaja = Dataremaja::create($validatedData);
    }

    public function tambah()
    {
        return view("admin.insertdataremaja");
    }

    public function insert(Request $request)
    {
        $request->validate([
            'NIK' => ['required', new NikValidation()],
            // other validation rules
        ]);

        $cek = Dataremaja::where('NIK', $request->NIK)->count();
        if($cek > 0)
        {
            return redirect()->route('dataremaja')->with('success' , 'Nik sudah telah terdaftar');
        }
        $data = Dataremaja::create($request->all());
        // dd($data);
        return redirect()->route('dataremaja')->with('success' , 'Data Remaja telah ditambahkan');
    }

    public function tampildata($id)
    {
        $data = Dataremaja::find($id);
        // dd($data);
        return view('admin.tampildata', compact('data'));
    }

    public function updatedata(Request $request,$id)
    {
        $data = Dataremaja::find($id);
        $data->update($request->all());

        return redirect()->route('dataremaja')->with('success' , 'Data Remaja telah diubah');
    }

    public function deletedata($id)
    {
        $data = Dataremaja::find($id);
        $data->delete();

        return redirect()->route('dataremaja')->with('success' , 'Data Remaja telah dihapus');
    }

    function filterGetDataRemaja(Request $request)
    {
        if(request()->ajax())
        {
         if(!empty($request->from_date))
         {
            $dateTime = Carbon::createFromFormat('F', $request->from_date);
            $monthNumber = $dateTime->format('n');

            $dateTime2 = Carbon::createFromFormat('F', $request->to_date);
            $monthNumber2 = $dateTime->format('n');
            $data = DB::table('dataremajas')
                ->whereMonth('created_at', '>=', $monthNumber)
                ->whereMonth('created_at', '<=', $monthNumber2)
                ->get();
         }
         else
         {
            $data = DB::table('dataremajas')->get();
         }
         return DataTables()->of($data)
         ->addIndexColumn()
         ->addColumn('action', function($data){
            return '<a href="/admin/tampildata/"'.$data->id.'" class="btn btn-info">Edit</a>&nbsp;
            <a href="/admin/riwayat/{{ $row->id }}" class="btn btn-primary">Riwayat</a>&nbsp;
            <a href="#" class="btn btn-danger delete" data-id="'.$data->id.'"
                data-nama="'.$data->Nama.'" >Hapus</a>';

              })
             ->addColumn('TanggalLahir', function($data){
                return Carbon::parse($data->TanggalLahir)->isoFormat('D MMMM YYYY');
             })

             ->rawColumns(['action', 'TanggalLahir'])
             ->make(true);
        }
        return view('admin.dataremaja');
    }

}
