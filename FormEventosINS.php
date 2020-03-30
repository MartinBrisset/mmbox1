<?php
    include "includes/CtrlSession.inc";

   //captura fecha y ahora actual
   date_default_timezone_set("America/Argentina/Buenos_Aires");

   $fecha = date('Y-m-d');
 ?>

<!DOCTYPE html>
<html lang="es">

  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>MMBox | Panel de control</title>
    <link href="images/penarol.png" rel="icon" type="image/x-icon" />

    <!-- Bootstrap core CSS-->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <!-- Page level plugin CSS-->
    <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin.css" rel="stylesheet">
    <link href="css/editordetexto.css" rel="stylesheet">

    <script type="text/javascript" src="js/Funciones.js"></script>
    <script type="text/javascript" src="ckeditor/ckeditor.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>

  </head>

  <body id="page-top">


    <!-- Navbar -->
    <?php
        include "includes/usrnav.inc";
    ?>

    <div id="wrapper">

      <!-- Menu -->
      <?php
          include "includes/usrmenu.inc";
      ?>

      <!-- Contenedor -->
      <div id="content-wrapper">

        <div class="container-fluid">


              <!-- Formulario -->
              <fieldset id="frm">
                <form id="dataFRM" action="ProcesoEventosINS.php" method="POST" enctype="multipart/form-data">

                  <!-- Columna -->
                  <div class="row" id="formulario-evento">

                      <!-- Columna izquierda -->
                      <div class="col-12 col-md-12 col-lg-8 col-xl-9">
                        <div class="row">

                          <!-- Nuevo evento -->
                          <div class="col-12" >

                                          <div class="form-group">
                                          <h4><b>Nuevo evento</b></h4>
                                          </div>



                          </div>

                              <!-- Titulo -->
                              <div class="col-12" >

                                              <!-- Titulo -->
                                              <div class="form-group">
                                                      <input id="dataTIT"
                                                             class="form-control form-control-lg"
                                                             type="text"
                                                             name="TIT"
                                                             maxlength="255"
                                                             title="Máximo 255 caracteres"
                                                             placeholder="Título"
                                                      />
                                              </div>


                              </div>

                              <!-- Fecha -->
                              <div class="col-12">
                                  <div class="row">

                                      <!-- Fecha -->
                                      <div class="col-12">
                                            <div class="card mb-3">
                                                <div class="card-header">
                                                  <i class="fas fa-calendar"></i> <b>Fecha</b>
                                                </div>
                                                <div class="card-body">
                                                  <div class="table-responsive">

                                                    <!-- Fecha -->
                                                    <div class="form-row">

                                                              <!-- Inicio -->
                                                              <div class="col-6">
                                                                    <div class="form-group row">
                                                                      <label class="col-12 col-form-label">Inicio</label>

                                                                      <div class="form-group col-12">
                                                                            <input id="datastartFECH"
                                                                                   type="date"
                                                                                   name="FECHASTART"
                                                                                   maxlength="100"
                                                                                   title="Máximo 100 caracteres"
                                                                                   class="form-control"
                                                                            />
                                                                      </div>
                                                                      <div class="col-12">
                                                                            <input id="datastartHORA"
                                                                                   type="time"
                                                                                   name="HORASTART"
                                                                                   value="00:00"
                                                                                   maxlength="100"
                                                                                   title="Máximo 100 caracteres"
                                                                                   class="form-control"
                                                                            />
                                                                      </div>

                                                                    </div>
                                                              </div>

                                                              <!-- Final -->
                                                              <div class=" col-6">
                                                                    <div class="form-group row">
                                                                      <label class="col-12 col-form-label">Fin</label>

                                                                      <div class="form-group col-12">
                                                                        <input id="dataendFECH"
                                                                               type="date"
                                                                               name="FECHAEND"
                                                                               maxlength="100"
                                                                               title="Máximo 100 caracteres"
                                                                               class="form-control"
                                                                        />
                                                                      </div>
                                                                      <div class=" col-12">
                                                                        <input id="dataendHORA"
                                                                               type="time"
                                                                               name="HORAEND"
                                                                               value="00:00"
                                                                               class="form-control"
                                                                        />
                                                                      </div>

                                                                    </div>
                                                              </div>

                                                    </div>

                                                  </div>
                                                </div>
                                            </div>
                                      </div>

                                  </div>
                              </div>

                              <!-- Descripción -->
                              <div class="col-12">
                                <div class="form-group">
                                  <textarea id="dataDESC"
                                            class="ckeditor"
                                            rows="5"
                                            type="text"
                                            name="DESC">
                                  </textarea>
                                </div>
                              </div>

                              <!-- Mapa de la sala -->
                              <div class="col-12">
                                            <div class="card mb-3">
                                                <div class="card-header">
                                                  <i class="fas fa-hotel"></i> <b>Sala</b>
                                                </div>
                                                <div class="card-body">
                                                  <div class="table-responsive">
                                                    <!-- Entrada 1 --->
                                                    <div class="form-group">



                                                                <div class="btn-group btn-group-toggle" data-toggle="buttons" >
                                                                  <ul id="dataSALA">
                                                                      <div class="form-group row" id="mapas-sala">

                                                                        <div class="col-12 col-md-6 col-lg-3">
                                                                        <li class="btn btn-light active">
                                                                          <input type="radio" name="SALA" id="SALA-1" autocomplete="off" checked="" value="SALA-1">
                                                                          <img src="images/mapa.png" alt="" class="-avatar js-avatar-me img-fluid">
                                                                        </li>
                                                                        </div>

                                                                        <div class="col-12 col-md-6 col-lg-3">
                                                                        <li class="btn btn-light">
                                                                          <input type="radio" name="SALA" id="SALA-2" autocomplete="off" value="SALA-2">
                                                                            <img src="images/mapa1.png" alt="" class="-avatar js-avatar-me img-fluid">
                                                                        </li>
                                                                        </div>

                                                                        <div class="col-12 col-md-6 col-lg-3">
                                                                        <li class="btn btn-light">
                                                                          <input type="radio" name="SALA" id="SALA-3" autocomplete="off" value="SALA-3">
                                                                            <img src="images/mapa2.png" alt="" class="-avatar js-avatar-me img-fluid">
                                                                        </li>
                                                                        </div>

                                                                        <div class="col-12 col-md-6 col-lg-3">
                                                                        <li class="btn btn-light">
                                                                          <input type="radio" name="SALA" id="SALA-4" autocomplete="off" value="SALA-4">
                                                                            <img src="images/mapa3.png" alt="" class="-avatar js-avatar-me img-fluid">
                                                                        </li>
                                                                        </div>

                                                                      </div>
                                                                  </ul>
                                                              </div>

                                                    </div>
                                                  </div>
                                                </div>
                                            </div>
                                      </div>

                              <!-- Precios y entradas -->
                              <div class="col-12">
                                  <div class="row">

                                      <!-- Precios -->
                                      <div class="col-12 col-md-6">
                                            <div class="card mb-3">
                                                <div class="card-header">
                                                  <i class="fas fa-dollar-sign"></i> <b>Precios</b>
                                                </div>
                                                <div class="card-body">
                                                  <div class="table-responsive">

                                                    <!-- Entrada 1 --->
                                                    <div class="form-group">
                                                          <div class="form-group row">

                                                            <!-- Sector --->
                                                            <div class="col-7">
                                                              <input id="dataNamePRECIO1"
                                                                     type="text"
                                                                     name="NAMEPRECIO1"
                                                                     class="form-control"
                                                                     placeholder="Sector"
                                                              />
                                                            </div>

                                                            <!-- Precio --->
                                                            <div class="input-group col-5">
                                                              <div class="input-group-prepend">
                                                                <span class="input-group-text">$</span>
                                                              </div>
                                                              <input id="dataPRECIO1"
                                                                     type="number"
                                                                     name="PRECIO1"
                                                                     class="form-control"
                                                                     placeholder="Precio"
                                                              />
                                                            </div>


                                                          </div>
                                                    </div>

                                                    <!-- Entrada 2 --->
                                                    <div class="form-group">
                                                          <div class="form-group row">

                                                            <!-- Sector --->
                                                            <div class="col-7">
                                                              <input id="dataNamePRECIO2"
                                                                     type="text"
                                                                     name="NAMEPRECIO2"
                                                                     class="form-control"
                                                                     placeholder="Sector"
                                                              />
                                                            </div>

                                                            <!-- Precio --->
                                                            <div class="input-group col-5">
                                                              <div class="input-group-prepend">
                                                                <span class="input-group-text">$</span>
                                                              </div>
                                                              <input id="dataPRECIO2"
                                                                     type="number"
                                                                     name="PRECIO2"
                                                                     class="form-control"
                                                                     placeholder="Precio"
                                                              />
                                                            </div>

                                                          </div>
                                                    </div>

                                                    <!-- Entrada 3 --->
                                                    <div class="form-group">
                                                          <div class="form-group row">

                                                            <!-- Sector --->
                                                            <div class="col-7">
                                                              <input id="dataNamePRECIO3"
                                                                     type="text"
                                                                     name="NAMEPRECIO3"
                                                                     class="form-control"
                                                                     placeholder="Sector"
                                                              />
                                                            </div>

                                                            <!-- Precio --->
                                                            <div class="input-group col-5">
                                                              <div class="input-group-prepend">
                                                                <span class="input-group-text">$</span>
                                                              </div>
                                                              <input id="dataPRECIO3"
                                                                     type="number"
                                                                     name="PRECIO3"
                                                                     class="form-control"
                                                                     placeholder="Precio"
                                                              />
                                                            </div>

                                                          </div>
                                                    </div>

                                                    <!-- Entrada 4 --->
                                                    <div class="form-group">
                                                          <div class="form-group row">

                                                            <!-- Sector --->
                                                            <div class="col-7">
                                                              <input id="dataNamePRECIO4"
                                                                     type="text"
                                                                     name="NAMEPRECIO4"
                                                                     class="form-control"
                                                                     placeholder="Sector"
                                                              />
                                                            </div>

                                                            <!-- Precio --->
                                                            <div class="input-group col-5">
                                                              <div class="input-group-prepend">
                                                                <span class="input-group-text">$</span>
                                                              </div>
                                                              <input id="dataPRECIO4"
                                                                     type="number"
                                                                     name="PRECIO4"
                                                                     class="form-control"
                                                                     placeholder="Precio"
                                                              />
                                                            </div>

                                                          </div>
                                                    </div>

                                                    <!-- Entrada 5 --->
                                                    <div class="form-group">
                                                          <div class="form-group row">

                                                            <!-- Sector --->
                                                            <div class="col-7">
                                                              <input id="dataNamePRECIO5"
                                                                     type="text"
                                                                     name="NAMEPRECIO5"
                                                                     class="form-control"
                                                                     placeholder="Sector"
                                                              />
                                                            </div>

                                                            <!-- Precio --->
                                                            <div class="input-group col-5">
                                                              <div class="input-group-prepend">
                                                                <span class="input-group-text">$</span>
                                                              </div>
                                                              <input id="dataPRECIO5"
                                                                     type="number"
                                                                     name="PRECIO5"
                                                                     class="form-control"
                                                                     placeholder="Precio"
                                                              />
                                                            </div>

                                                          </div>
                                                    </div>

                                                  </div>
                                                </div>
                                            </div>
                                      </div>

                                      <!-- Entradas -->
                                      <div class="col-12 col-md-6">
                                        <div class="card mb-3">
                                              <div class="card-header">
                                                <i class="fas fa-ticket-alt"></i> <b>Entradas</b>
                                              </div>
                                              <div class="card-body">
                                                <div class="table-responsive">

                                                  <!-- medio 1 --->
                                                  <div class="form-group">
                                                        <div class="form-group row">

                                                          <div class="col-5">
                                                            <input id="dataNameLINK1"
                                                                   type="text"
                                                                   name="NAMELINK1"
                                                                   class="form-control"
                                                                   placeholder="Medio de venta"
                                                            />
                                                          </div>
                                                          <div class="col-7">
                                                            <input id="dataLINK1"
                                                                   type="text"
                                                                   name="LINK1"
                                                                   class="form-control"
                                                                   placeholder="Link de venta"
                                                            />
                                                          </div>
                                                        </div>
                                                  </div>

                                                  <!-- medio 2 --->
                                                  <div class="form-group">
                                                        <div class="form-group row">

                                                          <div class="col-5">
                                                            <input id="dataNameLINK2"
                                                                   type="text"
                                                                   name="NAMELINK2"
                                                                   class="form-control"
                                                                   placeholder="Medio de venta"
                                                            />
                                                          </div>
                                                          <div class="col-7">
                                                            <input id="dataLINK2"
                                                                   type="text"
                                                                   name="LINK2"
                                                                   class="form-control"
                                                                   placeholder="Link de venta"
                                                            />
                                                          </div>
                                                        </div>
                                                  </div>

                                                  <!-- medio 3 --->
                                                  <div class="form-group">
                                                        <div class="form-group row">

                                                          <div class="col-5">
                                                            <input id="dataNameLINK3"
                                                                   type="text"
                                                                   name="NAMELINK3"
                                                                   class="form-control"
                                                                   placeholder="Medio de venta"
                                                            />
                                                          </div>
                                                          <div class="col-7">
                                                            <input id="dataLINK3"
                                                                   type="text"
                                                                   name="LINK3"
                                                                   class="form-control"
                                                                   placeholder="Link de venta"
                                                            />
                                                          </div>
                                                        </div>
                                                  </div>

                                                </div>
                                              </div>
                                          </div>
                                      </div>

                                  </div>
                              </div>

                        </div>
                      </div>

                      <!-- Columna derecha -->
                      <div class="col-12 col-md-12 col-lg-4 col-xl-3">
                        <div class="row">

                          <!-- Imágenes -->
                          <div class="col-12">
                              <div class="card mb-3">
                                <div class="card-header">
                                  <i class="fas fa-images"></i> <b>Imágenes</b>
                                </div>
                                <div class="card-body">
                                  <div class="table-responsive">

                                    <div class="form-group">
                                      <label class="col-form-label">Flyer 1470 x 415</label>
                                      <div class="custom-file">
                                          <input class="custom-file-input text-truncate"
                                                 lang="es"
                                                 id="dataIMGPRIN"
                                                 type="file"
                                                 name="IMGMAIN"
                                                 size="5120"
                                                 accept="image/*" >
                                          <label class="custom-file-label" for="customFileLang">Seleccionar Archivo</label>
                                      </div>
                                    </div>

                                    <div class="form-group">
                                      <label class="col-form-label">Flyer 600 x 600</label>
                                      <div class="custom-file">
                                          <input class="custom-file-input text-truncate"
                                                 lang="es"
                                                 id="dataIMGSEC"
                                                 type="file"
                                                 name="IMGOTHER"
                                                 size="5120"
                                                 accept="image/*">
                                          <label class="custom-file-label" for="customFileLang">Seleccionar Archivo</label>
                                      </div>
                                    </div>

                                  </div>
                                </div>
                            </div>
                          </div>

                          <!-- Publicar -->
                          <div class="col-12">
                              <div class="card mb-3">
                                <div class="card-header">
                                  <i class="fas fa-check"></i> <b>Publicar</b>
                                </div>
                                <div class="card-body">
                                  <div class="table-responsive">

                                    <div class="form-row">

                                          <!-- Estado -->
                                          <div class="col-12">
                                                <div class="form-group row">

                                                  <label class="col-6 col-form-label">Estado</label>

                                                  <div class="col-6">
                                                    <select class="form-control" id="dataEST" name="EST" title="Seleccione Estado">
                                                      <option value="">Seleccionar</option>
                                                      <option value="PUBLICADO">Publicado</option>
                                                      <option value="PENDIENTE">Pendiente</option>
                                                      <option value="SUSPENDIDO">Suspendido</option>
                                                      <option value="AGOTADO">Agotado</option>
                                                      <option value="PROXIMAMENTE">Proximamente</option>
                                                    </select>
                                                  </div>

                                                </div>
                                          </div>

                                          <!-- Categoria -->
                                          <div class="col-12">
                                                <div class="form-group row">

                                                  <label class="col-6 col-form-label">Categoría</label>

                                                  <div class="col-6">
                                                      <select class="form-control" id="dataCAT" name="CAT" title="Seleccione Categoria">
                                                        <option value="">Seleccionar</option>
                                                        <?php
                                                          // cargar categorias
                                                          include "includes/LoadCategoriasEVENT.inc";
                                                        ?>
                                                      </select>
                                                  </div>

                                                </div>
                                          </div>

                                          <!-- Destacar -->
                                          <div class="form-group col-12">
                                              <div class="custom-control custom-checkbox">
                                                <input  id="dataCHECK"
                                                        class="custom-control-input"
                                                        type="checkbox"
                                                        name="CHECK"
                                                        value="destacado"
                                                >
                                                <label class="custom-control-label" for="dataCHECK">Destacar</label>
                                              </div>
                                          </div>

                                    </div>
                                </div>

                                </div>
                                <div class="card-footer small text-muted">

                                  <input class="btn btn-primary" type="button" value="Publicar" onclick="CheckFormEVENT();" />
                                  <input class="btn btn-secondary"type="reset"  value="Reset" />

                                </div>
                            </div>
                          </div>

                        </div>
                      </div>

                  </div><!-- fin Columna -->

                </form>
              </fieldset>


        </div>
        <!-- /.container-fluid -->

        <!-- Sticky Footer -->
        <?php
            include "includes/usrfooter.inc";
        ?>

      </div>
      <!-- /.content-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fas fa-angle-up"></i>
    </a>

    <script>
                $('#dataIMGPRIN').on('change',function(){
                    //get the file name
                    var fileName = $(this).val();
                    //replace the "Choose a file" label
                    $(this).next('.custom-file-label').html(fileName);
                })
    </script>

    <script>
                $('#dataIMGSEC').on('change',function(){
                    //get the file name
                    var fileName = $(this).val();
                    //replace the "Choose a file" label
                    $(this).next('.custom-file-label').html(fileName);
                })
    </script>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Page level plugin JavaScript-->
    <script src="vendor/chart.js/Chart.min.js"></script>
    <script src="vendor/datatables/jquery.dataTables.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin.min.js"></script>

    <!-- Demo scripts for this page-->
    <script src="js/demo/datatables-demo.js"></script>
    <script src="js/demo/chart-area-demo.js"></script>

  </body>

</html>
