<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\site_client;

class site_clientController extends Controller
{
    public function showWebSites(){
       return response(json_encode(site_client::take(3)->where('showMain',1)->get()),200)->header('Content-type','text/plain');
    }
}
