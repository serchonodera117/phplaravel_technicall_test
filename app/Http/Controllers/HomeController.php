<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;


class HomeController extends Controller
{
    function init(){

        $states = null;
        $searchList = null;
        
        $token = env("API_KEY");
        $base_query = env("URL_BASE");
        $state_instruction = env("ESTADOS");
      
        $url = $base_query . $state_instruction . $token;

        $response = Http::withoutVerifying()->get($url);
        
        if($response -> successful()){
            $data = $response ->json();
            $states = $data['response']['estado'];
            sort($states);
        }
   
        return view('home', ['states' => $states]);
    }
}
