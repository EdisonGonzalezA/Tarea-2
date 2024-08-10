<?php
//TODO: Controlador de Factura

require_once('../models/factura.model.php');
error_reporting(0);
$factura = new Factura;

switch ($_GET["op"]) {
//TODO: Operaciones de factura

    case 'todos'://TODO: Procedimiento para cargar todos los datos de los factura
        $datos = array(); //Defino un arreglo para almacenar los valores que vienen de la clase factura.model.php
        $datos = $factura->todos(); // LLamo al metodo todos de la clase factura.model.php
        while ($row = mysqli_fetch_assoc($datos)) { // Ciclo de repeticion para asociar los valores almacenados en la variable $datos
            $todos[] = $row;
        }
        echo json_encode($todos);
        break;
//TODO: Procedimiento para obtener un registro de la base de datos
    case 'uno':
        $idFactura = $_POST["idFactura"];
        $datos = array();
        $datos = $factura->uno($idFactura);
        $res = mysqli_fetch_assoc($datos);
        echo json_encode($res);
        break;
//TODO: Procedimineto para insertar un factura en la base de datos
    case 'insertar':
        $Fecha = $_POST["Fecha"];
        $Sub_Total = $_POST["Sub_Total"];
        $Sub_Total_IVA = $_POST["Sub_Total_IVA"];
        $Valor_IVA = $_POST["Valor_IVA"];
        $Cliente_idCliente = $_POST["Cliente_idCliente"];
        $datos = array();
        $datos = $factura->insertar($Fecha, $Sub_Total, $Sub_Total_IVA, $Valor_IVA, $Cliente_idCliente);
        echo json_encode($datos);
        break;
//TODO: Procedimineto para actualizar un factura en la base de datos
    case 'actualizar':
        $idFactura = $_POST["idFactura"];
        $Fecha = $_POST["Fecha"];
        $Sub_Total = $_POST["Sub_Total"];
        $Sub_Total_IVA = $_POST["Sub_Total_IVA"];
        $Valor_IVA = $_POST["Valor_IVA"];
        $Cliente_idCliente = $_POST["Cliente_idCliente"];
        $datos = array();
        $datos = $factura->actualizar($idFactura, $Fecha, $Sub_Total, $Sub_Total_IVA, $Valor_IVA, $Cliente_idCliente);
        echo json_encode($datos);
        break;
//TODO: Procedimineto para eliminar un factura en la base de datos
    case 'eliminar':
        $idFactura = $_POST["idFactura"];
        $datos = array();
        $datos = $factura->eliminar($idFactura);
        echo json_encode($datos);
        break;
}