<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\contact;

class contactController extends Controller
{
    public function store(Request $request){
        $request->session()->regenerate();
        $credentials=$request->validate(
            [
                'nomComplet'=> ['required','max:255'],
                'email'=> ['required','max:255'],
                'messageContenu'=> ['required','max:1000'],
                
            ]
            );

            $contact=new contact();
            $contact->nomComplet=$credentials['nomComplet'];
            $contact->email=$credentials['email'];
            $contact->messageContenu=$credentials['messageContenu'];
            if($contact->save()){return response("Message envoyer avec success",200)->header("Content-Type","text/plain");}
            else{return response("Message erroné",401)->header("Content-Type","text/plain");}


    }
}
