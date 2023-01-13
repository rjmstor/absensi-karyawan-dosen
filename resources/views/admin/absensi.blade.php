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