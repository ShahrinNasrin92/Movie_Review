<?php
session_start();
if(empty($_SESSION['adminid'])){
    header('location: adlogin.php');
}
?>

<!DOCTYPE html>
<html >
<head>
    <link rel="stylesheet" type="text/css" href="../assests/bootstrap/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/bootstrap.min.css" >
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <title>Admin panel</title>

</head>


<body>

<div id="login" style="margin-top: 80px;">
    <a href="adlogout.php"> <span class="button" id="toggle-login">Logout</span></a>
<div id="triangle"></div>
    <h1>Welcome to Admin Panel</h1>

<div class="row" style="margin-top: 50px;">

    <div align="center" class="col-md-12">
        <a style="margin-right: 20px;" href="list.php" class="btn btn-info" id="toggle-login">See movie list</a>
        <a href="user.php" class="btn btn-info" id="toggle-login">See user list</a>
    </div>


</div>

</div>


</body>
</html>
