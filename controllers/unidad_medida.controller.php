<?php
//TODO: Controlador de unidad_medida

require_once('../models/unidad_medida.model.php');
error_reporting(0);
$unidad_medida = new Unidad_medida;

switch ($_GET["op"]) {
//TODO: Operaciones de unidad_medida

    case 'todos'://TODO: Procedimiento para cargar todos los datos de los unidad_medida
        $datos = array(); //Defino un arreglo para almacenar los valores que vienen de la clase unidad_medida.model.php
        $datos = $unidad_medida->todos(); // LLamo al metodo todos de la clase unidad_medida.model.php
        while ($row = mysqli_fetch_assoc($datos)) { // Ciclo de repeticion para asociar los valores almacenados en la variable $datos
            $todos[] = $row;
        }
        echo json_encode($todos);
        break;
//TODO: Procedimiento para obtener un registro de la base de datos
    case 'uno':
        $idUnidad_Medida = $_POST["idUnidad_Medida"];
        $datos = array();
        $datos = $unidad_medida->uno($idUnidad_Medida);
        $res = mysqli_fetch_assoc($datos);
        echo json_encode($res);
        break;
//TODO: Procedimineto para insertar un unidad_medida en la base de datos
    case 'insertar':
        $Detalle = $_POST["Detalle"];
        $Tipo = $_POST["Tipo"];
        $datos = array();
        $datos = $unidad_medida->insertar($Detalle, $Tipo);
        echo json_encode($datos);
        break;
//TODO: Procedimineto para actualizar un unidad_medida en la base de datos
    case 'actualizar':
        $idUnidad_Medida = $_POST["idUnidad_Medida"];
        $Detalle = $_POST["Detalle"];
        $Tipo = $_POST["Tipo"];
        $datos = array();
        $datos = $unidad_medida->actualizar($idUnidad_Medida, $Detalle, $Tipo);
        echo json_encode($datos);
        break;
//TODO: Procedimineto para eliminar un unidad_medida en la base de datos
    case 'eliminar':
        $idUnidad_Medida = $_POST["idUnidad_Medida"];
        $datos = array();
        $datos = $unidad_medida->eliminar($idUnidad_Medida);
        echo json_encode($datos);
        break;
}