

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
    <title>Health App</title>
    <script type="text/javascript">
      // form.js 
window.onload = function() { 
    document.my_form.onsubmit = function()  { return checkForm(); }
    document.getElementById("emailInput").onblur = emailValidate; 
    document.getElementById("informationInput").onblur = function() { informationValidate(); }; 
} 


function emailValidate() { 

    if(emailInput.value == "") { 
        document.getElementById("emailInputStatus").innerHTML = "Email Id is required!"; 
        document.getElementById("emailInputStatus").style.display = "block"; 
        emailInput.parentNode.className = "form-group has-error has-feedback"; 
        document.getElementById("emailIcon").className = "glyphicon glyphicon-remove form-control-feedback";
        return false; 
    } else if(!validEmailAddress(emailInput.value)) { 
        document.getElementById("emailInputStatus").innerHTML = "Incorrect email Id format! It should contain one '@' and atleast one '.' Eg. abc@xyz.com"; 
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

function informationValidate() { 

    if(informationInput.value == "") { 
        document.getElementById("informationInputStatus").style.display = "block"; 
        informationInput.parentNode.className = "form-group has-error has-feedback"; 
        document.getElementById("informationIcon").className = "glyphicon glyphicon-remove form-control-feedback";
        return false; 
    } else { 
        document.getElementById("informationInputStatus").style.display = "none"; 
        informationInput.parentNode.className = "form-group has-success has-feedback"; 
        document.getElementById("informationIcon").className = "glyphicon glyphicon-ok form-control-feedback";
        return true; 
    }
}


function checkForm() { 

    var valid = true; 
    var emailInput = document.getElementById("emailInput"); 
    var informationInput = document.getElementById("informationInput"); 

    if(!emailValidate()) valid = false; 
    if(!informationValidate()) valid = false; 
    //alert(valid); 
    return valid; 
}

function validEmailAddress(email) { 

    // this regular expression could be better 
    var pattern = /^[a-zA-Z0-9._-]+@[a-zA-Z_]+?\.[a-zA-Z]{2,3}$/; 
    return pattern.test(email); 
}


</script>
<style> 
h5{
  color:red;
}
  .errorHeader { 
      font-weight: bold; 
      color: red;
      /* visibility: hidden; */ 
      display: none; 
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
                <a class="nav-link active" href="">Contact</a>
              </li>
              </ul>

              <div class="float-right mx-1 " >
                <a href="login.php"><button class="btn btn-secondary active">Login</button></a> 
                <a href="register.php"><button class="btn btn-secondary active">Register</button></a>
              </div>
          </div>
        </div>
      </nav>

      <div id="cform" class="container-fluid w-75 " style="height:50%">
          
          <form id="my_form" class="my-4" name="my_form" action="#" method="post">
            <h2>Contact Us</h2>
            <div class="form-group has-feedback"> 
              <label for="emailInput">Email ID</label> 
              <input type="email" class="form-control" name="emailInput" id="emailInput" placeholder="abc@xyz.com" aria-describedby="emailInputStatus" onblur="firstNameValidate()">
              <span id="emailIcon" aria-hidden="true"></span> 
              <span id="emailInputStatus" class="errorHeader">Email ID is required!</span>
          </div>  
          <br />
          <div class="form-group has-feedback">
              <label for="informationInput">Subject</label> 
              <textarea class="form-control" rows="3" maxlength="250" name="informationInput" id="informationInput" placeholder="Enter text here." aria-describedby="informationInputStatus"></textarea>
              <span id="informationIcon" aria-hidden="true"></span>
              <span id="informationInputStatus" class="errorHeader">Subject is required!</span>
          </div>
          <br />
          <button type="submit" name="btn" value="Submit" class="btn btn-primary">Submit</button>
       </form>     
       <?php
          include("sql.php");
          error_reporting(0);

          if(isset($_POST["emailInput"])) {
                  $email = $_POST["emailInput"];
              }
          
              if(isset($_POST["informationInput"])) {
                  $info = $_POST["informationInput"];
              }
      
             if($_REQUEST["btn"] == "Submit") {
                  $sql = "INSERT INTO contact_req (email,req_subject) VALUES ('$email','$info')";
                  if (mysqli_query($conn,$sql)) {
                      echo "<h5>Contact Request successfully sent!</h5>";
                  } else {
                      echo "Could not send contact request. Error: ". mysqli_error($conn);
                  }
              }
          
          
          ?>
      </div>
 
 <div>
 <img src="https://imgix.bustle.com/uploads/shutterstock/2020/3/11/5db1bc6b-4d71-4000-951f-eb147257fc21-shutterstock-1667721061.jpg" class="img-fluid" alt="Responsive image">
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
            <p>?? Health App 2020-2021</p>
        </div>
      </footer>

  </body>
</html>

