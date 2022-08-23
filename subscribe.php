<?php
    session_start();
    include('server.php');

    $errors = array();

    if(isset($_POST['reg_user'])){
        $id_nisit= mysqli_real_escape_string($conn,$_POST['id_nisit']);
        $username = mysqli_real_escape_string($conn,$_POST['username']);
        $password_1 = mysqli_real_escape_string($conn,$_POST['password_1']);
        $password_2 = mysqli_real_escape_string($conn,$_POST['password_2']);
        $first_name = mysqli_real_escape_string($conn,$_POST['first_name']);
        $last_name= mysqli_real_escape_string($conn,$_POST['last_name']);

        if (empty($id_nisit)) {
            array_push($errors,"Student ID is requried");

        }
        if (empty($username)){
            array_push($errors,"Username is requried");

        }
        if (empty($password_1)){
            array_push($errors,"Password is requried");

        }
        if($password_1 !=$password_2) {
            array_push($errors,"The two passwords do not match");
        }
        
        $user_check_query = "SELECT * FROM user WHERE id_nisit = '$id_nisit' OR  username = '$username'";
        $query = mysqli_query($conn,$user_check_query); 
        $result =mysqli_fetch_assoc($query);

        if($result){ //if user exists
            if ($result['id_nisit'] === $id_nisit) {
                array_push($errors, "Student ID already exists");
            }
            if ($result['username'] === $username) {
                array_push($errors, "Username already exists");
            }

        }
        if(count($errors) == 0){
            $password = md5($password_1);
            $sql = "INSERT INTO user(id_nisit,username,password,first_name,last_name) VALUES ('$id_nisit','$username','$password','$first_name','$last_name')";
            mysqli_query($conn,$sql);

            $_SESSION['username'] = $username;
            $_SESSION['success'] = "You are now logged in";
            header('location:index.php');
        }else {
            array_push($errors, "Student ID or username already exists");
            $_SESSION['error'] = "Student ID or username already exists";
            header("location : register.php"); 
        }
    }

?>