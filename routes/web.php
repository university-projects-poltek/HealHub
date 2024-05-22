<?php

use App\Http\Controllers\ListBarangController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\User;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/listbarang/{id}/{nama}/{jenis}', function($id, $nama, $jenis){
//     return view ('list_barang', compact('id', 'nama', 'jenis'));

// });

// Route::get('/listobat/{id}/{nama}/{jenis}', [ListObatController::class, 'tampilkan']);

Route::get('/listobat/{id}/{nama}/{jenis}', 'ListObatController@tampilkan');

Route::get('/login', 'LoginController@index');
Route::post('/login', 'LoginController@autentikasi');

Route::get('/register', 'RegisterController@pageRegister');


Route::get('/listbarang', [ListBarangController::class, 'tampilkan'] );


// CRUD Products
Route::prefix('/products')->group(function(){
  Route::get('/', [ProductsController::class, 'index']);
  Route::get('/{id}', [ProductsController::class, 'show']);
  Route::post('/', [ProductsController::class, 'store']);
  Route::put('/{id}', [ProductsController::class, 'update']);
  Route::delete('/{id}', [ProductsController::class, 'destroy']);
});