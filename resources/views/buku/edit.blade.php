@extends('header.navbar')
@section('content')
<div class="col-lg-12 grid-margin stretch-card" style="margin-top: 10%;">
    <div class="card">
        <div class="card-header">
             Edit Buku
        </div>
        <div class="card-body">
            <form class="form-horizontal" action="/update-buku" method="post">
                @csrf
                <input type="hidden" name="id" value="{{ $mhs->id }}">
                <div class="row">
                    <label for="kt" class=" control-label">Kode Buku <span style="color: red;">*</span></label>
                </div>
                <div class="row">
                    <input type="text" class="form-control" value="{{ $mhs->kode_buku }}" name="kode_buku" required>
                </div>
                <div class="row">
                    <label for="kt" class=" control-label">Judul <span style="color: red;">*</span></label>
                </div>
                <div class="row">
                    <input type="text" class="form-control" value="{{ $mhs->judul }}" name="judul" required>
                </div>
                <div class="row">
                    <label for="kt" class=" control-label">Pengarang <span style="color: red;">*</span></label>
                </div>
                <div class="row">
                    <input type="text" class="form-control" value="{{ $mhs->pengarang }}" name="pengarang" required>
                </div>
                <div class="row">
                    <label for="kt" class=" control-label">Tahun <span style="color: red;">*</span></label>
                </div>
                <div class="row">
                    <input type="text" class="form-control" value="{{ $mhs->tahun }}" name="tahun" required>
                </div>
                <div class="row">
                    <label for="kt" class=" control-label">ISBN <span style="color: red;">*</span></label>
                </div>
                <div class="row">
                    <input type="text" class="form-control" value="{{ $mhs->isbn }}" name="isbn" required>
                </div>
                <div class="row">
                    <label for="kt" class=" control-label">Jumlah Halaman <span style="color: red;">*</span></label>
                </div>
                <div class="row">
                    <input type="integer" class="form-control" value="{{ $mhs->jml_halaman }}" name="jml_halaman" required>
                </div>
                <div class="row mt-3 ">
                    <button type="submit" class="btn btn-primary w-25">
                        Edit
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection