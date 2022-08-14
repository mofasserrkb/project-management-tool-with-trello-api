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
  <h2>  List Card Information</h2>
</div>
<br>


  <div class="card bg-info text-white">
    <div class="card-header">Card ID:{{$listcard->id}}</div>
    <div class="card-body">Card Name:{{$listcard->name}}</div>
    <div class="card-footer">{{$listcard->desc}}   </div>
  </div>
  <br>

</body>
</html>
