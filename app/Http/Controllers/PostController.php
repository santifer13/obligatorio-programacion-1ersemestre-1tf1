<?php

namespace App\Http\Controllers;
use App\Models\posts;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function Postear(Request $request){
        try{            
            $posts = new posts;
            $posts -> titulo = $request->input('title');
            $posts -> cuerpo = $request->input('body');
            $posts -> autor = 1;//$request->input('pas');
            $posts -> save();
            return view('crearpost', ['posteo' => $posts]);
           
        }
        catch(Exception $e){
            return view('crearpost', ['error' => $true]);
        }
        
    }
}
