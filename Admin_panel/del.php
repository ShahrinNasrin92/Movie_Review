<?php


	   $id = $_GET['id'];

	   $pdo = new PDO('mysql:host=localhost; dbname=movie', 'root', '');
	   $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	   $sql = "DELETE FROM moviedetails WHERE movie_id =  :ID";
	   $stmt = $pdo->prepare($sql);
	   $stmt->bindParam(':ID', $id, PDO::PARAM_INT);   
	   $a = $stmt->execute();

	   if($a){

	   		session_start();
	    	$_SESSION['msg'] = "<div class='col-md-4' style='background-color: #00cc00;padding:10px;color:#FFF;'>Deleted Successfully</div>";
	    	header('location: list.php');
	    } else {
	    	$_SESSION['msg'] = "<div class='col-md-4' style='background-color: #FF0000;padding:10px;color:#FFF;'>Something went wrong</div>";
            header("location: list.php");
        }

?>