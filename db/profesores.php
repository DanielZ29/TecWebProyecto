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
        

        public function editInfo($id_alumno,$nombre,$email,$telefono,$boleta,$representante,$password){
            try{
                $sql = "UPDATE `alumno` SET `nombre`=:nombre,`email`=:email,`telefono`=:telefono,`boleta`=:boleta,`representante`=:representante,`password`=:password  WHERE TT_id = :id_alumno ";
                $stmt = $this->db->prepare($sql);

                //llenamos con valores verdaderos
                $stmt->bindparam(':id_alumno',$id_alumno);
                $stmt->bindparam(':nombre',$nombre);
                $stmt->bindparam(':email',$email);
                $stmt->bindparam(':telefono',$telefono);
                $stmt->bindparam(':boleta',$boleta);
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
            $sql = "SELECT * FROM `alumno`;";
            $result = $this->db->query($sql);
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

        public function getInfoDet($id_alumno){
            $sql = "select * from alumno where id_alumno = :id_alumno";
            $stmt = $this->db->prepare($sql);
            $stmt->bindparam(':id_alumno', $id_alumno);
            $stmt->execute();
            $result = $stmt->fetch();
            return $result;
        }
    }
?>