<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
        <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

    <!-- use form.js script to validate main form --> 
    <script src="https://code.angularjs.org/1.2.21/angular.js"></script>
    <!--<link rel="stylesheet" href="style.css" />-->
    <script src="https://code.highcharts.com/highcharts.src.js"></script>
    <title>Health App</title>

    <style>
        /* Made with love by Mutiullah Samim*/

@import url('https://fonts.googleapis.com/css?family=Numans');

html,body{
background-image: url('https://i.ytimg.com/vi/BEP5tJYMKbI/maxresdefault.jpg');
background-size:cover;
background-repeat: no-repeat;
height: auto;
font-family: 'Numans', sans-serif;
}



label,h4,h5{
    color:white;
}
h3{
    color:green;
}
  form { 
      margin: 10%; 
  }
  .errorHeader {  
      color: red;
      /* visibility: hidden; */ 
      display: none; 
  }

    </style>
   
  </head>
  <body class="text-center" data-new-gr-c-s-check-loaded="14.990.0" data-gr-ext-installed="">

    <nav class="navbar sticky-top navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid ">
          <a class="navbar-brand" href="#">Health App</a>
          <?php
          include("sql.php");
          $error=" ";
            session_start();

            if(isset($_SESSION['User']))
            {
                $huser=$_SESSION['User'];
                $sql0 = "SELECT * From appuser WHERE user_email='".$huser."'";
                $res = mysqli_query($conn,$sql0);
                $row = mysqli_fetch_assoc($res);
                $uid=$row["userid"];
                echo '<h5> Welcome <span style="color:blue">' . $huser.'</span></h5>';
            }
            else
            {
                header("location:login.php");
            }
          ?>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end" id="navbarNavDropdown">
            <ul class="navbar-nav" >
              <li class="nav-item" >
                <a class="nav-link " aria-current="page" href="home.php">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link " href="/miniproject/.vs/about.html">About Us</a>
              </li>
           
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Blogs
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <li><a class="dropdown-item" href="/miniproject/.vs/exblog.html">Exercise</a></li>
                    <li><a class="dropdown-item" href="/miniproject/.vs/foodblog.html">Food</a></li>
                    <li><a class="dropdown-item" href="/miniproject/.vs/exvlog.html">Videos</a></li>
                </ul>
              </li>
              <li class="nav-item">
                <a class="nav-link " href="contact.php">Contact</a>
              </li>
              </ul>

              <div class="float-right mx-1 " >
                <a href="edit.php"><button class="btn btn-secondary ">Edit</button></a> 
                <a href="logout.php?logout"><button class="btn btn-secondary ">Logout</button></a> 
              </div>
          </div>
        </div>
      </nav>


      <?php
if(isset($_POST["act1"])){  $act1=$_POST["act1"];}
if(isset($_POST["act2"])){  $act2=$_POST["act2"];}
if(isset($_POST["act3"])) { $act3=$_POST["act3"];}
if(isset($_POST["act4"])) { $act4=$_POST["act4"];}

if(isset($_POST["time1"])) {  $time1=$_POST["time1"];}
if(isset($_POST["time2"])) { $time2=$_POST["time2"];}
if(isset($_POST["time3"])) {  $time3=$_POST["time3"];}
if(isset($_POST["time4"])) {  $time4=$_POST["time4"];}
if(isset($_POST["date"])) {   $date=$_POST["date"]; }

  if(isset($_POST["time1"]))
  {  $sql1 = "SELECT * FROM activity where act_name='".$act1."'";
    $result = mysqli_query($conn, $sql1);
    $row = mysqli_fetch_assoc($result);
    $bcal=$time1*$row["act_bcal"];}
  if(isset($_POST["time2"]))
  {  $sql1 = "SELECT * FROM activity where act_name='".$act2."'";
    $result = mysqli_query($conn, $sql1);
    $row = mysqli_fetch_assoc($result);
    $bcal=$bcal+$time2*$row["act_bcal"];}
  if(isset($_POST["time3"]))
  {  $sql1 = "SELECT * FROM activity where act_name='".$act3."'";
    $result = mysqli_query($conn, $sql1);
    $row = mysqli_fetch_assoc($result);
    $bcal=$bcal+$time3*$row["act_bcal"];}
  if(isset($_POST["time4"]))
  {  $sql1 = "SELECT * FROM activity where act_name='".$act4."'";
    $result = mysqli_query($conn, $sq1);
    $row = mysqli_fetch_assoc($result);
    $bcal=$bcal+$time4*$row["act_bcal"];}

    if(isset($_POST["submit"])) {

    $sql1 = "INSERT INTO track_record (userid,track_date,track_bcal) VALUES ('".$uid."','".$date."','".$bcal."')";

      if (mysqli_query($conn,$sql1)) {
        echo '<center><div style="background-color:white"><h3><b>You burnt : <span style="color:red">' . $bcal .'</span> calories</b></h3></div></center>';
      } else {
            echo "Sorry for the inconvinience";
      }
     }

            ?>
<div class="position-relative overflow-hidden p-3 p-md-5 m-md-3 text-center" style="background-color:rgba(0,0,0,0.5)">
      <h4>Track your <span style="color:red">BURN</span></h4>
        <center style="padding-left: 15%;padding-right: 15%;">
        <form class="row g-3 my-1 " method="post">


            <div class="form-group col-md-6">
                <label class="form-label" >Activity 1</label>
              <select class="form-control" name="act1" placeholder="select" id="">
                <option value="" disabled selected >select</option>
                <?php
                $sql1 = "select act_name from activity";
                $result = mysqli_query($conn, $sql1);
                
                if (mysqli_num_rows($result) > 0) {
                        while($row = mysqli_fetch_assoc($result)) {   
                  ?>
                <option> <?php echo $row["act_name"];?> </option>
                <?php
                    }
                } 
                else {
                    echo "<center><h2>No Activity</h2><center>";
                }
                ?>
              </select>
            </div>
           
    
 
           
            <div class="form-group col-md-6">
                <label for="time" class="form-label" >Time</label>
              <select class="form-control" name="time1" id="">
                <option value="0" disabled selected >select</option>
                <option value="0.25">15 mins</option>
                <option value="0.5">30 mins</option>
                <option value="1">1 hour</option>
                <option value="2">2 hour</option>
              </select>
            </div>
        
            <div class="form-group col-md-6">
                <label class="form-label" >Activity 2</label>
              <select class="form-control" name="act2" id="">
                <option value="" disabled selected >select</option>
                <?php
                $sql1 = "select act_name from activity";
                $result = mysqli_query($conn, $sql1);
                
                if (mysqli_num_rows($result) > 0) {
                        while($row = mysqli_fetch_assoc($result)) {   
                  ?>
                <option> <?php echo $row["act_name"];?> </option>
                <?php
                    }
                } 
                else {
                    echo "<center><h2>No Activity</h2><center>";
                }
                ?>
              </select>
            </div>
           
            <div class="form-group col-md-6">
                <label for="time" class="form-label" >Time</label>
              <select class="form-control" name="time2" id="">
                <option value="0" disabled selected >select</option>
                <option value="0.25">15 mins</option>
                <option value="0.5">30 mins</option>
                <option value="1">1 hour</option>
                <option value="2">2 hour</option>
              </select>
            </div>

            <div class="form-group col-md-6">
                <label class="form-label" >Activity 3</label>
              <select class="form-control" name="act3" id="">
                <option value="" disabled selected >select</option>
                <?php
                $sql1 = "select act_name from activity";
                $result = mysqli_query($conn, $sql1);
                
                if (mysqli_num_rows($result) > 0) {
                        while($row = mysqli_fetch_assoc($result)) {   
                  ?>
                <option> <?php echo $row["act_name"];?> </option>
                <?php
                    }
                } 
                else {
                    echo "<center><h2>No Activity</h2><center>";
                }
                ?>
              </select>
            </div>
           
            <div class="form-group col-md-6">
                <label for="time" class="form-label" >Time</label>
              <select class="form-control" name="time3" id="">
                <option value="0" disabled selected >select</option>
                <option value="0.25">15 mins</option>
                <option value="0.5">30 mins</option>
                <option value="1">1 hour</option>
                <option value="2">2 hour</option>
              </select>

            </div> <div class="form-group col-md-6">
                <label for="activity" class="form-label" >Activity 4</label>
              <select class="form-control" name="act4" id="">
                <option value="" disabled selected >select</option>
                <?php
                $sql1 = "select act_name from activity";
                $result = mysqli_query($conn, $sql1);
                
                if (mysqli_num_rows($result) > 0) {
                        while($row = mysqli_fetch_assoc($result)) {   
                  ?>
                <option> <?php echo $row["act_name"];?> </option>
                <?php
                    }
                } 
                else {
                    echo "<center><h2>No Activity</h2><center>";
                }
                ?>
              </select>
            </div>
           
            <div class="form-group col-md-6">
                <label for="time" class="form-label" >Time</label>
              <select class="form-control" name="time4" id="">
                <option value="0" disabled selected >select</option>
                <option value="0.25">15 mins</option>
                <option value="0.5">30 mins</option>
                <option value="1">1 hour</option>
                <option value="2">2 hour</option>
              </select>
            </div>
         
            <center>
            <div class="col-md-4">
                <label for="validationDefault02" class="form-label">Date</label>
                <input type="date"  name="date" class="form-control" id="validationDefault02" min="2021-2-20" required>
              </div>

              <div class="col-md-2">
              <button class="btn btn-success my-2" name="submit" type="submit" value="Submit">Submit</button>
              </div>
            </center>
          
        </form>
        </center>
</div> 

<div class="position-relative overflow-hidden p-3 p-md-4 m-md-3 text-center" style="background-color:rgba(180,180,180,0.5)">
      <h4 style="color:white;"><b>Track</b></h4><br/>
      <center><div id="container" style="height:auto; width: auto">
    
      <?php
 $sql1 = "select username,track_date,track_bcal,track_ical from appuser,track_record where appuser.userid=track_record.userid='$uid'";
  $result = mysqli_query($conn, $sql1);

  if (mysqli_num_rows($result) > 0) {
?>  
     <center>
    <table class="table table-striped table-light table-bordered">
    <thead>
    <tr>
    <th scope="col"> Name </th>
    <th scope="col"> Date </th>
    <th scope="col"> Calories Burnt </th>
    <th scope="col"> Calories Intake </th>
    </tr>
  </thead>
  <tbody>
    <?php   
        while($row = mysqli_fetch_assoc($result)) {
          ?>
          <tr  scope="row">
    <td ><?php echo $row["username"];?> </td>
    <td ><?php echo $row["track_date"];?> </td>
    <td><?php echo $row["track_bcal"];?> </td>
    <td><?php echo $row["track_ical"];?> </td>
</tr>
        </tbody>
        </center>
<?php
      
    }
  } 
  else {
    echo "<center><h2><b>User Not Found</b></h2><center>";
  }

?>

    </div></center>

</div> 


    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
    -->

    <footer class="footer " style="position: fixed; bottom: 0;">
        <div class="container">
            <p style="color:white">© Health App 2020-2021</p>
        </div>
      </footer>

  </body>
</html>
