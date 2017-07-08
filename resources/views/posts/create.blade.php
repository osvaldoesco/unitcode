@extends('layout.app')


@section('content')


<form action="{{  route('store_post_path')  }}" method="post">

	{{ csrf_field() }}<!-- Siempre agregar a los formularion si no dara error -->


  <div class="form-group">
    <label for="title">Title:</label>
    <input type="text" class="form-control" name="title"  placeholder="" value="{{old('title')}}">
  </div>

  <div class="form-group">
    <label for="description">Description:</label>
    <textarea rows="5" name="description"   class="form-control">{{old('description')}}</textarea>
  </div>

  <div class="form-group">
    <label for="url">Url:</label>
    <input type="text" class="form-control"  name="url" placeholder="" value="{{old('url')}}">
   </div>

  <div class="form-group">
    <button type="submit" class="btn btn-primary">Create Post</button>
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