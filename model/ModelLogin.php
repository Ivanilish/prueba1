<?php


include_once 'Usuario.php';

class ModelLogin {

    public function verificacionUsuario($usuario, $contrasena) {

        $pdo = Database::connect();
        $sql = "SELECT u.ID_USU,u.TIPO_USU,c.CEDULA_CAJ,c.NOMBRES_CAJ,c.APELLIDOS_CAJ,u.NOMBRE_USU,u.PASS_USU FROM tbl_usuarios u INNER join tbl_cajero c on u.ID_CAJ=c.ID_CAJ where u.NOMBRE_USU=? and u.PASS_USU=?;";
        $consulta = $pdo->prepare($sql);
        $consulta->execute(array($usuario, $contrasena));
        $dato = $consulta->fetch(PDO::FETCH_ASSOC);
        $atributo = new Usuario();
        $atributo->setID_USU($dato['ID_USU']);
        $atributo->setTIPO_USU($dato['TIPO_USU']);
        $atributo->setCEDULA_USU($dato['CEDULA_CAJ']);
        $atributo->setNOMBRES_USU($dato['NOMBRES_CAJ']);
        $atributo->setAPELLIDOS_USU($dato['APELLIDOS_CAJ']);
        $atributo->setNOMBRE_USU($dato['NOMBRE_USU']);
        $atributo->setPASS_USU($dato['PASS_USU']);

        Database::disconnect();

        return $atributo;
    }

}
