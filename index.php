<?php

$root = "assests/movie_images/";
session_start();
$_SESSION['url'] = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
if (!empty($_GET)){

    $category = $_GET['category'];
    $pdo = new PDO('mysql:host=localhost;dbname=movie', 'root', '');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $query = "SELECT * FROM moviedetails WHERE category = ?";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$category]);
    $allinfo = $stmt->fetchAll();


}

if (($_GET['category'])=="All" || empty($_GET)){
    require_once 'Admin_panel/ad_movie.php';
    $details = new Movies();

    $allinfo = $details->getlist();
}


?>

<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <title>Movie Review</title>

    <link rel='stylesheet' type='text/css' href='assests/bootstrap/css/bootstrap.min.css'>
    <link href="assests/bootstrap/dist/css/bootstrap.css" rel="stylesheet">
    <link rel='stylesheet' type='text/css' href='assests/css/dynamic-forms.css'>
    <link rel='stylesheet' type='text/css' href='assests/css/layout.css'>
    <link rel='stylesheet' type='text/css' href='assests/css/mayerwebcss.css'>
    <link rel='stylesheet' type='text/css' href='assests/css/style.css'>
    <link rel="stylesheet" type="text/css" href="assests/bootstrap/font-awesome/css/font-awesome.min.css">
    <link rel='stylesheet' type='text/css' href='assests/css/google-fonts.css'>



</head>
<body style="background: #000019">

<div id="wrapper">
    <!-- Navigation -->
    <nav  class="navbar navbar-default navbar-fixed-top" role="navigation" style="margin-bot" id="navbar-home">
        <div style="background: #000019" class="container-fluid">
            <div  class="navbar-header">
                <a class="navbar-brand" href="index.php"><p style="color: #FFF;" id="navbrand">Movie Review</p></a>
            </div>

    </nav>
<?php
if(isset($_SESSION['userid'])){ ?>

    <div class="container" style="margin-top: 60px;">
        <div style="background: #000019;color: #FFF;" align="right">

                <p>Welcome <?php echo $_SESSION['userid']['firstname'];?></p><br>

                <a class="btn btn-info" href="User_panel/logout.php" ><i class="fa fa-sign-out" aria-hidden="true"> Sign Out</i></a>

        </div>
    </div>
<?php }else{ ?>

    <div class="container" style="margin-top: 60px;">
        <div style="background: #000019" id="page-wrapper" align="right">
              <a class="btn btn-info" href="User_panel/login.php">Log In</a>
              <a class="btn btn-info" href="User_panel/create.php" >Sign up</a>
        </div>
    </div>
<?php } ?>

    <div class="container">
        <div class="col-md-12">
            <form action="" class="form-inline" method="get">
                <select name="category" class="form-control" style="width: 200px;" required>

                    <option value="">Search</option>
                    <option value="All">All</option>
                    <option value="Horror">Horror</option>
                    <option value="Action">Action</option>
                    <option value="Romantic">Romantic</option>

                </select>
                <input class="form-control btn btn-success" type="submit" value="submit">
            </form>
        </div>
    </div>

    <div style="margin-top: 80px" class="container">

            <div class="container">
            <div style="color: #FFF;" align="left">
                <?php if ((!empty($_GET)) && !($_GET['category']=="All")){ ?>
                <p style="font-size: 30px">All <?php echo $allinfo[0]['category'];?> Movies<p>

                <?php } else { ?>
                <p style="font-size: 30px">All Movies<p>
                <?php } ?>
            </div>
                <br><br><br>
                <div class="row">
                <?php
                if (!empty($allinfo))
                foreach ($allinfo as $item) { ;?>

                    <div class="col-md-4" style="margin-bottom: 30px;">

                        <a href="movie_details.php?movie_id=<?php echo$item['movie_id'];?>"> <img height="200" width="300" src= "<?php echo $root.$item['moviepic']?>"></a><br><br>
                        <p style="color: #FFF;"><?php echo $item['moviename']?></p>
                    </div>

                <?php } ?>
                </div>
            </div>




    </div>

    <div class="footer" style="margin-top: 300px">

        <p>Copyright &copy;DOCTYPE Group. All Right Reserved</p>

    </div>
</div>


<script src='assests/js/jquery.min.js' ></script>
<script src='assests/bootstrap/js/bootstrap.min.js' ></script>


</body>
</html>
