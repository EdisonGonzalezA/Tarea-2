<?php
//TODO: Controlador de Kardex

require_once('../models/kardex.model.php');
error_reporting(0);
$kardex = new Kardex;

switch ($_GET["op"]) {
//TODO: Operaciones de kardex

    case 'todos'://TODO: Procedimiento para cargar todos los datos de los kardex
        $datos = array(); //Defino un arreglo para almacenar los valores que vienen de la clase kardex.model.php
        $datos = $kardex->todos(); // LLamo al metodo todos de la clase kardex.model.php
        while ($row = mysqli_fetch_assoc($datos)) { // Ciclo de repeticion para asociar los valores almacenados en la variable $datos
            $todos[] = $row;
        }
        echo json_encode($todos);
        break;
//TODO: Procedimiento para obtener un registro de la base de datos
    case 'uno':
        $idKardex = $_POST["idKardex"];
        $datos = array();
        $datos = $kardex->uno($idKardex);
        $res = mysqli_fetch_assoc($datos);
        echo json_encode($res);
        break;
//TODO: Procedimineto para insertar un kardex en la base de datos
    case 'insertar':
        $Estado = $_POST["Estado"];
        $Fecha_Transaccion = $_POST["Fecha_Transaccion"];
        $Cantidad = $_POST["Cantidad"];
        $Valor_Compra = $_POST["Valor_Compra"];
        $Valor_Venta = $_POST["Valor_Venta"];
        $Unidad_Medida_idUnidad_Medida = $_POST["Unidad_Medida_idUnidad_Medida"];
        $Unidad_Medida_idUnidad_Medida1 = $_POST["Unidad_Medida_idUnidad_Medida1"];
        $Unidad_Medida_idUnidad_Medida2 = $_POST["Unidad_Medida_idUnidad_Medida2"];
        $Valor_Ganancia = $_POST["Valor_Ganancia"];
        $IVA = $_POST["IVA"];
        $IVA_idIVA = $_POST["IVA_idIVA"];
        $Proveedores_idProveedores = $_POST["Proveedores_idProveedores"];
        $Tipo_Transaccion = $_POST["Tipo_Transaccion"];
        $datos = array();
        $datos = $kardex->insertar($Estado, $Fecha_Transaccion, $Cantidad, $Valor_Compra, $Valor_Venta, $Unidad_Medida_idUnidad_Medida, $Unidad_Medida_idUnidad_Medida1, $Unidad_Medida_idUnidad_Medida2, $Valor_Ganancia, $IVA, $IVA_idIVA, $Proveedores_idProveedores, $Tipo_Transaccion);
        echo json_encode($datos);
        break;
//TODO: Procedimineto para actualizar un kardex en la base de datos
    case 'actualizar':
        $idKardex = $_POST["idKardex"];
        $Estado = $_POST["Estado"];
        $Fecha_Transaccion = $_POST["Fecha_Transaccion"];
        $Cantidad = $_POST["Cantidad"];
        $Valor_Compra = $_POST["Valor_Compra"];
        $Valor_Venta = $_POST["Valor_Venta"];
        $Unidad_Medida_idUnidad_Medida = $_POST["Unidad_Medida_idUnidad_Medida"];
        $Unidad_Medida_idUnidad_Medida1 = $_POST["Unidad_Medida_idUnidad_Medida1"];
        $Unidad_Medida_idUnidad_Medida2 = $_POST["Unidad_Medida_idUnidad_Medida2"];
        $Valor_Ganancia = $_POST["Valor_Ganancia"];
        $IVA = $_POST["IVA"];
        $IVA_idIVA = $_POST["IVA_idIVA"];
        $Proveedores_idProveedores = $_POST["Proveedores_idProveedores"];
        $Tipo_Transaccion = $_POST["Tipo_Transaccion"];
        $datos = array();
        $datos = $kardex->actualizar($idKardex, $Estado, $Fecha_Transaccion, $Cantidad, $Valor_Compra, $Valor_Venta, $Unidad_Medida_idUnidad_Medida, $Unidad_Medida_idUnidad_Medida1, $Unidad_Medida_idUnidad_Medida2, $Valor_Ganancia, $IVA, $IVA_idIVA, $Proveedores_idProveedores, $Tipo_Transaccion);
        echo json_encode($datos);
        break;
//TODO: Procedimineto para eliminar un kardex en la base de datos
    case 'eliminar':
        $idKardex = $_POST["idKardex"];
        $datos = array();
        $datos = $kardex->eliminar($idKardex);
        echo json_encode($datos);
        break;
}