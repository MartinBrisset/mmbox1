<!DOCTYPE html>
<html lang="es">

  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>MMBox | Panel de control</title>

    <!-- Bootstrap core CSS-->
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template-->
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <!-- Page level plugin CSS-->
    <link href="../vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../css/sb-admin.css" rel="stylesheet">
		<link href="../css/estilo.css" rel="stylesheet">
    <script type="text/javascript" src="../js/Funciones.js"></script>

  </head>

  <body class="bg-dark">


		<!-- Filtro -->
		<div class="filtro">
		</div>

    <div class="container">


			<a href="../index.php">
        <div class="card card-login mx-auto mt-5" id="logo-login">
				<img src="../images/logo.png" height="100" class="img-fluid" >
      </div>
      </a>

      <div class="card-login mx-auto mt-5 degradado" id="login-caja">
        <div class="card-body ">

          <form id="dataFRM" action="../ProcesoPersonasLOG.php" method="POST">
            <div class="form-group">
                <input id="dataUSR"
                       type="text"
                       name="USR"
                       maxlength="10"
                       title="Máximo 10 caracteres"
                       placeholder="Usuario"
                       class="form-control"
                />
            </div>

            <div class="form-group">
                <input id="dataPSW"
                       type="password"
                       name="PSW"
                       maxlength="10"
                       title="Máximo 10 caracteres"
                       placeholder="Contraseña"
                       class="form-control"
                />
            </div>

            <div class="form-group text-center">
              <input type="button" value="Entrar" class="btn btn-primary" onclick="CheckLOG();" />
              <input type="reset"  value="Reset" class="btn btn-secondary"/>
            </div>

          </form>

        </div>
      </div>

    </div>

    <!--<script>MensajeAlerta();</script> -->

    <!-- Bootstrap core JavaScript-->
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Page level plugin JavaScript-->
    <script src="../vendor/chart.js/Chart.min.js"></script>
    <script src="../vendor/datatables/jquery.dataTables.js"></script>
    <script src="../vendor/datatables/dataTables.bootstrap4.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../js/sb-admin.min.js"></script>

    <!-- Demo scripts for this page-->
    <script src="../js/demo/datatables-demo.js"></script>
    <script src="../js/demo/chart-area-demo.js"></script>

  </body>

</html>
