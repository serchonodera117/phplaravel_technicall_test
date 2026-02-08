<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;


class StateController extends Controller
{
    function init($name){
        $tile = $name;
        $municipalities=null;

        $token = env("API_KEY");
        $base_query = env("URL_BASE");
        $mun_instruction = env("MUNICIPIOS");
        $url = $base_query. $mun_instruction . $name."?token=" . $token;
        
        
        $response = Http::withoutVerifying()->get($url);

        if($response -> successful()){
            $data = $response ->json();
            $municipalities = $data["response"]["municipios"];

            sort($municipalities);
        }

        return view('state', ['title' => $tile, 'municipios' => $municipalities]);
    }
}
