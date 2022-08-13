<!DOCTYPE html>
<html lang="en">
<head>
  <title>Trello Board</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

<div class="container">
  <h2> All boards</h2>
</div>
<br>
  @php
   $i=count($b);
   for($key=0;$key<$i;$key++) {
    @endphp

  <div class="card bg-info text-white">
    <div class="card-header">
    <form action="{{route('delete')}}" method="POST">
    @csrf
        <input type="hidden" id="boardId" name="boardId" value="{{$b[$key]->id}}">


        <button type="submit" class="btn btn-danger">Delete Board</button>
  </form>
    </div>
    <div class="card-body">{{$b[$key]->name}}</div>
    <div class="card-footer">
    <form action="{{route('getupdateboard')}}" method="POST">
    @csrf
        <input type="hidden" id="boardId" name="boardId" value="{{$b[$key]->id}}">
        <input type="hidden" id="name" name="name" value="{{$b[$key]->name}}">
        <input type="hidden" id="desc" name="desc" value="{{$b[$key]->desc}}">

        <button type="submit" class="btn btn-success">Update Board</button>
  </form>
  <form action="{{route('getlist')}}" method="POST">
    @csrf
        <input type="hidden" id="boardId" name="boardId" value="{{$b[$key]->id}}">
        <input type="hidden" id="name" name="name" value="{{$b[$key]->name}}">
        <input type="hidden" id="desc" name="desc" value="{{$b[$key]->desc}}">

        <button type="submit" class="btn btn-warning"> View List</button>
  </form>
  <form action="{{route('createlist')}}" method="POST">
    @csrf
        <input type="hidden" id="boardId" name="boardId" value="{{$b[$key]->id}}">
        <input type="hidden" id="name" name="name" value="{{$b[$key]->name}}">
        <input type="hidden" id="desc" name="desc" value="{{$b[$key]->desc}}">

        <button type="submit" class="btn btn-primary"> create List</button>
  </form>
    </div>
  </div>
  <br>
  @php

}
  @endphp
</body>
</html>
