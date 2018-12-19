<?php

namespace App\Http\Controllers\Admin;
use App\Models\Buku;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB, PDF;

class TransaksiController extends Controller
{
    public function index()
    {
        $data['transaksi'] = Transaksi::with('buku', 'user')->get(); 
        
        return view('admin.transaksi.index', $data);
    }

    public function pdf()
    {
        //Get Data
        $data['transaksi'] = Transaksi::with('buku', 'user')->get();
        
        //Cetak PDF
        $tgl = date('Y-m-d');
        $nama = 'transaksi-'.$tgl.'.pdf';
        $pdf = PDF::loadView('admin.transaksi.pdf', $data);
        return $pdf->download($nama);	
    }
}
