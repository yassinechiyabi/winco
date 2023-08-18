<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\client;
use App\Models\review;
use App\Models\commande;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
class ClientRegister_controller extends Controller
{
    public function StoreClient(Request $request){
        $validated_client=$request->validate(

            [
                'nomClient'=> ['required','max:255'],
                'prenomClient'=> ['required','max:255'],
                'email'=> ['required','unique:client','email','max:255'],
                'password'=> ['required','max:255'],
				'phone'=>['required','max:255'],
            ]
            );

            $client=new client();
            /* $client->storeClient($request); */
            $client->nomClient=$validated_client['nomClient'];
            $client->prenomClient=$validated_client['prenomClient'];
            $client->email=$validated_client['email'];
            $client->password=Hash::make($validated_client['password']);
			$client->phone=$validated_client['phone'];
            $returnValue=$client->save();
            if($returnValue){
                Auth::attempt($validated_client,true);
                $request->session()->regenerate();
                return response("Votre compte a été créer ".$validated_client['email'],200)->header('Content-Type', 'text/plain');}
            else{return response("Nous ne pouvons pas créer votre compte",401)->header('Content-Type', 'text/plain');}

    }

    public function loginClient(Request $request){
        $credentials=$request->validate(
            [
                'email'=> ['required','email','max:255'],
                'password'=> ['required','max:255']
            ]
            );

            if (Auth::attempt($credentials,true)) {$request->session()->regenerate();return response("Login Success",200)->header('Content-Type', 'text/plain');}
            else{return response("Login Failed",401)->header('Content-Type', 'text/plain');}
        }

    public function isAuthenticated(Request $request){
        
        if(Auth::check()){$request->session()->regenerate(); return response(Auth::user(),200)->header('Content-Type', 'application/json');}
        else{return response("No Client Authenticated",401)->header('Content-Type', 'text/plain');}
    } 

    public function logoutClient(Request $request){
            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
            return response("LogOut Success",200)->header('Content-Type', 'text/plain');
    }

    public function sites(Request $request){
        $request->session()->regenerate();
        return response(json_encode(client::find(Auth::user()->id)->sites()->get()),200)->header('Content-type','text/plain');
    }

    public function reviews(Request $request){
        $request->session()->regenerate();
        $reviews=review::with('clients')->take(3)->where('isActivated',1)->get();
        return json_encode($reviews);
    }

    public function commandes(Request $request){
        $request->session()->regenerate();
        return response(json_encode(client::find(Auth::user()->id)->commandes()->get()),200)->header('Content-type','text/plain');

    }
    
}

