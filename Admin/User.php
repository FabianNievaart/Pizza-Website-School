<?php

include_once ('connection.php');

class User{

    private $db;

    public function __construct(){
        $this->db = new Connection();
        $this->db = $this->db->dbConnect();
    }

    public function Login($name, $pass){
        if (!empty($name) && !empty($pass)) {
            $st = $this->db->prepare("select * from admin where admin_username=? and admin_password=?");
            $st->bindParam(1, $name);
            $st->bindParam(2, $pass);
            $st->execute();

            if($st->rowCount() == 1){
                echo "User verified, Acces granted.";
                $_SESSION['use'] = [$pass];
                header('location: database.php');

            }else{
                echo "Incorrect username or Password";
            }


        } else {
            echo "Please enter username and password";
        }
    }

    }

?>