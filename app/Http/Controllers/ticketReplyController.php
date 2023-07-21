<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ticketReplay;
use Illuminate\Support\Facades\Auth;

class ticketReplyController extends Controller
{
    public function store(Request $request){
        $request->session()->regenerate();
        $credentials=$request->validate(

            [
                'contenu'=> ['required','max:1000'],
                'idTicket'=> ['required','integer'],
            ]
            );

            $reply=new ticketReplay();
            $reply->contenu=$credentials['contenu'];
            $reply->idTicket=$credentials['idTicket'];
            $reply->id_client=Auth::user()->id;
            if($reply->save()){return response("Réponse envoyer avec success",200)->header("Content-Type","text/plain");}
            else{return response("Echec d'nvoie de la réponse",401)->header("Content-type","text/plain");}


    }
}
