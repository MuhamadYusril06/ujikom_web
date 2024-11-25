<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Gallery;
use App\Models\Agenda;
use App\Models\Info;

class DashboardController extends Controller
{
    public function index()
    {
        // Ambil 5 user, galeri, dan agenda terbaru
        $recentUsers = User::latest()->take(5)->get();
        $recentGalleries = Gallery::latest('updated_at')->take(5)->get();
        $recentAgendas = Agenda::latest()->take(5)->get();
        $recentInfos = Info::latest()->take(5)->get();

        // Hitung total data
        $usersCount = User::where('role', 'user')->count();
        $galleriesCount = Gallery::count();
        $agendasCount = Agenda::count();
        $infosCount = Info::count();

        // Kirim data ke view
        return view('admin.dashboard', compact(
            'recentUsers', 
            'recentGalleries', 
            'recentAgendas', 
            'recentInfos', 
            'usersCount', 
            'galleriesCount', 
            'agendasCount',
            'infosCount'
        ));
    }
}
