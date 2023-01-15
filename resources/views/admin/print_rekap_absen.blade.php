<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Startmin - Bootstrap Admin Theme</title>

        <!-- Bootstrap Core CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    </head>
    <body>
        <table id="table-data" class="table table-bordered table-hover table-striped">
            <thead>
            <tr>
                <th>#</th>
                <th>Nama</th>
                <th>Status</th>
                <th>Keterangan</th>
                <th>Tanggal</th>
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
                    </tr> 
                    @endforeach
                </tbody>
            </table>
    {{-- finish --}}
    </body>
    </html>
    