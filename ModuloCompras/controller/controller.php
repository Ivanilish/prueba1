<?php

require_once '../model/ModelLogin.php';
require_once '../model/ModelCajero.php';
require_once '../model/ModelUsuario.php';
require_once '../model/ModelProveedor.php';
$login = new ModelLogin();
$cajero = new ModelCajero();
$usuario = new ModelUsuario();
$proveedor = new ModelProveedor();
$opcion = $_REQUEST['opcion'];
session_start();

switch ($opcion) {

    case 'entrar':

        $user = $_REQUEST['usuario'];
        $contrasena = $_REQUEST['contrasena'];
        $sesion = $login->verificacionUsuario($user, $contrasena);

        if ($sesion->getNOMBRE_USU() == $user && $sesion->getPASS_USU() == $contrasena) {


            $_SESSION['sesion'] = serialize($sesion);
            $_SESSION["login"] = "login";

            if ($sesion->getTIPO_USU() === "Administrador") {

                $listaUsuarios = $usuario->getUsuarios();
                $_SESSION['listaUsuarios'] = serialize($listaUsuarios);

                $listaProveedor = $proveedor->getProveedores();
                $_SESSION['listaProveedor'] = serialize($listaProveedor);

                $listaCajeros = $cajero->getCajeros();
                $_SESSION['listaCajeros'] = serialize($listaCajeros);
                header('Location: ../view/home/index.php');
            } else {

                $listaProveedor = $proveedor->getProveedores();
                $_SESSION['listaProveedor'] = serialize($listaProveedor);

                $listaCajeros = $cajero->getCajeros();
                $_SESSION['listaCajeros'] = serialize($listaCajeros);


                header('Location: ../view/homeCajero/index.php');
            }
        } else {

            header('Location: ../index.php ');
        }
        break;


    //********** CAJEROS **********

    case 'guardar_cajero':


        $CEDULA_CAJ = $_REQUEST['cedula'];
        $NOMBRES_CAJ = $_REQUEST['nombres'];
        $APELLIDOS_CAJ = $_REQUEST['apellidos'];
        $CIUDAD_NACIMIENTO_CAJ = $_REQUEST['ciudad'];
        $FECHA_NACIMIENTO_CAJ = $_REQUEST['fecha'];
        $DIRECCION_CAJ = $_REQUEST['direccion'];
        $TELEFONO_CAJ = $_REQUEST['telefono'];
        $EMAIL_CAJ = $_REQUEST['correo'];
        $ESTADO_CAJ = $_REQUEST['estado'];
        $cajero->crearCajero($CEDULA_CAJ, $NOMBRES_CAJ, $APELLIDOS_CAJ, $CIUDAD_NACIMIENTO_CAJ, $FECHA_NACIMIENTO_CAJ, $DIRECCION_CAJ, $TELEFONO_CAJ, $EMAIL_CAJ, $ESTADO_CAJ);
        $listaCajeros = $cajero->getCajeros();
        $_SESSION['listaCajeros'] = serialize($listaCajeros);
        header('Location: ../view/cajeros/index.php');
        break;


    case 'cargar_cajero':
        $ID_CAJ = $_REQUEST['id'];
        $caj = $cajero->getCajero($ID_CAJ);
        $_SESSION['cajero'] = serialize($caj);
        header('Location: ../view/cajeros/cargar.php');
        break;

    case 'actualizar_cajero':

        $ID_CAJ = $_REQUEST['id_cajero'];
        $CEDULA_CAJ = $_REQUEST['cedula'];
        $NOMBRES_CAJ = $_REQUEST['nombres'];
        $APELLIDOS_CAJ = $_REQUEST['apellidos'];
        $CIUDAD_NACIMIENTO_CAJ = $_REQUEST['ciudad'];
        $FECHA_NACIMIENTO_CAJ = $_REQUEST['fecha'];
        $DIRECCION_CAJ = $_REQUEST['direccion'];
        $TELEFONO_CAJ = $_REQUEST['telefono'];
        $EMAIL_CAJ = $_REQUEST['correo'];
        $ESTADO_CAJ = $_REQUEST['estado'];
        $cajero->actualizarCajero($ID_CAJ, $CEDULA_CAJ, $NOMBRES_CAJ, $APELLIDOS_CAJ, $CIUDAD_NACIMIENTO_CAJ, $FECHA_NACIMIENTO_CAJ, $DIRECCION_CAJ, $TELEFONO_CAJ, $EMAIL_CAJ, $ESTADO_CAJ);
        $listaCajeros = $cajero->getCajeros();
        $_SESSION['listaCajeros'] = serialize($listaCajeros);
        header('Location: ../view/cajeros/index.php');
        break;

    //********** USUARIOS **********

    case 'guardar_usuario':
        $ID_CAJ = $_REQUEST['cajero'];
        $TIPO_USU = $_REQUEST['tipo'];
        $NOMBRE_USU = $_REQUEST['nombre'];
        $PASS_USU = $_REQUEST['contrasena'];
        $usuario->crearUsuario($ID_CAJ, $TIPO_USU, $NOMBRE_USU, $PASS_USU);
        $listaUsuarios = $usuario->getUsuarios();
        $_SESSION['listaUsuarios'] = serialize($listaUsuarios);
        header('Location: ../view/usuarios/index.php');
        break;
    case 'eliminar_usuario':
        $ID_USU = $_REQUEST['id'];
        $usuario->eliminarUsuario($ID_USU);
        $listaUsuarios = $usuario->getUsuarios();
        $_SESSION['listaUsuarios'] = serialize($listaUsuarios);
        header('Location: ../view/usuarios/index.php');
        break;
    case 'cargar_usuario':
        $ID_USU = $_REQUEST['id'];
        $usu = $usuario->getUsuario($ID_USU);
        $_SESSION['usuario'] = serialize($usu);
        header('Location: ../view/usuarios/cargar.php');
        break;
    case 'actualizar_usuario':
        $ID_USU = $_REQUEST['id_usuario'];
        $ID_CAJ = $_REQUEST['cajero'];
        $TIPO_USU = $_REQUEST['tipo'];
        $NOMBRE_USU = $_REQUEST['nombre'];
        $PASS_USU = $_REQUEST['contrasena'];
        $usuario->actualizarUsuario($ID_USU, $ID_CAJ, $TIPO_USU, $NOMBRE_USU, $PASS_USU);
        $listaUsuarios = $usuario->getUsuarios();
        $_SESSION['listaUsuarios'] = serialize($listaUsuarios);
        header('Location: ../view/usuarios/index.php');
        break;

    //********** PROVEEDORES **********

    case 'guardar_proveedor':

        $CEDULA_PRO = $_REQUEST['cedula'];
        $NOMBRES_PRO = $_REQUEST['nombres'];
        $APELLIDOS_PRO = $_REQUEST['apellidos'];
        $CIUDAD_NACIMIENTO_PRO = $_REQUEST['ciudad'];
        $FECHA_NACIMIENTO_PRO = $_REQUEST['fecha'];
        $TIPO_PRO = $_REQUEST['tipo'];
        $DIRECCION_PRO = $_REQUEST['direccion'];
        $TELEFONO_PRO = $_REQUEST['telefono'];
        $EMAIL_PRO = $_REQUEST['correo'];
        $ESTADO_PRO = $_REQUEST['estado'];

        $proveedor->crearProveedor($CEDULA_PRO, $NOMBRES_PRO, $APELLIDOS_PRO, $CIUDAD_NACIMIENTO_PRO, $FECHA_NACIMIENTO_PRO, $TIPO_PRO, $DIRECCION_PRO, $TELEFONO_PRO, $EMAIL_PRO, $ESTADO_PRO);
        $listaProveedor = $proveedor->getProveedores();
        $_SESSION['listaProveedor'] = serialize($listaProveedor);
        header('Location: ../view/proveedores/index.php');
        break;


    case 'cargar_proveedor':
        $ID_PRO = $_REQUEST['id'];
        $pro = $proveedor->getProveedor($ID_PRO);
        $_SESSION['proveedor'] = serialize($pro);
        header('Location: ../view/proveedores/cargar.php');
        break;

    case 'actualizar_proveedor':

        $ID_PRO = $_REQUEST['id_proveedor'];
        $CEDULA_PRO = $_REQUEST['cedula'];
        $NOMBRES_PRO = $_REQUEST['nombres'];
        $APELLIDOS_PRO = $_REQUEST['apellidos'];
        $CIUDAD_NACIMIENTO_PRO = $_REQUEST['ciudad'];
        $FECHA_NACIMIENTO_PRO = $_REQUEST['fecha'];
        $TIPO_PRO = $_REQUEST['tipo'];
        $DIRECCION_PRO = $_REQUEST['direccion'];
        $TELEFONO_PRO = $_REQUEST['telefono'];
        $EMAIL_PRO = $_REQUEST['correo'];
        $ESTADO_PRO = $_REQUEST['estado'];

        $proveedor->actualizarCajero($ID_PRO, $CEDULA_PRO, $NOMBRES_PRO, $APELLIDOS_PRO, $CIUDAD_NACIMIENTO_PRO, $FECHA_NACIMIENTO_PRO, $TIPO_PRO, $DIRECCION_PRO, $TELEFONO_PRO, $EMAIL_PRO, $ESTADO_PRO);
        $listaProveedor = $proveedor->getProveedores();
        $_SESSION['listaProveedor'] = serialize($listaProveedor);
        header('Location: ../view/proveedores/index.php');
        break;



    default:
        header('Location: ../index.php');
}