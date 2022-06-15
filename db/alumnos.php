<?php


    class alumnos {
        //private database object
        private $db;

        function __construct($conn){
            $this->db = $conn;
        }

        


        public function registrarRepresentante($nombre,$email,$telefono,$boleta,$password){
            try{
                $sql = "SELECT * FROM alumno WHERE email = '$email';";
                $result = $this->db->query($sql)->fetchAll();
                $resultCount = count($result);

                if($resultCount > 0){

                    echo "email";

                }else{

                    $sql = "SELECT * FROM alumno WHERE boleta = '$boleta';";
                    $result = $this->db->query($sql)->fetchAll();
                    $resultCount = count($result);

                    if($resultCount > 0){

                        echo "boleta";

                    }else{

                        // Crea un registro de TT nuevo
                        $sql = "INSERT INTO tt (titulo) VALUES ('Por Confirmar')";
                        $stmt = $this->db->prepare($sql);
                        $stmt->execute();

                        // Consulta el número del útltimo TT
                        $sql = "SELECT MAX(id_tt) as 'id_tt' FROM tt";
                        $result = $this->db->query($sql); 
                        $row = $result->fetch(PDO::FETCH_ASSOC);
                        $ultimoTT = (int)$row['id_tt'];


                        //Crea registro para el alumno
                        $sql = "INSERT INTO alumno (nombre,email,telefono,boleta,representante,password,id_tt) VALUES (:nombre, :email, :telefono, :boleta,1, :password , :id_tt)";
                        $stmt = $this->db->prepare($sql);

                        //llenamos con valores verdaderos
                        $stmt->bindparam(':nombre',$nombre);
                        $stmt->bindparam(':email',$email);
                        $stmt->bindparam(':telefono',$telefono);
                        $stmt->bindparam(':boleta',$boleta);
                        $stmt->bindparam(':password',$password);
                        $stmt->bindparam(':id_tt',$ultimoTT);

                        //ejecutamos
                        $stmt->execute();
                        return true;

                    }
                }
            }catch(PDOException $e){

                echo $e -> getMessage();
                return false;
                
            }
        }
        

        public function editInfo($nombre,$email,$telefono,$boleta,$password){
            try{
                $sql = "UPDATE `alumno` SET `nombre`=:nombre,`email`=:email,`telefono`=:telefono,`boleta`=:boleta,`password`=:password  WHERE email = :email ";
                $stmt = $this->db->prepare($sql);

                //llenamos con valores verdaderos
             
                $stmt->bindparam(':nombre',$nombre);
                $stmt->bindparam(':email',$email);
                $stmt->bindparam(':telefono',$telefono);
                $stmt->bindparam(':boleta',$boleta);
                $stmt->bindparam(':password',$password);
                

                //ejecutamos
                $stmt->execute();
                return true;
            }catch(PDOException $e){
                echo $e -> getMessage();
                return false;

            }
            
        }

        public function getInfo($id_alumno){
            $sql = "SELECT * FROM `alumno` WHERE email = :email_alumno;";
            $stmt = $this->db->prepare($sql);
            $stmt->bindparam(':email_alumno', $id_alumno);
            $stmt->execute();
            $result = $stmt->fetch();
            return $result;
        }

        public function getIntegrantes($id_tt){
            try{

                $sql = " SELECT * FROM `alumno` WHERE id_tt = :id_tt AND representante = 0;";
                $stmt = $this->db->prepare($sql);
                $stmt->bindparam(':id_tt',$id_tt);
                $stmt->execute();
                return $stmt;

            }catch(PDOException $e){

                echo $e -> getMessage();
                return false;
                
            }
            
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