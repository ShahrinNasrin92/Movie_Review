<?php
session_start();
if(!empty($_SESSION['userid']))
{
    unset($_SESSION['userid']);
    session_destroy();
    header('location: ../index.php');

}
?>