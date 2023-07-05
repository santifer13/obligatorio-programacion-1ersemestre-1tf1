<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\users;
use Illuminate\Support\Facades\Auth;
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
    public function Logearse(Request $request){
        
        $email = $request->input('mail');
        $password = $request->input('password');
        $user = users::where('email', $email)->first();
        if ($user && $user->password == $password) {
            Auth::loginUsingId($user->id);
           return redirect()->intended('inicio');
        } else {
            return view('logeo', ['error' => true]);
        }
       
        
    }
    public function CerrarSesion()
{
    if (Auth::check()) {
        Auth::logout();    
        return redirect('/');
    } 
 }
}
