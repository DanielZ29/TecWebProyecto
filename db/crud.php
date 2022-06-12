<?php

    class crud {
        //private database object
        private $db;

        function __construct($conn){
            $this->db = $conn;
        }

        public function insertInfo($nom,$email,$tel,$bol,$representante,$password){
            try{
                //statement de sql para ser ejecutado
                $sql = "INSERT INTO tt (nombre,email,telefono,boleta,representante,password) VALUES (:nom, :email, :tel, :bol,:representante, :password)";
                $stmt = $this->db->prepare($sql);

                //llenamos con valores verdaderos
                $stmt->bindparam(':nom',$nom);
                $stmt->bindparam(':email',$email);
                $stmt->bindparam(':tel',$tel);
                $stmt->bindparam(':bol',$bol);
                $stmt->bindparam(':representante',$representante);
                $stmt->bindparam(':password',$password);

                //ejecutamos
                $stmt->execute();
                return true;

            } catch(PDOException $e){
                echo $e -> getMessage();
                return false;
                
                }
        }

        public function editInfo($id,$nom,$email,$tel,$bol,$representante,$password){
            try{
                $sql = "UPDATE `tt` SET `nombre`=:nom,`email`=:email,`telefono`=:tel,`boleta`=:bol,`representante`=:representante,`password`=:password  WHERE TT_id = :id ";
                $stmt = $this->db->prepare($sql);

                //llenamos con valores verdaderos
                $stmt->bindparam(':id',$id);
                $stmt->bindparam(':nom',$nom);
                $stmt->bindparam(':email',$email);
                $stmt->bindparam(':tel',$tel);
                $stmt->bindparam(':bol',$bol);
                $stmt->bindparam(':representante',$representante);
                $stmt->bindparam(':password',$password);

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