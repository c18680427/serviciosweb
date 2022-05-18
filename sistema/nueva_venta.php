<?php include_once "includes/header.php"; ?>

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <?php
                                include "../conexion.php";
                                $query = mysqli_query($conexion, "SELECT * FROM cliente");
                                mysqli_close($conexion);
                                $resultado = mysqli_num_rows($query);
                                if ($resultado > 0) {
                                    $data = mysqli_fetch_array($query);
                                }
                                ?>
                            </div>
<div class="d-sm-flex align-items-center justify-content-between mb-4">
     <h1 class="h3 mb-0 text-gray-800"></h1>
	 <!--<h3 class="text-center">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Datos Venta</h3>-->
	 <h3 class="text-center">Datos Venta</h3>
     <a href="ventas.php" class="btn btn-primary">Ventas</a>
     <!--<a href="" class="btn btn-primary">Ventas</a>-->
</div>
                            <div id="agotado" style="display:none"><div class="alert alert-danger" role="alert">Producto agotado</div></div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <!--<div class="form-group">
                                        <label><i class="fas fa-user"></i> VENDEDOR</label>
                                        <p style="font-size: 16px; text-transform: uppercase; color: blue;"><?php echo $_SESSION['nombre']; ?></p>
                                    </div>-->
                                </div>
                                <div class="col-lg-6">
                                    <!--<label>Acciones</label>-->
                                </div>
                            </div>
                              <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th width="100px">Código</th>
                                            <th>Descripción</th>
                                            <th>Stock</th>
                                            <th width="100px">Cantidad</th>
                                            <th class="textright">Precio</th>
                                            <th class="textright">Precio Total</th>
                                            <th>Acciones</th>
                                        </tr>
                                        <tr>
                                            <td><input autofocus type="number" name="txt_cod_producto" id="txt_cod_producto"></td>
                                            <td id="txt_descripcion">-</td>
                                            <td id="txt_existencia">-</td>
                                            <td><input type="number" name="txt_cant_producto" id="txt_cant_producto"value="0" min="1" disabled></td>
                                            <td id="txt_precio" class="textright">0.00</td>
                                            <td id="txt_precio_total" class="txtright">0.00</td>
                                            <td><a href="#" id="add_product_venta" class="btn btn-dark" style="display: none;">Agregar</a></td>
                                        </tr>
                                        <tr hidden>
                                            <th>Código</th>
                                            <th colspan="2">Descripción</th>
                                            <th>Cantidad</th>
                                            <th class="textright">Precio</th>
                                            <th class="textright">Precio Total</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody id="detalle_venta">
                                        <!-- Contenido ajax -->

                                    </tbody>

                                    <tfoot id="detalle_totales">
                                        <!-- Contenido ajax -->
                                    </tfoot>
                                </table>
								<div align="center">
                                    <div id="acciones_venta" class="form-group">
                                        <a href="#" class="btn btn-danger" id="btn_anular_venta">Anular</a>
                                        <a href="#" class="btn btn-primary" id="btn_facturar_venta"><i class="fas fa-save"></i> Generar Venta</a>
                                    </div>
								</div>
                              </div>
							  
							  	<!--<h3 class="text-center">Datos del Cliente</h3>
                                <a href="#" class="btn btn-primary btn_new_cliente"><i class="fas fa-user-plus"></i> Nuevo Cliente</a>-->
								
								
<!--<div class="d-sm-flex align-items-center justify-content-between mb-4">-->
     <!--<h1 class="h3 mb-0 text-gray-800"></h1>-->
	 <!--<h3 class="text-center">Datos del Cliente</h3>-->
	 <!--<h3 align="center">Datos del Cliente</h3>-->
	 <!--<a href="#" class="btn btn-primary btn_new_cliente"><i class="fas fa-user-plus"></i> Nuevo Cliente</a>-->
<!--</div>-->			
							<!--<div class="card">
                                <div class="card-body">
                                    <form method="post" name="form_new_cliente_venta" id="form_new_cliente_venta">
                                        <input type="hidden" name="action" value="addCliente">-->
                                        <input type="hidden" id="idcliente" value="<?php echo $data['idcliente']; ?>" name="idcliente" required>
                                        <!--<div class="row">
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label>RFC</label>
                                                    <input type="number" name="dni_cliente" id="dni_cliente" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label>Nombre</label>
                                                    <input type="text" name="nom_cliente" id="nom_cliente" class="form-control" disabled required>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label>Teléfono</label>
                                                    <input type="number" name="tel_cliente" id="tel_cliente" class="form-control" disabled required>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label>Dirección</label>
                                                    <input type="text" name="dir_cliente" id="dir_cliente" class="form-control" disabled required>
                                                </div>

                                            </div>
											<div align="center">
											<label><br></label>
                                            <div id="div_registro_cliente" style="display: none;">
                                                <button type="submit" class="btn btn-primary">Guardar</button>
                                            </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>-->
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->
			
		
<br>
<div align="center"> 
    <object type="text/html" data="buscar_producto.php" width="750px" height="600px">
    </object>
    <!--<object type="text/html" data="buscar_cliente.php" width="750px" height="600px">
    </object>-->
</div>
            <?php include_once "includes/footer.php"; ?>
