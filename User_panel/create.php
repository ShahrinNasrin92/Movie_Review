<!DOCTYPE html>
<html >
<head>

    <title>Member Registration</title>


    <link rel="stylesheet" type="text/css" href="css/style.css">




</head>


<body>

<span href="Registers.php" class="button" id="toggle-login">Register</span>

<div id="login">
    <div id="triangle"></div>
    <h1>Register</h1>
    <?php
    session_start();
    if(isset( $_SESSION['Messege']))
    {
        echo $_SESSION['Messege'];
        unset ($_SESSION['Messege']);
    }
    ?>

    <form action="store.php" method="post" >
        <input type="text" class="input-data" placeholder="First Name" name="first_name" />

        <input type="text" class="input-data" placeholder="Last Name" name="last_name"/>

        <input type="text" class="input-data" placeholder="Email" name="email" />

        <input type="password" class="input-data" placeholder="Password" name="password"/>

        <input type="password" class="input-data" placeholder="Confirm Password" name="conpassword"/>

        <input type="submit" value="Register" name="register" />


    </form>




</div>
<script src='../http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

<script src="js/index.js"></script>




</body>
</html>
