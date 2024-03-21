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
<form action="/article" method = "post">
  @csrf
    <div class="form-group">
    <label for="exampleInputName">Name</label>
    <input type="date" class="form-control" id="exampleInputPassword1" placeholder="Enter name" name = "date">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Headers</label>
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter title", name = "name">
    <small id="name" class="form-text text-muted">Its ur title</small>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Article</label>
    <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Enter desc" name = "desc">
  </div>
  <button type="submit" class="btn btn-primary">Save</button>
</form>

@endsection