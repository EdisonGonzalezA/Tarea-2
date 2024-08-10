<?php
//TODO: Controlador de Provedores

require_once('../models/proveedores.model.php');
error_reporting(0);
$proveedores = new Provedores;

switch ($_GET["op"]) {
//TODO: Operaciones de provedores

    case 'todos'://TODO: Procedimiento para cargar todos los datos de los provedores
        $datos = array(); //Defino un arreglo para almacenar los valores que vienen de la clase proveedores.model.php
        $datos = $proveedores->todos(); // LLamo al metodo todos de la clase proveedores.model.php
        while ($row = mysqli_fetch_assoc($datos)) { // Ciclo de repeticion para asociar los valores almacenados en la variable $datos
            $todos[] = $row;
        }
        echo json_encode($todos);
        break;
//TODO: Procedimiento para obtener un registro de la base de datos
    case 'uno':
        $idProveedores = $_POST["idProveedores"];
        $datos = array();
        $datos = $proveedores->uno($idProveedores);
        $res = mysqli_fetch_assoc($datos);
        echo json_encode($res);
        break;
//TODO: Procedimineto para insertar un provedor en la base de datos
    case 'insertar':
        $Nombre_Empresa = $_POST["Nombre_Empresa"];
        $Direccion = $_POST["Direccion"];
        $Telefono = $_POST["Telefono"];
        $Contacto_Empresa = $_POST["Contacto_Empresa"];
        $Telefono_Empresa = $_POST["Telefono_Empresa"];
        $datos = array();
        $datos = $proveedores->insertar($Nombre_Empresa, $Direccion, $Telefono, $Contacto_Empresa, $Telefono_Empresa);
        echo json_encode($datos);
        break;
//TODO: Procedimineto para actualizar un provedor en la base de datos
    case 'actualizar':
        $idProveedores = $_POST["idProveedores"];
        $Nombre_Empresa = $_POST["Nombre_Empresa"];
        $Direccion = $_POST["Direccion"];
        $Telefono = $_POST["Telefono"];
        $Contacto_Empresa = $_POST["Contacto_Empresa"];
        $Telefono_Empresa = $_POST["Telefono_Empresa"];
        $datos = array();
        $datos = $proveedores->actualizar($idProveedores, $Nombre_Empresa, $Direccion, $Telefono, $Contacto_Empresa, $Telefono_Empresa);
        echo json_encode($datos);
        break;
//TODO: Procedimineto para eliminar un provedor en la base de datos
    case 'eliminar':
        $idProveedores = $_POST["idProveedores"];
        $datos = array();
        $datos = $proveedores->eliminar($idProveedores);
        echo json_encode($datos);
        break;
}