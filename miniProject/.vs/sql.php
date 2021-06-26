<?php

    $conn = mysqli_connect("localhost:3306", "root", "ketaki20", "health_app");

    if(!$conn) {
        die("Could not connect. Error: ".mysqli_connect_error());
    }

     
?>