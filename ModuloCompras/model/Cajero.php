<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Cajeros
 *
 * @author jorgi
 */
class Cajero {
  
   private $ID_CAJ;             
   private $CEDULA_CAJ;        
   private $NOMBRES_CAJ;
   private $APELLIDOS_CAJ;
   private $CIUDAD_NACIMIENTO_CAJ;
   private $FECHA_NACIMIENTO_CAJ;
   private $DIRECCION_CAJ;
   private $TELEFONO_CAJ;
   private $EMAIL_CAJ;
   private $ESTADO_CAJ;
   
   function getID_CAJ() {
       return $this->ID_CAJ;
   }

   function getCEDULA_CAJ() {
       return $this->CEDULA_CAJ;
   }

   function getNOMBRES_CAJ() {
       return $this->NOMBRES_CAJ;
   }

   function getAPELLIDOS_CAJ() {
       return $this->APELLIDOS_CAJ;
   }

   function getCIUDAD_NACIMIENTO_CAJ() {
       return $this->CIUDAD_NACIMIENTO_CAJ;
   }

   function getFECHA_NACIMIENTO_CAJ() {
       return $this->FECHA_NACIMIENTO_CAJ;
   }

   function getDIRECCION_CAJ() {
       return $this->DIRECCION_CAJ;
   }

   function getTELEFONO_CAJ() {
       return $this->TELEFONO_CAJ;
   }

   function getEMAIL_CAJ() {
       return $this->EMAIL_CAJ;
   }

   function getESTADO_CAJ() {
       return $this->ESTADO_CAJ;
   }

   function setID_CAJ($ID_CAJ) {
       $this->ID_CAJ = $ID_CAJ;
   }

   function setCEDULA_CAJ($CEDULA_CAJ) {
       $this->CEDULA_CAJ = $CEDULA_CAJ;
   }

   function setNOMBRES_CAJ($NOMBRES_CAJ) {
       $this->NOMBRES_CAJ = $NOMBRES_CAJ;
   }

   function setAPELLIDOS_CAJ($APELLIDOS_CAJ) {
       $this->APELLIDOS_CAJ = $APELLIDOS_CAJ;
   }

   function setCIUDAD_NACIMIENTO_CAJ($CIUDAD_NACIMIENTO_CAJ) {
       $this->CIUDAD_NACIMIENTO_CAJ = $CIUDAD_NACIMIENTO_CAJ;
   }

   function setFECHA_NACIMIENTO_CAJ($FECHA_NACIMIENTO_CAJ) {
       $this->FECHA_NACIMIENTO_CAJ = $FECHA_NACIMIENTO_CAJ;
   }

   function setDIRECCION_CAJ($DIRECCION_CAJ) {
       $this->DIRECCION_CAJ = $DIRECCION_CAJ;
   }

   function setTELEFONO_CAJ($TELEFONO_CAJ) {
       $this->TELEFONO_CAJ = $TELEFONO_CAJ;
   }

   function setEMAIL_CAJ($EMAIL_CAJ) {
       $this->EMAIL_CAJ = $EMAIL_CAJ;
   }

   function setESTADO_CAJ($ESTADO_CAJ) {
       $this->ESTADO_CAJ = $ESTADO_CAJ;
   }


}
