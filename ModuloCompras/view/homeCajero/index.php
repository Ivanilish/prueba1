<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
include("../../controller/iniciarSesion.php");
include '../../model/Usuario.php';
$login = unserialize($_SESSION['sesion']);
?>
<html>
   <head>
        <meta charset="UTF-8">
        <title>Inicio</title>
        <link rel="stylesheet" type="text/css" href="../css/fontawesome-all.css">
        <link rel="stylesheet" type="text/css" href="../css/home.css">
        <link rel="stylesheet" type="text/css" href="../css/menuToggle.css">

    </head>
    <body onload="openSideMenu()">

        <div id="contenedor"> 

            <div id="cuerpo"> 
                <div id="lateral">


                    <nav class="navbar">
                        <span class="open-slide">
                            <a href="#" onclick="openSideMenu()" >
                                <svg width="30" height="30">
                                <path d="M0,2 20,2" stroke="#777777" stroke-width="2"/>
                                <path d="M0,6 20,6" stroke="#777777" stroke-width="2"/>
                                <path d="M0,10 20,10" stroke="#777777" stroke-width="2"/>
                            </a>
                        </span>


                    </nav>
                    <div id="side-menu" class="side-nav">
                        <a href="#" class="btn_close" onclick="closeSideMenu()">  
                            <svg width="30" height="12">
                            <path d="M0,2 20,2" stroke="#fff" stroke-width="2"/>
                            <path d="M0,6 20,6" stroke="#fff" stroke-width="2"/>
                            <path d="M0,10 20,10" stroke="#fff" stroke-width="2"/>
                        </a>

                        <a href="../home/index.php" > <i class="fa fa-home" aria-hidden="true"></i> Inicio</a>
                        <a href="../cajeros/vista.php" > <i class="ico_t fas fa-user-tie"></i> Cajeros</a>
                        <a href="../proveedores/index.php"><i class="ico_ d fas fa-dolly" aria-hidden="true"></i> Proveedores</a>
                        <a href="../productos/index.php"><i class="ico_b fas fa-box" aria-hidden="true"></i> Productos</a>
                        <a href="../facturas/index.php"><i class="ico_f fas fa-file-alt"></i> Facturas</a><br>
                        <hr style="width:75%; margin-left: 11%;">
                        <a href="../../controller/cerrarSesion.php"><i class="ico_a fas fa-sign-out-alt"></i> Cerrar sesión</a><br>

                    </div>

                    <script>
                        function openSideMenu()
                        {
                            document.getElementById('side-menu').style.width = '150px';
                            document.getElementById('principal').style.marginLeft = '150px';
                        }
                        function closeSideMenu()
                        {
                            document.getElementById('side-menu').style.width = '0px';
                            document.getElementById('principal').style.marginLeft = '0px';
                        }
                    </script>

                </div>



                <div id="principal"> 


                    <div id="contenedor">
                        <div id="lateral2">

                        </div>
                        <div id="principal2">
                            
                            <section class="texto">
                                <P>BIENVENIDO</P>
                                  <div class="logueado"> <i class="ico_logueado fa fa-user" aria-hidden="true"></i> <?php echo $login->getNOMBRES_USU()." ".$login->getAPELLIDOS_USU();?></div>
                               
                                <h1>MODULO DE COMPRAS</h1>
                             
                            </section>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </body>

</html>
