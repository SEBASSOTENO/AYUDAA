<?php

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

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/pd1', function () {
//     return view('ejepdf');
// });

Route::resource('artesano', 'ArtesanoController');

Route::resource('usuario', 'UsuariosController');

Route::resource('producto', 'ProductosController');

Route::resource('taller', 'TalleresController');

Route::resource('venta', 'VentasController');

Route::get('/pdf', 'VentasController@exportPDF');

Route::get('/combo', 'VentasController@store');

Route::get('/filtrado', 'VentasController@filtrado');

Route::get('/pdfventa', 'VentasController@pdfventa')->name('pdfventa');

