<div class='contenedor_padding'>
    <h3 class='titulo usuario_titulo titulo_cuat modal-title' id='modaltitle'></h3>
	<form method="POST" >
		<div class="contenedor-flex cont-just-sbet form_uno">
			<select class="caja caja_siet" required name="sdet_serv_fk" id="add-sdet_sdet_serv_fk" >
				<option value="">Seleccione una categoria...</option>
					<?php
					$services      = new serviceController();
					$services_data = $services->sel();
					$num_services   = count($services_data);
					for ($regist = 0; $regist < $num_services; $regist++) {
						echo '<option value="' . $services_data[$regist]['serv_id'] . '" >' . $services_data[$regist]['serv_tit'] . "</option>";
					}
					?>
			</select>			
            <input class="caja caja_diez" type="text" required placeholder="Nombre" name="sdet_nom" id="add-sdet_sdet_nom">
            <textarea class="caja caja_diez" type="text" required placeholder="Descripción" name="sdet_des" id="add-sdet_sdet_des"></textarea>
            <input class="caja caja_cinc" type="text" required placeholder="Garantia" name="sdet_gar" id="add-sdet_sdet_gar">
            <input class="caja caja_cinc" type="number" required placeholder="Valor unitario" name="sdet_val" id="add-sdet_sdet_val">          
            <input type="hidden" name="crud" value="add-sdet">
            <input class="boton boton_prin usuario_boton_uno" type="submit" name="registrar" value="Registrar">
        </div>
	</form>
</div>