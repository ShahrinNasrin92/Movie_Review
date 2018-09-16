<?php
error_reporting(0);
$root = "assests/movie_images/";
session_start();

if(isset( $_SESSION['Message']))
{
    echo $_SESSION['Message'];
    unset ($_SESSION['Message']);
}
$_SESSION['url'] = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
if (!empty($_GET)){

    $movie_id = $_GET['movie_id'];
    $user_id = $_SESSION['userid']['id'];
    $pdo = new PDO('mysql:host=localhost;dbname=movie', 'root', '');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $query = "SELECT * FROM moviedetails WHERE movie_id = ?";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$movie_id]);
    $item = $stmt->fetch();

    $query = "SELECT * FROM comment_rating WHERE movie_id = ? AND id = ?";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$movie_id,$user_id]);
    $cmnt = $stmt->fetch();

    $query = "SELECT COUNT(rating) AS count FROM comment_rating WHERE movie_id = ?";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$movie_id]);
    $count = $stmt->fetch();

    $query = "SELECT * FROM comment_rating c LEFT JOIN registerrs r ON c.id = r.id WHERE c.movie_id = ? ORDER BY c.comment_id DESC";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$movie_id]);
    $allcmnt = $stmt->fetchAll();


}


if (!empty($_POST)){
    if (!empty($cmnt)){

        $pdo = new PDO('mysql:host=localhost; dbname=movie', 'root', '');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $query= "UPDATE comment_rating SET comment = :Comment,
            rating = :rating           
            WHERE movie_id = :Movie_id AND id = :ID";
        $stmt = $pdo->prepare($query);

        $stmt->bindParam(':Comment', $_POST['comment'], PDO::PARAM_STR);
        $stmt->bindParam(':rating', $_POST['rating'], PDO::PARAM_STR);

        $stmt->bindParam(':Movie_id', $movie_id, PDO::PARAM_STR);
        $stmt->bindParam(':ID', $_SESSION['userid']['id'], PDO::PARAM_STR);
        $a = $stmt->execute();

        if ($a) {
            $movie_id = $_GET['movie_id'];
            $query = "SELECT AVG(rating) AS avg FROM comment_rating WHERE movie_id = ?";
            $stmt = $pdo->prepare($query);
            $stmt->execute([$movie_id]);
            $avg = $stmt->fetch();

            $query= "UPDATE moviedetails SET avgrate = :avg          
            WHERE movie_id = :Movie_id";
            $stmt = $pdo->prepare($query);

            $stmt->bindParam(':avg', $avg['avg'], PDO::PARAM_STR);
            $stmt->bindParam(':Movie_id', $movie_id, PDO::PARAM_STR);
            $a = $stmt->execute();

            header("location: movie_details.php?movie_id=$movie_id");
        } else {
            $_SESSION['Messege'] = "<div class='col-md-4' style='background-color: #FF0000;padding:10px;color:#FFF;'>Something went wrong</div>";
            header("location: movie_details.php?movie_id=$movie_id");
        }
    }
    else {
        $movie_id = $_GET['movie_id'];
        $id = $_SESSION['userid']['id'];
        $comment = $_POST['comment'];
        $rating = $_POST['rating'];

        $pdo = new PDO('mysql:host=localhost; dbname=movie', 'root', '');

        $query = 'INSERT INTO comment_rating(movie_id, id, comment, rating) VALUES (:movie_id, :id, :comment, :rating)';
        $stmt = $pdo->prepare($query);
        $status = $stmt->execute(
            array(
                ':movie_id' => $movie_id,
                ':id' => $id,
                ':comment' => $comment,
                ':rating' => $rating
            )
        );

        if ($status) {
            $movie_id = $_GET['movie_id'];
            $query = "SELECT AVG(rating) AS avg FROM comment_rating WHERE movie_id = ?";
            $stmt = $pdo->prepare($query);
            $stmt->execute([$movie_id]);
            $avg = $stmt->fetch();

            $query= "UPDATE moviedetails SET avgrate = :avg           
            WHERE movie_id = :Movie_id";
            $stmt = $pdo->prepare($query);

            $stmt->bindParam(':avg', $avg['avg'], PDO::PARAM_STR);
            $stmt->bindParam(':Movie_id', $movie_id, PDO::PARAM_STR);
            $a = $stmt->execute();

            header("location: movie_details.php?movie_id=$movie_id");
        } else {
            $_SESSION['Messege'] = "<div class='col-md-4' style='background-color: #FF0000;padding:10px;color:#FFF;'>Something went wrong</div>";
            header("location: movie_details.php?movie_id=$movie_id");
        }
    }


}



?>

<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <title>Movie Review</title>

    <link rel='stylesheet' type='text/css' href='assests/css/stars.css'>
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
    <nav class="navbar navbar-default navbar-fixed-top" role="navigation"  id="navbar-home">
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

        </div>
    </div>
<?php } ?>


    <div class="container">

            <div class="container">
                <div class="row">
                    <div class="col-md-12" style="margin-bottom: 30px;">
                        <img height="310" width="650" src= "<?php echo $root.$item['moviepic']?>"><br><br>
                    </div>
                </div>

                <div class="row container" style="margin-bottom: 12px;">
                    <p style="color: #FFF;font-size: 25px"><u><?php echo $item['moviename']?></u></p>
                </div>

                <div class="row container" style="margin-bottom: 12px;">
                    <p style="color: #FFF;font-size: 15px">Director: <?php echo $item['director']?></p>
                </div>

                <div class="row container" style="margin-bottom: 42px;">
                    <p style="color: #FFF;font-size: 15px">Actors: <?php echo $item['cast']?></p>
                </div>

                <div class="row container" style="margin-bottom: 12px;">
                    <p style="color: #FFF;font-size: 25px"><u>Storyline</u></p>
                </div>

                <div class="row container" style="margin-bottom: 42px;">
                    <p style="color: #FFF;font-size: 15px"><?php echo $item['description']?></p>
                </div>

                <div class="row container" style="margin-bottom: 12px;">
                    <p style="color: #FFF;font-size: 25px"><u>Average Rating</u></p>
                </div>

                <div class="row container" style="margin-bottom: 10px;">
                    <p style="color: #FFF;font-size: 15px"><?php echo $item['avgrate']?> / 5</p>
                </div>
                <div class="row container" style="margin-bottom: 42px;">
                    <p style="color: #FFF;font-size: 15px">Based on <?php echo $count['count'];?> users rating</p>
                </div>

                <?php
                if(isset($_SESSION['userid'])){ ?>

                <form action="" method="post">
                    <div class="row container" style="margin-bottom: 12px;">
                        <?php if(empty($cmnt['rating'])){ ?>
                        <p style="color: #FFF;font-size: 25px;margin-bottom: 20px;"><u>Rate This Movie</u></p>
                        <?php }else { ?>
                        <p style="color: #FFF;font-size: 25px;margin-bottom: 20px;"><u>Your Rating</u></p>
                        <?php } ?>
                    <fieldset class="rating">

                        <input type="radio" <?php echo (($cmnt['rating'])=="5")?'Checked':'';?> id="star5" name="rating" value="5" /><label class = "full" for="star5" title="Awesome - 5 stars"></label>
                        <input type="radio" <?php echo (($cmnt['rating'])=="4")?'Checked':'';?> id="star4" name="rating" value="4" /><label class = "full" for="star4" title="Pretty good - 4 stars"></label>

                        <input type="radio" <?php echo (($cmnt['rating'])=="3")?'Checked':'';?> id="star3" name="rating" value="3" /><label class = "full" for="star3" title="Medium - 3 stars"></label>

                        <input type="radio" <?php echo (($cmnt['rating'])=="2")?'Checked':'';?> id="star2" name="rating" value="2" /><label class = "full" for="star2" title="Kinda Bad - 2 stars"></label>

                        <input type="radio" <?php echo (($cmnt['rating'])=="1")?'Checked':'';?> id="star1" name="rating" value="1" /><label class = "full" for="star1" title="Worst - 1 star"></label>

                    </fieldset>
                    </div>
                    <br>
                    <div class="row container" style="margin-bottom: 12px;">
                        <?php if(empty($cmnt['comment'])){ ?>
                            <p style="color: #FFF;font-size: 25px;margin-bottom: 20px;"><u>Comment Here</u></p>
                        <?php }else { ?>
                            <p style="color: #FFF;font-size: 25px;margin-bottom: 20px;"><u>Your Comment</u></p>
                        <?php } ?>
                    </div>

                    <textarea style="width: 450px;margin-bottom: 10px;" class="form-control" rows="5" placeholder="Comment" name="comment" required><?php if($cmnt['comment']) echo $cmnt['comment']; ?></textarea>
                    <input  style="width: 100px;" class="form-control btn btn-info" type="submit" value="Submit">
                </form>

            <?php } else { ?>
                <div class="row container" style="margin-bottom: 42px;">
                    <p style="color: #FFF;font-size: 15px">To Rate & Comment this Movie, You need to Login First.<a href="User_panel/login.php">Click Here</a> to login</p>
                </div>
                <?php } ?>

                <div class="row container" style="margin-bottom: 12px;margin-top: 20px;">
                    <p style="color: #FFF;font-size: 25px"><u>User Comments</u></p>
                </div>
                <?php
                if (!empty($allcmnt)){
                foreach ($allcmnt as $value) { ;?>
                <div class="row container" style="margin-bottom: 10px;">
                    <p style="color: #FFF;font-size: 15px"><?php echo $value['firstname']?> Says : <?php echo $value['comment']?></p>
                </div>
                <?php }} else { ?>
                <div class="row container" style="margin-bottom: 10px;">
                    <p style="color: #FFF;font-size: 15px">No User Comments</p>
                </div>
                <?php } ?>
            </div>




    </div>

    <div class="footer" style="margin-top: 300px">

        <p>Copyright &copy; DOCTYPE Group. All Right Reserved</p>

    </div>
</div>


<script src='assests/js/jquery.min.js' ></script>
<script src='assests/bootstrap/js/bootstrap.min.js' ></script>


</body>
</html>
