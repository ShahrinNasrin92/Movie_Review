<?php
session_start();
if(!empty($_SESSION['adminid']))
{
    unset($_SESSION['adminid']);
    session_destroy();
    header('location: adlogin.php?logout=successfull');

}
?>