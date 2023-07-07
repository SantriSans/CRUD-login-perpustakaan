<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\mahasiswaModel;
use App\Models\fakultasModel;
use Illuminate\Support\Facades\DB;
use PDF;

class mahasiswaController extends Controller
{
    public function cari(Request $request)
	{
		$cari = $request->cari;
        
		$mhs = mahasiswaModel::where('nama','like',"%".$cari."%")->paginate(10);
		return view('mhs.index',['mahasiswa' => $mhs]);
 
	}
    
    public function index()
    {
        $mhs = mahasiswaModel::paginate(10);
        // dd($mhs);
        return view('mhs.index', [
            'mahasiswa' => $mhs
        ]);
    }

    public function indexTambah()
    {
        $fakultas = fakultasModel::all();
        return view('mhs.tambah',[
            'fakultas' => $fakultas,
        ]);
    }

    public function getProdi()
    {
        $data = fakultasModel::find(request()->id);
        // dd($data);
        $prodi = $data->program_studi_model;
        return response()->json($prodi);
    }

    public function store(Request $request)
    {
        mahasiswaModel::create([
            'nama' => $request->nama,
            'nim' => $request->nim,
            'alamat' => $request->alamat,
            'jenis_kelamin'=> $request->jenis_kelamin,
            'fakultas_id'=> $request->fakultas_id,
            'program_studi_id'=> $request->program_studi_id
        ]);

        return redirect('/');
    }

    public function edit($id)
    {
        $mhsedit = mahasiswaModel::where('id', $id)->first();
        return view('mhs.edit', [
            'mhs' => $mhsedit
        ]);
    }

    public function update(Request $request)
    {
        mahasiswaModel::where('id', $request->id)->update([
            'nama' => $request->nama,
            'nim' => $request->nim,
            'alamat' => $request->alamat
        ]);

        return redirect('/');
    }

    public function delete($id)
    {
        $data = mahasiswaModel::where('id', $id)->first();
        $data->delete();
        return redirect('/');
    }

    public function chart()
    {
        $mahasiswaData = mahasiswaModel::select(DB::raw("COUNT(*) as count"))
        ->whereYear('created_at', date('Y'))
        ->groupBy(DB::raw("Month(created_at)"))
        ->pluck('count');


        return view('chart', compact('mahasiswaData'));
    }

    public function cetak_pdf()
    {
    	$mahasiswa = mahasiswaModel::all();
 
    	$pdf = PDF::loadview('mahasiswa_pdf',['mahasiswa'=>$mahasiswa]);
    	return $pdf->stream('laporan-mahasiswa-pdf');
    }
}
