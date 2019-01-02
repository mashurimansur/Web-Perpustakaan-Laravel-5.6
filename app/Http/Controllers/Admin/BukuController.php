<?php

namespace App\Http\Controllers\Admin;
use App\Models\Buku;
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
    	$data['buku'] = Buku::paginate(20);

    	return view('admin.buku.index', $data);
    }

    public function create()
    {
        // jenis
        $jenis = Buku::select('jenis', DB::raw('COUNT(jenis) as count'))->groupBy('jenis')->orderBy('jenis')->get();
        $data['jenis'] = $jenis;

    	return view('admin.buku.create', $data);
    }

    public function store(Request $r)
    {
		$this->validate($r, [
			'isbn' => 'required',
			'judul' => 'required',
			'jenis' => 'required',
			'pengarang' => 'required',
			'penerbit' => 'required',
			'tahun' => 'required',
			'stok' => 'required',
			'image' => 'image',
		]);

		$input = $r->input();

    	//Upload File
    	$uploadedFile = $r->file('image');
    	$ext = $uploadedFile->getClientOriginalExtension();
		$nm_file = rand(111111,999999).".".$ext;
		$destinationPath = public_path('uploaded/buku');
		$upload = $uploadedFile->move($destinationPath, $nm_file);
    	$input['image'] = $nm_file;

    	$buku = Buku::create($input);

    	return redirect()->route('buku');
    }

    public function edit($id)
    {
    	$data['buku'] = Buku::find($id);

        // jenis
        $jenis = Buku::select('jenis', DB::raw('COUNT(jenis) as count'))->groupBy('jenis')->orderBy('jenis')->get();
        $data['jenis'] = $jenis;

    	return view('admin.buku.edit', $data);
    }

    public function update(Request $r, $id)
    {
		$this->validate($r, [
			'isbn' => 'required',
			'judul' => 'required',
			'jenis' => 'required',
			'pengarang' => 'required',
			'penerbit' => 'required',
			'tahun' => 'required',
			'stok' => 'required',
			'image' => 'image',
		]);

		$input = $r->input();

    	$buku = Buku::find($id);

	    //Upload File
    	if ($r->hasFile('image')) {
	    	$uploadedFile = $r->file('image');
	    	$ext = $uploadedFile->getClientOriginalExtension();
			$nm_file = rand(111111,999999).".".$ext;
			$destinationPath = public_path('uploaded/buku');
			$upload = $uploadedFile->move($destinationPath, $nm_file);
	    	$input['image'] = $nm_file;
    	}

    	$buku->update($input);

    	return redirect()->route('buku');
    }

    public function delete(Request $r)
    {
    	Buku::where('id', $r->id)->delete();

    	return redirect()->route('buku');
    }
}
