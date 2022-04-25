<div class="contenedor_padding">
    <h3 class="titulo usuario_titulo titulo_cuat">Publicar fotografia</h3>
    <form accept="image/*" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" enctype="multipart/form-data">
        <center><div id="pre-view" class="previw_img" ></div></center>
        <div class="contenedor-flex cont-just-sbet form_uno">
            <input class="caja caja_cinc" type="text" required placeholder="Titulo" name="img_nom">
            <input class="caja caja_cinc" type="date" required name="img_fec">
            <textarea class="caja caja_diez" type="text" required placeholder="Descripción" name="img_des"></textarea>
            <input class="btn-file"  id="boton_archivo" type="file" accept="image/*" name="archivo_img">
            <label class="boton boton_prin usuario_boton_uno " for="boton_archivo"><span class="icono_uno fa fa-paperclip usuario_icono_uno">
            </span>Seleccionar archivo</label>
            <input class="boton boton_prin usuario_boton_uno" type="submit" name="publicar_img" value="Publicar">
        </div>
    <hr/>
    <h3 class="titulo usuario_titulo titulo_cuat" id="add-publicacion">Publicar articulo</h3>
    <p>Si desea publicar un articulo, tenga en cuenta los derechos de autor, y en el lugar donde desee ubicar la imagen que adjunte escribir "ximgx" y para los saltos de linea "< br >" (sin las comillas y sin espacios)</p>
        <center><div id="pre-view" class="previw_img" ></div></center>
        <div class="contenedor-flex cont-just-sbet form_uno">
            <input class="caja caja_cinc" type="text" required placeholder="Titulo" name="art_tit">
            <input class="caja caja_cinc" type="date" required name="art_fec">
            <textarea class="caja caja_diez" type="text" required placeholder="Descripción" name="art_des"></textarea>
            <input class="btn-file"  id="btn_archivo" type="file" accept="image/*" name="archivo_img">
            <label class="boton boton_prin usuario_boton_uno " for="btn_archivo"><span class="icono_uno fa fa-paperclip usuario_icono_uno">
            </span>Seleccionar archivo</label>
            <input class="caja caja_cinc" type="text" placeholder="ID video" name="art_vid">
            <input class="boton boton_prin usuario_boton_uno" type="submit" name="publicar_art" value="Publicar">
        </div>
    </form>
</div>