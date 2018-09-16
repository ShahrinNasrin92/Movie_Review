<?php


namespace App\Registration;
session_start();

use PDO;


class Registers
{
    private $firstname;
    private $lastname;
    private $email;
    private $password;
    private $conpassword;

    public function setdata($data="")
    {

        if(isset($data['first_name']) && !empty($data['first_name'])){
            $this->firstname = $data['first_name'];
        }
        else{
            $_SESSION['first_name'] = "First name field is required";
            header('location: create.php');
        }

        if(isset($data['last_name'])  && !empty($data['last_name'])){
            $this->lastname = $data['last_name'];
        }
        else{
            $_SESSION['last_name'] = "Last name field is required";
            header('location: create.php');
        }

        // For filtering the email

        if(isset($data['email']) && !empty($data['email'])){
            $this->email = stripslashes($data['email']);

        }
        
        else{
            $_SESSION['email'] = "Email field is required";
            header('location: create.php');
        }


        // For checking the password length
    
        if(isset($data['password']) && !empty($data['password'])){
            $this->password = stripslashes($data['password']);
        }
        else{
            $_SESSION['password'] = "Password field is required";
            header('location: create.php');
        }

        // Match password with confirm password

        if(isset($data['conpassword']) && !empty($data['conpassword'])){
            $this->conpassword = stripslashes($data['conpassword']);
        }
        else{
            $_SESSION['conpassword'] = "Confirm Password field is required";
            header('location: create.php');
        }


        return $this;
    }

    public function getlist()
    {
        $pdo = new PDO('mysql:host=localhost; dbname=movie', 'root', '');
        $query= 'SELECT * FROM `registerrs`';
        $stmt = $pdo->prepare($query);
        $stmt->execute();
        $data22=$stmt->fetchAll();
        return $data22;
    }

    public  function getdata(){

        if(($this->password ) !== ($this->conpassword)){
            $_SESSION['conpassword'] = "Password and confirm password does not match.";
            header('location: create.php');
        }
            else{

                 try {
                $pdo = new PDO('mysql:host=localhost; dbname=movie', 'root', '');
                     $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $query= 'INSERT INTO registerrs(id, firstname, lastname, email, password, user_type) VALUES (:id, :fname, :lname, :email, :pass, :user_type)';
                $stmt = $pdo->prepare($query);
                $status= $stmt->execute(
                     array(
                        ':id' => NULL,
                        ':fname' => $this->firstname,
                        ':lname'=>$this->lastname,
                        ':email'=> $this->email,
                        ':pass'=>$this->password,
                        ':user_type' => "user"
                    )
                );

                     if ($status)
                     {
                         $_SESSION['userid']['firstname'] = $this->firstname;
                         header("location: ../index.php");
                     }
                     else
                         {
                             $_SESSION['Messege'] = "<div class='col-md-4' style='background-color: #FF0000;padding:10px;color:#FFF;'>Something went wrong</div>";
                         header("location: ../User_panel/create.php");
                     }

                 }

            catch(PDOException $e)
            {
                echo 'Error: ' . $e->getMessage();

            }
        }     
    }


}










