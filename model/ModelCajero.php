<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ModelCajeros
 *
 * @author jorgi
 */
include_once 'Database.php';
include_once 'Cajero.php';

class ModelCajero {

    public function getCajeros() {

        $pdo = Database::connect();
        $sql = "select * from TBL_CAJERO";
        $resultado = $pdo->query($sql);
        $listado = array();
        foreach ($resultado as $dato) {
            $atributo = new Cajero();
            $atributo->setID_CAJ($dato['ID_CAJ']);
            $atributo->setCEDULA_CAJ($dato['CEDULA_CAJ']);
            $atributo->setNOMBRES_CAJ($dato['NOMBRES_CAJ']);
            $atributo->setAPELLIDOS_CAJ($dato['APELLIDOS_CAJ']);
            $atributo->setCIUDAD_NACIMIENTO_CAJ($dato['CIUDAD_NACIMIENTO_CAJ']);
            $atributo->setFECHA_NACIMIENTO_CAJ($dato['FECHA_NACIMIENTO_CAJ']);
            $atributo->setDIRECCION_CAJ($dato['DIRECCION_CAJ']);
            $atributo->setTELEFONO_CAJ($dato['TELEFONO_CAJ']);
            $atributo->setEMAIL_CAJ($dato['EMAIL_CAJ']);
            $atributo->setESTADO_CAJ($dato['ESTADO_CAJ']);
            array_push($listado, $atributo);
        }
        Database::disconnect();
        return $listado;
    }

    public function getCajero($ID) {

        $pdo = Database::connect();
        $sql = "select * from TBL_CAJERO where ID_CAJ=?";
        $consulta = $pdo->prepare($sql);
        $consulta->execute(array($ID));
        $dato = $consulta->fetch(PDO::FETCH_ASSOC);
        $atributo = new Cajero();
        $atributo->setID_CAJ($dato['ID_CAJ']);
        $atributo->setCEDULA_CAJ($dato['CEDULA_CAJ']);
        $atributo->setNOMBRES_CAJ($dato['NOMBRES_CAJ']);
        $atributo->setAPELLIDOS_CAJ($dato['APELLIDOS_CAJ']);
        $atributo->setCIUDAD_NACIMIENTO_CAJ($dato['CIUDAD_NACIMIENTO_CAJ']);
        $atributo->setFECHA_NACIMIENTO_CAJ($dato['FECHA_NACIMIENTO_CAJ']);
        $atributo->setDIRECCION_CAJ($dato['DIRECCION_CAJ']);
        $atributo->setTELEFONO_CAJ($dato['TELEFONO_CAJ']);
        $atributo->setEMAIL_CAJ($dato['EMAIL_CAJ']);
        $atributo->setESTADO_CAJ($dato['ESTADO_CAJ']);
        Database::disconnect();
        return $atributo;
    }

    public function crearCajero($CEDULA_CAJ, $NOMBRES_CAJ, $APELLIDOS_CAJ, $CIUDAD_NACIMIENTO_CAJ, $FECHA_NACIMIENTO_CAJ, $DIRECCION_CAJ, $TELEFONO_CAJ, $EMAIL_CAJ, $ESTADO_CAJ) {

        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "insert into TBL_CAJERO (CEDULA_CAJ, NOMBRES_CAJ,APELLIDOS_CAJ,CIUDAD_NACIMIENTO_CAJ,FECHA_NACIMIENTO_CAJ,DIRECCION_CAJ,TELEFONO_CAJ,EMAIL_CAJ,ESTADO_CAJ) values(?,?,?,?,?,?,?,?,?)";
        $consulta = $pdo->prepare($sql);
        try {
            $consulta->execute(array($CEDULA_CAJ, $NOMBRES_CAJ, $APELLIDOS_CAJ, $CIUDAD_NACIMIENTO_CAJ, $FECHA_NACIMIENTO_CAJ, $DIRECCION_CAJ, $TELEFONO_CAJ, $EMAIL_CAJ, $ESTADO_CAJ));

        } catch (PDOException $e) {
            Database::disconnect();
            throw new Exception($e->getMessage());
        }
        Database::disconnect();
    }

    public function eliminarCajero($ID) {

        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "delete from TBL_CAJERO where ID_CAJ=?";
        $consulta = $pdo->prepare($sql);
        $consulta->execute(array($ID));
        Database::disconnect();
    }

    public function actualizarCajero($ID_CAJ,$CEDULA_CAJ, $NOMBRES_CAJ, $APELLIDOS_CAJ, $CIUDAD_NACIMIENTO_CAJ, $FECHA_NACIMIENTO_CAJ, $DIRECCION_CAJ, $TELEFONO_CAJ, $EMAIL_CAJ, $ESTADO_CAJ) {

           $pdo = Database::connect();
        $sql = "update TBL_CAJERO set CEDULA_CAJ=?, NOMBRES_CAJ=?,APELLIDOS_CAJ=?,CIUDAD_NACIMIENTO_CAJ=?,FECHA_NACIMIENTO_CAJ=?,DIRECCION_CAJ=?,TELEFONO_CAJ=?,EMAIL_CAJ=?,ESTADO_CAJ=? where ID_CAJ=?";
        $consulta = $pdo->prepare($sql);
        try {
            $consulta->execute(array($CEDULA_CAJ, $NOMBRES_CAJ, $APELLIDOS_CAJ, $CIUDAD_NACIMIENTO_CAJ, $FECHA_NACIMIENTO_CAJ, $DIRECCION_CAJ, $TELEFONO_CAJ, $EMAIL_CAJ, $ESTADO_CAJ, $ID_CAJ));
        } catch (PDOException $e) {
            Database::disconnect();
            throw new Exception($e->getMessage());
        }
        Database::disconnect();
    }

}
