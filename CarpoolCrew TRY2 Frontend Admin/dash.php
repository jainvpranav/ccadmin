<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link href="./styledash.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>
<body>
  <nav class="navbar navbar-fixed-top w-100 navbar-custom navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="./dash.php">Akele beCar</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="pending.php">Pending</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="ongoing.php">Ongoing</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="alltrips.php">All Trips</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="pass.php">Passenger</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="drv.php">Driver</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="./logout.php">Logout</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <main>
      <div class="box">
        <div class="inner-box">
          <div class="dash">
            <div class="dash-row-1">
              <button class="btn btn-warning" onclick="ongoing()">Ongoing</button>
              <button class="btn btn-danger" onclick="pending()">Pending</button>
            </div>
            <br><br>
            <div class="dash-row-2">
              <button class="btn btn-info" onclick="driver()">Drivers</button>
              <button class="btn btn-success"onclick="alltrip()">All trips</button>
            </div>
            <br><br>
            <button class="btn btn-secondary" onclick="passenger()">Passengers</button>
          </div>
        </div>
      </div>
    </main>
    <script>
      function ongoing() {
        window.history.href( null, null, window.location.href="./ongoing.php" );
      }
      function pending() {
        window.history.href( null, null, window.location.href="./pending.php" );
      }
      function driver() {
        window.history.href( null, null, window.location.href="./drv.php" );
      }
      function passenger() {
        window.history.href( null, null, window.location.href="./pass.php" );
      }
      function alltrip() {
        window.history.href( null, null, window.location.href="./alltrips.php" );
      }
    </script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>