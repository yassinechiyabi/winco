<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\randomCommande;

class randomCommandeController extends Controller
{
    public function store(Request $request){
        $request->session()->regenerate();
        $credentials=$request->validate(
            [
                'nom_complet'=> ['required','max:255'],
                'adresse_email'=> ['required','max:255'],
                'nom_site'=> ['required','max:255'],
                'phone_number'=> ['required','max:255'],
                
            ]
            );

            $random_commande=new RandomCommande();
            $random_commande->nom_complet=$credentials['nom_complet'];
            $random_commande->adresse_email=$credentials['adresse_email'];
            $random_commande->nom_site=$credentials['nom_site'];
            $random_commande->phone_number=$credentials['phone_number'];
            if($random_commande->save()){return response("Commande envoyer avec success",200)->header("Content-Type","text/plain");}
            else{return response("Commande erronée",401)->header("Content-Type","text/plain");}


    }
}
