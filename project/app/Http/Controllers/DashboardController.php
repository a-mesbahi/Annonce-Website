<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Annonce;


class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }
    public function index()
    {   
        $user = Auth::user();
        $userAnnonces = $user->annonces()->latest()->get();
        $totalAnnonces = $userAnnonces->count();
        $offerAnnonces = $userAnnonces->where('annonce_type', 'offer')->count();
        $requestAnnonces = $userAnnonces->where('annonce_type', 'request')->count();
        $recentAnnonces = $userAnnonces; // Show all annonces
        
        return view('dashboard', [
            'user' => $user,
            'totalAnnonces' => $totalAnnonces,
            'offerAnnonces' => $offerAnnonces,
            'requestAnnonces' => $requestAnnonces,
            'recentAnnonces' => $recentAnnonces,
        ]);
    }
}

