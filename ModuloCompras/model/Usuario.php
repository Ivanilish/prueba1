<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Usuario
 *
 * @author jorgi
 */
class Usuario {

    private $ID_USU;
      private $ID_CAJ;
    private $TIPO_USU;
    private $CEDULA_USU;
    private $NOMBRES_USU;
    private $APELLIDOS_USU;
    private $NOMBRE_USU;
    private $PASS_USU;
    
    function getID_USU() {
        return $this->ID_USU;
    }

    function getTIPO_USU() {
        return $this->TIPO_USU;
    }

    function getCEDULA_USU() {
        return $this->CEDULA_USU;
    }

    function getNOMBRES_USU() {
        return $this->NOMBRES_USU;
    }

    function getAPELLIDOS_USU() {
        return $this->APELLIDOS_USU;
    }

    function getNOMBRE_USU() {
        return $this->NOMBRE_USU;
    }

    function getPASS_USU() {
        return $this->PASS_USU;
    }

    function setID_USU($ID_USU) {
        $this->ID_USU = $ID_USU;
    }

    function setTIPO_USU($TIPO_USU) {
        $this->TIPO_USU = $TIPO_USU;
    }

    function setCEDULA_USU($CEDULA_USU) {
        $this->CEDULA_USU = $CEDULA_USU;
    }

    function setNOMBRES_USU($NOMBRES_USU) {
        $this->NOMBRES_USU = $NOMBRES_USU;
    }

    function setAPELLIDOS_USU($APELLIDOS_USU) {
        $this->APELLIDOS_USU = $APELLIDOS_USU;
    }

    function setNOMBRE_USU($NOMBRE_USU) {
        $this->NOMBRE_USU = $NOMBRE_USU;
    }

    function setPASS_USU($PASS_USU) {
        $this->PASS_USU = $PASS_USU;
    }
    
    function getID_CAJ() {
        return $this->ID_CAJ;
    }

    function setID_CAJ($ID_CAJ) {
        $this->ID_CAJ = $ID_CAJ;
    }




    
    

}
