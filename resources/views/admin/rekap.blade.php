@extends('layout.master')
@section('content')
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Rekap Absen</h1>
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
                        <a href="{{route('dashboard.email')}}" class="btn btn-info" target="_blank" rel="noopener noreferrer">
                            <i class="fa fa-fw" aria-hidden="true"></i>
                            Print PDF</a>
                        <button type="button" onclick="simpanAbsen()" class="btn btn-success" target="_blank" rel="noopener noreferrer">
                            <i class="fa fa-fw" aria-hidden="true"></i>
                            Export Excel</button>
                            <br/><br/>
                            <form id="form-absen" class="form-absen" action="{{route('simpanAbsen')}}" method="post">
                                @csrf
                            </form>
                        <div class="table-responsive">
                            <table id="table-data" class="table table-bordered table-hover table-striped">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nama</th>
                                    <th>Status</th>
                                    <th>Keterangan</th>
                                    <th>Tanggal</th>
                                    <th>Aksi</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach ($rekaps as $no => $rekap)
                                        <tr>
                                            <td>{{$no+1}}</td>
                                            @if ($rekap->user->role_id == 1)
                                            <td>{{$rekap->user->dosen->nama}}</td>
                                            @elseif($rekap->user->role_id == 2)
                                            <td>{{$rekap->user->karyawan->nama}}</td>
                                            @endif 
                                            <td><p class="btn btn-sm btn-info">{{$rekap->status}}</p>
                                            </td>
                                            <td>{{$rekap->keterangan}}</td>
                                            <td>{{$rekap->tanggal}}</td>
                                            <td></td>
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
            function simpanAbsen(){
              Swal.fire({
                icon: 'question',
                title: 'Simpan Absen ?',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, Simpan!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                  if (result.isConfirmed) {
                    $('.form-absen').submit();
                  }
              });
            }
    </script>
@endpush