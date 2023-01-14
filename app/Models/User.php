<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'role_id',
        'username',
        'email',
        'password',
        'remember_token'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function dosen()
    {
        return $this->hasOne(Dosen::class, 'user_id', 'id');
    }
    public function absensi()
    {
        return $this->hasOne(Absensi::class, 'user_id', 'id');
    }
    public function karyawan()
    {
        return $this->hasOne(Karyawan::class, 'user_id', 'id');
    }
    public function rekap()
    {
        return $this->hasMany(RekapAbsen::class, 'user_id', 'id');
    }
}
