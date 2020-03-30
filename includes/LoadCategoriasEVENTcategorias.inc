<?php
    // MODULO CARGAR TODAS LAS CATEGORIAS

    // conectar al servidor
    include "../../includes/mmbox/conexion.inc";
    // crear sentencia SQL para traer TODOS los Estados
    $sql = "SELECT * FROM categorias";
    // jecutar sentencia
    $result = mysqli_query($conex,$sql);
    // cargar resultado
    while ($regCAT=mysqli_fetch_array($result)) {
        // crear datos
        $id        = $regCAT["idCAT"];
        $categoria = $regCAT["nomCAT"];

            //Contar eventos por categoria y cargar link
             //crear sentencia sql - TODOS LOS EVENTOS EN LA BASE
              $sql2 = "SELECT * FROM eventos WHERE catEVENT='$categoria'";
              //ejecutar sql
              $result2 = mysqli_query($conex,$sql2);
              //die($sql);
              if (mysqli_num_rows($result2)==0) {
                $eventos="0";
              }else{
                // recorrer matríz y mostrar eventos
                  $eventos = 0; //cuenta la cantidad de eventos
                  while ($regEVENT=mysqli_fetch_array($result2)) {
                      // contar registros
                    $eventos++;
                  }//endwile
                   //echo $eventos;
                }//endif

        // crear opcion
        echo "<tr>
                  <td style='width:4%'><a href=\"javascript:window.parent.location.href='ProcesoCategoriasUPD.php?ID=$id' \" class='badge badge-pill badge-primary'>$eventos</a></td>
                  <td><option class='font-weight-bold' value='$categoria'>$categoria </option></td>
                  <td class='iconitos'>
                      <a href=\"javascript:window.parent.location.href='ProcesoCategoriasUPD.php?ID=$id' \" data-toggle='tooltip' title='Editar'>
                        <i class='fas fa-wrench'></i>
                       </a>
                  </td>

              </tr>\n";
    } // end while
    // cerrar conexión
    mysqli_close($conex);
?>
