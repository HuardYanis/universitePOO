<?php

    class DB {


        protected $pdo;

        public function __construct($dbname , $dbhost, $dbuser, $password) {
            
            $this->pdo = new PDO("mysql:host=".$dbhost.";dbname=".$dbname.";charset=UTF8", $dbuser , $password) ;
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);  
            return $this->pdo;
                  

        }

        public function inscriptionEtudiant($email,$lastname,$firstname, $password) {

            $sql1 = $this->pdo->prepare("SELECT * FROM student WHERE email=?");
            $sql1->execute([$email]);
    
                // $check_mail = $sql1->fetchAll();
    
            if($sql1->rowCount()== 0){
    
                $sql2 = $this->pdo->prepare("INSERT INTO student ( firstname, lastname, email, password) VALUES (?,?,?,?)");
                $sql2->execute([$firstname,$lastname,$email, $password]);
    
    
            }else{
                
                echo "mail existant";
    
            }
    
        
        }

        public function connection($email, $password) {



            $sql= $this->pdo->prepare("SELECT * FROM student WHERE email='$email'");
            $sql->execute();
            // $info = $sql->fetch();

            if($sql->rowCount()==1) {

                $info = $sql->fetch(PDO::FETCH_ASSOC);
    
            if(password_verify($password, $info["password"])){

                echo "connecter";
            

            }else{
                echo "mauvais password";
            }


            }else{

                echo "mail inexistant";
            }

        }

    }


?>










