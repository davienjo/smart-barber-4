<?php

session_start();
include('partials/connect.php');
include('partials/header.php');

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login-page</title>
</head>
<body>

<h2>Admin login</h2>
    <div class="login-form">

<?php
if (isset($_SESSION['logged_in'])){ 
    echo "<div class='alert alert-success'>{$_SESSION['logged_in']}</div>";
     unset($_SESSION['logged_in']);
    }



    if (isset($_SESSION['failed_login'])) {
        echo "<div class='alert alert-danger'>{$_SESSION['failed_login']}</div>";
        unset($_SESSION['failed_login']);
    }
    ?>

   <form method="POST" action="login.php">
    <label for="name">Full Name:</label>
    <input type="text" name="name" id="name" required autocomplete="off">

    <label for="password">Password:</label>
    <input type="password" name="password" id="password" required autocomplete="off">

    <input type="submit" name="login" value="Login">

    </form> 
    </div>


<?php
if($_SERVER['REQUEST_METHOD']=='POST'){
    include('partials/connect.php');

if(isset($_POST['login'])){
    $name = $_POST['name'];
    $password = md5($_POST['password']);

$sql = "SELECT * FROM users WHERE name = '$name' and password = '$password'";
$result =mysqli_query($conn, $sql);

if(mysqli_num_rows($result)>0){
    $_SESSION['logged_in']= "login succesfull";
    $_SESSION['admin_name'] = $name;
    header("location: admin-dashboard.php");
    exit;
}else{
    $_SESSION['failed_login']="Invalid name or password";
    header("location: login.php");
    exit;
}

}

}

?>

<?php
include('partials/footer.php');
?>