<?php 

    class user{

        private $db;
        

        function __construct($conn){
            $this->db = $conn;
        }

        public function insertUser($email,$password){
            try {
                $result = $this->getUserbyUsername($email);
                if($result['num'] > 0){
                    return false;
                } else{
                    
                    $sql = "INSERT INTO tt (email,password) VALUES (:email,:password)";

                    $stmt = $this->db->prepare($sql);
      
                    $stmt->bindparam(':email',$email);
                    $stmt->bindparam(':password',$password);
                    

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
                $sql = "select * from alumnos where email = :email AND password = :password ";
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
                $sql = "select count(*) as num from tt where email = :email";
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
                $sql = "SELECT * FROM tt";
                $result = $this->db->query($sql);
                return $result;
            }catch(PDOException $e){
                echo $e->getMessage();
                return false;
            }
        }
    }
?>