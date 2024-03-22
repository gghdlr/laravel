@extends('layout')
@section('content')
<div class="card" style = "margin-bottom: 15px;">
  <div class = "card-body">
    <h5 class = "card-title">{{$article->name}}</h5>
    <p class = "card-text">{{$article->desc}}</p>
    <div style = "display: flex;"><a href="/article/{{$article->id}}/edit" class="btn btn-primary">Edit article</a>
    <form action = "/article/{{$article->id}}" method="post">
    @method("DELETE")
    @csrf
        <button type="submit" class="btn btn-danger" style ="margin-left: 10px;">Delete article</button></form></div>
  </div>
</div>

<h4>Comments</h4>
<form action="/comments" method = "post">
  @csrf
    <div class="form-group">
    <label for="exampleInputName">Title</label>
    <input type = "hidden" name = "article_id" value = "{{$article->id}}">
    <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Enter name of comment" name = "title">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Text</label>
    <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Enter comment" name = "text">
  </div>
  <button type="submit" class="btn btn-primary">Save</button>
</form>
@foreach($comments as $comment)
<div class="card">
  <div class = "card-body">
    <h5 class = "card-title">{{$comment->title}}</h5>
    <p class = "card-text">{{$comment->text}}</p>
    @can('comment', $comment)
    <div style = "display: flex;"><a href="/comments/{{$comment->id}}/edit" class="btn btn-primary">Edit comment</a>
    <form action = "/comments/{{$comment->id}}" method="post">
    @method("DELETE")
    @csrf
        <button type="submit" class="btn btn-danger" style ="margin-left: 10px;">Delete comment</button></form>
      </div>
      @endcan
  </div>
</div>
@endforeach
@endsection