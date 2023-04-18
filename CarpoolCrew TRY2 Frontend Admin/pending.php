<?php
   @include './config.php';
   session_start();
   if(!isset($_SESSION['aid'])){
      header('location:./index.php');
    } else {
       $aid = $_SESSION['aid'];
    }
    $sql="SELECT * from notifications WHERE passad=1 AND drvad=0;";
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
            <a class="nav-link active" aria-current="page" href="alltrips.php">All trips</a>
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
          <h2 style="text-align: center;">Pending Requests</h2>
          <p>
            <?php
              if(isset($_SESSION['error'])) {
                $error=$_SESSION['error'];
                  foreach($error as $error){
                      echo $error;
                };
              }
            ?>
          </p>
            <table class="table table-hover table-bordered table-dark table-responsive">
                  <thead class="thead-active">
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Source</th>
                      <th scope="col">Destination</th>
                      <th scope="col">Date</th>
                      <th scope="col">Km</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
                      $i=1; while($row=$res->fetch_object()) {
                      $trip_id=$row->trip_id;
                      $nid=$row->nid;
                      $strt=$row->strt;
                      $_SESSION['nid']=$nid;
                      $a2 = "SELECT km FROM trip WHERE trip_id=$trip_id;";
                      $b2 = mysqli_query($conn,$a2);
                      $c2=$b2->fetch_assoc();
                      $km=intval($c2['km']);
                      $a3="SELECT src_id, dest_id FROM trip WHERE trip_id=$trip_id";
                      $b3=mysqli_query($conn, $a3);
                      $c3=$b3->fetch_assoc();
                      $src_id=intval($c3['src_id']);
                      $dest_id=intval($c3['dest_id']);
                      $a4="SELECT place_name FROM places WHERE place_id=$src_id";
                      $b4=mysqli_query($conn, $a4);
                      $c4=$b4->fetch_assoc();
                      $src_name=$c4['place_name'];
                      $a5="SELECT place_name FROM places WHERE place_id=$dest_id";
                      $b5=mysqli_query($conn, $a5);
                      $c5=$b5->fetch_assoc();
                      $dest_name=$c5['place_name'];
                    ?>
                    <tr>
                      <th scope="row"><?php echo $i; ?></th>
                        <td><?php echo $src_name; ?></td>
                        <td><?php echo $dest_name; ?></td>
                        <td><?php echo $strt; ?></td>
                        <td><?php echo $km; ?></td>
                    </tr>
                    <?php $i++; } ?>
                  </tbody>
            </table>
            </div>
      </div>
    </main>

    <!-- Javascript file -->

    <script src="app.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  </body>
</html>