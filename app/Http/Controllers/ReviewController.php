<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\review;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    public function store(Request $request)
    {
        $request->session()->regenerate();
        $validator = $request->validate( [
            'content' => 'required|string|max:255',
            'rating' => 'required|integer|min:1|max:5',
        ]);
    
        

        $review = new Review();
        $review->content = $request->input('content');
        $review->rating = $request->input('rating');
        $review->id_client = Auth::user()->id;
        if($review->save()){return response("Review Envoyer avec succés",200)->header('Content-Type', 'text/plain');}
        else{return response("Erreur d'enregistrement",401)->header('Content-Type', 'text/plain');}
    }


}
