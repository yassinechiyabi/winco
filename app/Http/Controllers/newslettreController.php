<?php

namespace App\Http\Controllers;

use App\Models\newslettre;
use Illuminate\Http\Request;

class newslettreController extends Controller
{
    public function store(Request $request)
    {
        $request->session()->regenerate();
        $validator = $request->validate( [
            'emailSubscriber' => 'required|string|email|max:255|unique:newslettre,email'
        ]);

        $newsletter = new newslettre();
        $newsletter->email = $request->input('emailSubscriber');
        if($newsletter->save()){return response("Subscriber Ajouter",200)->header('Content-Type', 'text/plain');}
        else{return response("Erreur d'enregistrement",401)->header('Content-Type', 'text/plain');}
    }
}
