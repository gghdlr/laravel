@extends('layout')
@section('content')
<div class="alert-danger">
   @if($errors->any())
   <ul>
      @foreach($errors->all() as $error)
      <li>
        {{$error}}
</li>
      @endforeach
</ul>
    @endif
</div>
<form action="/comments/{{$comment->id}}" method = "post">
  @csrf
  @method("PUT")
    <div class="form-group">
    <label for="exampleInputName">Title</label>
    <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Enter name" name = "title" value="{{$comment->title}}">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Text</label>
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name = "text" 
    value="{{$comment->text}}">
  </div>
  <button type="submit" class="btn btn-primary">Save</button>
</form>

@endsection