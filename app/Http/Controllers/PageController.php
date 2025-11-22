<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\Reserva;
use App\Models\material;;
use Illuminate\Support\Facades\Mail; 




class PageController extends Controller
{
     public function inicio(){
        
        return view('welcome');
    }
    
    public function productos(){

        $materiales = material::Where('activo',1)
        ->select('id','clue','name','details','amount','material','application','activo')
        ->orderBy('clue')
        ->get();

        return view('productos',compact('materiales'));
    } 

    public function proyectos(){
        $materiales = material::Where('activo',1)
        ->select('id','clue','name','details','amount','material','application','activo')
        ->orderBy('clue')
        ->get();
        return view('proyectos',compact('materiales'));
    } 

    public function contacto(){
        return view('contacto');
    }

    


}
