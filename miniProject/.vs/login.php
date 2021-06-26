<?php
require_once('sql.php');

$error=" ";
session_start();
if(isset($_SESSION['User']))
{
  header("location:track.php");
}

    if(isset($_POST['Login']))
    {
       if(empty($_POST['emailInput']) || empty($_POST['pswdInput']))
       {
            header("location:login.php?Empty= Please Fill in the Blanks");
       }
       else
       {
            $query0="select * from appadmin where admin_email='".$_POST['emailInput']."' and admin_password='".$_POST['pswdInput']."'";
            $result=mysqli_query($conn,$query0);
            if(mysqli_fetch_assoc($result))
            {
                header("location:admin.php");
            }
            else{
              $query="select * from appuser where user_email='".$_POST['emailInput']."' and user_password='".$_POST['pswdInput']."'";
              $result=mysqli_query($conn,$query);
  
              if(mysqli_fetch_assoc($result))
              {
                  $_SESSION['User']=$_POST['emailInput'];
                  header("location:track.php");
              }
              else
              {
                  $error="Invalid email or password!";
              }
            }
       }
    }
?>

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
    <script>

window.onload = function() { 
    document.my_form.onsubmit = function()  { return checkForm(); }
    document.getElementById("emailInput").onblur = emailValidate; 
    document.getElementById("pswdInput").onblur = function() { pswdValidate(); }; 
} 


function emailValidate() { 

    if(emailInput.value == "") { 
        document.getElementById("emailInputStatus").innerHTML = "Email Id is required!"; 
        document.getElementById("emailInputStatus").style.display = "block"; 
        emailInput.parentNode.className = "form-group has-error has-feedback"; 
        document.getElementById("emailIcon").className = "glyphicon glyphicon-remove form-control-feedback";
        return false; 
    } else if(!validEmailAddress(emailInput.value)) { 
        document.getElementById("emailInputStatus").innerHTML = "Email Id should contain one '@' and atleast one '.' Eg. abc@xyz.com"; 
        document.getElementById("emailInputStatus").style.display = "block"; 
        emailInput.parentNode.className = "form-group has-warning has-feedback";
        document.getElementById("emailIcon").className = "glyphicon glyphicon-warning-sign form-control-feedback";
        return false; 
    } else { 
        document.getElementById("emailInputStatus").style.display = "none"; 
        emailInput.parentNode.className = "form-group has-success has-feedback";
        document.getElementById("emailIcon").className = "glyphicon glyphicon-ok form-control-feedback";
        return true; 
    }
}

function pswdValidate() { 

    if(pswdInput.value == "") { 
        document.getElementById("pswdInputStatus").style.display = "block"; 
        pswdInput.parentNode.className = "form-group has-error has-feedback"; 
        document.getElementById("pswdIcon").className = "glyphicon glyphicon-remove form-control-feedback";
        return false; 
    }   
    else if(!validpswd(pswdInput.value)) { 
        document.getElementById("pswdInputStatus").innerHTML = "Password : atleast 7 char,1 capital letter,1 digit & 1 special character"; 
        document.getElementById("pswdInputStatus").style.display = "block"; 
        pswdInput.parentNode.className = "form-group has-warning has-feedback";
        document.getElementById("pswdIcon").className = "glyphicon glyphicon-warning-sign form-control-feedback";
        return false; 
    } else { 
        document.getElementById("pswdInputStatus").style.display = "none"; 
        pswdInput.parentNode.className = "form-group has-success has-feedback"; 
        document.getElementById("pswdIcon").className = "glyphicon glyphicon-ok form-control-feedback";
        return true; 
    }
}


function checkForm() { 

    var valid = true; 
    var emailInput = document.getElementById("emailInput"); 
    var pswdInput = document.getElementById("pswdInput"); 

    if(!emailValidate()) valid = false; 
    if(!pswdValidate()) valid = false; 
    //alert(valid); 
    return valid; 
}

function validEmailAddress(email) { 

    // this regular expression could be better 
    var pattern = /^[a-zA-Z0-9._-]+@[a-zA-Z_]+?\.[a-zA-Z]{2,3}$/; 
    return pattern.test(email); 
}
function validpswd(pswd) { 

    // this regular expression could be better 
    var pattern = /^(?=.*[0-9])(?=.*[!@#$%^&*])[a-zA-Z0-9!@#$%^&*]{7,16}$/;
    return pattern.test(pswd); 
}

    </script>
    <style>
        /* Made with love by Mutiullah Samim*/

@import url('https://fonts.googleapis.com/css?family=Numans');

html,body{
background-color:rgba(120,120,120);
background-size:cover;
background-repeat: no-repeat;
height: 100%;
font-family: 'Numans', sans-serif;
}

.container{
height: 100%;
align-content: center;
}

label,h2{
    color:white;
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
                <a class="nav-link " href="/.vs/contact.html">Contact</a>
              </li>
              </ul>

              <div class="float-right mx-1 " >
              <a href=""><button class="btn btn-secondary active">Login</button></a> 
                <a href="register.php"><button class="btn btn-secondary active">Register</button></a>
              </div>
          </div>
        </div>
      </nav>


    <center style="margin-top:10%;">
        <div class="container-fluid text-white mx-auto" style="width: 320px; margin-bottom:50px; background-color:rgba(0,0,0,0.5)">
            <h2 style="padding-top:5px;" >Log In</h2>
            <hr style="color:white;">
             <form id="my_form" name="my_form" action="#" method="post">
                    
                    <div class="form-group has-feedback"> 
                        <label for="emailInput">Login Id</label> 
                        <input type="email" class="form-control my-1" name="emailInput" id="emailInput" placeholder="abc@xyz.com" aria-describedby="emailInputStatus">
                        <span id="emailIcon" aria-hidden="true"></span> 
                        <span id="emailInputStatus" class="errorHeader">Login Id is required!</span>
                    </div>  
                  
                              
                    <div class="form-group has-feedback"> 
                        <label for="pswdInput">Password</label>
                        <input type="password" class="form-control my-2" name="pswdInput" id="pswdInput" placeholder="Password" aria-describedby="pswdInputStatus"> 
                        <span id="pswdIcon" aria-hidden="true"></span>
                        <span id="pswdInputStatus" class="errorHeader">Password is required!</span>
                    </div>    
                    <div style = "font-size:15px; color:#cc0000; margin-top:2px"><b><?php echo $error; ?></b></div>
                    <button type="submit" name="Login" class="btn btn-primary">Login</button>
                    <div class="d-flex justify-content-center links my-2">
                       <p>Don't have an account?<a href="register.php">Register</a></p>
                    </div>
            </form>
                    
             
        </div>
     </center>
 


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

