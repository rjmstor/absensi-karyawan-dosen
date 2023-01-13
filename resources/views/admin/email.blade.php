@if ($user->role_id == 1)
<h1>{{$user->dosen->nama}} Anda Belum Mengisi Absensi</h1>    
@elseif ($user->role_id == 2)
<h1>{{$user->karyawan->nama}} Anda Belum Mengisi Absensi</h1> 
@endif