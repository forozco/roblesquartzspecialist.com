<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sucursal;
use App\Mail\Contactanos;
use Illuminate\Support\Facades\Mail; 


class ContactoController extends Controller
{
    public function index(){
      
        return view('contacto');
    }

    public function store(Request $request){
        $correo = new Contactanos($request->all());  
        Mail::to('info@roblesquartzspecialist.com')->send($correo);

        
        return redirect()->route('inicio')->with('info','Mensaje enviado');
    }

    

}
