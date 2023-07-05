<?php

namespace App\Http\Controllers;
use App\Models\posts;
use Illuminate\Http\Request;
use App\Http\Controllers\AutoresController;


class PostController extends Controller
{
    public function Postear(Request $request){
        try{            
            $posts = new posts;
            $posts -> titulo = $request->input('title');
            $posts -> cuerpo = $request->input('body');
            $posts -> autor = $request->input('autor'); 
            $posts -> save();
            return view('crearpost', ['posteo' => $posts]);
           
        }
        catch(Exception $e){
            return view('crearpost', ['error' => $true]);
        }

        
    }
    public static function ObtenerPost($post){
    
        return posts::findOrFail($post);     
    
     }

    public function MisPosts(){
        $post = posts::where('autor', auth()->user()->id)->get();
     dd($post);
    }

   
}
