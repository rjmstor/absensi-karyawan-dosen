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
                        @if (!empty($tanggal))
                        <a href="{{route('print.rekapAbsen',['tanggal' => $tanggal])}}" class="btn btn-info" target="_blank" rel="noopener noreferrer">
                            <i class="fa fa-fw" aria-hidden="true"></i>
                            Print PDF</a>
                            <a href="{{route('export.rekapAbsen',['tanggal' => $tanggal])}}" class="btn btn-success" target="_blank" rel="noopener noreferrer">
                                <i class="fa fa-fw" aria-hidden="true"></i>
                                Export Excel</a>
                        @else
                        <a href="{{route('print.rekapAbsen')}}" class="btn btn-info" target="_blank" rel="noopener noreferrer">
                            <i class="fa fa-fw" aria-hidden="true"></i>
                            Print PDF</a>   
                            <a href="{{route('export.rekapAbsen')}}" class="btn btn-success" target="_blank" rel="noopener noreferrer">
                                <i class="fa fa-fw" aria-hidden="true"></i>
                                Export Excel</a>
                        @endif
                            <br/><br>
                            <form action="{{route('rekapAbsen')}}" method="get" id="formTanggal">
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-2 col-form-label">Filter Sesuai Tanggal</label>
                                    <div class="col-sm-2">
                                        <input type="date" class="form-control" id="tanggal" name='tanggal'> 
                                    </div> 
                                    <div class="col-sm-2">
                                        <a href="{{route('rekapAbsen')}}" class="btn btn-info" rel="noopener noreferrer">
                                            Tampilkan Semua</a>
                                    </div>   
                                </div>
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
            $("#tanggal").change(function (e) {
            e.preventDefault();
            $("#formTanggal").submit();
            });
    </script>
@endpush