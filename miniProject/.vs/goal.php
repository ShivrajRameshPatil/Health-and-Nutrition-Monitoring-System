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
background-image: url('https://i.ytimg.com/vi/BEP5tJYMKbI/maxresdefault.jpg');
background-size:cover;
background-repeat: no-repeat;
height: auto;
font-family: 'Numans', sans-serif;
}



label,h4,h5{
    color:white;
}

  form { 
      margin: 10%; 
  }
  .errorHeader {  
      color: red;
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
                <a href="logout.php?logout"><button class="btn btn-secondary ">Logout</button></a> 
              </div>
          </div>
        </div>
      </nav>

      <?php   
            error_reporting(0);

if(isset($_POST["age"])) {
        $age = $_POST["age"];
    }

    if(isset($_POST["gender"])) {
        $gender = $_POST["gender"];
    }
    if(isset($_POST["weight"])) {
        $weight = $_POST["weight"];
    }
    if(isset($_POST["height"])) {
        $height = $_POST["height"];
    }
   if($_REQUEST["btn"] == "Submit") {
        $sql = "UPDATE appuser SET user_age='".$age."', user_gender='".$gender."', user_weight='".$weight."', user_height='".$height."' WHERE userid='".$uid."'";

        if (mysqli_query($conn,$sql)) {
            echo "<h5>Records added successfully!</h5>";
        } else {
            echo "Could not add records. Error: ". mysqli_error($conn);
        }
    }


     if(isset($_POST["weight1"])) {
        $weight1 = $_POST["weight1"];
    }
    if(isset($_POST["date"])) {
        $date = $_POST["date"];
        $date = date('Y-m-d' , strtotime($date));
    }
   
    if($_REQUEST["btn1"] == "Submit") {

      $sql1 = "INSERT INTO goals (userid,goal_weight,goal_date) VALUES ('$uid','$weight1','$date')";

      if (mysqli_query($conn,$sql1)) {
        header("location:track.php");
      } else {
      $error="Could Not add records.";
      }
  }
            ?>
<div class="position-relative overflow-hidden p-3 p-md-5 m-md-3 text-center" style="background-color:rgba(0,0,0,0.5)">
      <h4>Help us define your goals!</h4>
        <center style="padding-left: 15%">
        <form class="row g-3 my-1 " method="post">

          <div class="col-auto">
            <label for="validationDefault01" class="form-label">Age</label>
            <input type="number" class="form-control" id="validationDefault01" name="age" placeholder="13+" min="13" required>
          </div>
          <div class="col-auto">
            <label for="validationDefault02" class="form-label"  >Gender</label><br/>
              <input class="mx-3 my-2" type="radio" id="male" name="gender" value="M" required>>
              <label for="male">Male</label>
              <input class="mx-4 my-2" type="radio" id="female" name="gender" value="F" required>>
              <label for="female">Female</label>
                </div>
                    <div class="col-auto">
            <label for="validationDefault02" class="form-label">Weight</label>
            <input type="number" class="form-control" id="validationDefault02" name="weight" placeholder="in kg" min="30" step="0.10" required>
          </div>
         <div class="col-auto">
            <label for="validationDefault01" class="form-label">Height</label>
            <input type="number" class="form-control" id="validationDefault01" name="height" placeholder="in cm" min="120" required>
          </div>

          <div class="col-10">
            
            <input type="submit" name="btn" class="btn btn-primary my-1" value="Submit">
          </div>
        </form>
        </center>
</div> 

<div class="position-relative overflow-hidden p-3 p-md-5 m-md-3 text-center" style="background-color:rgba(180,180,180,0.5)">
      <h4>Enter your goal!</h4>
    
                <form class="row g-3 my-1" method="post">
   <center>
          <div class="col-md-2">
            <label for="validationDefault01" class="form-label">Weight</label>
            <input type="number" class="form-control" id="validationDefault01" name="weight1" placeholder="in kg" min="30" step="0.10" required>
          </div>
             <div class="col-md-2">
            <label for="validationDefault02" class="form-label">Date</label>
            <input type="date" class="form-control"  id="validationDefault02" name="date" placeholder="YYYY-MM-DD" min="2021-1-30" required>
          </div>
          <div style = "font-size:15px; color:#cc0000; margin-top:2px"><b><?php echo $error; ?></b></div>
           <div class="col-10">
            <input type="submit" name="btn1" class="btn btn-primary my-1" value="Submit">
          </div>
          </center>
        </form>
       
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


