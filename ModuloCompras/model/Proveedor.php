<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Proveedor
 *
 * @author jorgi
 */
class Proveedor {
    
   
   private $ID_PRO;
   private $CEDULA_PRO ;
   private $NOMBRES_PRO ;
   private $APELLIDOS_PRO ;
   private $FECHA_NACIMIENTO_PRO ;
   private $CIUDAD_NACIMIENTO_PRO;
   private $TIPO_PRO;
   private $DIRECCION_PRO ;
   private $TELEFONO_PRO;
   private $EMAIL_PRO  ;
   private $ESTADO_PRO  ;
   
   
   function getID_PRO() {
       return $this->ID_PRO;
   }

   function getCEDULA_PRO() {
       return $this->CEDULA_PRO;
   }

   function getNOMBRES_PRO() {
       return $this->NOMBRES_PRO;
   }

   function getAPELLIDOS_PRO() {
       return $this->APELLIDOS_PRO;
   }

   function getFECHA_NACIMIENTO_PRO() {
       return $this->FECHA_NACIMIENTO_PRO;
   }

   function getCIUDAD_NACIMIENTO_PRO() {
       return $this->CIUDAD_NACIMIENTO_PRO;
   }

   function getTIPO_PRO() {
       return $this->TIPO_PRO;
   }

   function getDIRECCION_PRO() {
       return $this->DIRECCION_PRO;
   }

   function getTELEFONO_PRO() {
       return $this->TELEFONO_PRO;
   }

   function getEMAIL_PRO() {
       return $this->EMAIL_PRO;
   }

   function getESTADO_PRO() {
       return $this->ESTADO_PRO;
   }

   function setID_PRO($ID_PRO) {
       $this->ID_PRO = $ID_PRO;
   }

   function setCEDULA_PRO($CEDULA_PRO) {
       $this->CEDULA_PRO = $CEDULA_PRO;
   }

   function setNOMBRES_PRO($NOMBRES_PRO) {
       $this->NOMBRES_PRO = $NOMBRES_PRO;
   }

   function setAPELLIDOS_PRO($APELLIDOS_PRO) {
       $this->APELLIDOS_PRO = $APELLIDOS_PRO;
   }

   function setFECHA_NACIMIENTO_PRO($FECHA_NACIMIENTO_PRO) {
       $this->FECHA_NACIMIENTO_PRO = $FECHA_NACIMIENTO_PRO;
   }

   function setCIUDAD_NACIMIENTO_PRO($CIUDAD_NACIMIENTO_PRO) {
       $this->CIUDAD_NACIMIENTO_PRO = $CIUDAD_NACIMIENTO_PRO;
   }

   function setTIPO_PRO($TIPO_PRO) {
       $this->TIPO_PRO = $TIPO_PRO;
   }

   function setDIRECCION_PRO($DIRECCION_PRO) {
       $this->DIRECCION_PRO = $DIRECCION_PRO;
   }

   function setTELEFONO_PRO($TELEFONO_PRO) {
       $this->TELEFONO_PRO = $TELEFONO_PRO;
   }

   function setEMAIL_PRO($EMAIL_PRO) {
       $this->EMAIL_PRO = $EMAIL_PRO;
   }

   function setESTADO_PRO($ESTADO_PRO) {
       $this->ESTADO_PRO = $ESTADO_PRO;
   }




}
