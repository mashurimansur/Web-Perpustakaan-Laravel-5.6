<?php

namespace App\Http\Controllers\Admin;
use App\Models\Kategori;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class KategoriController extends Controller
{
    public function index(Request $r) {
        $search = $r->input('search');
		if ($search) {
			$data['kategori'] = Kategori::where('kategori', 'like', '%'.$search.'%')->paginate();
			return view('admin.kategori.index', $data);
		}

    	$data['kategori'] = Kategori::paginate(20);

    	return view('admin.kategori.index', $data);
    }
}
