<?php

use App\Http\Controllers\ContactoController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Artisan;
use App\Mail\Reservaciones;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', [PageController::class,'inicio'])->name('inicio');

Route::get('productos', [PageController::class, 'productos'])->name('productos');

Route::get('wholesale', [PageController::class, 'wholesale'])->name('wholesale');

Route::get('proyectos', [PageController::class, 'proyectos'])->name('proyectos');

Route::get('contacto',[PageController::class,'contacto'])->name('contacto');

Route::post('contactanos',[ContactoController::class,'store'])->name('contactoenvio');


Route::get('/locale/{locale}',function($locale){
    session()->put('locale',$locale);
    return Redirect::back();
})->name('locale');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



Route::get('/adminmaterials', [App\Http\Controllers\HomeController::class, 'adminmaterials'])->name('adminmaterials');

Route::post('/adminmaterials', [App\Http\Controllers\HomeController::class, 'altamaterial'])->name('altamaterial');

Route::put('/adminmaterials/{id}', [App\Http\Controllers\HomeController::class, 'editmaterial'])->name('editmaterial');

Route::get('/actmaterial/{id}', [App\Http\Controllers\HomeController::class, 'actmaterial'])->name('actmaterial');

Route::get('/adminwholesale', [App\Http\Controllers\HomeController::class, 'adminwholesale'])->name('adminwholesale');

Route::post('/adminwholesale', [App\Http\Controllers\HomeController::class, 'altawholesale'])->name('altawholesale');

Route::put('/adminwholesale/{id}', [App\Http\Controllers\HomeController::class, 'editwholesale'])->name('editwholesale');

Route::get('/actwholesale/{id}', [App\Http\Controllers\HomeController::class, 'actwholesale'])->name('actwholesale');

Route::delete('/deletewholesale/{id}', [App\Http\Controllers\HomeController::class, 'deletewholesale'])->name('deletewholesale');


