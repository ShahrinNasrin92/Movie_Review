<?php

include('../vendor/autoload.php');


use App\Registration\Registers;

$detail = new Registers();
$allinfo2 =  $detail->getlist();


?>

<!DOCTYPE html>
<html >
<head>

    <title>Admin panel</title>

    <link rel="stylesheet" type="text/css" href="../assests/bootstrap/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/bootstrap.min.css" >



</head>



<div class="container" style="margin-top: 20px;">


    <div align="center" style="margin-bottom: 30px;" class="row">
        <h3><span style="background-color: #5BC0DE;color:#FFF;padding: 10px;">Welcome to Admin Panel</span></h3>
    </div>

    <div align="center" style="margin-bottom: 30px;">
        <a class="btn btn-info" href="index.php">Main Panel</a>
    </div>


    <?php

    if (!empty($_SESSION['msg'])) {
        echo $_SESSION['msg'];
        unset($_SESSION['msg']);
    }

    ?>


    <table class="table table-bordered table-striped">
        <thead>
        <tr>
            <td>Sl No.</td>
            <td>First Name</td>
            <td>Last Name</td>
            <td>Email</td>
            <td>Password</td>
            <td>Action</td>
        </tr>
        </thead>
        <tbody>
        <?php
     $i = 0;

        foreach ($allinfo2 as $usitem) { $i++;?>


            <tr>
                <td class="col-md-1"><?php echo $i;?></td>

                <td class="col-md-2"><?php echo $usitem['firstname'];?></td>
                <td class="col-md-2"><?php echo $usitem['lastname'];?></td>
                <td class="col-md-3"><?php echo $usitem['email'];?></td>
                <td class="col-md-3"><?php echo $usitem['password'];?></td>
                <td class="col-md-1"><a class="btn btn-danger" href="userdel.php?id=<?php echo $usitem['id']?>"><i class="fa fa-trash-o" aria-hidden="true"></i></a></td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
</div>

</html>