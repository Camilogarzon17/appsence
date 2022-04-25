<?php
$client_data = $clients->sel($_GET['id']);
$cli_id      = $client_data[0]['cli_id'];
$cli_nom     = $client_data[0]['cli_nom'];
$cli_ced     = $client_data[0]['cli_ced'];
$cli_ema     = $client_data[0]['cli_ema'];
$cli_cel     = $client_data[0]['cli_cel'];
$cli_emp     = $client_data[0]['cli_emp'];
$cli_nit     = $client_data[0]['cli_nit'];
$cli_des     = $client_data[0]['cli_des'];
$cli_ciu     = $client_data[0]['cli_ciu'];
$cli_pai     = $client_data[0]['cli_pai'];
$cli_url     = $client_data[0]['cli_url'];
$cli_web     = $client_data[0]['cli_web'];
?>
<div class='focus-modal'>
    <div class='container-form width-40-pto bgd-gris-uno'>
        <div class="contenedor_padding">
			<h3 class="titulo titulo_cuat">Modificar cliente</h3>
            <form method="POST" enctype="multipart/form-data" >
                <center>
                    <div>
                        <div class="usuario_perfil usuario_borde" id="pre-view">
                            <img src="public/<?php echo $cli_url ?>">
                        </div>
                        <input class="btn-file"  id="boton_archivo" type="file" accept="image/*" name="archivo_img">
                        <label class="boton boton_prin usuario_boton_uno" for="boton_archivo"><span class="icono_uno fa fa-paperclip usuario_icono_uno">
                        </span>Seleccionar archivo</label>
                    </div><br>
                    <div class="contenedor-flex cont-just-sbet form_uno">
                        <span>Información de la empresa:</span>
                        <input class="caja caja_diez" type="text" required placeholder="Nombre empresa" value="<?php echo $cli_emp ?>" name="empresa">
                        <input class="caja caja_cinc" type="text" required placeholder="NIT / RUT" value="<?php echo $cli_nit ?>" name="nit">
                        <input class="caja caja_cinc" type="text" required placeholder="Pagina web" value="<?php echo $cli_web ?>" name="web">
                        <input class="caja caja_diez" type="text" required placeholder="Descripción empresa" value="<?php echo $cli_des ?>" name="descripcion">
                        <input class="caja caja_cinc" type="text" required placeholder="Ciudad" value="<?php echo $cli_ciu ?>" name="ciudad">
                        <input class="caja caja_cinc" type="text" required placeholder="País" value="<?php echo $cli_pai ?>" name="pais">
                        <span>Informacion de contacto principal:</span>
                        <input class="caja caja_siet" type="text" required placeholder="Nombre y Apellidos" value="<?php echo $cli_nom ?>" name="nombre">
                       <input class="caja caja_tres" type="text" required placeholder="Cedula" value="<?php echo $cli_ced ?>" name="cedula">
                        <input class="caja caja_cinc" type="email" required placeholder="Correo" value="<?php echo $cli_ema ?>" name="correo">
                        <input class="caja caja_cinc" type="text" required placeholder="Celular" value="<?php echo $cli_cel ?>" name="celular">
                        <input class="boton boton_prin usuario_boton_uno" type="submit" name="modificar" value="Modificar">
                    </div>
                </center>
            </form>
        </div>
    </div>
</div>
