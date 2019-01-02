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
		$this->validate($r, [
			'name' => 'required',
			'email' => 'required|email',
			'id_role' => 'required',
			'password' => 'required',
			'image' => 'image',
		]);

		$input = $r->input();
		
		//Upload Gambar
		if ($r->hasFile('image')) {
			$uploadedFile = $r->file('image');
			$ext = $uploadedFile->getClientOriginalExtension();
			$nm_file = rand(111111,999999).".".$ext;
			$destinationPath = public_path('uploaded/member');
			$upload = $uploadedFile->move($destinationPath, $nm_file);
		}

		$input['image'] = $nm_file;
		$input['password'] = bcrypt($r->password);
		$member = User::create($input);

    	return redirect()->route('member');
    }

    public function edit($id)
    {
    	$data['member'] = User::find($id);

    	return view('admin.member.edit', $data);
    }

    public function update(Request $r, $id)
    {

		$this->validate($r, [
			'name' => 'required',
			'email' => 'required|email',
			'id_role' => 'required',
		]);

		$input = $r->input();

		$member = User::find($id);
		
		
		if ($r->password) {
			$input['password'] = bcrypt($r->password);
		} else {
			$input['password'] = $member->password;
		}
		
	    //Upload File
    	if ($r->hasFile('image')) {
	    	$uploadedFile = $r->file('image');
	    	$ext = $uploadedFile->getClientOriginalExtension();
			$nm_file = rand(111111,999999).".".$ext;
			$destinationPath = public_path('uploaded/member');
			$upload = $uploadedFile->move($destinationPath, $nm_file);
			$input['image'] = $nm_file;
		}
		
		$member->update($input);

    	return redirect()->route('member');
    }

    public function delete(Request $r)
    {
    	User::where('id', $r->id)->delete();

    	return redirect()->route('member');
    }
}
