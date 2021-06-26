
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
    
    <title>Health App</title>

    <style>
        /* Made with love by Mutiullah Samim*/

@import url('https://fonts.googleapis.com/css?family=Numans');

html,body{

background-color:	#DCDCDC;
background-size:cover;
background-repeat: no-repeat;
height: auto;
font-family: 'Numans', sans-serif;
}



label,h4,h5,p{
    color:white;
}

* {
  box-sizing: border-box;
}

.form-container .form-item {
  width: 33%;
  display: inline-block;
  padding: 1% 2%;
  
}

.form-container .form-item input, .form-container .form-item select {
  width: 100%;
  border-radius: 3px;
  border: 1px solid #ccc;
  padding: 3px 5px;
  font-size: 14px;
}


    </style>
   
  </head>
  <body class="text-center" data-new-gr-c-s-check-loaded="14.990.0" data-gr-ext-installed="">

    <nav class="navbar sticky-top navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid ">
          <a class="navbar-brand" href="#">Health App</a>
          <?php
          include("sql.php");
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


<div id="cform" class="container-fluid w-75 " style="height:50%" >
          
          <form id="my_form" class="my-4 px-4 py-4" name="my_form" action="#" method="post" style="background-color:rgba(0,0,0,0.8)">
            <h2 style="color:white">Edit Info</h2>
            <hr style="color:white">
            <div class="form-group has-feedback"> 
              <label>Username</label> 
              <input type="text" class="form-control" name="name" id="name" placeholder="Enter new username." >
          </div>     <br /> 
            <div class="form-group has-feedback"> 
              <label>Email ID</label> 
              <input type="email" class="form-control" name="email" id="email" placeholder="abc@xyz.com" >
          </div>      <br />
          <div class="form-group has-feedback"> 
              <label>Age</label> 
              <input type="number" class="form-control" name="age" id="age" placeholder="Enter age." >
          </div>  
          <br />
          <div class="form-group has-feedback"> 
              <label>Weight</label> 
              <input type="number" class="form-control" name="weight" id="weight" placeholder="Enter weight in kg" min="30" step="0.10">
          </div>     <br />
          <div class="form-group has-feedback"> 
              <label>Height</label> 
              <input type="number" class="form-control"  id="height" name="height" placeholder="Enter height in cm" min="120" >
          </div> 

          <br />
          <button type="submit" name="submit" value="Submit" class="btn btn-primary">Submit</button>
       </form>     
   
       <?php
  include("sql.php");

  if (isset($_POST['submit']))
  {
    $name=$_POST["name"];
    $email=$_POST["email"];
    $age=$_POST["age"];
    $weight=$_POST["weight"];
    $height=$_POST["height"];


        $sql = "select * from appuser where userid='$uid'";
        $result = mysqli_query($conn, $sql);
        while($row = mysqli_fetch_assoc($result)) 
        {
          if($name=="")
              $name=$row["username"];
          if($email=="")
              $email=$row["user_email"];
          if($age=="")
              $age=$row["user_age"];
          if($weight=="")
              $weight=$row["user_weight"];
          if($height=="")
              $height=$row["user_height"];
        }


  $query = "UPDATE appuser SET username='".$name."',user_email='".$email."',user_age='".$age."',user_weight='".$weight."',user_height='".$height."' WHERE userid=".$uid;
  if (mysqli_query($conn, $query)) {
    echo "<h4><b>Details updated successfully</b></h4>";
  } 
  else {
    echo "<center><h2><b>User Not Found</b></h2><center>";
  }
  } 
?>

      </div>


    <!--Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
   

    <footer class="footer " style="position: fixed; bottom: 0;">
        <div class="container">
            <p style="color:white">© Health App 2020-2021</p>
        </div>
      </footer>
 -->
  </body>
  <div class="position-relative overflow-hidden p-3 p-md-4 m-md-3 text-center" style="background-color:rgba(180,180,180,0.5)">
      <center><div id="container" style="height:auto; width: auto">
      <?php
 $sql1 = "select username,user_email,user_age,user_gender,user_weight,user_height from appuser where userid='$uid'";
  $result = mysqli_query($conn, $sql1);

  if (mysqli_num_rows($result) > 0) {
?>  
     <center>
     <table class="table table-striped table-light table-bordered" >
     <thead>
    <tr>
    <th scope="col"> Name </th>
    <th scope="col"> Email </th>
    <th scope="col"> Age </th>
    <th scope="col"> Gender </th>
    <th scope="col"> Weight </th>
    <th scope="col"> Height </th>
    </tr>
  </thead>
  <tbody>
    <?php   
        while($row = mysqli_fetch_assoc($result)) {
          ?>
          <tr scope="row">
    <td><?php echo $row["username"];?> </td>
    <td><?php echo $row["user_email"];?> </td>
    <td><?php echo $row["user_age"];?> </td>
    <td><?php echo $row["user_gender"];?> </td>
    <td><?php echo $row["user_weight"];?> </td>
    <td><?php echo $row["user_height"];?> </td>
</tr>  </tbody>
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
