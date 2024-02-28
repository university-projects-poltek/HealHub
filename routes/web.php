<?php

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

Route::get('/listobat/{id}/{nama}/{jenis}' , 'ListObatController@tampilkan');

Route::get('/login', 'LoginController@index');
Route::post('/login', 'LoginController@autentikasi');