<h3 class="titulo usuario_titulo titulo_cuat">Modificar publicación</h3>
<center>
        <div id="pre-view" class="img_modificar">
            <img alt="<?php echo $extraidoImg['gal_nom'] ?>" src="public/<?php echo $extraidoImg['gal_url'] ?>">
        </div>
</center>
<form accept="image/*" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" enctype="multipart/form-data">
    <div class="contenedor-flex cont-just-sbet form_uno">
        <input class="caja caja_cinc" type="text" required placeholder="Nombre" name="img_nom" value="<?php echo $extraidoImg['gal_nom'] ?>">
        <input class="caja caja_cinc" type="date" required name="img_fec" value="<?php echo $extraidoImg['gal_fec'] ?>">
        <textarea rows="5" class="caja caja_diez" type="text" required placeholder="Descripción" name="img_des"><?php echo $extraidoImg['gal_des'] ?></textarea>
        <input type="text" style="display: none;" name="img_id" value="<?php echo $extraidoImg['gal_id'] ?>">
        <input type="text" style="display: none;" name="img_url" value="<?php echo $extraidoImg['gal_url'] ?>">
        <input class="btn-file" id="boton_archivo" type="file" accept="image/*" name="archivo_img">
        <label class="boton boton_prin usuario_boton_uno " for="boton_archivo"><span class="icono_uno fa fa-paperclip usuario_icono_uno">
        </span>Seleccionar archivo</label>
        <input class="boton boton_prin usuario_boton_uno" type="submit" name="modificar_galeria" value="Modificar">
    </div>
</form>