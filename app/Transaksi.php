<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    protected $table = 'transaksi';

    public function buku() {
        return $this->belongsTo('App\Buku', 'id_buku');
    }

    public function user() {
        return $this->belongsTo('App\User', 'id_user');
    }
}
