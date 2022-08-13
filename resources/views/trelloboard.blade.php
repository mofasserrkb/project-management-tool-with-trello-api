<!DOCTYPE html>
<html lang="en">
<head>
  <title>Board</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

<div class="container">
  <h2>Details Information</h2>
  <div class="card">
    <div class="card-header">Trello Board</div>
    <div class="card-body"><a href="{{route('getorgboard')}}">Click for All Trello Board</a></div>
    <div class="card-footer"><a href="{{route('getcreateboard')}}">Click for Creating New Board</a></div>

  </div>
</div>

</body>
</html>
