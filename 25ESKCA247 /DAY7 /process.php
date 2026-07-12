<?php

$name = trim($_POST['name']);
$email = trim($_POST['email']);
$branch = trim($_POST['branch']);
$phone = trim($_POST['phone']);
$gender = isset($_POST['gender']) ? $_POST['gender'] : "";
$course = trim($_POST['course']);
$address = trim($_POST['address']);

$errors = [];

// Name Validation
if (empty($name)) {
    $errors[] = "Name is required.";
} elseif (!preg_match("/^[a-zA-Z ]+$/", $name)) {
    $errors[] = "Name should contain only letters and spaces.";
}

// Email Validation
if (empty($email)) {
    $errors[] = "Email is required.";
} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors[] = "Please enter a valid email address.";
}

// Branch
if (empty($branch)) {
    $errors[] = "Branch is required.";
}

// Phone Validation
if (empty($phone)) {
    $errors[] = "Phone number is required.";
} elseif (!is_numeric($phone) || strlen($phone) != 10) {
    $errors[] = "Phone number must be exactly 10 digits.";
}

// Gender Validation
if (empty($gender)) {
    $errors[] = "Please select your gender.";
}

// Course Validation
if (empty($course)) {
    $errors[] = "Please select your course.";
}

// Address Validation
if (empty($address)) {
    $errors[] = "Address is required.";
} elseif (strlen($address) < 10) {
    $errors[] = "Address should contain at least 10 characters.";
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>Registration Result</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
body{
    background:#f4f6f9;
}
.card{
    margin-top:40px;
    border-radius:15px;
    box-shadow:0 5px 15px rgba(0,0,0,.2);
}
</style>

</head>
<body>

<div class="container">

<?php

if(count($errors)>0){

echo '<div class="alert alert-danger mt-5">';
echo "<h4>Validation Errors</h4>";
echo "<ul>";

foreach($errors as $error){
    echo "<li>$error</li>";
}

echo "</ul>";
echo '<a href="index.php" class="btn btn-danger">Go Back</a>';
echo "</div>";

}else{

?>

<div class="card">

<div class="card-header bg-success text-white text-center">
<h2>Registration Successful</h2>
</div>

<div class="card-body">

<h3 class="text-primary">
Welcome, <?php echo htmlspecialchars($name); ?>!
</h3>

<table class="table table-bordered mt-4">

<tr>
<th>Name</th>
<td><?php echo htmlspecialchars($name); ?></td>
</tr>

<tr>
<th>Email</th>
<td><?php echo htmlspecialchars($email); ?></td>
</tr>

<tr>
<th>Branch</th>
<td><?php echo htmlspecialchars($branch); ?></td>
</tr>

<tr>
<th>Phone</th>
<td><?php echo htmlspecialchars($phone); ?></td>
</tr>

<tr>
<th>Gender</th>
<td><?php echo htmlspecialchars($gender); ?></td>
</tr>

<tr>
<th>Course</th>
<td><?php echo htmlspecialchars($course); ?></td>
</tr>

<tr>
<th>Address</th>
<td><?php echo htmlspecialchars($address); ?></td>
</tr>

<tr>
<th>Profile Photo</th>
<td>Photo Upload UI Added (Backend upload not implemented)</td>
</tr>

</table>

<a href="index.php" class="btn btn-primary">
Register Another Student
</a>

</div>

</div>

<?php
}
?>

</div>

</body>
</html>
