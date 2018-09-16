<?php
include ('../vendor/autoload.php');

use App\Registration\Registers;
$reg = new Registers();
if(!empty($_POST))
{
    $reg->setdata($_POST)->getdata();
}
