<?php

namespace App\Http\Controllers\Admin;
use App\Models\Buku;
use App\Models\User;
use App\Models\Transaksi;
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
        $data['member'] = User::where('id_role', 3)->count();
        $data['buku'] = Buku::count();
        return view('admin.dashboard.index', $data);
    }
}
