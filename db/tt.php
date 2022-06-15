<?php

    class tt {
        //private database object
        private $db;

        function __construct($conn){
            $this->db = $conn;
        }

        public function getInformacionTTByEmail($email){
            try{

                $sql = "SELECT titulo, resumen, estado, tt.id_tt FROM tt INNER JOIN alumno ON tt.id_tt = alumno.id_tt WHERE alumno.email = :email;";
                $stmt = $this->db->prepare($sql);
                $stmt->bindparam(':email', $email);
                $stmt->execute();
                $result = $stmt->fetch();
                return $result;

            }catch(PDOException $e){

                echo $e -> getMessage();
                return false;
                
            }
        }

        public function getMisTrabajosTerminales($id_profesor){
            try{
                $sql = "SELECT tt.titulo, tt.resumen, alumno.nombre FROM tt INNER JOIN profesores_tt ON profesores_tt.id_tt = tt.id_tt INNER JOIN profesores ON profesores.id_profesor = profesores_tt.id_profesor INNER JOIN alumno ON alumno.id_tt = tt.id_tt WHERE profesores.id_profesor = :id_profesor AND alumno.representante = 1;";
                $stmt = $this->db->prepare($sql);
                $stmt->bindparam(':id_profesor',$id_profesor);
                $stmt->execute();
                return $stmt;
            }catch(PDOException $e){

                echo $e -> getMessage();
                return false;
                
            }
        }

        public function updateTT($titulo, $resumen, $archivo, $id_tt){
            try{

                $sql = "UPDATE tt set titulo = :titulo , resumen = :resumen , archivo = :archivo WHERE id_tt = :id_tt;";
                $stmt = $this->db->prepare($sql);

                $stmt->bindparam(':titulo',$titulo);
                $stmt->bindparam(':resumen',$resumen);
                $stmt->bindparam(':archivo',$archivo);
                $stmt->bindparam(':id_tt',$id_tt);
                $stmt->execute();
                return true;

            }catch(PDOException $e){

                echo $e -> getMessage();
                return false;
                
            }
        }

        public function getDirectores($id_tt){
            try{
                $sql = "SELECT nombre FROM profesores INNER JOIN profesores_tt ON profesores.id_profesor = profesores_tt.id_profesor WHERE profesores_tt.id_tt = :id_tt AND profesores_tt.director= 1;";
                $stmt = $this->db->prepare($sql);
                $stmt->bindparam(':id_tt',$id_tt);
                $stmt->execute();
                return $stmt;
                
            }catch(PDOException $e){

                echo $e -> getMessage();
                return false;
                
            }
        }

        public function getSinodales($id_tt){
            try{
                $sql = "SELECT nombre FROM profesores INNER JOIN profesores_tt ON profesores.id_profesor = profesores_tt.id_profesor WHERE profesores_tt.id_tt = :id_tt AND profesores_tt.director = 0;";
                $stmt = $this->db->prepare($sql);
                $stmt->bindparam(':id_tt',$id_tt);
                $stmt->execute();
                return $stmt;
                
            }catch(PDOException $e){

                echo $e -> getMessage();
                return false;
                
            }
        }

        public function registrarCompañero($nombre, $emailIntegrante, $telefono, $boleta, $email){

            $id_tt = $this->getInformacionTTByEmail($email);

            try{
                $sql = "INSERT INTO `alumno`( `nombre`, `email`, `telefono`, `boleta`, `representante`, `id_tt`) VALUES (:nombre,:email,:telefono,:boleta,0,:id_tt);";
                $stmt = $this->db->prepare($sql);

                $stmt->bindparam(':nombre',$nombre);
                $stmt->bindparam(':email',$emailIntegrante);
                $stmt->bindparam(':telefono',$telefono);
                $stmt->bindparam(':boleta',$boleta);
                $stmt->bindparam(':id_tt',$id_tt['id_tt']);
                $stmt->execute();
                return true;
            }catch(PDOException $e){
                echo $e->getMessage();
                return false;
            }

        }

        public function getNumeroIntegrantes($id_tt){
            try{

                $sql = "SELECT COUNT(*) FROM `alumno` WHERE id_tt = :id_tt;";
                $stmt = $this->db->prepare($sql);
                $stmt->bindparam(':id_tt',$id_tt);
                $stmt->execute();
                return $stmt;

            }catch(PDOException $e){

                echo $e->getMessage();
                return false;
                
            }
            

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