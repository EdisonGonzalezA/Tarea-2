<?php
//TODO: Controlador de IVA

require_once('../models/iva.model.php');
error_reporting(0);
$iva = new iva;

switch ($_GET["op"]) {
//TODO: Operaciones de IVA

    case 'todos'://TODO: Procedimiento para cargar todos los datos de los IVA
        $datos = array(); //Defino un arreglo para almacenar los valores que vienen de la clase iva.model.php
        $datos = $iva->todos(); // LLamo al metodo todos de la clase iva.model.php
        while ($row = mysqli_fetch_assoc($datos)) { // Ciclo de repeticion para asociar los valores almacenados en la variable $datos
            $todos[] = $row;
        }
        echo json_encode($todos);
        break;
//TODO: Procedimiento para obtener un registro de la base de datos
    case 'uno':
        $idIVA = $_POST["idIVA"];
        $datos = array();
        $datos = $iva->uno($idIVA);
        $res = mysqli_fetch_assoc($datos);
        echo json_encode($res);
        break;
//TODO: Procedimineto para insertar un IVA en la base de datos
    case 'insertar':
        $Detalle = $_POST["Detalle"];
        $Estado = $_POST["Estado"];
        $datos = array();
        $datos = $iva->insertar($Detalle, $Estado);
        echo json_encode($datos);
        break;
//TODO: Procedimineto para actualizar un IVA en la base de datos
    case 'actualizar':
        $idIVA = $_POST["idIVA"];
        $Detalle = $_POST["Detalle"];
        $Estado = $_POST["Estado"];
        $datos = array();
        $datos = $iva->actualizar($idIVA, $Detalle, $Estado);
        echo json_encode($datos);
        break;
//TODO: Procedimineto para eliminar un IVA en la base de datos
    case 'eliminar':
        $idIVA = $_POST["idIVA"];
        $datos = array();
        $datos = $iva->eliminar($idIVA);
        echo json_encode($datos);
        break;
}