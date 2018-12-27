<?php

namespace App\Http\Controllers\Admin;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MemberController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
    	$member = User::with('role')->get();
		
    	return view('admin.member.index', compact('member'));
    }

    public function create()
    {
    	return view('admin.member.create');
    }

    public function store(Request $r)
    {
    	$buku = new User;
    	$buku->name = $r->name;
    	$buku->email = $r->email;
    	$buku->id_role = $r->id_role;
    	$buku->password = bcrypt($r->password);

    	//Upload File
    	$uploadedFile = $r->file('image');
    	$ext = $uploadedFile->getClientOriginalExtension();
		$nm_file = rand(111111,999999).".".$ext;
		$destinationPath = public_path('uploaded/member');
		$upload = $uploadedFile->move($destinationPath, $nm_file);
    	$buku->image = $nm_file;

    	$buku->save();

    	return redirect()->route('member');
    }

    public function edit($id)
    {
    	$data['member'] = User::find($id);

    	return view('admin.member.edit', $data);
    }

    public function update(Request $r, $id)
    {
    	$buku = User::find($id);
    	$buku->name = $r->name;
    	$buku->email = $r->email;
    	$buku->id_role = $r->id_role;

    	if ($r->password != NULL) {
    		$buku->password = bcrypt($r->password);
    	}

	    //Upload File
    	if ($r->hasFile('image')) {
	    	$uploadedFile = $r->file('image');
	    	$ext = $uploadedFile->getClientOriginalExtension();
			$nm_file = rand(111111,999999).".".$ext;
			$destinationPath = public_path('uploaded/member');
			$upload = $uploadedFile->move($destinationPath, $nm_file);
	    	$buku->image = $nm_file;
    	}

    	$buku->save();

    	return redirect()->route('member');
    }

    public function delete(Request $r)
    {
    	User::where('id', $r->id)->delete();

    	return redirect()->route('member');
    }
}
