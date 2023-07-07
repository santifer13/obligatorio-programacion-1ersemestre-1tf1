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

    public function VerDatosModificar($id){
        $posts=posts::where('id',$id)
        ->where('autor', auth()->user()->id)
        ->first();
        return view('modificarpost', ['posts' => $posts]);
    }

    public function Modificar(Request $request){
        try{            
            $posts=posts::where('id', $request->input('id'))
            ->where('autor', auth()->user()->id)
            ->first();
            $posts->id = $request->input('id');
            $posts -> titulo = $request->input('title');
            $posts -> cuerpo = $request->input('body');
            $posts -> autor = auth()->user()->id; 
            $posts -> save();
            return Redirect::to('/mostrar');             
        }
        catch(Exception $e){
            return view('modificarpost', ['error' => $true]);
        }        
    }
    
    public function Eliminar($id){   
        posts::where('id', $id)
        ->where('autor', auth()->user()->id)
        ->delete();
        return Redirect::to('/mostrar');           
    }

    public function Paginar(){
        $posts = posts::paginate(3); 
        return view('inicio', compact('posts'));
    }

   
}
