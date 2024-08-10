<?php
    //TODO: Clase de IVA
    require_once('../config/config.php');

    class IVA{

        //TODO: Implementar los metodos de la clase

        public function todos() //select * from IVA
        {
            $con = new ClaseConectar();
            $con = $con->ProcedimientoParaConectar();
            $cadena = "SELECT * FROM `iva`";
            $datos = mysqli_query($con, $cadena);
            $con->close();
            return $datos;
        }

        public function uno($idIVA) //select * from IVA where id = $idIVA
        {
            $con = new ClaseConectar();
            $con = $con->ProcedimientoParaConectar();
            $cadena = "SELECT * FROM `iva` WHERE `idIVA`=idIVA";
            $datos = mysqli_query($con, $cadena);
            $con->close();
            return $datos;
        }

        public function insertar($Detalle, $Estado) //insert into IVA values($datos)
        {
            try{
                $con = new ClaseConectar();
                $con = $con->ProcedimientoParaConectar();
                $cadena = "INSERT INTO `iva`(`Detalle`, `Estado`) VALUES ('$Detalle','$Estado')";
                if(mysqli_query($con, $cadena)){
                return $con->insert_id;
                }else{
                return $con->error;
                }
            }catch(Exception $th){
                return $th->getMessage();
            }finally{
                $con->close();
            }
        }

        public function actualizar($idIVA, $Detalle, $Estado) //update IVA set $datos where id = $idIVA
        {
            try{
                $con = new ClaseConectar();
                $con = $con->ProcedimientoParaConectar();
                $cadena = "UPDATE `iva` SET `Detalle`='$Detalle',`Estado`='$Estado' WHERE `idIVA`= $idIVA";
                if(mysqli_query($con, $cadena)){
                return $idIVA;
                }else{
                return $con->error;
                }
            }catch(Exception $th){
                return $th->getMessage();
            }finally{
                $con->close();
            }
        }

        public function eliminar($idIVA) //delete from IVA where id = $idIVA
        {
            try{
                $con = new ClaseConectar();
                $con = $con->ProcedimientoParaConectar();
                $cadena = "DELETE FROM `iva` WHERE `idIVA`= $idIVA";
                if(mysqli_query($con, $cadena)){
                return "ok";
                }else{
                return $con->error;
                }
            }catch(Exception $th){
                return $th->getMessage();
            }finally{
                $con->close();
            }
        }
    }