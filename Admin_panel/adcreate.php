<!DOCTYPE html>
<html >
<head>

    <title>Admin Registration</title>

    <link rel="stylesheet" type="text/css" href="../assests/bootstrap/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/bootstrap.min.css" >
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>


<body>

<div id="login" style="margin-top: 80px;">
    <h1>Admin Registration</h1>
    <?php
    session_start();
    if(isset( $_SESSION['Message']))
    {
        echo $_SESSION['Message'];
        unset ($_SESSION['Message']);
    }
    ?>


    <form action="Registeradmin.php" method="post" >
        <input type="text" class="input-data" placeholder="First Name" name="first_name" required/>

        <input type="text" class="input-data" placeholder="Last Name" name="last_name" required/>

        <input type="email" class="input-data" placeholder="Email" name="email" required/>


        <input type="password" class="input-data" placeholder="Password" name="password" required/>

        <input type="password" class="input-data" placeholder="Confirm Password" name="conpassword" required/>

        <input type="submit" value="Register" name="register" />


    </form>

</div>
<script src='../http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

<script src="js/index.js"></script>




</body>
</html>
