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
        <title>Registro</title>
        <link rel="stylesheet" type="text/css" href="../css/fontawesome-all.css">
        <script src="../js/jquery-2.1.4.js"></script>
        <script src="../js/bootstrap-table.js"></script>
        <link rel="stylesheet" href="../css/jquery.dataTables.min.css">
        <script src="../js/jquery-3.3.1.min.js"></script>
        <script src="../js/jquery.dataTables.min.js"></script>
        <link href="../css/bootstrap-table.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="../css/registroUsuario.css">
        <link rel="stylesheet" type="text/css" href="../css/menuToggle.css">

        <script>
            $(document).ready(function () {
                $('#tablaUser').DataTable();
            });
        </script>
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
                        <a href="../cajeros/index.php" > <i class="ico_t fas fa-user-tie"></i> Cajeros</a>
                        <a href="../usuarios/index.php"><i class="ico_u fa fa-user" aria-hidden="true"></i> Usuarios</a>
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
                    <section class="titulo_menu">
                        <p>MÓDULO COMPRAS</p>
                        <div class="logueado"> <i class="ico_logueado fa fa-user" aria-hidden="true"></i> <?php echo $login->getNOMBRES_USU() . " " . $login->getAPELLIDOS_USU(); ?></div>
                        <h1>REGISTRO DE USUARIOS</h1>       
                    </section>


                    <div id="contenedor">
                        <div id="lateral2">

                          <?php 
                            $usu= unserialize($_SESSION['usuario']);
                          ?>
                            <form action="../../controller/controller.php">
                                <section class="datos">
                                    <div>Id</div>
                                    <i class="ico_keyid fas fa-key" aria-hidden="true"></i>
                                    <input type="text" name="id_usuario" value="<?php echo $usu->getID_USU(); ?>"placeholder="Usuario" readonly="readonly"class="cedula" required/></br>

                                    <div>Cajero</div>
                                    <i class="ico_cedula fas fa-user-tie" aria-hidden="true"></i>
                                    <select name="cajero" class="tipo1" >
                                   
                                        <option value="<?php echo $usu->getID_CAJ(); ?>" ><?php echo $usu->getNOMBRES_USU() . " " . $usu->getAPELLIDOS_USU()?></option>
                                        <?php
                                        include '../../model/Cajero.php';
                                        $registro = unserialize($_SESSION['listaCajeros']);
                                        foreach ($registro as $dato) {
                                            $opcion = "<option value=\"" . $dato->getID_CAJ() . "\">" . $dato->getNOMBRES_CAJ() . " " . $dato->getAPELLIDOS_CAJ() . "</option> ";
                                            echo $opcion;
                                        }
                                        ?>
                                    </select></br>
                                    <div>Tipo de usuario</div>
                                    <i class="ico_usuarios fas fa-users" aria-hidden="true"></i>
                                    <select name="tipo" class="tipo" >
                                        <option value="<?php echo $usu->getTIPO_USU(); ?>" ><?php echo $usu->getTIPO_USU(); ?></option>
                                        <option value="Administrador" >Administrador</option> 
                                        <option value="Cajero">Cajero</option> 
                                    </select></br>
                                    <div>Nombre de usuario</div>
                                    <i class="ico_user fa fa-user" aria-hidden="true"></i>
                                    <input type="text" value="<?php echo $usu->getNOMBRE_USU(); ?>" name="nombre" placeholder="Nombre" class="nombre" required/></br>
                                    <div>Contraseña</div>
                                    <i class="ico_password fas fa-unlock-alt" aria-hidden="true"></i>
                                    <input type="password" value="<?php echo $usu->getPASS_USU(); ?>" name="contrasena" placeholder="Contraseña" class="contrasena" required/></br>

                                    <input type="hidden" value="actualizar_usuario" name="opcion">
                                    <button type="submit" class="button-guardar">
                                        <i class="ico_guardar far fa-save" aria-hidden="true"></i>
                                    </button>
                                </section>

                            </form>

                        </div>
                        <div id="principal2">

                            <section class="datosTabla"> 
                                <table data-toggle="table" id="tablaUser" class="display"> 
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>CÉDULA</th>
                                            <th>NOMBRES</th>
                                            <th>APELLIDOS</th>
                                            <th>USUARIO</th>
                                            <th>CONTRASEÑA</th>
                                            <th>TIPO DE USUARIO</th>
                                            <th>ELIMINAR</th>
                                            <th>ACTUALIZAR</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        if (isset($_SESSION['listaUsuarios'])) {

                                            $registro = unserialize($_SESSION['listaUsuarios']);

                                            foreach ($registro as $dato) {
                                                echo "<tr>";
                                                echo "<td>" . $dato->getID_USU() . "</td>";
                                                echo "<td>" . $dato->getCEDULA_USU() . "</td>";
                                                echo "<td>" . $dato->getNOMBRES_USU() . "</td>";
                                                echo "<td>" . $dato->getAPELLIDOS_USU() . "</td>";
                                                echo "<td>" . $dato->getNOMBRE_USU() . "</td>";
                                                echo "<td>" . $dato->getPASS_USU() . "</td>";
                                                echo "<td>" . $dato->getTIPO_USU() . "</td>";
                                                echo "<td><a href='../../controller/controller.php?opcion=eliminar_usuario&id=" . $dato->getID_USU() . "' class=\"eliminar\"><i class=\"ico_borrar fa fa-trash\" aria-hidden=\"true\"></i></a></td>";
                                                echo "<td><a href='../../controller/controller.php?opcion=cargar_usuario&id=" . $dato->getID_USU() . "' class=\"actualizar\"><i class=\"ico_actualizar fas fa-pencil-alt\" aria-hidden=\"true\"></i></a></td>";

                                                echo "</tr>";
                                            }
                                        } else {
                                            
                                        }
                                        ?>

                                    </tbody>
                                </table>

                            </section>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </body>
</html>

<?php ?>
