<?php
   @include './config.php';
   session_start();
   if(!isset($_SESSION['aid'])){
      header('location:./index.php');
    } else {
       $aid = $_SESSION['aid'];
    }
    $sql="SELECT * from notifications WHERE passad=1 AND drvad=1;";
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
          <h2 style="text-align: center;">All trips</h2>
            <table class="table table-light table-borderless table-hover table-responsive-sm">
                    <thead class="table-dark">
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Src</th>
                        <th scope="col">Dest</th>
                        <th scope="col">Km</th>
                        <th scope="col">Price</th>
                        <th scope="col">Pass Name</th>
                        <th scope="col">Drv name</th>
                        <th scope="col">EndTour</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                          $i=1; while($row=$res->fetch_object()) {
                          $trip_id=$row->trip_id;
                          $nid=$row->nid;
                          $pass_id=$row->pass_id;
                          $endtour=$row->endtour;
                          $a6="SELECT usrname,usrphone FROM usrinfo WHERE usrid=$pass_id;";
                          $b6=mysqli_query($conn, $a6);
                          $c6=$b6->fetch_assoc();
                          $passname=$c6['usrname'];
                          $passph=$c6['usrphone'];
                          $_SESSION['nid']=$nid;
                          $a2 = "SELECT km FROM trip WHERE trip_id=$trip_id;";
                          $b2 = mysqli_query($conn,$a2);
                          $c2=$b2->fetch_assoc();
                          $km=intval($c2['km']);
                          $a3="SELECT src_id, dest_id, km FROM trip WHERE trip_id=$trip_id";
                          $b3=mysqli_query($conn, $a3);
                          $c3=$b3->fetch_assoc();
                          $src_id=intval($c3['src_id']);
                          $dest_id=intval($c3['dest_id']);
                          $km=intval($c3['km']);
                          $drvid=$row->drv_id;
                          $drvres="SELECT pricekm, drvname FROM drvinfo WHERE drvid=$drvid;";
                          $drvres1=mysqli_query($conn, $drvres);
                          $drvres2 = $drvres1->fetch_assoc();
                          $pricekm=intval($drvres2['pricekm']);
                          $drvname=$drvres2['drvname'];
                          $price=$km*$pricekm;
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
                        <td><?php echo $km; ?></td>
                        <td><?php echo $price; ?></td>
                        <td><?php echo $passname; ?></td>
                        <td><?php echo $drvname; ?></td>
                        <td><?php if($endtour==1) {
                        ?><p class="btn btn-success">Ended</p></td>
                        <td><?php }else {
                        ?><p class="btn btn-primary">Ongoing</p></td>
                      </tr>
                      <?php $i++; }} ?>
                    </tbody>
            </table>
          </form>
          
        </div>
      </div>
    </main>

    <!-- Javascript file -->

    <script src="app.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  </body>
</html>
