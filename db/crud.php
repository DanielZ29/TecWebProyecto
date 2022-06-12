<?php

    class crud {
        //private database object
        private $db;

        function __construct($conn){
            $this->db = $conn;
        }

        public function insertInfo($nom,$email,$tel,$bol){
            try{
                //statement de sql para ser ejecutado
                $sql = "INSERT INTO tt (nombre,email,telefono,boleta)VALUES (:nom, :email, :tel, :bol)";
                $stmt = $this->db->prepare($sql);

                //llenamos con valores verdaderos
                $stmt->bindparam(':nom',$nom);
                $stmt->bindparam(':email',$email);
                $stmt->bindparam(':tel',$tel);
                $stmt->bindparam(':bol',$bol);

                //ejecutamos
                $stmt->execute();
                return true;

            } catch(PDOException $e){
                echo $e -> getMessage();
                return false;
                
                }
        }

        public function editInfo($id,$nom,$email,$tel,$bol){
            try{
                $sql = "UPDATE `tt` SET `nombre`=:nom,`email`=:email,`telefono`=:tel,`boleta`=:bol WHERE TT_id = :id ";
                $stmt = $this->db->prepare($sql);

                //llenamos con valores verdaderos
                $stmt->bindparam(':id',$id);
                $stmt->bindparam(':nom',$nom);
                $stmt->bindparam(':email',$email);
                $stmt->bindparam(':tel',$tel);
                $stmt->bindparam(':bol',$bol);

                //ejecutamos
                $stmt->execute();
                return true;
            }catch(PDOException $e){
                echo $e -> getMessage();
                return false;

            }
            
        }

        public function getInfo(){
            $sql = "SELECT * FROM `tt`;";
            $result = $this->db->query($sql);
            return $result;
        }

        public function deleteInfo($id){
            try{
                $sql = "delete from tt WHERE TT_id = :id ";
                $stmt = $this->db->prepare($sql);
                $stmt->bindparam(':id',$id);
                $stmt->execute();
                return true;

            }catch(PDOException $e){
                echo $e->getMessage();
                return false;
            }
        }

        public function getInfoDet($id){
            $sql = "select * from tt where tt_id = :id";
            $stmt = $this->db->prepare($sql);
            $stmt->bindparam(':id', $id);
            $stmt->execute();
            $result = $stmt->fetch();
            return $result;
        }
    }
?>