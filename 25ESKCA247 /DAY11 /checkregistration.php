<?php
$error = "";

if($_SERVER["REQUEST_METHOD"] == "POST"){
    include 'db_connect.php';

    $name = mysqli_real_escape_string($conn,$_POST['name']);
    $email = mysqli_real_escape_string($conn,$_POST['email']);
    $password = mysqli_real_escape_string($conn,$_POST['password']);
    $confirmpassword = mysqli_real_escape_string($conn,$_POST['confirmpassword']);

    if($name=="" || $email=="" || $password=="" || $confirmpassword==""){
        $error = "All fields are required.";
        echo $error;
        
    }

    elseif($password != $confirmpassword){
        $error = "Passwords do not match.";
        echo $error;
        
    }
    else{
        $insertQuery = "INSERT INTO user (name, email, password) VALUES ('$name', '$email', '$password')";
        $result = mysqli_query($conn, $insertQuery);
        if($result){
            header("Location: success.php");
           
        } else {
            echo "error occured while submitting data";
            echo "error: " . mysqli_error($conn);
         
        } 
        header("Location: success.php");

    }

   
}
?>
