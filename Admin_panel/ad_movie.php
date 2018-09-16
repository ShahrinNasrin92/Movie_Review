<?php


$details=new Movies();

if (!empty($_POST))
{
    $details->setdata($_POST)->getdata();
}
class Movies
{
    public $moviepic;
    public $moviename;
    public $description;
    private $director;
    private $cast;
    private $category;

    public function setdata($data="")
    {
        if(isset($_FILES['pic']['name']))
        {
            $this->moviepic = $_FILES['pic']['name'];
            $this->tmp = $_FILES['pic']['tmp_name'];
        }

        if(isset($data['moviename']))
        {
            $this->moviename = $data['moviename'];
        }
        if(isset($data['director']))
        {
            $this->director = $data['director'];
        }

        if(isset($data['cast']))
        {
            $this->cast = $data['cast'];
        }


        if(isset($data['description']))
        {
            $this->description = $data['description'];
        }

        if(isset($data['category']))
        {
            $this->category = $data['category'];
        }


        return $this;
    }


    public function getlist()
    {
        $pdo = new PDO('mysql:host=localhost; dbname=movie', 'root', '');
        $query= 'SELECT * FROM `moviedetails`';
        $stmt = $pdo->prepare($query);
        $stmt->execute();
        $data=$stmt->fetchAll();
        return $data;
    }


    public function getListById($id ="")
    {

        $pdo = new PDO('mysql:host=localhost; dbname=movie', 'root', '');

        $query= "SELECT * FROM `moviedetails` where movie_id = $id";
        $stmt = $pdo->prepare($query);
        $stmt->execute();
        $data=$stmt->fetch();
        return $data;
    }

    public  function getdata()

    {
        try {
            $pdo = new PDO('mysql:host=localhost; dbname=movie', 'root', '');

            $query = 'INSERT INTO moviedetails(moviepic,director,cast,category,moviename,description) VALUES (:movpic,:director,:cast,:category,:movname,:descrip)';
            $stmt = $pdo->prepare($query);
            $status = $stmt->execute(
                array(
                    ':movpic' => $this->moviepic,
                    ':movname' => $this->moviename,
                    ':category' => $this->category,
                    ':director' => $this->director,
                    ':cast' => $this->cast,
                    ':descrip' => $this->description,

                )
            );

            if ($status) {
                move_uploaded_file($this->tmp, "../assests/movie_images/" . $this->moviepic);

                $_SESSION['msg'] = "<div class='col-md-4' style='background-color: #00cc00;padding:10px;color:#FFF;'>Added Successfully</div>";
                header("location:list.php");
            } else {
                $_SESSION['msg'] = "<div class='col-md-4' style='background-color: #FF0000;padding:10px;color:#FFF;'>Something went wrong</div>";
                header("location: list.php");
            }


        }
        catch(PDOException $e) {
            echo 'Error: ' . $e->getMessage();

        }
    }
}
