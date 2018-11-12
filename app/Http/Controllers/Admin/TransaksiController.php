<?php

namespace App\Http\Controllers\Admin;
use App\Buku;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB, PDF;

class TransaksiController extends Controller
{
    public function index()
    {
        $data['transaksi'] = DB::table('transaksi')
			->join('buku', 'transaksi.id_buku', '=', 'buku.id')
			->join('users', 'transaksi.id_user', '=', 'users.id')
            ->select('transaksi.*', 'buku.judul', 'buku.id as id_buku', 'users.name')
            ->orderBy('tgl_pinjam', 'DESC')
            ->get();
        return view('admin.transaksi.index', $data);      
    }

    public function pdf()
    {
        $data['transaksi'] = DB::table('transaksi')
			->join('buku', 'transaksi.id_buku', '=', 'buku.id')
			->join('users', 'transaksi.id_user', '=', 'users.id')
            ->select('transaksi.*', 'buku.judul', 'buku.id as id_buku', 'users.name')
            ->orderBy('tgl_pinjam', 'DESC')
            ->get();
        $pdf = PDF::loadView('admin.transaksi.pdf', $data);
        return $pdf->download('transaksi.pdf');	
    }
}
