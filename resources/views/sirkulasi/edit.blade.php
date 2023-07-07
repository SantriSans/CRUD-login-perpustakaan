@extends('header.navbar')
@section('content')
<div class="col-lg-12 grid-margin stretch-card" style="margin-top: 10%;">
    <div class="card">
        <div class="card-header">
             Edit Sirkulasi
        </div>
        <div class="card-body">
            <form class="form-horizontal" action="/update-sirkulasi" method="post">
                @csrf
                <input type="hidden" name="id" value="{{ $mhs->id }}">
                <div class="row">
                    <label for="kt" class=" control-label">Tanggal Pinjam <span style="color: red;">*</span></label>
                </div>
                <div class="row">
                    <input type="date" class="form-control" value="{{ $mhs->tgl_pinjam }}" name="tgl_pinjam" required>
                </div>
                <div class="row">
                    <label for="kt" class=" control-label">NBI <span style="color: red;">*</span></label>
                </div>
                <div class="row">
                    <select class="single-select form-control" id="mahasiswa" name="nim" value="{{ $mhs->mahasiswa }}" style="width:100%;height: 100%;">
                        <option selected>Pilih</option>
                        @foreach($mahasiswa as $data)
                        <option value="{{$data->id}}">{{$data->nim}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="row">
                    <label for="kt" class=" control-label">Kode Buku <span style="color: red;">*</span></label>
                </div>
                <div class="row">
                    <select class="single-select form-control" id="buku" name="kode_buku" value="{{ $mhs->buku }}" style="width:100%;height: 100%;">
                        <option selected>Pilih</option>
                        @foreach($buku as $data)
                        <option value="{{$data->id}}">{{$data->kode_buku}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="row">
                    <label for="kt" class=" control-label">Tanggal Kembali <span style="color: red;">*</span></label>
                </div>
                <div class="row">
                    <input type="date" class="form-control" value="{{ $mhs->tgl_kembali }}" name="tgl_kembali" required>
                </div>
                <div class="row">
                    <label for="kt" class=" control-label">Denda <span style="color: red;">*</span></label>
                </div>
                <div class="row">
                    <input type="integer" class="form-control" value="{{ $mhs->denda }}" name="denda" required>
                </div>
                <div class="row">
                    <label for="kt" class=" control-label">Kondisi <span style="color: red;">*</span></label>
                </div>
                <div class="row">
                    <select class="form-select" aria-label="Default select example" value="{{ $mhs->kondisi }}" name="kondisi">
                        <option selected>Pilih</option>
                        <option value="Baik">Baik</option>
                        <option value="Rusak">Rusak</option>
                    </select>
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