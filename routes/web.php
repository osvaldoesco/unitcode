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

//RUTAS DE POST

//Ruta para mostrar listado POST
Route::name('posts_path')->get('/posts','PostsController@index');


//Rutas para ingresar Post a bd
Route::name('create_post_path')->get('/posts/create', 'PostsController@create');

Route::name('store_post_path')->post('/posts', 'PostsController@store');



//Ruta para mostrar Post indivudual
Route::name('post_path')->get('/posts/{post}','PostsController@show');



//Rutas para Editar Post
Route::name('edit_post_path')->get('/posts/{post}/edit', 'PostsController@edit');


Route::name('update_post_path')->put('/posts/{post}', 'PostsController@update');

//Rutas para eliminar Post
route::name('delete_post_path')->delete('/posts/{post}', 'PostsController@delete');

//FIN RUTAS DE POST




