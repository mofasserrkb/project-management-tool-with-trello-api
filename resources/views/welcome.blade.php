<!DOCTYPE html>
<html lang="en">
<head>
  <title>Authorization</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

<div class="container">
  <h2> Authorization</h2>
  <form action="{{route('getuser')}}" method="POST">
    @csrf
    <div class="form-group">
      <label for="apikey">API KEY:</label>
      <input type="text" class="form-control" id="apikey" placeholder="Enter Api key" name="apikey">
    </div>
    <div class="form-group">
      <label for="Token">Token:</label>
      <input type="text" class="form-control" id="token" placeholder="Enter Token" name="token">
    </div>


    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
</div>

</body>
</html>
