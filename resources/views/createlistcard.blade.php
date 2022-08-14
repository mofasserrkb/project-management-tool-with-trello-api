<!DOCTYPE html>
<html lang="en">
<head>
  <title>Create list </title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

<div class="container">
  <h2>Create list card </h2>
  <form action="{{route('createlistcards')}}" method="POST">
    @csrf
    <div class="form-group">
        <input type="hidden" id="id" name="id" value="{{$id}}">
      <label for="name">Name:</label>
      <input type="text" class="form-control" id="name" placeholder="Enter name" name="name">
    </div>
    <div class="form-group">

      <label for="description">Description:</label>
      <input type="text" class="form-control" id="name" placeholder="Enter Description" name="description">
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
  </form>

</div>

</body>
</html>
