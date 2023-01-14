@extends('layout.master')
@section('content')
<div class="col-lg-12">
    <h1 class="page-header">Selamat Datang {{Auth::user()->username}}</h1>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">{{date('l')}}  {{date("d/m/Y")}}
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <div class="panel-body">
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.col-lg-4 (nested) -->
                        <div class="col-lg-8">
                            <div id="morris-bar-chart"></div>
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel-body -->
        </div>
        <!-- /.panel -->
    </div>
</div>
@stop