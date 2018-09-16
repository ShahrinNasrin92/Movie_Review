<?php


if ($_POST) {

    if(isset($_FILES['pic']['name']) && !empty($_FILES['pic']['name']))
    {
        $moviepic = $_FILES['pic']['name'];
        $tmp = $_FILES['pic']['tmp_name'];
    }
    try {
        $pdo = new PDO('mysql:host=localhost; dbname=movie', 'root', '');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $query= "UPDATE moviedetails SET moviename = :Name,
            director = :Director,
            cast = :Cast, 
            moviepic = :Picure, 
            description = :Description, 
            category = :Category, 
            avgrate = :Avg   
            WHERE movie_id = :ID";
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(':Name', $_POST['moviename'], PDO::PARAM_STR);
        $stmt->bindParam(':Director', $_POST['director'], PDO::PARAM_STR);
        $stmt->bindParam(':Cast', $_POST['cast'], PDO::PARAM_STR);
        $stmt->bindParam(':Picure', $moviepic, PDO::PARAM_STR);
        $stmt->bindParam(':Description', $_POST['description'], PDO::PARAM_STR);
        $stmt->bindParam(':Category', $_POST['category'], PDO::PARAM_STR);
        $stmt->bindParam(':Avg', $_POST['avgrate'], PDO::PARAM_STR);
        // use PARAM_STR although a number
        $stmt->bindParam(':ID', $_POST['movie_id'], PDO::PARAM_STR);
        $a = $stmt->execute();

        if($a){
            session_start();
            move_uploaded_file($tmp,"../assests/movie_images/".$moviepic);
            $_SESSION['msg'] = "<div class='col-md-4' style='background-color: #00cc00;padding:10px;color:#FFF;'>Updated Successfully</div>";
            header('location: list.php');
        } else {
            $_SESSION['msg'] = "<div class='col-md-4' style='background-color: #FF0000;padding:10px;color:#FFF;'>Something went wrong</div>";
            header("location: list.php");
        }
    }
    catch(PDOException $e) {
        echo 'Error: ' . $e->getMessage();

    }

}

?>