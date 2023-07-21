<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\clientTicket;
use App\Models\client;
use Illuminate\Support\Facades\Auth;

class ticketClientController extends Controller
{
    public function storeTicket(Request $request){
        $request->session()->regenerate();
        $credentials=$request->validate(

            [
                'titre'=> ['required','max:255'],
                'niveauUrgence'=> ['required','max:255'],
                'idSite'=> ['required','max:255'],
                'contenuTicket'=> ['required'],
            ]
            );

            $ticket=new clientTicket();
            $ticket->titre=$credentials['titre'];
            $ticket->niveauUrgence=$credentials['niveauUrgence'];
            $ticket->idSite=$credentials['idSite'];
            $ticket->contenuTicket=$credentials['contenuTicket'];
            $ticket->id_client=Auth::user()->id;
            if($ticket->save()){return response("Ticket envoyer avec success",200)->header("Content-Type","text/plain");}
            else {return response("Ticket echec d'envoie",401)->header("Content-Type","text/plain");}
    }

    public function ticketBelongToThisClient(Request $request){
        $request->session()->regenerate();
        $tickets=client::find(Auth::user()->id)->ticketClients()->get();
        return response(json_encode($tickets),200)->header("Content-Type","text/plain");

    }

    public function ticketAndReplies(Request $request){
        $credentials=$request->validate(

            [
                'idTicket'=> ['required','integer'],
            ]
            );
        $request->session()->regenerate();
        $ticket=clientTicket::with("ticketReplays.client")->find($credentials['idTicket']);
        return response()->json($ticket,200);
        

    }
}
