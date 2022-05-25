<form method="POST" enctype="multipart/form-data">
    <div class="contenedor-flex cont-just-sbet">
        <div id="file-view" class="cont-img-por heig-quc">
        </div>
        <input class="btn-file"  id="btn_file" type="file" accept="image/*" name="usua_ipo">
        <label class="boton boton_prin usuario_boton_uno pos-abs-uno" for="btn_file"><span class="icono_uno fa fa-paperclip usuario_icono_uno">
        </span>Portada</label>  
        <div class="cont-btn-color">
            <div class="btn-color-tit">
                Color
            </div>
            <div class="btn-color">
                <input  type="color" value="#009EE2" name="usua_col">
            </div>
        </div>      
        <div class="pos-rel-uno">
            <div id="pre-view" class="cont-img-per cuad-doc usuario_borde pos-abs-tre">
                <div class="icon-per">
                    <span class="fas fa-user usuario_icono_uno"></span>
                </div>
            </div>
            <center>
                <input class="btn-file"  id="boton_archivo" type="file" accept="image/*" name="usua_ipe">
                <label class="boton boton_prin usuario_boton_uno" for="boton_archivo"><span class="icono_uno fa fa-paperclip usuario_icono_uno">
                </span>Seleccionar archivo</label>
            </center>
        </div>
        <div class="contenedor_padding">
            <div class="contenedor-flex cont-just-saro form_uno">
                <input class="caja caja_cinc" type="text" required placeholder="Primer nombre" name="usua_pno">
                <input class="caja caja_cinc" type="text" placeholder="Segundo nombre" name="usua_sno">
                <input class="caja caja_cinc" type="text" required placeholder="Primer apellido" name="usua_pap">
                <input class="caja caja_cinc" type="text" placeholder="Segundo apellido" name="usua_sap">
                <input class="caja caja_diez" type="text" required placeholder="Profesión" name="usua_pro">
                <input class="caja caja_cinc" type="email" required placeholder="Correo" name="usua_ema">
                <input class="caja caja_dosm" type="text" required placeholder="Cedula" name="usua_nid">
                <input class="caja caja_dosm" type="text" required placeholder="Celular" name="usua_cel">
                <input class="caja caja_cuat" type="text" placeholder="Dirección" name="usua_dir">
                <input class="caja caja_tres" type="text" required placeholder="Ciudad" name="usua_ciu">
                <input class="caja caja_tres" type="text" required placeholder="País" name="usua_pai">
                <select class="caja caja_cinc" required name="usua_sex" >
                    <option value="" >Seleccione el genero</option>
                    <option value="F" >Femenino</option>
                    <option value="M" >Masculino</option>
                </select>
                <select class="caja caja_cinc" required name="usua_esta_fk" >
                    <option value="" >Seleccione el estado</option>
                    <option value="1" >Activo</option>
                    <option value="2" >Inactivo</option>
                </select>
                <label class="caja_diez">Fecha de nacimiento: <input class="caja caja_seis" type="date" required name="usua_fna"></label>
                <select class="caja caja_cuat" required name="usua_rol" >
                    <option value="">Seleccione el rol</option>
                    <option value="1">Administrador</option>
                    <option value="2">Empleado</option>
                </select>
                <select class="caja caja_seis" required name="usua_care_fk" id="add_cuen_banc_fk" >
                    <option>Seleccione el cargo...</option>
                    <?php
                    $cargo      = new userController();
                    $cargo_data = $cargo->sel_cargo();
                    $num_car    = count($cargo_data);
                    for ($regist = 0; $regist < $num_car; $regist++) {
                        echo '<option value="' . $cargo_data[$regist]['care_id'] . '" >' . $cargo_data[$regist]['care_nom'] . "</option>";
                    }
                    ?>
                </select>
                <div class="row">
                    <div class="col-6">
                        <input class="caja" type="password" required placeholder="Contraseña" name="usua_pas1" >
                    </div>
                    <div class="col-6">
                        <input class="caja" type="password" required placeholder="Confirme contraseña" name="usua_pas">
                    </div>
                </div>


                <input type="hidden" name="r" value="ajustes">
                <input type="hidden" name="crud" value="add">
                <input class="boton boton_prin usuario_boton_uno usuario_boton_uno" type="submit" name="crear" value="Crear">
            </div>
        </div>
    </div>
</form>
