<form method="POST" enctype="multipart/form-data">
	<div class="contenedor-flex cont-just-sbet">
		<div id="file-view" class="cont-img-por heig-quc">
			<img src="" id="edi_empr_ipo">
		</div>
		<input class="btn-file"  id="btn_file" type="file" accept="image/*" name="empr_ipo">
		<label class="boton boton_prin usuario_boton_uno pos-abs-uno" for="btn_file"><span class="icono_uno fa fa-paperclip usuario_icono_uno">
		</span>Portada</label>		
		<div class="pos-rel-uno">
			<div id="pre-view" class="cont-img-per cuad-doc usuario_borde pos-abs-tre">
				<img src="" id="edi_empr_ipe">
				<div class="icon-per">
					<span class="far fa-building usuario_icono_uno"></span>
				</div>
				
			</div>
			<center>
				<input class="btn-file"  id="boton_archivo1" type="file" accept="image/*" name="empr_ipe">
				<label class="boton boton_prin usuario_boton_uno" for="boton_archivo1"><span class="icono_uno fa fa-paperclip usuario_icono_uno">
				</span>Seleccionar archivo</label>
			</center>
		</div>
		<div class="contenedor_padding">	
			<div class="contenedor-flex cont-just-saro form_uno">
			    <input class="caja caja_cinc" type="text" required placeholder="Nombre de la empresa" name="empr_nom" id="add-empr_empr_nom">
			    <select class="caja caja_cinc" required name="empr_tipo_fk" id="add-empr_empr_tipo_fk" >
					<option value="">Seleccione el tipo...</option>
						<?php
						$company_type      = new clientController();
						$company_type_data = $company_type->sel_company_type();
						$num_company_type   = count($company_type_data);
						for ($regist = 0; $regist < $num_company_type; $regist++) {
							echo '<option value="' . $company_type_data[$regist]['etip_id'] . '" >' . $company_type_data[$regist]['etip_nom'] . "</option>";
						}
						?>
				</select>
		        <textarea class="caja caja_diez" type="text" required placeholder="Descripción de la empresa" name="empr_des" id="add-empr_empr_des"></textarea>
		        <label class="caja_cinc cont-flex cont-just-sbet">Fecha: <input class="caja caja_siet" type="date" required name="empr_fec" id="edi_usua_fna"></label>
		        <input class="caja caja_cinc" type="text" placeholder="NIT / RUT" name="empr_nit" id="add-empr_empr_nit">
		        <input class="caja caja_cinc" type="text" required placeholder="Página web" name="empr_web" id="add-empr_empr_web">
		        <input class="caja caja_cinc" type="text" required placeholder="Dirección" name="empr_dir" id="add-empr_empr_dir">
		        <input class="caja caja_cinc" type="text" required placeholder="Ciudad" name="empr_ciu" id="add-empr_empr_ciu">
		        <input class="caja caja_cinc" type="text" required placeholder="País" name="empr_pai" id="add-empr_empr_pai">
		        <input type="hidden" name="empr_usua_fk" value="add-empr_empr_usua_fk">
		        <input type="hidden" name="crud" value="add-empr">
		        <input class="boton boton_prin usuario_boton_uno" type="submit" name="guardar" value="Guardar">
	        </div>
	    </div>
	</div>
</form>
