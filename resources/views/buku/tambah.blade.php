@extends('header.navbar')
@section('content')
<div class="col-lg-12 grid-margin stretch-card" style="margin-top: 10%;">
    <div class="card">
        <div class="card-header">
            Tambah Buku
        </div>
        <div class="card-body">
            <form class="form-horizontal" action="/store-buku" method="post">
                @csrf
                <div class="row">
                    <label for="kt" class=" control-label">Kode Buku <span style="color: red;">*</span></label>
                </div>
                <div class="row">
                    <input type="text" class="form-control" name="kode_buku" required>
                </div>
                <div class="row">
                    <label for="kt" class=" control-label">Judul <span style="color: red;">*</span></label>
                </div>
                <div class="row">
                    <input type="text" class="form-control" name="judul" required>
                </div>
                <div class="row">
                    <label for="kt" class=" control-label">Pengarang <span style="color: red;">*</span></label>
                </div>
                <div class="row">
                    <input type="text" class="form-control" name="pengarang" required>
                </div>
                <div class="row">
                    <label for="kt" class=" control-label">Tahun <span style="color: red;">*</span></label>
                </div>
                <div class="row">
                    <input type="text" class="form-control" name="tahun" required>
                </div>
                <div class="row">
                    <label for="kt" class=" control-label">ISBN <span style="color: red;">*</span></label>
                </div>
                <div class="row">
                    <input type="text" class="form-control" name="isbn" required>
                </div>
                <div class="row">
                    <label for="kt" class=" control-label">Jumlah Halaman <span style="color: red;">*</span></label>
                </div>
                <div class="row">
                    <input type="integer" class="form-control" name="jml_halaman" required>
                </div>
                <div class="row mt-3 ">
                    <button type="submit" class="btn btn-primary w-25">
                        Tambah
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

{{-- <script type="text/javascript">
    $(document).ready(function() {
        $(document).on('change', '#fakultas', function() {
            var id = $(this).val();
            $.ajax({
                type: 'get',
                url: '{{url('/getProdi')}}',
                data: {
                    'id': id
                },
                success: function(data) {
                    console.log(data);
                    $("#prodi").empty();
                    $("#prodi").append('<option>---Pilih prodi---</option>');
                    for (var i = 0; i < data.length; i++) {
                        $("#prodi").append('<option value="' + data[i].id + '">' + data[i].nama + '</option>');
                    };
                },
            })
        })
    });
</script> --}}

@endsection