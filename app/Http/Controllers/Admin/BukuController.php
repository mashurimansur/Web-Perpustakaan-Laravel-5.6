<?php

namespace App\Http\Controllers\Admin;
use App\Buku;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class BukuController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
    	$data['buku'] = Buku::all();

    	return view('admin.buku.index', $data);
    }

    public function create()
    {
        // jenis
        $jenis = DB::table('buku')->select('jenis', DB::raw('COUNT(jenis) as count'))->groupBy('jenis')->orderBy('jenis')->get();
        $data['jenis'] = $jenis;

    	return view('admin.buku.create', $data);
    }

    public function store(Request $r)
    {
    	$buku = new Buku;
    	$buku->isbn = $r->isbn;
    	$buku->judul = $r->judul;
    	$buku->jenis = $r->jenis;
    	$buku->pengarang = $r->pengarang;
    	$buku->penerbit = $r->penerbit;
    	$buku->tahun = $r->tahun;
    	$buku->stok = $r->stok;

    	//Upload File
    	$uploadedFile = $r->file('image');
    	$ext = $uploadedFile->getClientOriginalExtension();
		$nm_file = rand(111111,999999).".".$ext;
		$destinationPath = public_path('uploaded/buku');
		$upload = $uploadedFile->move($destinationPath, $nm_file);
    	$buku->image = $nm_file;

    	$buku->save();


    	return redirect()->route('buku');
    }

    public function edit($id)
    {
    	$data['buku'] = Buku::find($id);

        // jenis
        $jenis = DB::table('buku')->select('jenis', DB::raw('COUNT(jenis) as count'))->groupBy('jenis')->orderBy('jenis')->get();
        $data['jenis'] = $jenis;

    	return view('admin.buku.edit', $data);
    }

    public function update(Request $r, $id)
    {
    	$buku = Buku::find($id);
    	$buku->isbn = $r->isbn;
    	$buku->judul = $r->judul;
    	$buku->jenis = $r->jenis;
    	$buku->pengarang = $r->pengarang;
    	$buku->penerbit = $r->penerbit;
    	$buku->tahun = $r->tahun;
    	$buku->stok = $r->stok;

	    //Upload File
    	if ($r->hasFile('image')) {
	    	$uploadedFile = $r->file('image');
	    	$ext = $uploadedFile->getClientOriginalExtension();
			$nm_file = rand(111111,999999).".".$ext;
			$destinationPath = public_path('uploaded/buku');
			$upload = $uploadedFile->move($destinationPath, $nm_file);
	    	$buku->image = $nm_file;
    	}

    	$buku->save();

    	return redirect()->route('buku');
    }

    public function delete(Request $r)
    {
    	Buku::where('id', $r->id)->delete();

    	return redirect()->route('buku');
    }
}
