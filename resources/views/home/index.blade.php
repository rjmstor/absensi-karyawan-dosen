@extends('layout.master')
@section('title')
    Halaman Absen
@endsection
@section('content')
<div class="row mt-5">
    <div class="col-lg-12">
        <h1 class="page-header">Panel Absen
        </h1>
    </div>
    <!-- /.col-lg-12 -->
</div>  
<div class="row">
    <div class="col-lg-6">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Absen Hari {{date('l')}} Tanggal  {{date("d/m/Y")}}
                </div>
                <div class="panel-body">
                    @if ($absen == true)
                        <h1>Anda Sudah Mengisi Absen</h1>
                    @else
                    <form role="form" method="POST" action="{{route('absen')}}">
                        <fieldset>
                            {{ csrf_field() }}
                            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                            <input type="hidden" name="tanggal" value="{{date("Y-m-d")}}">
                            <div class="form-group">
                                <label>Absen</label>
                                <select class="form-control" name="status">
                                    <option value="">--> Pilih Absen <--</option>
                                    @if (date("H:i:s") >= '08:00:00' && date("H:i:s") <= '16:00:00')
                                    <option value="Hadir">Hadir</option>
                                    @else    
                                    <option value="Terlambat">Terlambat</option>
                                    @endif
                                    <option value="Izin">Izin</option>
                                    <option value="Sakit">Sakit</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Keterangan</label>
                                <textarea class="form-control" placeholder="Keterangan" name="keterangan" autofocus></textarea>
                            </div>
                            <button type="submit" class="btn btn-default">Absen</button>
                        </fieldset>
                    </form>
                    @endif
                </div>
            </div>
        </div>
    </div>

@endsection
