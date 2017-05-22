<?php

include 'session.php';
require_once '../models/class.chuto.php';

$listar = new Chuto();

?>
<!Doctype html>
<html lang="es">
    <?php include '../assets/head.php'; ?>
    
    <body>
        <!-- Navbar -->
        <?php include 'navbar.php'; ?>
        <!-- /Navbar -->
        
        <!-- Encabezado -->
        <h1 class="titulo text-center">Chutos</h1>
        <!-- /Encabezado -->
        
        <div class="container">
            <div class="text-right">
               <!-- Nuevo -->
                <a class="btn btn-success btn-lg" data-toggle="modal" data-target="#nuevo"><span class="glyphicon glyphicon-new-window"></span> Nuevo</a>
                <!-- /Nuevo -->
                
                <!-- Reporte -->
                <a id="reporte" class="btn btn-primary btn-lg" onclick="reporteChuto()"><span class="glyphicon glyphicon-print"></span> Generar Reporte</a>
                <!-- /Reporte -->
            </div>
            
            <!-- Tabla chutos -->
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Matrícula</th>
                            <th>Marca</th>
                            <th>Modelo</th>
                            <th>Color</th>
                            <th>Año</th>
                            <th>Serial Motor</th>
                            <th>Serial Carrocería</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                        <?php                        
                        $data = $listar->Listar();
                        foreach ($data as $key => $valor) { ?>
                        <tr>
                            <td><?php echo $valor['id_chuto']; ?></td>
                            <td><?php echo $valor['matricula']; ?></td>
                            <td><?php echo $valor['marca']; ?></td>
                            <td><?php echo $valor['modelo']; ?></td>
                            <td><?php echo $valor['color']; ?></td>
                            <td><?php echo $valor['annio']; ?></td>
                            <td><?php echo $valor['serial_motor']; ?></td>
                            <td><?php echo $valor['serial_carroceria']; ?></td>
                            <td>
                                <a class="btn btn-primary" data-toggle="tooltip" data-placement="bottom" title="Editar" onclick="obtenerChuto(<?php echo $valor['id_chuto']; ?>)">
                                    <span class="glyphicon glyphicon-edit"></span>
                                </a>
                                
                                <a class="btn btn-danger" data-toggle="tooltip" data-placement="bottom" title="Eliminar" onclick="eliminarChuto(<?php echo $valor['id_chuto']; ?>)">
                                    <span class="glyphicon glyphicon-trash"></span>
                                </a>
                            </td>
                        </tr>
                        <?php                        
                        }                        
                        ?>                          
                    </tbody>
                </table>
            </div>
            <!-- /Tabla chuto -->
            
            <!-- Modal nuevo -->
            <div id="nuevo" class="modal fade" role="dialog">
                <div class="modal-dialog">
                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h3 class="modal-title">Nuevo Chuto</h3>
                        </div>
                        <div class="modal-body">
                            <!-- Formulario -->
                            <form id="nuevo-chuto">
                                <div class="form-group input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-asterisk"></i></span>
                                    <input type="text" class="form-control" name="matricula" placeholder="Matrícula" maxlength="10" onKeyUp="this.value=this.value.toUpperCase()" onpaste="return false" autocomplete="off" required>
                                </div>
                                <!-- ****************************** -->
                                <div class="form-group input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-th-list"></i></span>
                                    <select class="form-control" name="marca" data-toggle="tooltip" data-placement="right" title="Marca">
                                        <option value="seleccione">Seleccione</option>
                                        <option value="VOLVO">Volvo</option>
                                        <option value="MERCEDES-BENZ">Mercedes-Benz</option>
                                        <option value="IVECO">Iveco</option>
                                        <option value="INTERNATIONAL">International</option>
                                        <option value="MACK">Mack</option>
                                    </select>
                                </div>
                                <!-- ****************************** -->
                                <div class="form-group input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-th-list"></i></span>
                                    <select class="form-control" name="modelo" data-toggle="tooltip" data-placement="right" title="Modelo">
                                        <option value="seleccione">Seleccione</option>
                                        <option disabled>Volvo</option>
                                        <option value="VM">VM</option>
                                        <option value="VN">VN</option>
                                        <option disabled>Mercedes-Benz</option>
                                        <option value="L710-42">L710-42</option>
                                        <option value="ZETROS">Zetros</option>
                                        <option disabled>Iveco</option>
                                        <option value="STRALIS">Stralis</option>
                                        <option value="TECTOR">Tector</option>
                                        <option disabled>International</option>
                                        <option value="DURASTAR">Durastar</option>
                                        <option value="TRANSTAR">Transtar</option>
                                        <option disabled>Mack</option>
                                        <option value="VISION">Vision</option>
                                        <option value="GRANITE">Granite</option>
                                    </select>
                                </div>
                                <!-- ****************************** -->
                                <div class="form-group input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-star-empty"></i></span>
                                    <input type="text" class="form-control" name="color" placeholder="Color" onKeyUp="this.value=this.value.toUpperCase()" onkeypress="return onlyText(event)" onpaste="return false" autocomplete="off" required>
                                </div>
                                <!-- ****************************** -->
                                <div class="form-group input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                                    <input type="text" class="form-control" name="annio" placeholder="Año" maxlength="4" onkeypress="return onlyNumber(event)" onpaste="return false" autocomplete="off" required>
                                </div>
                                <!-- ****************************** -->
                                <div class="form-group input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-barcode"></i></span>
                                    <input type="text" class="form-control" name="serial_motor" placeholder="Serial Motor" onKeyUp="this.value=this.value.toUpperCase()" onpaste="return false" autocomplete="off" required>
                                </div>
                                <!-- ****************************** -->
                                <div class="form-group input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-barcode"></i></span>
                                    <input type="text" class="form-control" name="serial_carroceria" placeholder="Serial Carrocería" onKeyUp="this.value=this.value.toUpperCase()" onpaste="return false" autocomplete="off" required>
                                </div>
                                <!-- ****************************** -->
                                <button type="submit" class="btn btn-success btn-lg center-block"><span class="glyphicon glyphicon-ok"></span> Aceptar</button>
                            </form>
                            <!-- /Formulario -->
                            
                            <!-- Respuesta -->
                            <div id="respuesta" style="display: none"></div>
                            <!-- /Respuesta -->
                        </div>
                        <div class="modal-footer">                            
                            <button type="button" class="btn btn-danger btn-lg" data-dismiss="modal">Cerrar</button>
                        </div>
                    </div>
                    <!-- /Modal content-->
                </div>
            </div>
            <!-- /Modal nuevo -->
            
            <!-- Modal editar -->
            <div id="editarChuto" class="modal fade" role="dialog">
                <div class="modal-dialog">
                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h3 class="modal-title">Editar Chuto</h3>
                        </div>
                        <div class="modal-body">
                            <!-- Formulario -->
                            <form id="editar-chuto">
                                <input id="id_chuto" name="id_chuto" type="hidden">
                                <!-- ****************************** -->
                                <div class="form-group input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-barcode"></i></span>
                                    <input id="serial_motor" type="text" class="form-control" name="serial_motor" placeholder="Serial Motor" onKeyUp="this.value=this.value.toUpperCase()" onpaste="return false" autocomplete="off" required>
                                </div>
                                <!-- ****************************** -->
                                <div class="form-group input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-barcode"></i></span>
                                    <input id="serial_carroceria" type="text" class="form-control" name="serial_carroceria" placeholder="Serial Carrocería" onKeyUp="this.value=this.value.toUpperCase()" onpaste="return false" autocomplete="off" required>
                                </div>
                                <!-- ****************************** -->
                                <button type="submit" class="btn btn-success btn-lg center-block"><span class="glyphicon glyphicon-ok"></span> Aceptar</button>
                            </form>
                            <!-- /Formulario -->
                            
                            <!-- Respuesta -->
                            <div id="respuesta" style="display: none"></div>
                            <!-- /Respuesta -->
                        </div>
                        <div class="modal-footer">                            
                            <button type="button" class="btn btn-danger btn-lg" data-dismiss="modal">Cerrar</button>
                        </div>
                    </div>
                    <!-- /Modal content-->
                </div>
            </div>
            <!-- /Modal editar -->
        </div>
        
        <?php include '../assets/footer.php'; ?>
    </body>
</html>