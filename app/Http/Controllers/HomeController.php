<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
use App\Models\material;
use App\Models\Wholesale;


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

    // Wholesale methods
    public function adminwholesale(Request $request)
    {
        $texto = $request->texto;

        $wholesales = Wholesale::Where('name','LIKE','%'.$texto.'%')
        ->select('id','clue','name','details','amount','material','application','activo')
        ->orderBy('clue')
        ->paginate(15);

        return view('adminwholesale', compact('wholesales'));
    }

    public function altawholesale(Request $request){

        $request->validate([
            'clave' => 'required|string|max:255',
            'nombre' => 'required|string|max:255',
            'cantidad' => 'required|numeric',
            'detalles' => 'required|string',
            'material' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ], [
            'clave.required' => 'La clave es obligatoria',
            'nombre.required' => 'El nombre es obligatorio',
            'cantidad.required' => 'La cantidad es obligatoria',
            'detalles.required' => 'Los detalles son obligatorios',
            'material.required' => 'La imagen es obligatoria',
            'material.image' => 'El archivo debe ser una imagen',
        ]);

        $alta = new Wholesale;
        $alta->clue = $request->clave;
        $alta->name = $request->nombre;
        $alta->amount = $request->cantidad;
        $alta->details = $request->detalles;

        if ($request->hasFile('material'))
        {
            $name = Str::random(20).'.png';

            // Save to material directory
            $rutaMaterial = public_path().'/storage/material/'.$name;
            Image::make( $request->file('material'))
                    ->resize(800, null, function ($constraint) {
                    $constraint->aspectRatio();
                    })
                    ->save($rutaMaterial);

            // Save to aplicacion directory (same image)
            $rutaAplicacion = public_path().'/storage/aplicacion/'.$name;
            Image::make( $request->file('material'))
                    ->resize(800, null, function ($constraint) {
                    $constraint->aspectRatio();
                    })
                    ->save($rutaAplicacion);

            $alta->material = $name;
            $alta->application = $name;
        }

        $alta->save();

        return back()->with('mensaje','Wholesale item agregado');
    }

    public function editwholesale(Request $request, $id){

        $edit = Wholesale::findOrFail($id);
        $edit->area = $request->area;
        if ($request->hasFile('photo'))
        {
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

        return back()->with('mensaje','Wholesale item actualizado');
    }

    public function actwholesale($id){

        $actwholesale = Wholesale::findOrFail($id);

        if ($actwholesale->activo == 1 )
        {
            $actwholesale->activo = 0;
        }
        else
        {
            $actwholesale->activo = 1;
        }
        $actwholesale->save();
        return back()->with('mensaje','Status actualizado');
    }

    public function deletewholesale($id){
        $wholesale = Wholesale::findOrFail($id);

        // Delete image files if they exist
        if ($wholesale->material) {
            $materialPath = public_path().'/storage/material/'.$wholesale->material;
            if (file_exists($materialPath)) {
                unlink($materialPath);
            }
        }

        if ($wholesale->application) {
            $applicationPath = public_path().'/storage/aplicacion/'.$wholesale->application;
            if (file_exists($applicationPath)) {
                unlink($applicationPath);
            }
        }

        $wholesale->delete();

        return back()->with('mensaje','Wholesale item eliminado correctamente');
    }
}
