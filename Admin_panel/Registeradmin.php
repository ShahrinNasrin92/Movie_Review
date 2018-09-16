<?php

include('../vendor/autoload.php');
session_start();

$reg1 = new Registeradmin();
$reg1->setdata($_POST)->getdata();



class Registeradmin
{

    private $firstname;
    private $lastname;
    private $email;
    private $password;
    private $conpassword;

    public function setdata($data="")
    {

        if(isset($data['first_name'])){
            $this->firstname = $data['first_name'];
        }


        if(isset($data['last_name'])){
            $this->lastname = $data['last_name'];
        }

        if(isset($data['email'])){
            $this->email = stripslashes($data['email']);
        }


        if(isset($data['password'])){
            $this->password = stripslashes($data['password']);
        }

        if(isset($data['conpassword'])){
            $this->conpassword = stripslashes($data['conpassword']);
        }

        return $this;
    }




    public  function getdata(){

        if(($this->password ) !== ($this->conpassword)){
            $_SESSION['Message'] = "<div class='col-md-12' style='background-color: #FF0000;padding:10px;color:#FFF;'>Password and Confirm Password Doesn't Match</div>";
            header('location: adcreate.php');
        }
        else{

            try {
                $pdo = new PDO('mysql:host=localhost; dbname=movie', 'root', '');

                $query= 'INSERT INTO registerrs(id, firstname, lastname, email, password, user_type) VALUES (:id, :fname, :lname, :email, :pass, :user_type)';
                $stmt = $pdo->prepare($query);
                $status= $stmt->execute(
                    array(
                        ':id' => NULL,
                        ':fname' => $this->firstname,
                        ':lname'=>$this->lastname,
                        ':email'=> $this->email,
                        ':pass'=>$this->password,
                        ':user_type' => "admin"
                    )
                );

                if ($status) {
                    $_SESSION['adminid'] = $status;
                    header("location: index.php");
                }
                else {
                    $_SESSION['Messege'] = "<div class='col-md-4' style='background-color: #FF0000;padding:10px;color:#FFF;'>Something went wrong</div>";
                    header("location: adcreate.php");
                }



            }
            catch(PDOException $e) {
                echo 'Error: ' . $e->getMessage();

            }
        }
    }



}