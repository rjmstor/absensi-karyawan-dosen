@extends('layout.masterp')
@section('title')
    Halaman Absen
@endsection
@section('content')

<div class="container">
    <div class="row mx-auto">
        <div class="col-md-6 col-md-offset-3">
            <div class="login-panel panel panel-default">
                <a href="{{ route('logout') }}" onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();" class="ms-3 mt-4 float-right btn btn-danger">Logout</a> </h3>
                    <form id="logout-form" action="{{ route('logout') }}"
                                            method="POST" class="d-none">
                                            @csrf
                                        </form>
                <div class="panel-heading">
                    @if (Auth::user()->role_id == 1)
                    <h3 class="panel-title">Selamat Datang {{ Auth::user()->dosen->nama }}
                    @elseif(Auth::user()->role_id == 2)
                    <h3 class="panel-title">Selamat Datang {{ Auth::user()->karyawan->nama }}
                    @else
                    <h3 class="panel-title">Selamat Datang {{ Auth::user()->username}}
                    @endif
                </div>
                <div class="panel-body">
                    <form role="form" method="POST" action="/absensi">
                        <fieldset>
                            {{ csrf_field() }}
                            <input type="hidden" name="users_id" value="{{ Auth::user()->id }}">
                            <div class="form-group">
                                <label>Status</label>
                                <select class="form-control" name="status">
                                    <option value="Hadir">Hadir</option>
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
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
