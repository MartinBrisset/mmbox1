function CheckLOG() {
    // preparar mensaje y control de error
    var mensaje = "ATENCION!!!.. Ingrese:\n";
    var error   = false;
    // capturar datos del formulario
    var usuario = document.getElementById("dataUSR").value;
    var password= document.getElementById("dataPSW").value;

    // validar datos
    if (usuario=="") {
        error   = true;
        mensaje = mensaje+"Usuario:\n";
    } // endif
    if (password=="") {
        error   = true;
        mensaje = mensaje+"Contraseña:\n";
    } // endif

    // controlar error
    if (error) {
        // mostrar mensaje
        window.alert(mensaje);
    } else {
        // enviar formulario
        document.getElementById("dataFRM").submit();
    } // endif
} // end function

function CheckFormEVENT() {
    // preparar mensaje y control de error
    var mensaje = "ATENCION!!!.. Ingrese:\n";
    var error   = false;
   // capturar datos del formulario
    var nombre        = document.getElementById("dataTIT").value;
    var descripcion   = document.getElementById("dataDESC").value;
    var fechinicio    = document.getElementById("datastartFECH").value;
    var horainicio    = document.getElementById("datastartHORA").value;
    var fechfin       = document.getElementById("dataendFECH").value;
    var horafin       = document.getElementById("dataendHORA").value;
    var estado        = document.getElementById("dataEST").value;
    var categoria     = document.getElementById("dataCAT").value;
    var imgprin       = document.getElementById("dataIMGPRIN").value;
    var imgsec        = document.getElementById("dataIMGSEC").value;
    //var check         = document.getElementById("dataCHECK").value;
    //var sala          = document.getElementById("dataSALA").value;
    var nombrelink1   = document.getElementById("dataNameLINK1").value;
    var link1         = document.getElementById("dataLINK1").value;
    var nombrelink2   = document.getElementById("dataNameLINK2").value;
    var link2         = document.getElementById("dataLINK2").value;
    var nombrelink3   = document.getElementById("dataNameLINK3").value;
    var link3         = document.getElementById("dataLINK3").value;
    var nombreprecio1 = document.getElementById("dataNamePRECIO1").value;
    var precio1       = document.getElementById("dataPRECIO1").value;
    var nombreprecio2 = document.getElementById("dataNamePRECIO2").value;
    var precio2       = document.getElementById("dataPRECIO2").value;
    var nombreprecio3 = document.getElementById("dataNamePRECIO3").value;
    var precio3       = document.getElementById("dataPRECIO3").value;
    var nombreprecio4 = document.getElementById("dataNamePRECIO4").value;
    var precio4       = document.getElementById("dataPRECIO4").value;
    var nombreprecio5 = document.getElementById("dataNamePRECIO5").value;
    var precio5       = document.getElementById("dataPRECIO5").value;
    // validar datos
   if (nombre=="") {
        error   = true;
        mensaje = mensaje+"Titulo:\n";
    } // endif
    if (descripcion=="") {
        error   = true;
        mensaje = mensaje+"Descripcion o Contenido:\n";
    } // endif
    if (fechinicio=="") {
        error   = true;
        mensaje = mensaje+"fecha de inicio:\n";
    } // endif
    if (horainicio=="") {
        error   = true;
        mensaje = mensaje+"Hora de incio:\n";
    } // endif
    if (fechfin=="") {
        error   = true;
        mensaje = mensaje+"fecha de fin del evento:\n";
    } // endif
    if (horafin=="") {
        error   = true;
        mensaje = mensaje+"Hora de fin del evento:\n";
    } // endif
    if (estado=="") {
        error   = true;
        mensaje = mensaje+"Estado:\n";
    } // endif
    if (categoria=="") {
        error   = true;
        mensaje = mensaje+"Categoria:\n";
    } // endif
    if (imgprin=="") {
        error   = true;
        mensaje = mensaje+"Imagen principal:\n";
    } // endif
    if (imgsec=="") {
        error   = true;
        mensaje = mensaje+"Imagen Secundaria:\n";
    } // endif
    if (nombrelink1 && link1) {
        error = false;
    }else if (typeof nombrelink1 != 'undefined' && link1) {
        error = true;
        mensaje = mensaje+"No puede dejar el nombre vacio si ingresa un link de venta online (Nombre Nº 1)\n";
    }else if (nombrelink1 && typeof link1 != 'undefined') {
        error =  true;
        mensaje = mensaje+"No puede dejar el link vacio, si ingresas un nombre de venta online (Link Nº 1)\n";
    } // endif
    if (nombrelink2 && link2) {
        error = false;
    }else if (typeof nombrelink2 != 'undefined' && link2) {
        error = true;
        mensaje = mensaje+"No puede dejar el nombre vacio si ingresa un link de venta online (Nombre Nº 2)\n";
    }else if (nombrelink2 && typeof link2 != 'undefined') {
        error =  true;
        mensaje = mensaje+"No puede dejar el link vacio, si ingresas un nombre de venta online (Link Nº 2)\n";
    } // endif
    if (nombrelink3 && link3) {
        error = false;
    }else if (typeof nombrelink3 != 'undefined' && link3) {
        error = true;
        mensaje = mensaje+"No puede dejar el nombre vacio si ingresa un link de venta online (Nombre Nº 3)\n";
    }else if (nombrelink3 && typeof link3 != 'undefined') {
        error =  true;
        mensaje = mensaje+"No puede dejar el link vacio, si ingresas un nombre de venta online (Link Nº 3)\n";
    } // endif
    //CONTROLA PRECIOS
    if (nombreprecio1 && precio1) {
        error = false;
    }else if (typeof nombreprecio1 != 'undefined' && precio1) {
        error = true;
        mensaje = mensaje+"No puede dejar el nombre de la entrada vacio si ingresa un precio de venta (Nombre Nº 1)\n";
    }else if (nombreprecio1 && typeof precio1 != 'undefined') {
        error =  true;
        mensaje = mensaje+"No puede dejar el precio vacio, si ingresas un nombre de tipo de entrada (Precio Nº 1)\n";
    } // endif
    if (nombreprecio2 && precio2) {
        error = false;
    }else if (typeof nombreprecio2 != 'undefined' && precio2) {
        error = true;
        mensaje = mensaje+"No puede dejar el nombre de la entrada vacio si ingresa un precio de venta (Nombre Nº 2)\n";
    }else if (nombreprecio2 && typeof precio2 != 'undefined') {
        error =  true;
        mensaje = mensaje+"No puede dejar el precio vacio, si ingresas un nombre de tipo de entrada (Precio Nº 2)\n";
    } // endif
    if (nombreprecio3 && precio3) {
        error = false;
    }else if (typeof nombreprecio3 != 'undefined' && precio3) {
        error = true;
        mensaje = mensaje+"No puede dejar el nombre de la entrada vacio si ingresa un precio de venta (Nombre Nº 3)\n";
    }else if (nombreprecio3 && typeof precio3 != 'undefined') {
        error =  true;
        mensaje = mensaje+"No puede dejar el precio vacio, si ingresas un nombre de tipo de entrada (Precio Nº 3)\n";
    } // endif
    if (nombreprecio4 && precio4) {
        error = false;
    }else if (typeof nombreprecio4 != 'undefined' && precio4) {
        error = true;
        mensaje = mensaje+"No puede dejar el nombre de la entrada vacio si ingresa un precio de venta (Nombre Nº 4)\n";
    }else if (nombreprecio4 && typeof precio4 != 'undefined') {
        error =  true;precio4
        mensaje = mensaje+"No puede dejar el precio vacio, si ingresas un nombre de tipo de entrada (Precio Nº 4)\n";
    } // endif
    if (nombreprecio5 && precio5) {
        error = false;
    }else if (typeof nombreprecio5 != 'undefined' && precio5) {
        error = true;
        mensaje = mensaje+"No puede dejar el nombre de la entrada vacio si ingresa un precio de venta (Nombre Nº 5)\n";
    }else if (nombreprecio5 && typeof precio5 != 'undefined') {
        error =  true;
        mensaje = mensaje+"No puede dejar el precio vacio, si ingresas un nombre de tipo de entrada (Precio Nº 5)\n";
    } // endif

    // controlar error
    if (error) {
        // mostrar mensaje
        window.alert(mensaje);
    } else {
        // enviar formulario
        document.getElementById("dataFRM").submit();
    } // endif
} // end function

function CheckVideo(){
    //prepara mensaje y contol de error
    var mensaje = "ATENION!! Ingrese:\n";
    var error   = false;
    //capturar dato del formulario
    var video = document.getElementById("dataID").value;
    //validar datos
    if (video == "") {
        error = true;
        mensaje = mensaje+"id del video";
    }//endif
    // controlar error
    if (error) {
        window.alert(mensaje);
    }else{
        document.getElementById("dataFRM").submit();
    }
}

function CheckNewUsr() {
    // preparar mensaje y control de error
    var mensaje = "ATENCION!!!.. Ingrese:\n";
    var error   = false;
    // capturar datos del formulario
    var usuario = document.getElementById("dataUSR").value;
    var password= document.getElementById("dataPASW").value;
    var perfil  = document.getElementById("dataPERFIL").value;

    // validar datos
    if (usuario=="") {
        error   = true;
        mensaje = mensaje+"Usuario:\n";
    } // endif
    if (password=="") {
        error   = true;
        mensaje = mensaje+"Contraseña:\n";
    } // endif
    if (perfil=="") {
        error   = true;
        mensaje = mensaje+"Perfil:\n";
    } // endif

    // controlar error
    if (error) {
        // mostrar mensaje
        window.alert(mensaje);
    } else {
        // enviar formulario
        document.getElementById("dataFRM").submit();
    } // endif
} // end

function CheckModUSR(){
    // preparar mensaje y control de error
    var mensaje = "ATENCION!!!.. Ingrese:\n";
    var error   = false;
    // capturar datos del formulario
    var nombre  = document.getElementById("dataNOM").value;
    var password= document.getElementById("dataPASW").value;
    var perfil  = document.getElementById("dataPERF").value;
    // validar datos
    if (nombre=="") {
        error   = true;
        mensaje = mensaje+"nombre:\n";
    } // endif
    if (password=="") {
        error   = true;
        mensaje = mensaje+"contraseña:\n";
    } // endif
    if (perfil=="") {
        error   = true;
        mensaje = mensaje+"perfil:\n";
    } // endif

    // controlar error
    if (error) {
        // mostrar mensaje
        window.alert(mensaje);
    } else {
        // enviar formulario
        document.getElementById("dataFRM").submit();
    } // endif
}//end function

function CheckFormEventoUPD() {
    // preparar mensaje y control de error
    var mensaje = "ATENCION!!!.. Ingrese:\n";
    var error   = false;
   // capturar datos del formulario
    var nombre        = document.getElementById("dataTIT").value;
    var descripcion   = document.getElementById("dataDESC").value;
    var fechinicio    = document.getElementById("datastartFECH").value;
    var horainicio    = document.getElementById("datastartHORA").value;
    var fechfin       = document.getElementById("dataendFECH").value;
    var horafin       = document.getElementById("dataendHORA").value;
    var estado        = document.getElementById("dataEST").value;
    var categoria     = document.getElementById("dataCAT").value;
    //var check         = document.getElementById("dataCHECK").value;
    var nombrelink1   = document.getElementById("dataNameLINK1").value;
    var link1         = document.getElementById("dataLINK1").value;
    var nombrelink2   = document.getElementById("dataNameLINK2").value;
    var link2         = document.getElementById("dataLINK2").value;
    var nombrelink3   = document.getElementById("dataNameLINK3").value;
    var link3         = document.getElementById("dataLINK3").value;
    var nombreprecio1 = document.getElementById("dataNamePRECIO1").value;
    var precio1       = document.getElementById("dataPRECIO1").value;
    var nombreprecio2 = document.getElementById("dataNamePRECIO2").value;
    var precio2       = document.getElementById("dataPRECIO2").value;
    var nombreprecio3 = document.getElementById("dataNamePRECIO3").value;
    var precio3       = document.getElementById("dataPRECIO3").value;
    var nombreprecio4 = document.getElementById("dataNamePRECIO4").value;
    var precio4       = document.getElementById("dataPRECIO4").value;
    var nombreprecio5 = document.getElementById("dataNamePRECIO5").value;
    var precio5       = document.getElementById("dataPRECIO5").value;
    // validar datos
   if (nombre=="") {
        error   = true;
        mensaje = mensaje+"Titulo:\n";
    } // endif
    if (descripcion=="") {
        error   = true;
        mensaje = mensaje+"Descripcion o Contenido:\n";
    } // endif
    if (fechinicio=="") {
        error   = true;
        mensaje = mensaje+"fecha de inicio:\n";
    } // endif
    if (horainicio=="") {
        error   = true;
        mensaje = mensaje+"Hora de incio:\n";
    } // endif
    if (fechfin=="") {
        error   = true;
        mensaje = mensaje+"fecha de fin del evento:\n";
    } // endif
    if (horafin=="") {
        error   = true;
        mensaje = mensaje+"Hora de fin del evento:\n";
    } // endif
    if (estado=="") {
        error   = true;
        mensaje = mensaje+"Estado:\n";
    } // endif
    if (categoria=="") {
        error   = true;
        mensaje = mensaje+"Categoria:\n";
    } // endif
    if (nombrelink1 && link1) {
        error = false;
    }else if (typeof nombrelink1 != 'undefined' && link1) {
        error = true;
        mensaje = mensaje+"No puede dejar el nombre vacio si ingresa un link de venta online (Nombre Nº 1)\n";
    }else if (nombrelink1 && typeof link1 != 'undefined') {
        error =  true;
        mensaje = mensaje+"No puede dejar el link vacio, si ingresas un nombre de venta online (Link Nº 1)\n";
    } // endif
    if (nombrelink2 && link2) {
        error = false;
    }else if (typeof nombrelink2 != 'undefined' && link2) {
        error = true;
        mensaje = mensaje+"No puede dejar el nombre vacio si ingresa un link de venta online (Nombre Nº 2)\n";
    }else if (nombrelink2 && typeof link2 != 'undefined') {
        error =  true;
        mensaje = mensaje+"No puede dejar el link vacio, si ingresas un nombre de venta online (Link Nº 2)\n";
    } // endif
    if (nombrelink3 && link3) {
        error = false;
    }else if (typeof nombrelink3 != 'undefined' && link3) {
        error = true;
        mensaje = mensaje+"No puede dejar el nombre vacio si ingresa un link de venta online (Nombre Nº 3)\n";
    }else if (nombrelink3 && typeof link3 != 'undefined') {
        error =  true;
        mensaje = mensaje+"No puede dejar el link vacio, si ingresas un nombre de venta online (Link Nº 3)\n";
    } // endif
    //CONTROLA PRECIOS
    if (nombreprecio1 && precio1) {
        error = false;
    }else if (typeof nombreprecio1 != 'undefined' && precio1) {
        error = true;
        mensaje = mensaje+"No puede dejar el nombre de la entrada vacio si ingresa un precio de venta (Nombre Nº 1)\n";
    }else if (nombreprecio1 && typeof precio1 != 'undefined') {
        error =  true;
        mensaje = mensaje+"No puede dejar el precio vacio, si ingresas un nombre de tipo de entrada (Precio Nº 1)\n";
    } // endif
    if (nombreprecio2 && precio2) {
        error = false;
    }else if (typeof nombreprecio2 != 'undefined' && precio2) {
        error = true;
        mensaje = mensaje+"No puede dejar el nombre de la entrada vacio si ingresa un precio de venta (Nombre Nº 2)\n";
    }else if (nombreprecio2 && typeof precio2 != 'undefined') {
        error =  true;
        mensaje = mensaje+"No puede dejar el precio vacio, si ingresas un nombre de tipo de entrada (Precio Nº 2)\n";
    } // endif
    if (nombreprecio3 && precio3) {
        error = false;
    }else if (typeof nombreprecio3 != 'undefined' && precio3) {
        error = true;
        mensaje = mensaje+"No puede dejar el nombre de la entrada vacio si ingresa un precio de venta (Nombre Nº 3)\n";
    }else if (nombreprecio3 && typeof precio3 != 'undefined') {
        error =  true;
        mensaje = mensaje+"No puede dejar el precio vacio, si ingresas un nombre de tipo de entrada (Precio Nº 3)\n";
    } // endif
    if (nombreprecio4 && precio4) {
        error = false;
    }else if (typeof nombreprecio4 != 'undefined' && precio4) {
        error = true;
        mensaje = mensaje+"No puede dejar el nombre de la entrada vacio si ingresa un precio de venta (Nombre Nº 4)\n";
    }else if (nombreprecio4 && typeof precio4 != 'undefined') {
        error =  true;precio4
        mensaje = mensaje+"No puede dejar el precio vacio, si ingresas un nombre de tipo de entrada (Precio Nº 4)\n";
    } // endif
    if (nombreprecio5 && precio5) {
        error = false;
    }else if (typeof nombreprecio5 != 'undefined' && precio5) {
        error = true;
        mensaje = mensaje+"No puede dejar el nombre de la entrada vacio si ingresa un precio de venta (Nombre Nº 5)\n";
    }else if (nombreprecio5 && typeof precio5 != 'undefined') {
        error =  true;
        mensaje = mensaje+"No puede dejar el precio vacio, si ingresas un nombre de tipo de entrada (Precio Nº 5)\n";
    } // endif


    // controlar error
    if (error) {
        // mostrar mensaje
        window.alert(mensaje);
    } else {
        // enviar formulario
        document.getElementById("dataFRM").submit();
    } // endif
} // end function

function DeleteREG(id){
    if (confirm('¿Seguro que quieres dar de baja este evento?')) {
        //alert('hola'+id);
        window.location = 'ProcesoEventoBAJA.php?ID='+id;
    }//endif
}//endfunction

function MensajeAlerta(mensaje){
    alert("Atencion"+mensaje);
}

function CheckEventBuscar() {
    // capturar datos del formulario
    var palabra      = document.getElementById("dataBUSCAR").value;
    var categoria    = document.getElementById("dataCAT").value;
    //declarar variables
    var errorpalabra = false;
    var errorcat     = false;
    var error        = false;

    // validar datos
    if (palabra=="") {
        errorpalabra   = true;
    } // endif
    if (categoria=="Categoría") {
        errorcat   = true;
    } // endif

    // controlar error
    if (errorpalabra == true && errorcat == true) {
        // no manda formulario
        error = true;
    }//endif

     // controlar error
    if (error==true) {
        // mostrar mensaje
        //window.alert("error");
    } else {
        // enviar formulario
        document.getElementById("dataFRM").submit();
    } // endif

} // end function
function CheckNewCat() {
    // preparar mensaje y control de error
    var mensaje = "<p>¡ATENCIÓN!</p>Ingrese\n";
    var error   = false;
    // capturar datos del formulario
    var nombre = document.getElementById("dataNAME").value;

    // validar datos
    if (nombre=="") {
        error   = true;
        mensaje = mensaje+"Nombre de Categoria:\n";
    } // endif

    // controlar error
    if (error) {
        // mostrar mensaje
        window.alert(mensaje);
    } else {
        // enviar formulario
        document.getElementById("dataFRM").submit();
    } // endif
} // end
function CheckUPDCat() {
    // preparar mensaje y control de error
    var mensaje = "ATENCION!!!:\n";
    var error   = false;
    // capturar datos del formulario
    var nombre = document.getElementById("dataNAME").value;

    // validar datos
    if (nombre=="") {
        error   = true;
        mensaje = mensaje+"Nombre de Categoria no puede quedar vacio\n";
    } // endif

    // controlar error
    if (error) {
        // mostrar mensaje
        window.alert(mensaje);
    } else {
        // enviar formulario
        document.getElementById("dataFRM").submit();
    } // endif
} // end
function CheckFormCORREO() {
    // preparar mensaje y control de error
    var mensaje = "¡ATENCIÓN! Ingrese\n";
    var error   = false;
    // capturar datos del formulario
    var nombre  = document.getElementById("dataNAME").value;
    var correo  = document.getElementById("dataMAIL").value;
    var telef   = document.getElementById("dataNAME").value;
    var asunto  = document.getElementById("dataMAIL").value;
    var email   = document.getElementById("dataMAIL").value;

    // validar datos
    if (nombre=="") {
        error   = true;
        mensaje = mensaje+"Nombre y Apellido\n";
    } // endif
    if (correo=="") {
        error   = true;
        mensaje = mensaje+"Correo\n";
    } // endif
    if (telef=="") {
        error   = true;
        mensaje = mensaje+"Teléfono o Celular\n";
    } // endif
    if (asunto=="") {
        error   = true;
        mensaje = mensaje+"Asunto\n";
    } // endif
    if (email=="") {
        error   = true;
        mensaje = mensaje+"Mensaje\n";
    } // endif

    // controlar error
    if (error) {
        // mostrar mensaje
        window.alert(mensaje);
    } else {
        // enviar formulario
        document.getElementById("dataFRM").submit();
    } // endif
} // end function


//ajax

function verMASdesc(id) {
    // inicializar objeto ajax
    var xhr;
    if (window.XMLHttpRequest) {
        // Chrome,Firefox,Safari,Opera,IE7+
        xhr = new XMLHttpRequest;
    } else {
        // IE5,IE6
        xhr = new ActiveXObject("Microsoft.XMLHTTP");
    } // endif

    // realizar petición AJAX
    xhr.open("POST","ProcesoVerMasDESC.php?ID="+id,true);
    xhr.send();

    // controlar sucesos
    xhr.onreadystatechange = function() {
        if (xhr.readyState==4 && xhr.status==200) {
            document.getElementById("muchotextodesc"+id).innerHTML = xhr.responseText + "<a href='javascript:verMENOSdesc("+id+")'>...</a>";
           } // endif
    } // end function
} // end

function verMENOSdesc(id) {
        var desc = document.getElementById("muchotextodesc"+id).innerHTML;

    document.getElementById("muchotextodesc"+id).innerHTML = desc.substring(0, 100)+"<a href='javascript:verMASdesc("+id+")'>...</a>";
    }//end function

function verMASlink(id) {
    // inicializar objeto ajax
    var xhr;
    if (window.XMLHttpRequest) {
        // Chrome,Firefox,Safari,Opera,IE7+
        xhr = new XMLHttpRequest;
    } else {
        // IE5,IE6
        xhr = new ActiveXObject("Microsoft.XMLHTTP");
    } // endif

    // realizar petición AJAX
    xhr.open("POST","ProcesoVerMasLINK.php?ID="+id,true);
    xhr.send();

    // controlar sucesos
    xhr.onreadystatechange = function() {
        if (xhr.readyState==4 && xhr.status==200) {
            document.getElementById("muchotextolink"+id).innerHTML = xhr.responseText + "<a href='javascript:verMENOSlink("+id+")'>...</a>";
           } // endif
    } // end function
} // end
function verMENOSlink(id) {
        var link = document.getElementById("muchotextolink"+id).innerHTML;

    document.getElementById("muchotextolink"+id).innerHTML = link.substring(0, 30)+"<a href='javascript:verMASlink("+id+")'>...</a>";
    }//end function


//FUNCION GRAFICA
