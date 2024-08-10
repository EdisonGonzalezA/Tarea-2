<?php
    //TODO: Clase de Factura
    require_once('../config/config.php');

    class Factura{

        //TODO: Implementar los metodos de la clase

        public function todos() //select * from factura
        {
            $con = new ClaseConectar();
            $con = $con->ProcedimientoParaConectar();
            $cadena = "SELECT * FROM `factura`";
            $datos = mysqli_query($con, $cadena);
            $con->close();
            return $datos;
        }

        public function uno($idFactura) //select * from factura where id = $idFactura
        {
            $con = new ClaseConectar();
            $con = $con->ProcedimientoParaConectar();
            $cadena = "SELECT * FROM `factura` WHERE `idFactura`=idFactura";
            $datos = mysqli_query($con, $cadena);
            $con->close();
            return $datos;
        }

        public function insertar($Fecha, $Sub_Total, $Sub_Total_IVA, $Valor_IVA, $Cliente_idCliente) //insert into factura values($datos)
        {
            try{
                $con = new ClaseConectar();
                $con = $con->ProcedimientoParaConectar();
                $cadena = "INSERT INTO `factura`(`Fecha`, `Sub_Total`, `Sub_Total_IVA`, `Valor_IVA`, `Cliente_idCliente`) VALUES ('$Fecha','$Sub_Total','$Sub_Total_IVA','$Valor_IVA','$Cliente_idCliente')";
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

        public function actualizar($idFactura, $Fecha, $Sub_Total, $Sub_Total_IVA, $Valor_IVA, $Cliente_idCliente) //update factura set $datos where id = $idFactura
        {
            try{
                $con = new ClaseConectar();
                $con = $con->ProcedimientoParaConectar();
                $cadena = "UPDATE `factura` SET `Fecha`='$Fecha',`Sub_Total`='$Sub_Total',`Sub_Total_IVA`='$Sub_Total_IVA',`Valor_IVA`='$Valor_IVA',`Cliente_idCliente`='$Cliente_idCliente' WHERE `idFactura`= $idFactura";
                if(mysqli_query($con, $cadena)){
                return $idFactura;
                }else{
                return $con->error;
                }
            }catch(Exception $th){
                return $th->getMessage();
            }finally{
                $con->close();
            }
        }

        public function eliminar($idFactura) //delete from factura where id = $idFactura
        {
            try{
                $con = new ClaseConectar();
                $con = $con->ProcedimientoParaConectar();
                $cadena = "DELETE FROM `factura` WHERE `idFactura`= $idFactura";
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