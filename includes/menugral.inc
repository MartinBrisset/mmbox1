<!-- menu pc -->
<nav class="navbar navbar-expand-lg navbar-dark d-lg-flex d-none" id="navbar">
  <a class="navbar-brand" href="index.php"><img src="images/logo.png" height="100" alt=""></a>

  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">

    <ul class="navbar-nav ml-auto" id="menu">
        <li class="nav-item active">
          <a class="" href="index.php">Inicio <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="" href="lasala.php">La sala</a>
        </li>
        <li class="nav-item">
          <a class="" href="contacto.php">Contacto</a>
        </li>
    </ul>

    <a href="https://www.facebook.com/MontevideoMusicBox/" target="_blank"><i class="fab fa-facebook-f social"></i></a>
    <a href="https://twitter.com/MMusicBox/" target="_blank"><i class="fab fa-twitter social"></i></a>
    <a href="https://www.instagram.com/montevideomusicbox/" target="_blank"><i class="fab fa-instagram social"></i></a>

  </div>
</nav>


<!-- menu celular -->
<nav class="navbar d-flex d-lg-none" id="navbar-celular">

    <a class="navbar-brand" href="index.php"><img src="images/logo.png" height="100" alt=""></a>

    <button type="button" class="btn bg-transparent text-white" data-toggle="modal" data-target=".bd-example-modal-sm" id="btn-menu"><i class="fas fa-bars"></i></button>

    <div class="modal fade bd-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" id="menu-modal">
      <div class="modal-dialog  modal-sm">
        <div class="modal-content">


            <div class="modal-header text-center">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="cerrar-boton">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>

            <div class="modal-body text-center">

              <ul class="navbar-nav" id="nav-celular">
                  <li class="">
                    <a class="active" href="index.php">Inicio <span class="sr-only">(current)</span></a>
                  </li>
                  <li class="">
                    <a class="" href="lasala.php">La sala</a>
                  </li>
                  <li class="">
                    <a class="" href="contacto.php">Contacto</a>
                  </li>
              </ul>

              <a href="https://www.facebook.com/MontevideoMusicBox/" target="_blank"><i class="fab fa-facebook-f social"></i></a>
              <a href="https://twitter.com/MMusicBox/" target="_blank"><i class="fab fa-twitter social"></i></a>
              <a href="https://www.instagram.com/montevideomusicbox/" target="_blank"><i class="fab fa-instagram social"></i></a>

            </div>
        </div>
      </div>
    </div>

</nav>
