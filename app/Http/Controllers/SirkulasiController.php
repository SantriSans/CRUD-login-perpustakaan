<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\mahasiswaModel;
use App\Models\fakultasModel;
use App\Models\Buku;
use App\Models\Sirkulasi;
use Illuminate\Support\Facades\DB;
use PDF;

class SirkulasiController extends Controller
{
    public function cari(Request $request)
	{
		$cari = $request->cari;
        
		$mhs = Sirkulasi::where('kondisi','like',"%".$cari."%")->paginate(10);
		return view('sirkulasi.index',['sirkulasi' => $mhs]);
 
	}
    
    public function index()
    {
        $mhs = Sirkulasi::paginate(10);
        // dd($mhs);
        return view('sirkulasi.index', [
            'sirkulasi' => $mhs
        ]);
    }

    public function indexTambah()
    {
        $mahasiswa = mahasiswaModel::all();
        $buku = buku::all();
        return view('sirkulasi.tambah',[
            'buku' => $buku,
            'mahasiswa' => $mahasiswa,
        ]);
    }

    public function store(Request $request)
    {
        Sirkulasi::create([
            'tgl_pinjam' => $request->tgl_pinjam,
            'tgl_kembali'=> $request->tgl_kembali,
            'denda'=> $request->denda,
            'kondisi'=> $request->kondisi,
            "mahasiswa_id"=> $request->nim,
            "kode_buku"=> $request->kode_buku,
        ]);

        return redirect('/sirkulasi');
    }

    public function edit($id)
    {
        $mhsedit = Sirkulasi::where('id', $id)->first();
        $mahasiswa = mahasiswaModel::all();
        $buku = Buku::all();
        return view('sirkulasi.edit', [
            'mhs' => $mhsedit,
            'mahasiswa' => $mahasiswa,
            'buku' => $buku,
        ]);
    }

    public function update(Request $request)
    {
        Sirkulasi::where('id', $request->id)->update([
            'tgl_pinjam' => $request->tgl_pinjam,
            'tgl_kembali'=> $request->tgl_kembali,
            'denda'=> $request->denda,
            'kondisi'=> $request->kondisi,
            "mahasiswa_id"=> $request->nim,
            "kode_buku"=> $request->kode_buku,
        ]);

        return redirect('/sirkulasi');
    }

    public function delete($id)
    {
        $data = Sirkulasi::where('id', $id)->first();
        $data->delete();
        return redirect('/sirkulasi');
    }

    public function chart()
    {
        $mahasiswaData = Sirkulasi::select(DB::raw("COUNT(*) as count"))
        ->whereYear('created_at', date('Y'))
        ->groupBy(DB::raw("Month(created_at)"))
        ->pluck('count');


        return view('chart', compact('mahasiswaData'));
    }

    public function pilih_sirkulasi()
    {
        $sirkulasi = Sirkulasi::all();
        $mahasiswa = mahasiswaModel::all();
        return view('pdf.tambah',[
            'mahasiswa' => $mahasiswa,
        ]);
    }

    public function cetak_pdf()
    {
    	// $sirkulasi = Sirkulasi::where('id', $request->id)->get();
        // $sirkulasi = Sirkulasi::all();
        // $mahasiswa = mahasiswaModel::all();
    	// $pdf = PDF::loadview('sirkulasi_pdf',['sirkulasi'=>$sirkulasi]);
    	// return $pdf->stream('laporan-sirkulasi-pdf');
        
        $sirkulasi = Sirkulasi::with([
            'mahasiswa',
            'Buku'
        ])->where([
            'mahasiswa_id' => request()->mahasiswa,
        ])->get();
        // dd(request());
 
        $pdf = PDF::loadview('sirkulasi_pdf',['sirkulasi'=>$sirkulasi]);
        return $pdf->stream('laporan-sirkulasi-pdf');
    }
}