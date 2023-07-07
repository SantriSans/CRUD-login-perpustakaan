@extends('header.navbar')
@section('content')
<div class="col-lg-12 grid-margin stretch-card " style="margin-top: 10%;">
    <div class="card">
        <div class="card-body">
            <div>
                <form action="/sirkulasi/cari" method="get">
                    <div class="container">
                        <h4 class="card-title">Data Sirkulasi</h4>
                        <div class="row mt-4">
                            <div class="col-sm-6 col-md-4">
                                <input class="form-control form-control-sm mt-2 " type="text" name="cari" placeholder="Cari mahasiswa .." aria-label=".form-control-sm example">
                            </div>
                            <div class="col-6 col-md-4">
                                <button type="submit" class="btn btn-primary btn-sm mt-2"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search-heart" viewBox="0 0 16 16">
                                        <path d="M6.5 4.482c1.664-1.673 5.825 1.254 0 5.018-5.825-3.764-1.664-6.69 0-5.018Z" />
                                        <path d="M13 6.5a6.471 6.471 0 0 1-1.258 3.844c.04.03.078.062.115.098l3.85 3.85a1 1 0 0 1-1.414 1.415l-3.85-3.85a1.007 1.007 0 0 1-.1-.115h.002A6.5 6.5 0 1 1 13 6.5ZM6.5 12a5.5 5.5 0 1 0 0-11 5.5 5.5 0 0 0 0 11Z" />
                                    </svg></button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="d-flex justify-content-end">
                <a href="/sirkulasi/pilih_sirkulasi" class="btn btn-primary" target="_blank"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-printer-fill" viewBox="0 0 16 16">
                    <path d="M5 1a2 2 0 0 0-2 2v1h10V3a2 2 0 0 0-2-2H5zm6 8H5a1 1 0 0 0-1 1v3a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1v-3a1 1 0 0 0-1-1z"/>
                    <path d="M0 7a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v3a2 2 0 0 1-2 2h-1v-2a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v2H2a2 2 0 0 1-2-2V7zm2.5 1a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1z"/>
                  </svg>
                </a>
                <a href="/tambah-sirkulasi" class="btn btn-success ms-2"><i class="mdi mdi-account-plus"></i> <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-circle-fill" viewBox="0 0 16 16">
                    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3v-3z"/>
                  </svg>
                </a>
                <a href="/sirkulasi" class="btn btn-danger ms-2"><i class="mdi mdi-account-plus"></i> <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-repeat" viewBox="0 0 16 16">
                    <path d="M11.534 7h3.932a.25.25 0 0 1 .192.41l-1.966 2.36a.25.25 0 0 1-.384 0l-1.966-2.36a.25.25 0 0 1 .192-.41zm-11 2h3.932a.25.25 0 0 0 .192-.41L2.692 6.23a.25.25 0 0 0-.384 0L.342 8.59A.25.25 0 0 0 .534 9z"/>
                    <path fill-rule="evenodd" d="M8 3c-1.552 0-2.94.707-3.857 1.818a.5.5 0 1 1-.771-.636A6.002 6.002 0 0 1 13.917 7H12.9A5.002 5.002 0 0 0 8 3zM3.1 9a5.002 5.002 0 0 0 8.757 2.182.5.5 0 1 1 .771.636A6.002 6.002 0 0 1 2.083 9H3.1z"/>
                  </svg>
                </a>
            </div>
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th> No </th>
                            <th> Tanggal Pinjam </th>
                            <th> NBI </th>
                            <th> Kode Buku </th>
                            <th> Tanggal Kembali </th>
                            <th> Denda </th>
                            <th> Kondisi </th>
                            <th> Aksi </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($sirkulasi as $mhs)
                        <tr>
                            <td>
                                @php $no = 1; @endphp
                                {{ $loop->index+1 }}
                            </td>
                            <td>
                                {{$mhs->tgl_pinjam}}
                            </td>
                            <td>
                                {{$mhs->mahasiswa->nim}}
                            </td>
                            <td>
                                {{$mhs->Buku->kode_buku}}
                            </td>
                            <td>
                                {{$mhs->tgl_kembali}}
                            </td>
                            <td>
                                {{$mhs->denda}}
                            </td>
                            <td>
                                {{$mhs->kondisi}}
                            </td>
                            <td>
                                <a class="btn btn-success" href="edit-sirkulasi/{{ $mhs->id }}">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-fill" viewBox="0 0 16 16">
                                        <path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z"/>
                                      </svg>
                                </a>

                                <a class="btn btn-danger" href="/delete-sirkulasi/{{ $mhs->id }}"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                        <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6Z" />
                                        <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1ZM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118ZM2.5 3h11V2h-11v1Z" />
                                    </svg></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                Halaman : {{ $sirkulasi->currentPage() }} <br />
                Jumlah Data : {{ $sirkulasi->total() }} <br />
                Data Per Halaman : {{ $sirkulasi->perPage() }} <br />

                {{-- Pagination --}}
                <div class="d-flex justify-content-start mt-4">
                    {!! $sirkulasi->links() !!}
                </div>
            </div>
        </div>
    </div>
</div>

@endsection