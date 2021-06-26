<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

    <title>Health App</title>
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
                <a class="nav-link active" aria-current="page" href="">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="/miniproject/.vs/about.html">About Us</a>
              </li>
           
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Blogs
                </a>
                <ul class="dropdown-menu " aria-labelledby="navbarDropdownMenuLink">
                  <li><a class="dropdown-item" href="/miniproject/.vs/exblog.html">Exercise</a></li>
                  <li><a class="dropdown-item" href="/miniproject/.vs/foodblog.html">Food</a></li>
                  <li><a class="dropdown-item" href="/miniproject/.vs/exvlog.html">Videos</a></li>
                </ul>
              </li>

              <li class="nav-item">
                <a class="nav-link" href="contact.php">Contact</a>
              </li>
            </ul>

            <div class="float-right mx-1 " >
                <a href="login.php"><button class="btn btn-secondary active">Login</button></a> 
                <a href="register.php"><button class="btn btn-secondary active">Register</button></a>
            </div>
          </div>
        </div>
      </nav>

      <div id="carouselExampleCaptions" class="carousel slide carousel-fade " data-bs-ride="carousel">
        <ol class="carousel-indicators">
          <li data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active"></li>
          <li data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"></li>
          <li data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img style="opacity: 0.7;" src="https://niagara-yoga.s3.amazonaws.com/wp-content/uploads/2019/10/Trikonasana-960x350.jpg" class="opacity-1 h-40 w-100 " alt="...">
            <div class="carousel-caption d-none d-md-block">
              <h2><b>Welcome To Health App</b></h2>
              <a href="track.php"><button class="btn btn-dark">Track</button></a> 
              <a href="register.php"><button class="btn btn-light">Register</button></a>
            </div>
          </div>
          <div class="carousel-item">
            <img style="opacity: 0.7;" src="https://i.pinimg.com/originals/b7/a5/fc/b7a5fc2468db0c08c2789c964b5c559f.jpg" class="opacity-1 w-100 h-40" alt="...">
            <div class="carousel-caption d-none d-md-block">
                <h2><b>Welcome To Health App</b></h2>
                <a href="track.php"><button class="btn btn-dark">Track</button></a> 
              <a href="register.php"><button class="btn btn-light">Register</button></a>
            </div>
          </div>
          <div class="carousel-item">
            <img style="opacity: 0.7;" src="https://www.thepalmsclub.com/wp-content/uploads/2016/01/The-Gym-02.jpg" class="opacity-1 w-100 h-40" alt="...">
            <div class="carousel-caption d-none d-md-block">
                <h2><b>Welcome To Health App</b></h2>
                <a href="track.php"><button class="btn btn-dark">Track</button></a> 
              <a href="register.php"><button class="btn btn-light">Register</button></a>
            </div>
          </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </a>
      </div>

      <div class="container my-4">
      <center><h2>Inspiring Stories</h2></center><br/>
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
            
    
            <?php
          include("sql.php");
                $sql0 = "SELECT username,rate,story From appuser,inspiring_stories where appuser.userid=inspiring_stories.userid";
                $res = mysqli_query($conn,$sql0);
                
                if (mysqli_num_rows($res) > 0) 
                { 
                        while($row = mysqli_fetch_assoc($res)) {
                        ?>
                        
                        <div class="col">
                            <div class="card shadow-sm">
                                <div class="card-body">
                                <p class="card-text"><b><?php echo $row["story"];?> </b></p>
                                <p class="card-text"><b style="color:green;">Rating : <?php echo $row["rate"];?> </b></p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <small class="text-muted">Username : <?php echo $row["username"] ;?></small>
                                </div>
                                </div>
                            </div>
                        </div>
                    <?php      
                            }
                } 
                else{
                    echo "No stories";
                }
                    
                    ?>
          
          </div>
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