<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\users;
class AutoresController extends Controller
{
    public function Registrarse(Request $request){
        try{            
            $autor = new users;
            $autor -> name = $request->input('name');
            $autor -> email = $request->input('mail');
            $autor -> password = $request->input('password');
            $autor -> save();
            return view('registro', ['autor' => $autor]);
           
        }
        catch(Exception $e){
            return view('registro', ['error' => $true]);
        }
        
    }
   
}
