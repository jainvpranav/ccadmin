<?php
   @include './config.php';
   session_start();
   if(!isset($_SESSION['aid'])){
      header('location:./index.php');
    } else {
       $aid = $_SESSION['aid'];
    }
    $sql="SELECT * from usrinfo;";
    $res=mysqli_query($conn, $sql);

    
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="style1.css" />
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
        <div class="inner-box ">
          <form action="" class="form-wrap">
          <h2 style="text-align: center;">Passengers</h2>
            <table class="table table-light table-borderless table-hover table-responsive-sm">
                    <thead class="table-dark">
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">passid</th>
                        <th scope="col">passname</th>
                        <th scope="col">passemail</th>
                        <th scope="col">passphone</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                          $i=1; while($row=$res->fetch_object()) {
                          $id= $row->usrid;
                          $name= $row->usrname;
                          $email= $row->usremail;
                          $ph= $row->usrphone;
                        ?>
                      <tr>
                        <th scope="row"><?php echo $i; ?></th> 
                        <td><?php echo $id; ?></td>
                        <td><?php echo $name; ?></td>
                        <td><?php echo $email; ?></td>
                        <td><?php echo $ph; ?></td>
                      </tr>
                      <?php $i++; } ?>
                    </tbody>
            </table>
          </form>
          
        </div>
      </div>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  </body>
</html>
