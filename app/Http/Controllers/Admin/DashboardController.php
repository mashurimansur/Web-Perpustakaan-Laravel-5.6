<?php

namespace App\Http\Controllers\Admin;
use App\Buku, App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
    	$data['member'] = User::where('status', 'user')->count();
    	$data['buku'] = Buku::count();
    	return view('admin.dashboard.index', $data);
    }
}
