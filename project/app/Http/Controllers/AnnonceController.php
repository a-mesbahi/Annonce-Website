<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAnnonceRequest;
use Illuminate\Http\Request;
use App\Models\Annonce;
use Illuminate\Support\Facades\Auth;

class AnnonceController extends Controller
{


    public function index()
    {
        $annonces = Annonce::latest()->paginate(3);
        $user = Auth::user();
        
        // Calculate match scores for job seekers
        if ($user && $user->user_type === 'job_seeker' && $user->skills) {
            $annonces->getCollection()->transform(function ($annonce) use ($user) {
                $annonce->match_score = $this->calculateMatchScore($user, $annonce);
                return $annonce;
            });
        }
        
        return view('Annonces.index',[
            "annonces"=>$annonces,
        ]);
    }
    
    public function offer()
    {
        $annonces = Annonce::where('annonce_type','=','offer')->latest()->paginate(3);
        $user = Auth::user();
        
        // Calculate match scores for job seekers
        if ($user && $user->user_type === 'job_seeker' && $user->skills) {
            $annonces->getCollection()->transform(function ($annonce) use ($user) {
                $annonce->match_score = $this->calculateMatchScore($user, $annonce);
                return $annonce;
            });
        }
        
        return view('Annonces.index',[
            "annonces"=>$annonces,
        ]);
    }

    public function request()
    {
        $annonces = Annonce::where('annonce_type','=','request')->latest()->paginate(3);
        $user = Auth::user();
        
        // Calculate match scores for job seekers
        if ($user && $user->user_type === 'job_seeker' && $user->skills) {
            $annonces->getCollection()->transform(function ($annonce) use ($user) {
                $annonce->match_score = $this->calculateMatchScore($user, $annonce);
                return $annonce;
            });
        }
        
        return view('Annonces.index',[
            "annonces"=>$annonces,
        ]);
    }
    
    private function calculateMatchScore($user, $annonce)
    {
        // Get user skills as array
        $userSkills = array_filter(array_map('trim', explode("\n", strtolower($user->skills))));
        
        if (empty($userSkills)) {
            return 0;
        }
        
        // Get job description in lowercase
        $jobDescription = strtolower($annonce->body);
        
        // Count matching skills
        $matchedSkills = 0;
        foreach ($userSkills as $skill) {
            if (strpos($jobDescription, $skill) !== false) {
                $matchedSkills++;
            }
        }
        
        // Calculate percentage
        $matchPercentage = round(($matchedSkills / count($userSkills)) * 100);
        
        // Add bonus points if it's a job offer
        if ($annonce->annonce_type === 'offer' && $matchedSkills > 0) {
            $matchPercentage = min(100, $matchPercentage + 5);
        }
        
        return $matchPercentage;
    }




    public function store(StoreAnnonceRequest $request)
    {
        $request->user()->annonces()->create($request->validated()); 
        return back();
    }

    public function show(Annonce $annonce)
    {
        return view('Annonces.show', compact('annonce'));
    }

    public function destroy(Annonce $annonce)
    {
        $this->authorize('delete',$annonce);
        $annonce->delete();
        return back();
    } 

    public function edit(Annonce $annonce){
        $this->authorize('edit',$annonce);
        return view('Annonces.edit',["annonce"=>$annonce]);
    }


    public function update(StoreAnnonceRequest $request,$id)
    {   
        Annonce::where('id',$id)->update($request->validated());
        return redirect( route('Annonces') );
    }
}

