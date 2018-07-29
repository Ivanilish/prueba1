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
        <link href="../css/bootstrap-table.css" rel="stylesheet">
        <script type="text/javascript" src="../js/validaciones.js"></script>
        <link rel="stylesheet" href="../css/jquery.dataTables.min.css">
        <script src="../js/jquery-3.3.1.min.js"></script>
        <script src="../js/jquery.dataTables.min.js"></script>
        <link rel="stylesheet" type="text/css" href="../css/resgistroFactura.css">
        <link rel="stylesheet" type="text/css" href="../css/menuToggle.css">

        <script>
            $(document).ready(function () {
                $('#tablaEmple').DataTable();
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

                        <?php
                        $login = unserialize($_SESSION['sesion']);
                        if ($login->getTIPO_USU() == "Administrador") {
                            ?>
                            <a href="../home/index.php" > <i class="fa fa-home" aria-hidden="true"></i> Inicio</a>
                            <a href="../cajeros/index.php" > <i class="ico_t fas fa-user-tie"></i> Cajeros</a>
                            <a href="../usuarios/index.php"><i class="ico_u fa fa-user" aria-hidden="true"></i> Usuarios</a>
                            <a href="../proveedores/index.php"><i class="ico_ d fas fa-dolly" aria-hidden="true"></i> Proveedores</a>
                            <a href="../productos/index.php"><i class="ico_b fas fa-box" aria-hidden="true"></i> Productos</a>
                            <a href="../facturas/index.php"><i class="ico_f fas fa-file-alt"></i> Facturas</a><br>
                        <?php } else {
                            ?>
                            <a href="../homeCajero/index.php" > <i class="fa fa-home" aria-hidden="true"></i> Inicio</a>
                            <a href="../cajeros/vista.php" > <i class="ico_t fas fa-user-tie"></i> Cajeros</a>
                            <a href="../proveedores/index.php"><i class="ico_ d fas fa-dolly" aria-hidden="true"></i> Proveedores</a>
                            <a href="../productos/index.php"><i class="ico_b fas fa-box" aria-hidden="true"></i> Productos</a>
                            <a href="../facturas/index.php"><i class="ico_f fas fa-file-alt"></i> Facturas</a><br>
                            <?php
                        }
                        ?>
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
                        <h1>REGISTRO DE FACTURAS</h1>       
                    </section>

                    <div id="contenedor">
                        <div id="lateral2">
                            <form action="../../controller/controller.php" name="form">
                                <section class="datos">
                                    <div>Fecha</div>
                                    <i class="ico_calendario far fa-calendar-alt" aria-hidden="true"></i>
                                    <input type="date"
                                           name="fecha_ingreso" 
                                           placeholder="dd/mm/aaaa" 
                                           class="fecha" 
                                           value="<?php echo date("Y-m-d"); ?>"
                                           required/></br>   
                                    <div>Proveedor</div>
                                    <i class="ico_cedula fa fa-id-card" aria-hidden="true"></i>
                                    <input type="text" 
                                           name="cedula" 
                                           id="ced"
                                           placeholder="Cédula/RUC"  
                                           onkeypress="return soloNumeros(event);" 
                                           oninput="validarced();" 
                                           maxlength="10"
                                           class="cedula"
                                           required/>
                                    <input type="hidden" value="buscar_proveedor" name="opcion">
                                    <button type="submit" class="button-buscar" name="validar" disabled id="buscar">
                                        <i class="ico_search fas fa-search"></i>
                                    </button><br>
                                    <div>Tipo de proveedor</div>
                                    <i class="ico_card fas fa-credit-card"></i>
                                    <select name="tipo" class="tipo" >
                                        <option value="" disabled selected>Seleccionar</option>
                                        <option value="si" >Acepto crédito</option> 
                                        <option value="no">No acepta crédito</option> 
                                    </select></br>
                                    <div>Nombres/Apellidos</div>
                                    <i class="ico_user fa fa-user" aria-hidden="true"></i>
                                    <input type="text" 
                                           name="nombres"
                                           oninput="soloLetras(event);" 
                                           placeholder="Nombres" 
                                           class="nombre" 
                                           required 

                                           /></br>
                                    <input type="text" 
                                           name="apellidos"
                                           oninput="soloLetras(event);" 
                                           placeholder="Apellidos" 
                                           class="apellido" 
                                           required 

                                           /></br>


                                    <div>Dirección</div>
                                    <i class="ico_direccion fas fa-map-marker-alt" aria-hidden="true"></i>
                                    <input type="text" 
                                           name="direccion" 
                                           placeholder="Dirección" 
                                           class="direccion" 
                                           id="direccion"  
                                           required

                                           /></br>
                                    <div>Teléfono</div>
                                    <i class="ico_telefono fas fa-mobile-alt" aria-hidden="true"></i>
                                    <input type="text" 
                                           name="telefono" 
                                           onkeypress="return soloNumeros(event);" 
                                           placeholder="Teléfono" 
                                           class="telefono" 
                                           id="telefono"  
                                           required

                                           /></br>
                                    <div>Correo electrónico</div>
                                    <i class="ico_correo far fa-envelope" aria-hidden="true"></i>
                                    <input type="text" 
                                           name="correo"
                                           placeholder="Correo electrónico" 
                                           class="correo" 
                                           required/></b>

                                    <input type="hidden" value="agregar_cabecera" name="opcion">
                                    <button type="submit" class="button-guardar">
                                        <i class="ico_guardar far fa-save" aria-hidden="true"></i>
                                    </button>
                                </section>
                            </form>

                        </div>
                        <div id="principal">

                            <div id="contenedor">
                                <div id="lateral3">
                                    <form action="../../controller/controller.php" name="form">

                                        <section class="datos2">


                                            <div>Producto</div>
                                            <i class="ico_producto fas fa-box" aria-hidden="true"></i>
                                            <select name="tipoProducto" class="tipoProducto" >
                                                <option value="" disabled selected>Seleccionar</option>
                                            </select></br>
                                            <div>PVP</div>
                                            <i class="ico_pvp fas fa-hand-holding-usd"></i>
                                            <input type="text" 
                                                   name="pvp" 
                                                   onkeypress="return soloNumeros(event);" 
                                                   placeholder="PVP" 
                                                   class="pvp" 
                                                   required
                                                   /></br>
                                            <div>IVA</div>
                                            <i class="ico_iva fas fa-percent"></i>
                                            <input type="text" 
                                                   name="iva" 
                                                   onkeypress="return soloNumeros(event);" 
                                                   placeholder="IVA" 
                                                   class="iva" 
                                                   required
                                                   /></br>
                                            <div>Cantidad</div>
                                            <i class="ico_cantidad fas fa-boxes"></i>
                                            <input type="text" 
                                                   name="cantidad" 
                                                   onkeypress="return soloNumeros(event);" 
                                                   placeholder="Cantidad" 
                                                   class="cantidad" 
                                                   required
                                                   /></br>
                                            <div>Descuento</div>
                                            <i class="ico_descuento fas fa-percent"></i>
                                            <input type="text" 
                                                   name="descuento" 
                                                   onkeypress="return soloNumeros(event);" 
                                                   placeholder="Descuento" 
                                                   class="descuento" 
                                                   required
                                                   /></br>
                                             <input type="hidden" value="agregar_producto" name="opcion">
                                    <button type="submit" class="button-guardar">
                                    <i class="ico_add fas fa-plus-circle"></i>
                                    </button>




                                        </section>
                                    </form>


                                </div>
                                <div id="principal">
                                    <section class="datosTabla">


                                        <table  id="tablaEmple" class="display" data-toggle="table"> 
                                            <thead>
                                                <tr>
                                                    <th>PRODUCTO</th>
                                                    <th>PVP</th>
                                                    <th>IVA</th>
                                                    <th>CANTIDAD</th>
                                                    <th>DESCUENTO</th>
                                                    <th>SUBTOTAL</th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                <!-- <?php
                                                include '../../model/Empleado.php';

                                                if (isset($_SESSION['lista_empleado'])) {

                                                    $registro = unserialize($_SESSION['lista_empleado']);

                                                    foreach ($registro as $dato) {
                                                        echo "<tr>";
                                                        echo "<td>" . $dato->getId() . "</td>";
                                                        echo "<td>" . $dato->getCedula() . "</td>";
                                                        echo "<td>" . $dato->getNombres() . "</td>";
                                                        echo "<td>" . $dato->getDireccion() . "</td>";
                                                        echo "<td>" . $dato->getTelefono() . "</td>";
                                                        echo "<td><a href='../../controller/controller.php?opcion=cargar_empleado&id=" . $dato->getId() . "' class=\"actualizar\"><i class=\"ico_actualizar fas fa-pencil-alt\" aria-hidden=\"true\"></i></a></td>";

                                                        echo "</tr>";
                                                    }
                                                } else {
                                                    
                                                }
                                                ?>-->
                                            </tbody>
                                        </table>

                                    </section>
                                </div>

                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </body>

</html>
