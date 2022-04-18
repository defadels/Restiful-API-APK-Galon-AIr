<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nama', 'email', 'password', 'jenis', 'nomor_hp','harga_ambil','harga_jemput','alamat'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types. 
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function daftar_penjualan() {
        return $this->hasMany('App\Pesanan', 'dibuat_oleh_id');
    }

    public function pesanan() {
        $this->hasMany('App\Pesanan', 'depot_id');
    }

    public function diproses() {
        $this->hasMany('App\Pesanan', 'diproses_oleh_id');
    }
}
