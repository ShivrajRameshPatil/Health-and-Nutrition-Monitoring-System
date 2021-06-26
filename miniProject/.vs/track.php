
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

.notes-container {
  display: block;
  clear: both;
  padding-top: 10px;
}

.notes-container .note-item {
  width: 21%;
  display: inline-block;
  position: relative;
  z-index: 1;
  margin: 1% 2%;
  padding: 10px;
  border-radius: 2px;
  min-height: 100px;
}

.notes-container .note-item span {
  position: absolute;
  right: 2%;
  top: 2%;
  cursor: pointer;
}

.notes-container .note-item p {
  margin: 0;
}

.notes-container .note-item button {
  position: absolute;
  right: 2%;
  bottom: 2%;
  cursor: pointer;
}

.blue {
  background-color: #0033ff;
  color: #fff;
}

.red {
  background-color: #ff0000;
}

.yellow {
  background-color: #ffcc00;
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

<?php
$bmi=$bmr=$bcal=$ical=0;
$sql0 = "SELECT * From appuser WHERE user_email='".$huser."'";
$res = mysqli_query($conn,$sql0);
$row = mysqli_fetch_assoc($res);
$age=$row["user_age"];
$gender=$row["user_gender"];
$wt=$row["user_weight"];
$ht=$row["user_height"];

if($wt>0 && $ht >0)
{
  $bmi=round($wt/($ht*$ht*0.0001));
}
switch ($gender) {
  case "M":
    $bmr= round(66.47 + (13.75 * $wt) + (5.003 * $ht)-(6.755 * $age));
    $ical=1500;
    break;
  case "F":
    $bmr= round(655.1 + (9.563 * $wt) + (1.85 * $ht)-(4.676 * $age));
    $ical=1200;
    break;
  default:
    $bmr=0;
}
$bcal=1000;


?>


<div class="position-relative overflow-hidden p-3 p-md-3 m-md-3 text-center" style="background-color:rgba(0,0,0,0.5)">
      <h4>Your current measures!</h4>
      <hr style="color:white">
        <center style="color:white">
            <p><b>BMI : <span style="color:yellow; font-size:22px"><?php echo $bmi ?></span> </b></p>
            <p><b>BMR : <span style="color:orange; font-size:22px"><?php echo $bmr ?> Kcal/day</span></b></p>
            <p><b>Calories to <span style="color:red">burn</span> daily :  <span style="color:yellow; font-size:22px"><?php echo $bcal ?></span> </b></p>
            <p><b>Calories to <span style="color:red">intake</span> daily :  <span style="color:orange; font-size:22px"><?php echo $ical ?> Kcal/day</span> </b></p>
            <div class="col-md-2">
            <a href="bcal.php"><button class="btn btn-primary ">Track your Burn</button></a> 
            <a href="ical.php"><button class="btn btn-primary my-1">Track your Intake</button></a> 
          </div>
        </center>
</div> 


<!--
                <form class="row g-3 mx-4 my-1">
   
          <div class="col-md-2">
            <label for="validationDefault01" class="form-label">Add a Note!</label>
            <textarea class="form-control" rows="2" maxlength="250" id="validationDefault01" placeholder="Enter the note" required></textarea>
            <button class="btn btn-primary my-2" type="submit">Publish</button>
          </div>
        </form>
   -->    
   <div class="position-relative overflow-hidden p-3 p-md-1 m-md-3 text-center" style="background-color:rgba(180,180,180,0.5)">
<!--
                <form class="row g-3 mx-4 my-1">
   
          <div class="col-md-2">
            <label for="validationDefault01" class="form-label">Add a Note!</label>
            <textarea class="form-control" rows="2" maxlength="250" id="validationDefault01" placeholder="Enter the note" required></textarea>
            <button class="btn btn-primary my-2" type="submit">Publish</button>
          </div>
        </form>
   -->    

        <h4>
            Notes
        </h4>
        <hr style="color:white">

    <form id="save-note-form">
      <center>
          <div class="col-md-2">
     
      <textarea class="form-control" maxlength="500" id="note-text-input" placeholder="Enter a note" value="" required></textarea>
      
        <select class="form-control" id="colors" required>
          <option value="">Choose Color :</option>
          <option value="blue">Blue</option>
          <option value="yellow">Yellow</option>
          <option value="red">Red</option>
        </select>
     
      <div class="form-item">
        <button class="btn btn-success my-2" type="submit">Post</button>
      </div>
    </div>
  </center>
    </form> 
  <div class="notes-container">
  </div>
</div>

<div class="position-relative overflow-hidden p-3 p-md-3 m-md-3 text-center" style="background-color:rgba(0,0,0,0.5)">
      <h4>Tell us your story!</h4>
      <hr style="color:white">
     <form class="row g-3 my-1" method="post">
        <center>
          <div class="col-md-2">
            <label for="rating" class="form-label">Rate Us! </label>
            <input type="range" class="form-control-range" id="rating" name="rate" min="1" max="5" required>
            <textarea class="form-control" maxlength="500" id="note-text-input" placeholder="Enter your story" name="story" required></textarea>
            <button class="btn btn-success my-2" name="btn" type="submit" value="Submit">Save</button>
          </div>
           
        </center>
     </form>
</div> 


    <!--Optional JavaScript; choose one of the two! -->

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
   <script>
     (function() {
  var app = new NoteApp().init();
})();

function NoteApp() {
  var self = this;
  self.noteInput = document.querySelector('#note-text-input');
  self.colorInput = document.querySelector('#colors');
  self.noteHtml = document.querySelector('.notes-container');
  self.notes = [];
  self.activeNote = null;
  
  self.init = function() {
    document.querySelector('#save-note-form').addEventListener('submit', self.handleFormSubmit);
    return self;
  }
  
  self.handleFormSubmit = function(ev) {
    ev.preventDefault();
    self.save(self.noteInput.value, self.colorInput.value);
  }
  
  self.save = function(noteText, color) {
    if(self.activeNote === null) {
      var note = new Note(noteText, color);
      note.generate();
      note.remove.addEventListener('click', function(ev) { self.removeNote(note);});
      note.edit.addEventListener('click', function(ev) { self.editNote(note);});
      self.noteHtml.appendChild(note.html);
      self.notes.push(note);
    } else {
      self.activeNote.setText(noteText);
      self.activeNote.setColor(color);
    }
    self.colorInput.value = "";
    self.noteInput.value = "";
    self.activeNote = null;
  }
  
  self.editNote = function(note) {
    self.activeNote = note;
    self.colorInput.value = note.color;
    self.noteInput.value = note.text;
  }
  
  self.removeNote = function(note) {
    var ix = self.notes.findIndex(function(x) { return note === x;});
    if(ix > -1) {
      self.notes.splice(ix, 0);
      self.noteHtml.removeChild(note.html);
    }
  }
}

function Note(text, color) {
  var self = this;
  self.text = text;
  self.color = color;
  self.html = null;
  self.remove = null;
  self.edit = null;
  self.content = null;
  
  self.generate = function() {
    self.html = document.createElement('div');
    self.content = document.createElement('p');
    self.remove = document.createElement('span');
    self.remove.className = 'delete';
    self.remove.innerHTML = '&times;'
    self.edit = document.createElement('button');
    self.edit.innerHTML = 'Edit';
    self.setColor(self.color);
    self.setText(self.text);
    self.html.appendChild(self.content);
    self.html.appendChild(self.remove);
    self.html.appendChild(self.edit);
  }
  
  self.setColor = function(color) {
    self.html.className = 'note-item';
    self.html.classList.add(color);
    self.color = color;
  }  
  
  self.setText = function(text) {
    self.content.textContent = text;
    self.text = text;
  }
}
    </script>
</html>

<?php
error_reporting(0);

     if(isset($_POST["rate"])) {
        $rate = $_POST["rate"];
    }
    if(isset($_POST["story"])) {
        $story = $_POST["story"];
    }
   
    if($_REQUEST["btn"] == "Submit") {
      
      $sql = "SELECT * From inspiring_stories WHERE userid='".$uid."'";
              $res0 = mysqli_query($conn,$sql);
              

      if(mysqli_num_rows($res0) > 0) {
      $sql1 = "UPDATE inspiring_stories SET rate='".$rate."', story='".$story."' WHERE userid='".$uid."'";
      $data1 = mysqli_query($conn,$sql1);
      }
      else {
        $sql1 = "INSERT INTO inspiring_stories (userid,rate,story) VALUES ('$uid','$rate','$story')";
        $data1 = mysqli_query($conn,$sql1);
      }
      if ($data1) {
          echo "<h5>Records added successfully!</h5>";
      } else {
          echo "Could not add records. Error: ". mysqli_error($conn);
      }
  }

?>
