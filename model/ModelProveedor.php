<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ModelProveedor
 *
 * @author jorgi
 */
include_once 'Database.php';
include_once 'Proveedor.php';

class ModelProveedor {

    public function getProveedores() {

        $pdo = Database::connect();
        $sql = "select * from TBL_PROVEEDOR";
        $resultado = $pdo->query($sql);
        $listado = array();
        foreach ($resultado as $dato) {
            $atributo = new Proveedor();
            $atributo->setID_PRO($dato['ID_PRO']);
            $atributo->setCEDULA_PRO($dato['CEDULA_PRO']);
            $atributo->setNOMBRES_PRO($dato['NOMBRES_PRO']);
            $atributo->setAPELLIDOS_PRO($dato['APELLIDOS_PRO']);
            $atributo->setCIUDAD_NACIMIENTO_PRO($dato['CIUDAD_NACIMIENTO_PRO']);
            $atributo->setFECHA_NACIMIENTO_PRO($dato['FECHA_NACIMIENTO_PRO']);
            $atributo->setTIPO_PRO($dato['TIPO_PRO']);
            $atributo->setDIRECCION_PRO($dato['DIRECCION_PRO']);
            $atributo->setTELEFONO_PRO($dato['TELEFONO_PRO']);
            $atributo->setEMAIL_PRO($dato['EMAIL_PRO']);
            $atributo->setESTADO_PRO($dato['ESTADO_PRO']);
            array_push($listado, $atributo);
        }
        Database::disconnect();
        return $listado;
    }

    public function getProveedor($ID) {

        $pdo = Database::connect();
        $sql = "select * from TBL_PROVEEDOR where ID_PRO=?";
        $consulta = $pdo->prepare($sql);
        $consulta->execute(array($ID));
        $dato = $consulta->fetch(PDO::FETCH_ASSOC);
        $atributo = new Proveedor();
        $atributo->setID_PRO($dato['ID_PRO']);
        $atributo->setCEDULA_PRO($dato['CEDULA_PRO']);
        $atributo->setNOMBRES_PRO($dato['NOMBRES_PRO']);
        $atributo->setAPELLIDOS_PRO($dato['APELLIDOS_PRO']);
        $atributo->setCIUDAD_NACIMIENTO_PRO($dato['CIUDAD_NACIMIENTO_PRO']);
        $atributo->setFECHA_NACIMIENTO_PRO($dato['FECHA_NACIMIENTO_PRO']);
         $atributo->setTIPO_PRO($dato['TIPO_PRO']);
        $atributo->setDIRECCION_PRO($dato['DIRECCION_PRO']);
        $atributo->setTELEFONO_PRO($dato['TELEFONO_PRO']);
        $atributo->setEMAIL_PRO($dato['EMAIL_PRO']);
        $atributo->setESTADO_PRO($dato['ESTADO_PRO']);
        Database::disconnect();
        return $atributo;
    }

    public function crearProveedor($CEDULA_PRO, $NOMBRES_PRO, $APELLIDOS_PRO, 
            $CIUDAD_NACIMIENTO_PRO, $FECHA_NACIMIENTO_PRO, $TIPO_PRO, $DIRECCION_PRO, $TELEFONO_PRO, $EMAIL_PRO, $ESTADO_PRO) {

        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "insert into TBL_PROVEEDOR (CEDULA_PRO, NOMBRES_PRO,APELLIDOS_PRO,CIUDAD_NACIMIENTO_PRO,FECHA_NACIMIENTO_PRO,TIPO_PRO,DIRECCION_PRO,TELEFONO_PRO,EMAIL_PRO,ESTADO_PRO) values(?,?,?,?,?,?,?,?,?,?)";
        $consulta = $pdo->prepare($sql);
        try {
            $consulta->execute(array($CEDULA_PRO, $NOMBRES_PRO, $APELLIDOS_PRO, 
            $CIUDAD_NACIMIENTO_PRO, $FECHA_NACIMIENTO_PRO, $TIPO_PRO, $DIRECCION_PRO, $TELEFONO_PRO, $EMAIL_PRO, $ESTADO_PRO));
        } catch (PDOException $e) {
            Database::disconnect();
            throw new Exception($e->getMessage());
        }
        Database::disconnect();
    }

    public function eliminarCajero($ID) {

        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "delete from TBL_PROVEEDOR where ID_PRO=?";
        $consulta = $pdo->prepare($sql);
        $consulta->execute(array($ID));
        Database::disconnect();
    }

    public function actualizarCajero($ID_PRO,$CEDULA_PRO, $NOMBRES_PRO, $APELLIDOS_PRO, 
            $CIUDAD_NACIMIENTO_PRO, $FECHA_NACIMIENTO_PRO, $TIPO_PRO, $DIRECCION_PRO, $TELEFONO_PRO, $EMAIL_PRO, $ESTADO_PRO) {

        $pdo = Database::connect();
        $sql = "update TBL_PROVEEDOR set CEDULA_PRO=?, NOMBRES_PRO=?,APELLIDOS_PRO=?,CIUDAD_NACIMIENTO_PRO=?,FECHA_NACIMIENTO_PRO=?,TIPO_PRO=?,DIRECCION_PRO=?,TELEFONO_PRO=?,EMAIL_PRO=?,ESTADO_PRO=? where ID_PRO=?";
        $consulta = $pdo->prepare($sql);
        try {
            $consulta->execute(array($CEDULA_PRO, $NOMBRES_PRO, $APELLIDOS_PRO, 
            $CIUDAD_NACIMIENTO_PRO, $FECHA_NACIMIENTO_PRO, $TIPO_PRO, $DIRECCION_PRO, $TELEFONO_PRO, $EMAIL_PRO, $ESTADO_PRO,$ID_PRO));
        } catch (PDOException $e) {
            Database::disconnect();
            throw new Exception($e->getMessage());
        }
        Database::disconnect();
    }

}
