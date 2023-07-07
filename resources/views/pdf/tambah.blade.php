@extends('header.navbar')
@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    
    <div class="col-lg-12 grid-margin stretch-card" style="margin-top: 10%;">
        <div class="card">
            <div class="card-header text-center">
                Pilih Mahasiswa Yang Mau Di Cetak
            </div>
            <div class="card-body">
                <form class="form-horizontal" action="/sirkulasi/cetak_pdf" method="post">
                    @csrf
                    <div class="row">
                        <select class="single-select form-control" id="mahasiswa" name="mahasiswa" style="width:100%;height: 100%;">
                            <option selected>Pilih</option>
                            
                            @foreach($mahasiswa as $data)
                            <option value="{{$data->id}}">{{$data->nama}}</option>
                            @endforeach
                        </select>
                    </div>
                    {{-- <div class="row mt-3 ">
                        <a href="sirkulasi/cetak_pdf" class="btn btn-primary" target="_blank">Cetak PDF</a>    
                    </div> --}}
                    <div class="row mt-3">
                        <div class="d-flex justify-content-center">
                            <a>
                            <button type="submit" class="btn btn-primary">
                                Cetak PDF
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-printer-fill" viewBox="0 0 16 16">
                                    <path d="M5 1a2 2 0 0 0-2 2v1h10V3a2 2 0 0 0-2-2H5zm6 8H5a1 1 0 0 0-1 1v3a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1v-3a1 1 0 0 0-1-1z"/>
                                    <path d="M0 7a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v3a2 2 0 0 1-2 2h-1v-2a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v2H2a2 2 0 0 1-2-2V7zm2.5 1a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1z"/>
                                  </svg>
                            </button>
                            </a>
                        </div>
                    </div>                    
                </form>
            </div>
        </div>
    </div>
    
</body>
</html>
@endsection