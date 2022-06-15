<?php

    class profesores {
        //private database object
        private $db;

        function __construct($conn){
            $this->db = $conn;
        }



        public function registrarProfesores($nombre,$email,$telefono,$password,$is_externo,$cv){
            try{
                $sql = "SELECT * FROM profesores WHERE email = '$email';";
                $result = $this->db->query($sql)->fetchAll();
                $resultCount = count($result);

                if($resultCount > 0){

                    echo "email";

                }else{

                    //Crea registro para el profesor
                    $sql = "INSERT INTO profesores (nombre,email,telefono,password,is_externo,cv) VALUES (:nombre, :email, :telefono,:password ,:is_externo,:cv)";
                    $stmt = $this->db->prepare($sql);

                    //llenamos con valores verdaderos
                    $stmt->bindparam(':nombre',$nombre);
                    $stmt->bindparam(':email',$email);
                    $stmt->bindparam(':telefono',$telefono);
                    $stmt->bindparam(':password',$password);
                    $stmt->bindparam(':is_externo',$is_externo);
                    $stmt->bindparam(':cv',$cv);

                    //ejecutamos
                    $stmt->execute();
                    return true;
                    
                }
            }catch(PDOException $e){

                echo $e -> getMessage();
                return false;
                
            }
        }
        

        public function editInfo($id_profesor,$nombre,$email,$telefono,$password){
            try{
                $sql = "UPDATE `profesores` SET `nombre`=:nombre,`email`=:email,`telefono`=:telefono,`password`=:password  WHERE id_profesor = :id_profesor ";
                $stmt = $this->db->prepare($sql);

                //llenamos con valores verdaderos
                $stmt->bindparam(':id_profesor',$id_profesor);
                $stmt->bindparam(':nombre',$nombre);
                $stmt->bindparam(':email',$email);
                $stmt->bindparam(':telefono',$telefono);
                $stmt->bindparam(':password',$password);

                //ejecutamos
                $stmt->execute();
                return true;
            }catch(PDOException $e){
                echo $e -> getMessage();
                return false;

            }
            
        }

        public function getInfo($id_profesor){
            $sql = "SELECT * FROM `profesores` WHERE email = :email_profesor;";
            $stmt = $this->db->prepare($sql);
            $stmt->bindparam(':email_profesor', $id_profesor);
            $stmt->execute();
            $result = $stmt->fetch();
            return $result;
        }

        public function deleteInfo($id_alumno){
            try{
                $sql = "delete from alumno WHERE id_alumno = :id_alumno ";
                $stmt = $this->db->prepare($sql);
                $stmt->bindparam(':id_alumno',$id_alumno);
                $stmt->execute();
                return true;

            }catch(PDOException $e){
                echo $e->getMessage();
                return false;
            }
        }

        public function getInfoDet($id_profesor){
            $sql = "select * from profesores where id_profesor = :id_profesor";
            $stmt = $this->db->prepare($sql);
            $stmt->bindparam(':id_profesor', $id_profesor);
            $stmt->execute();
            $result = $stmt->fetch();
            return $result;
        }
    }
?>