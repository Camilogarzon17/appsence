<form method="POST" enctype="multipart/form-data">
    <div class="contenedor-flex cont-just-sbet">
        <div id="file-view" class="cont-img-por heig-quc">
        </div>     
        <div class="pos-rel-uno">
            <div id="pre-view" class="cont-img-per cuad-doc usuario_borde pos-abs-tre">
                <img src="" id="edi_clie_ipe">
                <div class="icon-per">
                    <span class="fas fa-user-tie usuario_icono_uno"></span>
                </div>                
            </div>
            <center>
                <input class="btn-file"  id="boton_archivo2" type="file" accept="image/*" name="clie_ipe">
                <label class="boton boton_prin usuario_boton_uno" for="boton_archivo2"><span class="icono_uno fa fa-paperclip usuario_icono_uno">
                </span>Seleccionar archivo</label>
            </center>
        </div>
        <div class="contenedor_padding">
            <div class="contenedor-flex cont-just-sbet form_uno">
                <select class="caja caja_diez" required name="clie_empr_fk" id="add_cuen_banc_fk" >
                    <option>Seleccione una empresa...</option>
                    <?php
                    $companys      = new clientController();
                    $companys_data = $companys->sel_company();
                    $num_empr    = count($companys_data);
                    for ($regist = 0; $regist < $num_empr; $regist++) {
                        echo '<option value="' . $companys_data[$regist]['empr_id'] . '" >' . $companys_data[$regist]['empr_nom'] . "</option>";
                    }
                    ?>
                </select>
                <input class="caja caja_cinc" type="text" required placeholder="Primer nombre" name="clie_pno">
                <input class="caja caja_cinc" type="text" placeholder="Segundo nombre" name="clie_sno">
                <input class="caja caja_cinc" type="text" required placeholder="Primer apellido" name="clie_pap">
                <input class="caja caja_cinc" type="text" placeholder="Segundo apellido" name="clie_sap">
                <input class="caja caja_diez" type="email" required placeholder="Correo" name="clie_ema">
                <input class="caja caja_cinc" type="text" placeholder="Cedula" name="clie_nid">
                <input class="caja caja_cinc" type="number" required placeholder="Celular" name="clie_cel">
                <input class="caja caja_siet" type="text" placeholder="Dirección" name="clie_dir">
                <select class="caja caja_tres" required name="clie_esta_fk" >
                    <option value="1" >Activo</option>
                    <option value="2" >Inactivo</option>
                </select>   
                <input class="caja caja_cinc" type="text" required placeholder="Ciudad" name="clie_ciu">
                <input class="caja caja_cinc" type="text" required placeholder="País" name="clie_pai">
                <input type="hidden" name="clie_fec" value="<?php echo strftime("%Y-%m-%d"); ?>">
                <input type="hidden" name="crud" value="add-clie">
                <input class="boton boton_prin usuario_boton_uno" type="submit" name="registrar" value="Registrar">
            </div>
        </div>
    </div>
</form>
