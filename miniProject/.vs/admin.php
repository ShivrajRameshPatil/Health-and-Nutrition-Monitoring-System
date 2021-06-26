<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

    <title>Health App</title>
    <style>
        html,body{
background-color:rgba(120,120,120);
background-size:cover;
background-repeat: no-repeat;
height: 100%;
font-family: 'Numans', sans-serif;
}

label,h2{
    color:white;
}

        </style>
  </head>
  <body>
    <nav class="navbar sticky-top navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid ">
          <a class="navbar-brand" href="#">Health App</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end" id="navbarNavDropdown">
            <ul class="navbar-nav" >
              <li class="nav-item" >
                <a class="nav-link active" aria-current="page" href="">Dashboard</a>
              </li>

              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  System Content
                </a>
                <ul class="dropdown-menu " aria-labelledby="navbarDropdownMenuLink">
                  <li><a class="dropdown-item" href="activitytrack.php">Activity</a></li>
                  <li><a class="dropdown-item" href="foodtrack.php">Food</a></li>
                </ul>
              </li>
            </ul>

            <div class="float-right mx-1 " >
                <a href="login.php"><button class="btn btn-secondary active">Logout</button></a> 
            </div>
          </div>
        </div>
      </nav>
<?php
require_once('sql.php');
 $sql1="SELECT COUNT(*) as total FROM appuser";
 $result=mysqli_query($conn,$sql1);
 $row=mysqli_fetch_array($result);
 $data1 = $row['total'];

 $sql1="SELECT COUNT(*) as total FROM activity";
 $result=mysqli_query($conn,$sql1);
 $row=mysqli_fetch_array($result);
 $data2 = $row['total'];

 $sql1="SELECT COUNT(*) as total FROM food";
 $result=mysqli_query($conn,$sql1);
 $row=mysqli_fetch_array($result);
 $data3 = $row['total'];

 $sql1="SELECT COUNT(*) as total FROM inspiring_stories";
 $result=mysqli_query($conn,$sql1);
 $row=mysqli_fetch_array($result);
 $data4 = $row['total'];

 ?>
      <div class="container my-4">
      <center><h2>DASHBOARD</h2></center><br/>
      <div class="row row-cols-1 row-cols-md-3 mb-3 text-center">
    <div class="col">
      <div class="card mb-3 shadow-sm">
      <div class="card-header">
        <h4 class="my-0 fw-normal">USERS</h4>
      </div>
      <div class="card-body">
        <h1 class="card-title pricing-card-title"><?php echo $data1?></h1>
        <a href=""> <button type="button" class="w-100 btn btn-lg btn-outline-primary">Track</button></a> 
      </div>
    </div>
    </div>

    <div class="col">
      <div class="card mb-3 shadow-sm">
      <div class="card-header">
        <h4 class="my-0 fw-normal">ACTIVITIES</h4>
      </div>
      <div class="card-body">
        <h1 class="card-title pricing-card-title"><?php echo $data2?></h1>
        <a href="activitytrack.php"><button type="button" class="w-100 btn btn-lg btn-primary">Track</button></a> 
      </div>
    </div>
    </div>

    <div class="col">
      <div class="card mb-3 shadow-sm">
      <div class="card-header">
        <h4 class="my-0 fw-normal">FOOD ITEMS</h4>
      </div>
      <div class="card-body">
        <h1 class="card-title pricing-card-title"><?php echo $data3?></h1>
        <a href="foodtrack.php"><button type="button" class="w-100 btn btn-lg btn-primary">Track</button></a>
      </div>
    </div>
    </div>
    
          </div>
      </div>


      

     
      <div class="position-relative overflow-hidden p-3 p-md-4 m-md-3 text-center" style="background-color:rgba(180,180,180,0.5)">
      <center><h2>USERS TRACK</h2></center><br/><br/>
      <center><div id="container" style="height:auto; width: auto;">
    
      <?php
 $sql1 = "select * from appuser";
  $result = mysqli_query($conn, $sql1);

  if (mysqli_num_rows($result) > 0) {
?>  
     <center>
    <table class="table table-striped table-light table-bordered">
    <thead>
    <tr>
    <th scope="col"> User Id </th>
    <th scope="col"> Username</th>
	<th scope="col"> User Email</th>
    <th scope="col"> Age</th>
    <th scope="col"> Gender</th>
    <th scope="col"> Weight</th>
    <th scope="col"> Height</th>
    </tr>
  </thead>
  <tbody>
    <?php  
	
        while($row = mysqli_fetch_assoc($result)) {
          ?>
          <tr  scope="row">
		  <td ><?php echo $row["userid"];?> </td>
    <td ><?php echo $row["username"];?> </td>
    <td><?php echo $row["user_email"];?> </td>
    <td><?php echo $row["user_age"];?> </td>
	    <td><?php echo $row["user_gender"];?> </td>
    <td><?php echo $row["user_weight"];?> </td>
    <td><?php echo $row["user_height"];?> </td>

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
    <footer class="footer ">
        <div class="container">
            <p>© Health App 2020-2021</p>
        </div>
    </footer>

  </body>
</html>