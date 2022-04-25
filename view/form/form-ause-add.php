
<div class="contenedor_padding">
    <h3 class="titulo titulo_cuat" id="add-ause">Crear ausencia</h3>
    Para solicitar tu ausencia ingrese la siguiente información
    <form method="POST" enctype="multipart/form-data">
        <div class="contenedor-flex cont-just-sbet form_uno">
            <?php if ($_SESSION['usua_rol']!=1){?>
                <input type="hidden" name="ause_usua_fk" value="<?php echo $_SESSION['usua_id']; ?>">
            <?php }else{?>
                <select class="caja caja_diez" required name="ause_usua_fk" >
                    <option value="">Seleccione el empleado</option>
                    <?php
                        $usuario      = new userController();
                        $usuario_data = $usuario->sel();
                        $num_usuario    = count($usuario_data);
                        for ($x = 0; $x < $num_usuario; $x++) {
                            echo '<option value="' . $usuario_data[$x]['usua_id'] . '" >' .  $usuario_data[$x]['usua_pno']." ".$usuario_data[$x]['usua_pap'] ."</option>";
                        }
                    ?>
                </select>
            <?php } ?>
            <select class="caja caja_diez" required name="ause_tipo_fk" >
                <option value="">Seleccione el tipo de ausencia</option>
                <?php
                    $absence      = new absenceController();
                    $absence_data = $absence->sel_tipo();
                    $num_absence    = count($absence_data);
                    for ($x = 0; $x < $num_absence; $x++) {
                        echo '<option value="' . $absence_data[$x]['taus_id'] . '" >' .  $absence_data[$x]['taus_nom'] ."</option>";
                    }
                ?>
            </select>
            <textarea rows="3" class="caja caja_diez" required type="text" placeholder="Descripcion de su ausencia" name="ause_des"></textarea>
            <select class="caja caja_diez" onchange="validarTiempo(this.value);" required name="ause_tie" >
                <option value="">Seleccione el tiempo</option>
                    <option value="1" >Medio día</option>
                    <option value="2" >Días</option>
            </select>
            <?php $fecha = strftime("%Y-%m-%d"); ?>
            <div id="cont-dias" class="cont-flex" >
                <label class="cont-cinc" >Desde:<input class="caja caja_diez" min="<?php echo $fecha; ?>" type="date" id="ause_fin"  placeholder="Fecha" name="ause_fin" oninput="calcularDiferencia()"/></label>
                <label class="cont-cinc">Hasta: <br><input class="caja caja_diez" min="<?php echo $fecha; ?>" type="date" id="ause_ffi" placeholder="Fecha de finalizacion" name="ause_ffi" oninput="calcularDiferencia()"/></label>
                <div class="">
                   <label class="cont-siet" > Días de ausencia: 
            <input class="caja caja_tres" readonly type="text" name="ause_dia" id="ause_dia" value=""></label>
                </div>
                
            </div>
            <div id="cont-mdia" class="cont-flex">
                <label class="cont-cuat" >Día:<input class="caja caja_diez" min="<?php echo $fecha; ?>" type="date"  placeholder="Fecha de inicio" name="ause_find"></label>
                <label class="cont-seis">Antes: <input type="radio" value="1"  name="ause_med"> ó despues: <input type="radio" value="2" name="ause_med"> de medio día.</label>
            </div>
            <label class="cont-diez" >Soporte de ausencia: 
            <input class="caja caja_seis" type="file" name="ause_sop" id="ause_sop" value=""></label>
            <input type="hidden" name="crud" value="add-ause">
            <input class="boton boton_prin usuario_boton_uno" type="submit" name="crear_factura" value="Crear ausencia">
        </div>
    </form>
</div>
<script>
    document.getElementById("cont-mdia").hidden = true; 
    document.getElementById("cont-dias").hidden = true;
    function validarTiempo(value){
        if(value=="1" || value==false){
            document.getElementById("cont-dias").hidden = true;
            document.getElementById("cont-mdia").hidden = false;     
        }else if(value=="2" || value==false){
            document.getElementById("cont-mdia").hidden = true; 
            document.getElementById("cont-dias").hidden = false;   
        }
    }

</script>
<script>

    function calcularDiferencia(){
        var fechaini = new Date(document.getElementById('ause_fin').value);
        var fechafin = new Date(document.getElementById('ause_ffi').value);
        var diasdif= fechafin.getTime()-fechaini.getTime();
        var contdias = Math.round(diasdif/(1000*60*60*24));
        document.getElementById('ause_dia').value = contdias;
    }
</script>