@extends('layout.master')
@section('content')
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Absensi {{date('l')}}  {{date("d/m/Y")}}</h1>
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
                        @if (empty($rekap))
                        <a href="{{route('dashboard.email')}}" class="btn btn-info" rel="noopener noreferrer">
                            <i class="fa fa-fw" aria-hidden="true"></i>
                            Kirim Email Pengingat</a>
                        <button type="button" onclick="simpanAbsen()" class="btn btn-success" rel="noopener noreferrer">
                            <i class="fa fa-fw" aria-hidden="true"></i>
                            Simpan Absen</button>
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
                                    @foreach ($users as $no => $user)
                                    @if (!$user->absensi)
                                    <tr>
                                        <td>{{$no+1}}</td>
                                        @if ($user->role_id == 1)
                    
                                            <td>{{$user->dosen->nama}}</td>
                                            @elseif($user->role_id == 2)
                                            <td>{{$user->karyawan->nama}}</td>
                        
                                            @endif 
                                            <td><p class="btn btn-sm btn-outline btn-danger">Belum Absen</p>
                                               
                                            </td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                    @else 
                                        <tr>
                                            <td>{{$no+1}}</td>
                                            @if ($user->role_id == 1)
                                            <td>{{$user->dosen->nama}}</td>
                        
                                            @elseif($user->role_id == 2)
                                            <td>{{$user->karyawan->nama}}</td>
                        
                                            @endif 
                                            <td><p class="btn btn-sm btn-outline btn-success">{{$user->absensi->status}}</p>
                                             
                                            </td>
                                            <td>{{$user->absensi->keterangan}}</td>
                                    
                                            <td>{{$user->absensi->tanggal}}</td>
                                   
                                            <td></td>
                                        </tr> 
                                        @endif
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        <!-- /.table-responsive -->
                        @else
                        <h1>Data Absen Hari Ini Sudah Disimpan</h1>                 
                        @endif
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