@extends('layout.master')
@section('content')
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Data Karyawan</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        {{date('l')}}  {{date("d/m/Y")}}
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table id="table-data" class="table table-bordered table-hover table-striped">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nama</th>
                                    <th>Aksi</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($karyawans as $no => $karyawan)
                                    <tr>
                                        <td>{{$no+1}}</td>
                                        <td>{{$karyawan->nama}}</td>
                                        <td>
                                            <form id="resetSandiKaryawan" action="{{route('resetSandiKaryawan', $karyawan->user_id)}}" method="post">
                                                @method('patch')
                                                @csrf
                                                <a href="{{route('rekapAbsenKaryawan', $karyawan->user_id)}}" class="btn btn-sm btn-success">
                                                    Lihat
                                                </a>
                                                <button type="button" onclick="resetSandi('{{$karyawan->nama}}')" class="btn btn-sm btn-warning">
                                                    Reset Sandi
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- /.table-responsive -->
                    </div>
                    <!-- /.panel-body -->
                </div>
                <!-- /.panel -->
            </div>
            <!-- /.col-lg-12 -->
        </div>   
@stop
@push('js')
    <script>
            function resetSandi(nama){
              Swal.fire({
                icon: 'question',
                title: 'Set Default Kata Sandi '+nama+' ?',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, Simpan!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                  if (result.isConfirmed) {
                    $('#resetSandiKaryawan').submit();
                  }
              });
            }
    </script>
@endpush