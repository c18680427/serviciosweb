 <?php include_once "includes/header.php";
  include "../conexion.php";
  if (!empty($_POST)) {
    $alert = "";
    if (empty($_POST['codigo']) || empty($_POST['proveedor']) || empty($_POST['producto']) || empty($_POST['precio']) || $_POST['precio'] <  0 || empty($_POST['cantidad'] || $_POST['cantidad'] <  0)) {
      $alert = '<div class="alert alert-danger" role="alert">
                Todo los campos son obligatorios
              </div>';
    } else {
      $codigo = $_POST['codigo'];
      $proveedor = $_POST['proveedor'];
      $producto = $_POST['producto'];
      $precio = $_POST['precio'];
      $cantidad = $_POST['cantidad'];
      $usuario_id = $_SESSION['idUser'];
	  
	  $query_id = mysqli_query($conexion, "SELECT * FROM producto where codproducto = $codigo");
      $result_id = mysqli_fetch_array($query_id);
	  
	  if ($result_id > 0)
	  {
	      $alert = '<div class="alert alert-danger" role="alert">
                El codigo del producto ya existe
              </div>';
	  }
	  else
	  {
	      $query_insert = mysqli_query($conexion, "INSERT INTO producto(codproducto,proveedor,descripcion,precio,existencia,usuario_id) values ('$codigo', '$proveedor', '$producto', '$precio', '$cantidad','$usuario_id')");
          if ($query_insert) {
              $alert = '<div class="alert alert-primary" role="alert">
                Producto Registrado
              </div>';
          } else {
          $alert = '<div class="alert alert-danger" role="alert">
                Error al registrar el producto
              </div>';
      }
	  }
    }
  }
  ?>

 <!-- Begin Page Content -->
 <div class="container-fluid">

   <!-- Page Heading -->
   <div class="d-sm-flex align-items-center justify-content-between mb-4">
     <h1 class="h3 mb-0 text-gray-800">Registrar producto</h1>
     <a href="lista_productos.php" class="btn btn-primary">Ver productos</a>
   </div>

   <!-- Content Row -->
   <div class="row">
     <div class="col-lg-6 m-auto">
       <form action="" method="post" autocomplete="off">
         <?php echo isset($alert) ? $alert : ''; ?>
         <div class="form-group">
           <label>Proveedor</label>
           <?php
            $query_proveedor = mysqli_query($conexion, "SELECT codproveedor, proveedor FROM proveedor ORDER BY proveedor ASC");
            $resultado_proveedor = mysqli_num_rows($query_proveedor);
            mysqli_close($conexion);
            ?>
           <select id="proveedor" name="proveedor" class="form-control">
             <?php
              if ($resultado_proveedor > 0) {
                while ($proveedor = mysqli_fetch_array($query_proveedor)) {
                  // code...
              ?>
                 <option value="<?php echo $proveedor['codproveedor']; ?>"><?php echo $proveedor['proveedor']; ?></option>
             <?php
                }
              }
              ?>
           </select>
         </div>
         <div class="form-group">
           <label for="producto">Producto</label>
           <input type="text" placeholder="Ingrese nombre del producto" name="producto" id="producto" class="form-control">
         </div>
         <div class="form-group">
           <label for="precio">Precio</label>
           <input type="number" min="0" placeholder="Ingrese precio" class="form-control" name="precio" id="precio">
         </div>
         <div class="form-group">
           <label for="codigo">Código de barras</label>
           <input type="number" placeholder="Ingrese codigo" class="form-control" name="codigo" id="codigo">
         </div>
         <div class="form-group">
           <label for="cantidad">Cantidad</label>
           <input type="number" min="0" placeholder="Ingrese cantidad" class="form-control" name="cantidad" id="cantidad">
         </div>
         <input type="submit" value="Guardar Producto" class="btn btn-primary">
       </form>
     </div>
   </div>


 </div>
 <!-- /.container-fluid -->

 </div>
 <!-- End of Main Content -->
 <?php include_once "includes/footer.php"; ?>