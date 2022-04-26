<form method="POST" enctype="multipart/form-data">
	<div class="contenedor-flex cont-just-sbet">
		<div id="file-view" class="usu-port">
			<img src="" id="edi-usua_usua_ipo">
		</div>
		<input class="btn-file"  id="btn_file" type="file" accept="image/*" name="usua_ipo">
		<label class="boton boton_prin usuario_boton_uno pos-abs-uno" for="btn_file"><span class="icono_uno fa fa-paperclip usuario_icono_uno">
		</span>Portada</label>
		<div class="cont-btn-color">
			<div class="btn-color-tit">
				Color
			</div>
			<div class="btn-color">
				<input  type="color" id="edi-usua_usua_col" value="#009EE2" name="usua_col">
			</div>
		</div>			
		<div class="pos-rel-uno">
			<div id="pre-view" class="usuario_perfil usuario_borde pos-abs-dos">
				<img src="" id="edi-usua_usua_ipe">
			</div>
			<center>
				<input class="btn-file"  id="boton_archivo" type="file" accept="image/*" name="usua_ipe">
				<label class="boton boton_prin usuario_boton_uno" for="boton_archivo"><span class="icono_uno fa fa-paperclip usuario_icono_uno">
				</span>Seleccionar archivo</label>
			</center>
		</div>
		<div class="contenedor_padding">
			<div class="contenedor-flex cont-just-saro form_uno">
				<input class="caja caja_cinc" type="text" required placeholder="Primer nombre" name="usua_pno" id="edi-usua_usua_pno">
				<input class="caja caja_cinc" type="text" placeholder="Segundo nombre" name="usua_sno" id="edi-usua_usua_sno">
				<input class="caja caja_cinc" type="text" required placeholder="Primer apellido" name="usua_pap" id="edi-usua_usua_pap">
				<input class="caja caja_cinc" type="text" placeholder="Segundo apellido" name="usua_sap" id="edi-usua_usua_sap">
				<input class="caja caja_diez" type="text" required placeholder="Profesión" name="usua_pro" id="edi-usua_usua_pro">
				<input class="caja caja_cinc" type="email" required placeholder="Correo" name="usua_ema" id="edi-usua_usua_ema">
				<input class="caja caja_dosm" type="text" required placeholder="Cedula" name="usua_nid" id="edi-usua_usua_nid">
				<input class="caja caja_dosm" type="text" required placeholder="Celular" name="usua_cel" id="edi-usua_usua_cel">
				<input class="caja caja_diez" type="text" placeholder="Dirección" name="usua_dir" id="edi-usua_usua_dir">
				<input class="caja caja_tres" type="text" required placeholder="Ciudad" name="usua_ciu" id="edi-usua_usua_ciu">
				<input class="caja caja_tres" type="text" required placeholder="País" name="usua_pai" id="edi-usua_usua_pai">
				<select class="caja caja_tres" required name="usua_esta_fk" id="edi-usua_usua_esta_fk" >
					<option>Seleccione un estado...</option>
					<option value="1" >Activo</option>
					<option value="2" >Inactivo</option>
				</select>
				<label class="caja_seis">Nacimiento: <input class="caja caja_seis" type="date" required name="usua_fna" id="edi-usua_usua_fna"></label>
				<select class="caja caja_cuat" id="edi-usua_usua_rol" required name="usua_rol" >
					<option value="0">Seleccione un rol...</option>
					<option value="1">Administrador</option>
					<option value="2">Empleado</option>
				</select>
				<input class="caja caja_diez" type="text" required placeholder="N° de cuenta" name="cuen_num" id="edi-usua_cuen_num" >
				<input type="hidden" name="r" value="ajustes">
				<input type="hidden" name="crud" value="edi">
				<input type="hidden" name="usua_ipea" id="edi-usua_usua_ipe">
				<input type="hidden" name="usua_ipoa" id="edi-usua_usua_ipo">
				<input type="hidden" name="usua_id" id="edi-usua_usua_id">
				<input class="boton boton_prin usuario_boton_uno usuario_boton_uno" type="submit" name="modificar" value="Modificar">
			</div>
		</div>
	</div>
</form>