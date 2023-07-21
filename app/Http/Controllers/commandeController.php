<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\commande;
use Illuminate\Support\Facades\Auth;

class commandeController extends Controller
{
    public function store(Request $request){
        $request->session()->regenerate();
        $credentials=$request->validate(
            [
                'domaine'=> ['required','max:255'],
                'nomSite'=> ['required','max:255'],
                'typeSite'=> ['required','max:255'],
                'descSite'=> ['required','max:500'],
                'id_plan'=>['required','integer']
            ]
            );
            $commande=new commande();
            $commande->domaine=$credentials['domaine'];
            $commande->nomSite=$credentials['nomSite'];
            $commande->typeSite=$credentials['typeSite'];
            $commande->descSite=$credentials['descSite'];
            $commande->id_plan=$credentials['id_plan'];
            $commande->id_client=Auth::user()->id;
            if($commande->save()){return response("Commande enregistrer",200)->header("Content-Type","text/plain");}
            else{{return response("Commande erroner",401)->header("Content-Type","text/plain");}}
    }

    
}
