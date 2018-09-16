<!DOCTYPE html>
<html >
<head>

    <title>Add Movies</title>

    <link rel="stylesheet" type="text/css" href="../assests/bootstrap/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/bootstrap.min.css" >
    <link rel="stylesheet" type="text/css" href="css/style.css">

</head>

<body>

<div id="login" style="margin-top: 30px;">
    <div align="center" style="margin-bottom: 5px;">
        <a class="btn btn-info" href="list.php">Go Back</a>
    </div>
    <div id="triangle"></div>
    <h1>Add Movies</h1>

<form action="ad_movie.php" method="POST" enctype="multipart/form-data">


    <input type="text" class="input-data" placeholder="Movie Name" name="moviename" required />
    <input type="text" class="input-data" placeholder="Director" name="director" required />
    <input type="text" class="input-data" placeholder="Casts" name="cast" required />
    <textarea class="input-data" rows="5" placeholder="Description" name="description" required></textarea>
    <select class="input-data" name="category" required>
        <option value="">Select Category</option>
        <option value="Horror">Horror</option>
        <option value="Action">Action</option>
        <option value="Romantic">Romantic</option>
    </select>
    <input type="file" class="input-data" name="pic" />
    <input type="submit" value="Submit" name="submit" />

</form>

</div>





<script src='../http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

<script src="js/index.js"></script>




</body>
</html>
