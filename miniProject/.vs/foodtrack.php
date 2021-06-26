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
                  <li><a class="dropdown-item" href="activitytrack.php">Activity</a></li>
                  <li><a class="dropdown-item" href="">Food</a></li>
                </ul>
              </li>
            </ul>

            <div class="float-right mx-1 " >
                <a href="login.php"><button class="btn btn-secondary active">Logout</button></a> 
            </div>
          </div>
        </div>
      </nav>
<?php include("sql.php");
    $update="";
  
if(isset($_POST["food_name1"])) {
  $fname1 = $_POST["food_name1"];
}
if(isset($_POST["food_class1"])) {
$fclass1 = $_POST["food_class1"];
}
if(isset($_POST["food_qty1"])) {
$fqty1 = $_POST["food_qty1"];
}
if(isset($_POST["food_ical1"])) {
$fical1 = $_POST["food_ical1"];
}


if (isset($_POST['btn1']))
{

  $sql1 = "INSERT INTO food (food_name,food_class,food_qty,food_ical) values ('$fname1','$fclass1','$fqty1','$fical1')";

  if (mysqli_query($conn,$sql1)) {
    $update="<center><h4><b>Details updated successfully</b></h4></center";
  } 
  else {
    echo "<center><h2><b>Food Item Not Added</b></h2></center>";
  }
}
?>


   <div class="container my-4">
    <center><h2>FOOD TRACK </h2></center><br/>
<div class="position-relative overflow-hidden p-3 p-md-5 m-md-3 text-center" style="background-color:rgba(0,0,0,0.5)">
      <h4>Enter a new Food Item!</h4>
        <center style="padding-left: 15%">
        <form class="row g-3 my-1 " method="post">

          <div class="col-auto">
            <label for="validationDefault01" class="form-label">Food Name</label>
            <input type="text" class="form-control" id="validationDefault01" name="food_name1" placeholder="Food name" required>
          </div>
          <div class="form-group col-md-6">
                <label for="time" class="form-label" >Food Class</label>
              <select class="form-control" name="food_class1" id="" required>
                <option value="" disabled selected >occasion</option>
                <option value="Breakfast">Breakfast</option>
                <option value="Lunch">Lunch</option>
                <option value="Dinner">Dinner</option>
              </select>
            </div>

            <div class="form-group col-md-6">
                <label for="time" class="form-label" >Food Quantity</label>
              <select class="form-control" name="food_qty1" id="" required>
                <option value="" disabled selected >cups/quantity</option>
                <option value="1">1 </option>
                <option value="2">2 </option>
              </select>
            </div>      
        <div class="col-auto">
            <label for="validationDefault02" class="form-label">Calories Intake</label>
            <input type="number" class="form-control" id="validationDefault02" name="food_ical1" placeholder="in calories" min="0" required>
          </div>

          <div class="col-10">
            <input type="submit" name="btn1" class="btn btn-primary my-1" value="Submit">
          </div>
        </form>
        <?php echo $update ?>
        </center>
</div> 

   <!-- UPDATE FOOD ITEM -->

<div class="position-relative overflow-hidden p-3 p-md-5 m-md-3 text-center" style="background-color:rgba(180,180,180,0.5)">
      <h4>Update a food item !</h4>
      <form id="my_form" class="my-4 px-4 py-4" name="my_form" action="#" method="post" >
   <center>
 
            <div class="form-group has-feedback"> 
              <label>Food Name</label> 
              <input type="text" class="form-control" name="food_name2" id="name" placeholder="Enter food name." required >
          </div>     <br /> 
           
          <div class="form-group has-feedback"> 
          <label for="time" class="form-label" >Food Class</label>
              <select class="form-control" name="food_class2" id="" required >
                <option value="" disabled selected>occasion</option>
                <option value="Breakfast">Breakfast</option>
                <option value="Lunch">Lunch</option>
                <option value="Dinner">Dinner</option>
              </select>
          </div>  

          <div class="form-group has-feedback"> 
          <label for="time" class="form-label" >Food Quantity</label>
              <select class="form-control" name="food_qty2" id="" required >
                <option value="" disabled selected>cups/quantity</option>
                <option value="1">1 </option>
                <option value="2">2 </option>
              </select>
          </div>  


          <br />
          <div class="form-group has-feedback"> 
              <label>Calories Burnt</label> 
              <input type="number" class="form-control" name="food_ical2" id="weight" placeholder="Enter calories intake" required >
          </div>     <br /> 

          <br />
          <button type="submit" name="submit" value="Submit" class="btn btn-primary">Submit</button>
        
   
       <?php

if (isset($_POST['submit']))
{
$fname2 = $_POST["food_name2"];
  $fclass2 = $_POST["food_class2"];
  $fqty2 = $_POST["food_qty2"];
  $fical2 = $_POST["food_ical2"];

        $sql = "select * from food where food_name='".$fname2."'";
        $result = mysqli_query($conn, $sql);
        while($row = mysqli_fetch_assoc($result)) 
        {
            if($fname2=="") 
                $fname2 = $row["food_name"];
            if($fclass2=="") 
              $fclass2 = $row["food_class"];
          
            if($fqty2 =="") 
               $fqty2 = $row["food_qty"];
            
            if($fical2=="") 
              $fical2 = $row["food_ical"];
       
        }

  $query = "UPDATE food SET food_class='".$fclass2."',food_ical='".$fical2."' WHERE food_name='".$fname2."'";
  if (mysqli_query($conn, $query)) {
    echo "<h4><b>Details updated successfully</b></h4>";
  } 
  else {
    echo "<center><h2><b>Food Item Not Found</b></h2><center>";
  }
  } 
?>
          </center>
        </form>
       
</div> 

   <!-- DELETE FOOD ITEM -->

<div class="position-relative overflow-hidden p-3 p-md-5 m-md-3 text-center" style="background-color:rgba(0,0,0,0.5)">
<h4>Delete a Food Item!</h4>
    
                <form class="row g-3 my-1" method="post">
   <center>

<div class="form-group col-md-6">
        <label class="form-label" >Food </label>
      <select class="form-control" name="food_name3" placeholder="select" id="">
        <option value="" disabled selected >select</option>
        <?php
        $sql1 = "select food_name from food";
        $result = mysqli_query($conn, $sql1);
        
        if (mysqli_num_rows($result) > 0) {
                while($row = mysqli_fetch_assoc($result)) {   
          ?>
        <option> <?php echo $row["food_name"];?> </option>
        <?php
            }
        } 
        else {
            echo "<center><h2>Food Item Not Found</h2><center>";
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
  $fname3=$_POST["food_name3"];
  $sql = "DELETE FROM food WHERE food_name='".$fname3."'"; 
  if (mysqli_query($conn, $sql)) 
  {
    echo "<center><h2><b>Record deleted successfully</b></h2><center>"; 
  } 
else {
  echo "<center><h2><b>Food Item Not Found</b></h2><center>";
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
 $sql1 = "select * from food";
  $result = mysqli_query($conn, $sql1);

  if (mysqli_num_rows($result) > 0) {
?>  
     <center>
    <table class="table table-striped table-light table-bordered">
    <thead>
    <tr>
    <th scope="col"> Food Name </th>
    <th scope="col"> Food Class </th>
    <th scope="col"> Food Quantity </th>
    <th scope="col"> Calories Intake </th>
    </tr>
  </thead>
  <tbody>
    <?php   
        while($row = mysqli_fetch_assoc($result)) {
          ?>
          <tr  scope="row">
    <td ><?php echo $row["food_name"];?> </td>
    <td ><?php echo $row["food_class"];?> </td>
    <td><?php echo $row["food_qty"];?> </td>
    <td><?php echo $row["food_ical"];?> </td>
</tr>
        </tbody>
        </center>
<?php
      
    }
  } 
  else {
    echo "<center><h2><b>Food Item Not Found</b></h2><center>";
  }

?>
    </div></center>
</div> 