<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAnnonceRequest;
use Illuminate\Http\Request;
use App\Models\Annonce;  

class AnnonceController extends Controller
{


    public function index()
    {
        $annonces = Annonce::latest()->paginate(3);
        // $annonces = Annonce::join('users','annonces.user_id','=','users.id')->paginate(3);
        
        return view('Annonces.index',[
            "annonces"=>$annonces,
        ]);
    }
    public function offer()
    {
        $annonces = Annonce::where('annonce_type','=','offer')->latest()->paginate(3);
        
        return view('Annonces.index',[
            "annonces"=>$annonces,
        ]);
    }

    public function request()
    {
        $annonces = Annonce::where('annonce_type','=','request')->latest()->paginate(3);
        
        return view('Annonces.index',[
            "annonces"=>$annonces,
        ]);
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

