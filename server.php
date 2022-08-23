<?php 
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "subscribe";

    //create connection
    $conn = mysqli_connect($servername,$username,$password,$dbname);

    //check connection
    if (!$conn){
        die("Connection Failed" . mysqli_connect_error());
    }

?>