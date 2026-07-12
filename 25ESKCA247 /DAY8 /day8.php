<?php

$txtName = $_POST["txtName"];
$txtEmail = $_POST["txtEmail"];
$PhoneNo = $_POST["PhoneNo"];
$Password = $_POST["Password"];



if(empty($txtName )){
    echo "Name is empty <br>";
}
elseif(!filter_var($txtEmail, FILTER_VALIDATE_EMAIL)){
    echo "email is invaid <br>";
}
elseif(strlen($PhoneNo)!= 10 || !filter_var($PhoneNo, FILTER_VALIDATE_INT)){
    echo "Phone number is invaid <br>";
}

elseif(strlen($Password) < 8 && preg_match('/[A-Z]/', $Password) && preg_match('/[a-z]/', $Password) && preg_match('/[0-9]/', $Password) && preg_match('/[\W]/', $Password)){
    echo "password is invalid <br>";
}

else{
    echo "all values are valid <br>";
}

echo "vaue received : $txtName <br>  $txtEmail <br> $PhoneNo <br> $Password";
