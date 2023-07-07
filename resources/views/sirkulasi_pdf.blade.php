<!DOCTYPE html>
<html>

<head>
    <title>Laporan Sirkulasi Buku</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <style type="text/css">
        table tr td,
        table tr th {
            font-size: 9pt;
        }
    </style>
    <center>
        <h5><b>Laporan Sirkulasi Buku</b></h5>
    </center>
    @if(!empty($sirkulasi[0]))
    <h6><b>Nama : {{$sirkulasi[0]->mahasiswa->nama}}</b></h6>
    <h6><b>NBI : {{$sirkulasi[0]->mahasiswa->nim}}</b></h6>
    @endif
    <table class='table table-bordered'>
        <thead>
            <tr>
                <th>No</th>
                <th>Kode Buku</th>
                <th>Judul</th>
                <th>Jumlah Halaman</th>
                <th>Tanggal Pinjam</th>
                <th>Tanggal Kembali</th>
                <th>Kondisi</th>
                <th>Denda</th>
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
                    {{$mhs->Buku->kode_buku}}
                </td>
                <td>
                    {{$mhs->Buku->judul}}
                </td>
                <td>
                    {{$mhs->Buku->jml_halaman}}
                </td>
                <td>
                    {{$mhs->tgl_pinjam}}
                </td>
                <td>
                    {{$mhs->tgl_kembali}}
                </td>
                <td>
                    {{$mhs->kondisi}}
                </td>
                <td>
                    {{$mhs->denda}}
                </td>
            </tr>
            @endforeach
            <tr>
                <td colspan="6" style="text-align: left;">Denda</td>
                <td>{{ $sirkulasi->sum('denda') }}</td>
            </tr>
        </tbody>
    </table>

</body>
</html>
