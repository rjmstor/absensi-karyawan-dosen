@extends('layout.master')
@section('content')
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Data Dosen</h1>
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
                            Kirim Email Pengingat</a>
                        <a href="#" class="btn btn-success" target="_blank" rel="noopener noreferrer">
                            <i class="fa fa-fw" aria-hidden="true"></i>
                        Simpan Absen</a>
                        <br/><br/>
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
                    </div>
                    <!-- /.panel-body -->
                </div>
                <!-- /.panel -->
            </div>
            <!-- /.col-lg-12 -->
        </div>   
@stop