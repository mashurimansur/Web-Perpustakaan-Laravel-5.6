<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    protected $table = 'transaksi';

    protected $fillable = [
        'id', 'id_buku', 'id_user', 'tgl_pinjam', 'tgl_kembali', 'created_at', 'updated_at'
    ];

    // protected $hidden = ['created_at', 'updated_at', 'id_user', 'id_buku'];

    public function buku() {
        return $this->belongsTo('App\Models\Buku', 'id_buku');
    }

    public function user() {
        return $this->belongsTo('App\Models\User', 'id_user');
    }
}