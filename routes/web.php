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

route::get('/', 'HomeController@home');

route::get('/pertanyaan', 'PertanyaanController@index');
route::get('/pertanyaan/create', 'PertanyaanController@create');
route::post('/pertanyaan', 'PertanyaanController@store');
route::get('/jawaban/{pertanyaan_id}', 'JawabanController@index');
route::post('/pertanyaan/{pertanyaan_id}', 'JawabanController@store');
route::delete('/pertanyaan/{id}', 'PertanyaanController@destroy');
route::get('/pertanyaan/{id}', 'PertanyaanController@show');
route::get('/pertanyaan/{id}/edit', 'PertanyaanController@edit');
route::put('/pertanyaan/{id}', 'PertanyaanController@update');


// /pertanyaan/create	GET	PertanyaanController@create	menampilkan form untuk membuat pertanyaan baru
// /pertanyaan	POST	PertanyaanController@store	menyimpan data baru ke tabel pertanyaan
// /jawaban/{pertanyaan_id}	GET	JawabanController@index	menampilkan jawaban dari pertanyaan dengan id tertentu
// /jawaban/{pertanyaan_id}	POST	JawabanController@store	menyimpan jawaban baru untuk pertanyaan dengan id tertentu