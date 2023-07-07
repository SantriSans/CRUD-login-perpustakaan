<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\mahasiswaModel;
use App\Models\fakultasModel;
use App\Models\Buku;
use App\Models\Sirkulasi;
use Illuminate\Support\Facades\DB;

class BukuController extends Controller
{
    public function cari(Request $request)
	{
		$cari = $request->cari;
        
		$mhs = Buku::where('judul','like',"%".$cari."%")->paginate(10);
		return view('buku.index',['mahasiswa' => $mhs]);
 
	}
    
    public function index()
    {
        $mhs = Buku::paginate(10);
        // dd($mhs);
        return view('buku.index', [
            'mahasiswa' => $mhs
        ]);
    }

    public function indexTambah()
    {
        $fakultas = Sirkulasi::all();
        return view('buku.tambah',[
            'fakultas' => $fakultas,
        ]);
    }

    public function store(Request $request)
    {
        Buku::create([
            'kode_buku' => $request->kode_buku,
            'judul' => $request->judul,
            'pengarang' => $request->pengarang,
            'tahun'=> $request->tahun,
            'isbn'=> $request->isbn,
            'jml_halaman'=> $request->jml_halaman
        ]);

        return redirect('/buku');
    }

    public function edit($id)
    {
        $mhsedit = Buku::where('id', $id)->first();
        return view('buku.edit', [
            'mhs' => $mhsedit
        ]);
    }

    public function update(Request $request)
    {
        Buku::where('id', $request->id)->update([
            'kode_buku' => $request->kode_buku,
            'judul' => $request->judul,
            'pengarang' => $request->pengarang,
            'tahun'=> $request->tahun,
            'isbn'=> $request->isbn,
            'jml_halaman'=> $request->jml_halaman
        ]);

        return redirect('/buku');
    }

    public function delete($id)
    {
        $data = Buku::where('id', $id)->first();
        $data->delete();
        return redirect('/buku');
    }

    public function chart()
    {
        $mahasiswaData = Buku::select(DB::raw("COUNT(*) as count"))
        ->whereYear('created_at', date('Y'))
        ->groupBy(DB::raw("Month(created_at)"))
        ->pluck('count');


        return view('chart', compact('mahasiswaData'));
    }

}
