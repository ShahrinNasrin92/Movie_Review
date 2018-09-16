<!DOCTYPE html>
<html >
<head>

    <title>Admin panel</title>

    <link rel="stylesheet" type="text/css" href="../assests/bootstrap/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/bootstrap.min.css" >




</head>

<?php

require_once 'ad_movie.php';
$details = new Movies();

$allinfo =  $details->getlist();


?>

<div class="container" style="margin-top: 20px;">


    <div align="center" style="margin-bottom: 30px;" class="row">
        <h3><span style="background-color: #5BC0DE;color:#FFF;padding: 10px;">Admin Panel</span></h3>
    </div>

    <div align="center" style="margin-bottom: 30px;">
        <a class="btn btn-info" href="index.php">Main Panel</a>
    </div>

    <div align="center" style="margin-bottom: 30px;" class="row">
        <a href="add.php" class="btn btn-info">Add Movies</a>
    </div>

    <?php

    if (!empty($_SESSION['msg'])) {
        echo $_SESSION['msg'];
        unset($_SESSION['msg']);
    }

    ?>

    <table class="table table-bordered">
        <thead>
        <tr>
            <td>Sl No.</td>
            <td>Movie Name</td>
            <td>Category</td>
            <td>Movie Pic</td>
            <td>Rating</td>
            <td>Action</td>
        </tr>
        </thead>
        <tbody>
        <?php
        $i = 0;
        $root = "../assests/movie_images/";
        foreach ($allinfo as $item2) { $i++;?>


            <tr>
                <td class="col-md-1"><?php echo $i;?></td>
                <td class="col-md-2"><?php echo $item2['moviename'];?></td>
                <td class="col-md-2"><?php echo $item2['category'];?></td>
                <td class="col-md-1">
                    <?php
                    if (!empty($item2['moviepic'])) { ?>

                        <a href="<?php echo $root.$item2['moviepic'];?>"><img height="85px" width="100%" src="<?php echo $root.$item2['moviepic'];?>"></a>
                    <?php } ?>
                </td>
                <td class="col-md-1"><?php echo $item2['avgrate'];?></td>
                <td class="col-md-2"><a class="btn btn-info" href="update.php?id=<?php echo $item2['movie_id']?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> </a> <a class="btn btn-danger" href="del.php?id=<?php echo $item2['movie_id']?>"><i class="fa fa-trash-o" aria-hidden="true"></i></a></td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
</div>


</html>