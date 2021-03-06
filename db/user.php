<?php 

    class user{
        // private database object\
        private $db;
        
        //constructor to initialize private variable to the database connection
        function __construct($conn){
            $this->db = $conn;
        }

        public function insertUser($email,$password){
            try {
                $result = $this->getUserbyUsername($email);
                if($result['num'] > 0){
                    return false;
                } else{
                    
                    // define sql statement to be executed
                    $sql = "INSERT INTO alumno (email,password) VALUES (:email,:password)";
                    //prepare the sql statement for execution
                    $stmt = $this->db->prepare($sql);
                    // bind all placeholders to the actual values
                    $stmt->bindparam(':email',$email);
                    $stmt->bindparam(':password',$password);
                    
                    // execute statement
                    $stmt->execute();
                    return true;
                }
                
        
            } catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }
        }

        public function getUser($email,$password){
            try{
                $sql = "select * from alumno where email = :email AND password = :password ";
                $stmt = $this->db->prepare($sql);
                $stmt->bindparam(':email', $email);
                $stmt->bindparam(':password', $password);
                $stmt->execute();
                $result = $stmt->fetch();
                return $result;
           }catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }
        }

        public function getUserProfesor($email,$password){
            try{
                $sql = "select * from profesores where email = :email AND password = :password ";
                $stmt = $this->db->prepare($sql);
                $stmt->bindparam(':email', $email);
                $stmt->bindparam(':password', $password);
                $stmt->execute();
                $result = $stmt->fetch();
                return $result;
           }catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }
        }

        public function getUserbyUsername($email){
            try{
                $sql = "select count(*) as num from alumno where email = :email";
                $stmt = $this->db->prepare($sql);
                $stmt->bindparam(':email',$email);
                
                $stmt->execute();
                $result = $stmt->fetch();
                return $result;
            }catch (PDOException $e) {
                    echo $e->getMessage();
                    return false;
            }
        }

        public function getUsers(){
            try{
                $sql = "SELECT * FROM alumno";
                $result = $this->db->query($sql);
                return $result;
            }catch(PDOException $e){
                echo $e->getMessage();
                return false;
            }
        }
    }
?>