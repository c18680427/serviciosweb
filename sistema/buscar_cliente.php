<?php
session_start();
if (empty($_SESSION['active'])) {
	header('location: ../');
}
include "includes/functions.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>Punto de Venta</title>

	<!-- Custom styles for this template-->
	<link href="css/sb-admin-2.min.css" rel="stylesheet">
	<link rel="stylesheet" href="css/dataTables.bootstrap4.min.css">

</head>

<body id="page-top" style="overflow:hidden;">
	<?php
	include "../conexion.php";
	// datos Empresa
	$dni = '';
	$nombre_empresa = '';
	$razonSocial = '';
	$emailEmpresa = '';
	$telEmpresa = '';
	$dirEmpresa = '';
	$igv = '';

	$query_empresa = mysqli_query($conexion, "SELECT * FROM configuracion");
	$row_empresa = mysqli_num_rows($query_empresa);
	if ($row_empresa > 0) {
		while ($infoEmpresa = mysqli_fetch_assoc($query_empresa)) {
			$dni = $infoEmpresa['dni'];
			$nombre_empresa = $infoEmpresa['nombre'];
			$razonSocial = $infoEmpresa['razon_social'];
			$telEmpresa = $infoEmpresa['telefono'];
			$emailEmpresa = $infoEmpresa['email'];
			$dirEmpresa = $infoEmpresa['direccion'];
			$igv = $infoEmpresa['igv'];
		}
	}
	$user_id = $_SESSION['idUser'];


	//$query_data = mysqli_query($conexion, "CALL data();");
	$query_data = mysqli_query($conexion, "CALL data($user_id)");
	$result_data = mysqli_num_rows($query_data);
	if ($result_data > 0) {
		$data = mysqli_fetch_assoc($query_data);
	}

	?>
	<!-- Page Wrapper -->
	<div id="wrapper">
		<!-- Content Wrapper -->
		<div id="content-wrapper" class="d-flex flex-column">

			<!-- Main Content -->
			<div id="content">
			
			
			
			
			
			
			
			
			
			
			
			
			
			

<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- Page Heading -->
	<div align="center">
		<h1 class="h3 mb-0 text-gray-800">Clientes</h1>
		<br>
	</div>

	<div class="row">
		<div class="col-lg-12">

			<div class="table-responsive">
				<table class="table table-striped table-bordered" id="table">
					<thead class="thead-dark">
						<tr>
							<th>RFC</th>
							<th>NOMBRE</th>
							<!--<th>TELEFONO</th>
							<th>DIRECCIÓN</th>-->
						</tr>
					</thead>
					<tbody>
						<?php
						include "../conexion.php";

						$query = mysqli_query($conexion, "SELECT * FROM cliente");
						$result = mysqli_num_rows($query);
						if ($result > 0) {
							while ($data = mysqli_fetch_assoc($query)) { ?>
								<tr>
									<td onclick="set_rfc();"><?php echo $data['dni']; ?></td>
									<td><?php echo $data['nombre']; ?></td>
									<!--<td><?php echo $data['telefono']; ?></td>
									<td><?php echo $data['direccion']; ?></td>-->
								</tr>
						<?php }
						} ?>
					</tbody>

				</table>
			</div>

		</div>
	</div>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->













</div>
<!-- End of Content Wrapper -->
</div>
<!-- End of Page Wrapper -->

<!-- Bootstrap core JavaScript-->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="vendor/jquery-easing/jquery.easing.min.js"></script>
<script src="js/all.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="js/sb-admin-2.min.js"></script>
<script src="js/jquery.dataTables.min.js"></script>
<script src="js/dataTables.bootstrap4.min.js"></script>
<script src="js/sweetalert2@10.js"></script>
<script type="text/javascript" src="js/producto.js"></script>
<script type="text/javascript">
  $(document).ready(function() {
    $('#table').DataTable();
    var usuarioid = '<?php echo $_SESSION['idUser']; ?>';
    searchForDetalle(usuarioid);
  });
</script>

</body>

</html>