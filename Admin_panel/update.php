<?php

$id = $_GET['id'];

require_once 'ad_movie.php';

$details = new Movies();

$movie_by_id =  $details->getListById($id);



?>

    <!DOCTYPE html>
    <html >
    <head>

        <title>Update Movies</title>


        <link rel="stylesheet" type="text/css" href="../assests/bootstrap/font-awesome/css/font-awesome.min.css">
        <link rel="stylesheet" href="css/bootstrap.min.css" >
        <link rel="stylesheet" type="text/css" href="css/style.css">

    </head>

    <body>



    <div id="login" style="margin-top: 50px;">
        <div align="center" style="margin-bottom: 30px;">
            <a class="btn btn-info" href="list.php">Go Back</a>
        </div>
        <div id="triangle"></div>
        <h1>Update Movies</h1>

    <form action="up.php" method="POST" name="up" enctype="multipart/form-data">


        <input type="text" value="<?php echo $movie_by_id['moviename'];?>" class="input-data" placeholder="Movie Name" name="moviename" required />
        <input type="text" value="<?php echo $movie_by_id['director'];?>" class="input-data" placeholder="Director" name="director" required />
        <input type="text" value="<?php echo $movie_by_id['cast'];?>" class="input-data" placeholder="Casts" name="cast" required />
        <textarea class="input-data" rows="5" placeholder="Description" name="description" required><?php echo $movie_by_id['description'];?></textarea>
        <select class="input-data" name="category" required>
            <option value="">Select Category</option>
            <option value="Horror" <?php echo (($movie_by_id['category'])=="Horror")?'Selected':'';?>>Horror</option>
            <option value="Action" <?php echo (($movie_by_id['category'])=="Action")?'Selected':'';?>>Action</option>
            <option value="Romantic" <?php echo (($movie_by_id['category'])=="Romantic")?'Selected':'';?>>Romantic</option>
        </select>
        <input type="file" class="input-data" name="pic" />
        <input  type="hidden" class="input-data" name="movie_id" value="<?php echo $movie_by_id['movie_id'];?>">
        <input type="submit" value="Submit" name="submit" />


    </form>
    </div>




    <script src='../http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

    <script src="js/index.js"></script>




    </body>
    </html>
<?php
