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
  <h2>  List Card</h2>
</div>
<br>
  @php
   $i=count($listcard);
   for($key=0;$key<$i;$key++) {
    @endphp

  <div class="card bg-info text-white">
    <div class="card-header">
    <form action="{{route('cardinfos')}}" method="POST">
    @csrf
        <input type="hidden" id="id" name="id" value="{{$listcard[$key]->id}}">

        <input type="hidden" id="name" name="name" value="{{$listcard[$key]->name}}">
        <button type="submit" class="btn btn-danger">Card Information</button>
  </form>
    </div>
    <div class="card-body">{{$listcard[$key]->name}}</div>
    <div class="card-footer">
    <form action="{{route('getupdateboard')}}" method="POST">
    @csrf
        <input type="hidden" id="id" name="id" value="{{$listcard[$key]->id}}">

        <input type="hidden" id="name" name="name" value="{{$listcard[$key]->name}}">

        <button type="submit" class="btn btn-success">Update Board</button>
  </form>
  <form action="{{route('getlistcard')}}" method="POST">
    @csrf
    <input type="hidden" id="id" name="id" value="{{$listcard[$key]->id}}">

        <input type="hidden" id="name" name="name" value="{{$listcard[$key]->name}}">

        <button type="submit" class="btn btn-warning"> View List card</button>
  </form>
    </div>
  </div>
  <br>
  @php

}
  @endphp
</body>
</html>
