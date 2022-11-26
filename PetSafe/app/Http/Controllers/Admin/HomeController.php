<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Publication;
use App\Models\Service;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index() {
        $countPublications = Publication::where('active', 1)->count();
        $countServices = Service::where('active', 1)->count();
        $countUsers = User::where('active', 1)->count();

        return view('admin.home', compact('countPublications', 'countServices', 'countUsers'));
    }
}
