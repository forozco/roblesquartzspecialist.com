<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
use App\Models\material;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function adminmaterials(Request $request)
    {
        $texto =$request->texto;


        $materiales = material::Where('name','LIKE','%'.$texto.'%')
        ->select('id','clue','name','details','amount','material','application','activo')
        ->orderBy('clue')
        ->paginate(15);

        return view('adminmaterials', compact('materiales'));
    }

    public function altamaterial(Request $request){

        $alta = new  material;
        $alta->clue = $request->clave;
        $alta->name = $request->nombre;
        $alta->amount = $request->cantidad;
        $alta->details = $request->detalles;



        if ($request->hasFile('material'))
        {
            
            //$ordenNueva->frontphoto = $request->file('frontphoto')->store('public');
            $name = Str::random(20).'.png';
            $ruta = public_path().'/storage/material/'.$name;
        
            Image::make( $request->file('material'))
                    ->resize(800, null, function ($constraint) {
                    $constraint->aspectRatio();
                    })
                    ->save($ruta);
            
            $alta->material = $name;
        }

        if ($request->hasFile('aplicacion'))
        {
            
            //$ordenNueva->frontphoto = $request->file('frontphoto')->store('public');
            $name = Str::random(20).'.png';
            $ruta = public_path().'/storage/aplicacion/'.$name;
        
            Image::make( $request->file('aplicacion'))
                    ->resize(800, null, function ($constraint) {
                    $constraint->aspectRatio();
                    })
                    ->save($ruta);
            
            $alta->application = $name;
        }

        $alta->save();

        return back()->with('mensaje','Material agregado');
    }

    public function editmaterial(Request $request, $id){

        $edit =  material::findOrFail($id);
        $edit->area = $request->area;
        if ($request->hasFile('photo'))
        {
            
            //$ordenNueva->frontphoto = $request->file('frontphoto')->store('public');
            $name = Str::random(10).$request->file('photo')->getClientOriginalName();
            $ruta = public_path().'/storage/areas/'.$name;
        
            Image::make( $request->file('photo'))
                    ->resize(300, null, function ($constraint) {
                    $constraint->aspectRatio();
                    })
                    ->save($ruta);
            
            $edit->image = $name;
        }
        $edit->save();

        return back()->with('mensaje','Material actualizado');
    }
    public function actmaterial($id){ 
    
        $actmaterial= material::findOrFail($id);

        if ($actmaterial->activo == 1 )
        {
            $actmaterial->activo = 0;
        }
        else
        {
            $actmaterial->activo = 1;
        }
        $actmaterial->save();
        return back()->with('mensaje','Status actualizado');
    }
}
