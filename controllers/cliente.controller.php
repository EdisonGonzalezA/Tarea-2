<?php
//TODO: Controlador de Cliente

require_once('../models/cliente.model.php');
//error_reporting(0);
$cliente = new Cliente;

switch ($_GET["op"]) {
//TODO: Operaciones de cliente

    case 'todos'://TODO: Procedimiento para cargar todos los datos de los cliente
        $datos = array(); //Defino un arreglo para almacenar los valores que vienen de la clase cliente.model.php
        $datos = $cliente->todos(); // LLamo al metodo todos de la clase cliente.model.php
        while ($row = mysqli_fetch_assoc($datos)) { // Ciclo de repeticion para asociar los valores almacenados en la variable $datos
            $todos[] = $row;
        }
        echo json_encode($todos);
        break;
//TODO: Procedimiento para obtener un registro de la base de datos
    case 'uno':
        $idCliente = $_POST["idCliente"];
        $datos = array();
        $datos = $cliente->uno($idCliente);
        $res = mysqli_fetch_assoc($datos);
        echo json_encode($res);
        break;
//TODO: Procedimineto para insertar un cliente en la base de datos
    case 'insertar':
        $Nombres = $_POST["Nombres"];
        $Direccion = $_POST["Direccion"];
        $Telefono = $_POST["Telefono"];
        $Cedula = $_POST["Cedula"];
        $Correo = $_POST["Correo"];
        $datos = array();
        $datos = $cliente->insertar($Nombres, $Direccion, $Telefono, $Cedula, $Correo);
        echo json_encode($datos);
        break;
//TODO: Procedimineto para actualizar un cliente en la base de datos
    case 'actualizar':
        $idCliente = $_POST["idCliente"];
        $Nombres = $_POST["Nombres"];
        $Direccion = $_POST["Direccion"];
        $Telefono = $_POST["Telefono"];
        $Cedula = $_POST["Cedula"];
        $Correo = $_POST["Correo"];
        $datos = array();
        $datos = $cliente->actualizar($idCliente, $Nombres, $Direccion, $Telefono, $Cedula, $Correo);
        echo json_encode($datos);
        break;
//TODO: Procedimineto para eliminar un cliente en la base de datos
    case 'eliminar':
        $idCliente = $_POST["idCliente"];
        $datos = array();
        $datos = $cliente->eliminar($idCliente);
        echo json_encode($datos);
        break;
}