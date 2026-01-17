<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Annonce;
use App\Models\User;

class HomeController extends Controller
{
    public function index()
    {
        $totalAnnonces = Annonce::count();
        $totalOffers = Annonce::where('annonce_type', 'offer')->count();
        $totalRequests = Annonce::where('annonce_type', 'request')->count();
        $totalUsers = User::count();
        $featuredAnnonces = Annonce::latest()->take(6)->get();

        return view('home', compact(
            'totalAnnonces',
            'totalOffers',
            'totalRequests',
            'totalUsers',
            'featuredAnnonces'
        ));
    }
}
