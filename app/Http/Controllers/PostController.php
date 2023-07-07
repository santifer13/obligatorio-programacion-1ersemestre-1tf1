<?php

namespace App\Http\Controllers;
use App\Models\posts;
use Illuminate\Http\Request;
use App\Http\Controllers\AutoresController;
use Illuminate\Support\Facades\Redirect;

class PostController extends Controller
{
	public $meses = ['Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'];
	public $numeroMes = 1;

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
		$posts = $this->CambiarIdPorNombre($posts);
		$meses = $this->Calendario();
	   return view('inicio', compact('posts', 'meses'));
	}
	
	public function Calendario(){
		$mesesAmostrar = [];
		foreach ($this->meses as $mes){
			$contador = posts::whereMonth('created_at', $this->numeroMes)->count();
			if($contador > 0){
				array_push($mesesAmostrar , $mes);
			}
			$this->numeroMes = $this->numeroMes + 1;
		}		
		return $mesesAmostrar;
	}

	public function MostrarDatosMes($mes){
		foreach ($this->meses as $mesForeach){
			if($mes == $mesForeach){
				$posts = posts::whereMonth('created_at', $this->numeroMes)->get();
				$posts = $this->CambiarIdPorNombre($posts);
				return view('vistames', compact('posts'));
			}
			$this->numeroMes = $this->numeroMes + 1;
		}	
	}

	public function CambiarIdPorNombre($posts){
		foreach ($posts as $datos){
			$users=AutoresController::MostrarDatosUsuario($datos->autor);
			 $datos->autor=$users->name;
		}
		return $posts;
	}
}
