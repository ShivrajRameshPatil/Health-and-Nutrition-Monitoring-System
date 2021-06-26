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

label,h1,h2,h3,h4,h5{
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
                <a class="nav-link active" aria-current="page" href="admin.php">Dashboard</a>
              </li>

              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  System Content
                </a>
                <ul class="dropdown-menu " aria-labelledby="navbarDropdownMenuLink">
                  <li><a class="dropdown-item" href="">Activity</a></li>
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
    include("sql.php");
    $update="";
    if(isset($_POST["act_name1"])) {
      $aname1 = $_POST["act_name1"];
  }
    if(isset($_POST["act_time1"])) {
        $atime1 = $_POST["act_time1"];
    }
    if(isset($_POST["act_bcal1"])) {
        $abcal1 = $_POST["act_bcal1"];
    }
   
    if (isset($_POST['btn1']))
    {

      $sql1 = "INSERT INTO activity(act_name,act_time,act_bcal) values ('$aname1','$atime1','$abcal1')";

      if (mysqli_query($conn,$sql1)) {
        $update="<center><h4><b>Details updated successfully</b></h4></center";
      } 
      else {
        echo "<center><h2><b>Activity Not Added</b></h2></center>";
      }
  }
 ?>
      <div class="container my-4">
    <center><h2>ACTIVITY TRACK </h2></center><br/>
<div class="position-relative overflow-hidden p-3 p-md-5 m-md-3 text-center" style="background-color:rgba(0,0,0,0.5)">
      <h4>Enter a new Activity!</h4>
        <center style="padding-left: 15%">
        <form class="row g-3 my-1 " method="post">

          <div class="col-auto">
            <label for="validationDefault01" class="form-label">Activity Name</label>
            <input type="text" class="form-control" id="validationDefault01" name="act_name1" placeholder="activity name" required>
          </div>
          <div class="form-group col-md-6">
                <label for="time" class="form-label" >Time</label>
              <select class="form-control" name="act_time1" id="" required>
                <option value="0" disabled >in hour</option>
                <option value="1">1 hour</option>
                <option value="2">2 hour</option>
              </select>
            </div>
  <div class="col-auto">
            <label for="validationDefault02" class="form-label">Calories Burnt</label>
            <input type="number" class="form-control" id="validationDefault02" name="act_bcal1" placeholder="in calories" min="0" required>
          </div>

          <div class="col-10">
            <input type="submit" name="btn1" class="btn btn-primary my-1" value="Submit">
          </div>
        </form>
        <?php echo $update ?>
        </center>
</div> 


<div class="position-relative overflow-hidden p-3 p-md-5 m-md-3 text-center" style="background-color:rgba(180,180,180,0.5)">
      <h4>Update an activity !</h4>
      <form id="my_form" class="my-4 px-4 py-4" name="my_form" action="#" method="post" >
   <center>
 
            <div class="form-group has-feedback"> 
              <label>Activity Name</label> 
              <input type="text" class="form-control" name="act_name2" id="name" placeholder="Enter activity name." required >
          </div>     <br /> 
           
          <div class="form-group has-feedback"> 
                <label for="time" class="form-label" >Activity Time</label>
              <select class="form-control" name="act_time2" id="" required>
                <option value="" disabled selected >in hour</option>
                <option value="1">1 hour</option>
                <option value="2">2 hour</option>
              </select>
          </div>  
          <br />
          <div class="form-group has-feedback"> 
              <label>Calories Burnt</label> 
              <input type="number" class="form-control" name="act_bcal2" id="weight" placeholder="Enter calories burnt" >
          </div>     <br /> 

          <br />
          <button type="submit" name="submit" value="Submit" class="btn btn-primary">Submit</button>
        
   
       <?php

  if (isset($_POST['submit']))
  {
    $aname=$_POST["act_name2"];
    $atime=$_POST["act_time2"];
    $abcal=$_POST["act_bcal2"];

        $sql = "select * from activity where act_name='".$aname."'";
        $result = mysqli_query($conn, $sql);
        while($row = mysqli_fetch_assoc($result)) 
        {
          if($aname=="")
              $aname=$row["act_name"];
          if($atime=="")
              $atime=$row["act_time"];
          if($abcal=="")
              $abcal=$row["act_bcal"];  
        }

  $query = "UPDATE activity SET act_time='".$atime."',act_bcal='".$abcal."' WHERE act_name='".$aname."'";
  if (mysqli_query($conn, $query)) {
    echo "<h4><b>Details updated successfully</b></h4>";
  } 
  else {
    echo "<center><h2><b>Activity Not Found</b></h2><center>";
  }
  } 
?>
          </center>
        </form>
       
</div> 


<div class="position-relative overflow-hidden p-3 p-md-5 m-md-3 text-center" style="background-color:rgba(0,0,0,0.5)">
<h4>Delete a Activity!</h4>
    
                <form class="row g-3 my-1" method="post">
   <center>

<div class="form-group col-md-6">
        <label class="form-label" >Activity </label>
      <select class="form-control" name="act_name3" placeholder="select" id="">
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

  <div class="col-10">
    <input type="submit" name="btn2" class="btn btn-primary my-1" value="Submit">
  </div>
          </center>
        </form>
       
</div> 
      </div>
      </div>


      <?php 
if (isset($_POST['btn2']))
{
  $aname3=$_POST["act_name3"];
  $sql = "DELETE FROM activity WHERE act_name='".$aname3."'"; 
  if (mysqli_query($conn, $sql)) 
  {
    echo "<center><h2><b>Record deleted successfully</b></h2><center>"; 
  } 
else {
  echo "<center><h2><b>Activity Not Found</b></h2><center>";
}
}
?>







   
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


<div class="position-relative overflow-hidden p-3 p-md-4 m-md-3 text-center" style="background-color:rgba(180,180,180,0.5)">
      <h4 style="color:white;"><b>Track</b></h4><br/>
      <center><div id="container" style="height:auto; width: auto;">
    
      <?php
 $sql1 = "select * from activity";
  $result = mysqli_query($conn, $sql1);

  if (mysqli_num_rows($result) > 0) {
?>  
     <center>
    <table class="table table-striped table-light table-bordered">
    <thead>
    <tr>
    <th scope="col"> Activity Name </th>
    <th scope="col"> Activity Time </th>
    <th scope="col"> Calories Burnt </th>
    </tr>
  </thead>
  <tbody>
    <?php   
        while($row = mysqli_fetch_assoc($result)) {
          ?>
          <tr  scope="row">
    <td ><?php echo $row["act_name"];?> </td>
    <td><?php echo $row["act_time"];?> </td>
    <td><?php echo $row["act_bcal"];?> </td>
</tr>
        </tbody>
        </center>
<?php
      
    }
  } 
  else {
    echo "<center><h2><b>Activity Not Found</b></h2><center>";
  }

?>
    </div></center>
</div> 