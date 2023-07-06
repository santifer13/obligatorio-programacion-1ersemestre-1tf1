<?php

namespace App\Http\Controllers;
use App\Models\posts;
use Illuminate\Http\Request;
use App\Http\Controllers\AutoresController;
use Illuminate\Support\Facades\Redirect;


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

    public function MisPosts(){
        $posts = posts::where('autor', auth()->user()->id)->get();
        return view('misposts', ['posts' => $posts]);
    }
    public function Eliminar($id)
    {   
            posts::where('id', $id)
            ->where('autor', auth()->user()->id)
            ->delete();
            return Redirect::to('/mostrar');     
       
    }
   
}
