<?php

namespace unitcode\Http\Controllers;

use Illuminate\Http\Request;
use unitcode\Post;
use unitcode\Http\Requests\UpdatePostRequest;

class PostsController extends Controller
{
    public function index(){

    	//::all() llama todos los registros
    	$posts = Post::orderBy('id', 'desc')->paginate(10);//Obtiene todos los registros de la base.
    	return view("posts.index")->with(['posts' => $posts]);
    }


    //Redirecciona a el formulario
    public function create(){

    	return view('posts.create');

    }


    //Almacena un nuevo registro en la base de datos
    public function store(Request $request){

    	$this->validate($request,['title'=> 'required', 'url' => 'required|url']);//Validacion de datos requeridos

		

    	

    	$post = new Post;
    	$post->title = $request->get('title');
    	$post->description = $request->get('description');
    	$post->url = $request->get('url');
    	$post->save();

    	return redirect()->route('posts_path');


    	//Otra forma $post = Post::create($request->only('title','description','url'));
    }


    //Muestra un dato en especifico
     public function show(Post $post){// otra forma $postId

     	//$post = Post::find($postId);

     	//if(is_null($post)){	abort(404);}

    	return view("posts.show")->with(['post'=> $post]);
    }


        //Funcion para editar
     public function edit(Post $post){


    	return view("posts.edit")->with(['post'=> $post]);
    }

    //funcion que ingresa los datos de edicion
    public function update(Post $post, UpdatePostRequest $request){
    	//Forma1 obsoleta
    	//$post->title = $request->get('title');
    	//$post->description = $request->get('description');
    	//$post->url = $request->get('url');
    	//$post->save();

    	//Forma 2
    	$post->update($request->only('title','description','url'));
    	return view('posts.show')->with(['post'=> $post]);
    	//Otra forma de redireccionar
    	//return redirect()->route('post_path', 'post' => $post->id); 
    }

    //funcion para eliminar un Post
    public function delete(Post $post){
    	$post->delete();
    	return redirect()->route('posts_path');

    }
    
}
