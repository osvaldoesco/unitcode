@extends('layout.app')

@section('content')

<form action="{{  route('update_post_path', ['post' => $post->id])  }}" method="Post">

	{{ csrf_field() }}<!-- Siempre agregar a los formularion si no dara error -->

	{{method_field('PUT')}}<!-- Ayuda de laravel para metodo put y no post -->

  <div class="form-group">
    <label for="title">Title:</label>
    <input type="text" class="form-control" name="title"  placeholder="" value="{{$post->title}}">
  </div>

  <div class="form-group">
    <label for="description">Description:</label>
    <textarea rows="5" name="description"   class="form-control">{{$post->description}}</textarea>
  </div>

  <div class="form-group">
    <label for="url">Url:</label>
    <input type="text" class="form-control"  name="url" placeholder="" value="{{$post->url}}">
   </div>

  <div class="form-group">
    <button type="submit" class="btn btn-primary">Edit Post</button>
  </div>
  @if(count($errors)>0)
   <!-- Seccion donde se muertran los errores-->

  <div class="alert alert-danger">
  	<ul>
  		@foreach($errors->all() as $error)

  		<li>{{$error}}</li>


  		@endforeach
  		
  	</ul>
  </div>
  @endif

</form>

@endsection