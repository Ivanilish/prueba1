<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ModelUsuario
 *
 * @author jorgi
 */
include_once 'Database.php';
include_once 'Usuario.php';

class ModelUsuario {

    public function getUsuarios() {

        $pdo = Database::connect();
        $sql = "SELECT u.ID_USU,u.TIPO_USU, c.CEDULA_CAJ,c.NOMBRES_CAJ,c.APELLIDOS_CAJ,u.NOMBRE_USU,u.PASS_USU FROM tbl_usuarios u INNER join tbl_cajero c on u.ID_CAJ=c.ID_CAJ;";
        $resultado = $pdo->query($sql);
        $listado = array();
        foreach ($resultado as $dato) {
            $atributo = new Usuario();
            $atributo->setID_USU($dato['ID_USU']);
            $atributo->setTIPO_USU($dato['TIPO_USU']);
            $atributo->setCEDULA_USU($dato['CEDULA_CAJ']);
            $atributo->setNOMBRES_USU($dato['NOMBRES_CAJ']);
            $atributo->setAPELLIDOS_USU($dato['APELLIDOS_CAJ']);
            $atributo->setNOMBRE_USU($dato['NOMBRE_USU']);
            $atributo->setPASS_USU($dato['PASS_USU']);
            array_push($listado, $atributo);
        }
        Database::disconnect();
        return $listado;
    }

    public function getUsuario($ID) {

        $pdo = Database::connect();
        $sql = "SELECT u.ID_USU,u.TIPO_USU, c.CEDULA_CAJ,c.NOMBRES_CAJ,c.APELLIDOS_CAJ,c.ID_CAJ,u.NOMBRE_USU,u.PASS_USU FROM tbl_usuarios u INNER join tbl_cajero c on u.ID_CAJ=c.ID_CAJ where ID_USU=?;";
        $consulta = $pdo->prepare($sql);
        $consulta->execute(array($ID));
        $dato = $consulta->fetch(PDO::FETCH_ASSOC);
        $atributo = new Usuario();
        $atributo->setID_USU($dato['ID_USU']);
        $atributo->setID_CAJ($dato['ID_CAJ']);
        $atributo->setTIPO_USU($dato['TIPO_USU']);
        $atributo->setCEDULA_USU($dato['CEDULA_CAJ']);
        $atributo->setNOMBRES_USU($dato['NOMBRES_CAJ']);
        $atributo->setAPELLIDOS_USU($dato['APELLIDOS_CAJ']);
        $atributo->setNOMBRE_USU($dato['NOMBRE_USU']);
        $atributo->setPASS_USU($dato['PASS_USU']);
        Database::disconnect();
        return $atributo;
    }

    public function crearUsuario($ID_CAJ, $TIPO_USU, $NOMBRE_USU, $PASS_USU) {

        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "insert into TBL_USUARIOS (ID_CAJ,TIPO_USU,NOMBRE_USU,PASS_USU) values(?,?,?,?)";
        $consulta = $pdo->prepare($sql);
        try {
            $consulta->execute(array($ID_CAJ, $TIPO_USU, $NOMBRE_USU, $PASS_USU));
        } catch (PDOException $e) {
            Database::disconnect();
            throw new Exception($e->getMessage());
        }
        Database::disconnect();
    }

    public function eliminarUsuario($ID) {

        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "delete from TBL_USUARIOS where ID_USU=?";
        $consulta = $pdo->prepare($sql);
        $consulta->execute(array($ID));
        Database::disconnect();
    }

    public function actualizarUsuario($ID_USU, $ID_CAJ, $TIPO_USU, $NOMBRE_USU, $PASS_USU) {

        $pdo = Database::connect();
        $sql = "update TBL_USUARIOS set ID_CAJ=?,TIPO_USU=?,NOMBRE_USU=?,PASS_USU=? where ID_USU=?";
        $consulta = $pdo->prepare($sql);
        try {
            $consulta->execute(array($ID_CAJ, $TIPO_USU, $NOMBRE_USU, $PASS_USU,$ID_USU));
        } catch (PDOException $e) {
            Database::disconnect();
            throw new Exception($e->getMessage());
        }
        Database::disconnect();
    }

}
