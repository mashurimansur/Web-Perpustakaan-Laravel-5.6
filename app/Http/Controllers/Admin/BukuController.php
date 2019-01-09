<?php

namespace App\Http\Controllers\Admin;
use App\Models\Buku;
use App\Models\Kategori;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class BukuController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index(Request $r)
    {
		$search = $r->input('search');
		if ($search) {
			$data['search'] = $search;
			$data['buku'] = Buku::where('judul', 'like', '%'.$search.'%')->with('kategori')->paginate();
			return view('admin.buku.index', $data);
		}
		
		$data['search'] = '';
    	$data['buku'] = Buku::with('kategori')->paginate(20);

    	return view('admin.buku.index', $data);
    }

    public function create()
    {
		$data['kategori'] = Kategori::orderBy('kategori')->get();

    	return view('admin.buku.create', $data);
    }

    public function store(Request $r)
    {
		$this->validate($r, [
			'isbn' => 'required',
			'judul' => 'required',
			'id_kategori' => 'required',
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
		$data['kategori'] = Kategori::orderBy('kategori')->get();
    	$data['buku'] = Buku::find($id);

    	return view('admin.buku.edit', $data);
    }

    public function update(Request $r, $id)
    {
		$this->validate($r, [
			'isbn' => 'required',
			'judul' => 'required',
			'id_kategori' => 'required',
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
