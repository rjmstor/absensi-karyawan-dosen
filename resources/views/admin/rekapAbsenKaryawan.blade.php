@extends('layout.master')
@section('content')
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Rekap Absen {{$rekaps->karyawan->nama}}</h1>
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
                        <a href="{{url()->previous()}}" class="btn btn-primary" rel="noopener noreferrer">
                            Kembali</a>
                            <br><br>
                        <div class="table-responsive">
                            <table id="table-data" class="table table-bordered table-hover table-striped">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Tanggal</th>
                                    <th>Status</th>
                                    <th>Keterangan</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach ($rekaps->rekap as $no => $rekap)
                                        <tr>
                                            <td>{{$no+1}}</td>
                                            <td>{{$rekap->tanggal}}</td>
                                            <td>{{$rekap->status}}</td>
                                            <td>{{$rekap->keterangan}}</td>
                                        </tr>
                                    @endforeach
                                    <tr>
                                        <td colspan="3"><strong>Jumlah : </strong> </td>
                                        <td>Hadir : {{count($rekaps->rekap->where('status', 'Hadir'))}}</td>
                                    </tr>
                                    <tr><td colspan="3"></td>
                                        <td>Terlambat : {{count($rekaps->rekap->where('status', 'Terlambat'))}}</td>
                                    </tr> 
                                    <tr><td colspan="3"></td>
                                        <td>Izin : {{count($rekaps->rekap->where('status', 'Izin'))}}</td>
                                    </tr>
                                    <tr><td colspan="3"></td>
                                        <td>Sakit : {{count($rekaps->rekap->where('status', 'Sakit'))}}</td>
                                    </tr>
                                    <tr><td colspan="3"></td>
                                        <td>Alfa : {{count($rekaps->rekap->where('status', 'Alfa'))}}</td>
                                    </tr>
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