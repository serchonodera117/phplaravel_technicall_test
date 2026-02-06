<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    function index(){

        $name = "Cherchin";
        // $cosas = array();
        //$key_written_by_user
        
        
        /*ejemplo de codigo

        //al escribir en una caja de texto
        function writeKey(event){  -- escrita por una caa de texto -- $key=event.text }
        
        //---al presionar un botón
        function getdata(){
           $cosas = await http.get(key_written_by_user)
        }
        
          */
        return view('home', compact('name'));
    }
}
