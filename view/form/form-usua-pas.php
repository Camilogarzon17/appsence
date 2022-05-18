<div class='contenedor_padding'>
    <h3 class='titulo titulo_cuat'>Cambio de contraseña</h3>
    <p>Recuerde que su contraseña debe ser totalmente personal, para evitar cualquier tipo de fraude.</p>
	<form method="POST" class="form-one">
		<div class="contenedor-flex cont-just-sbet form_uno">
			<input class="caja caja_diez" type="password" required placeholder="Contraseña actual" name="contra-actual">
			<input class="caja caja_diez" type="password" id="nPass1" required placeholder="Nueva contraseña" name="contra-nueva1">
			<input class="caja caja_diez" type="password" id="nPass2" required placeholder="Confirme contraseña" name="contra-nueva2">
			<input type="hidden" name="r" value="ajustes">
			<input type="hidden" name="crud" value="pas">
			<input type="hidden" name="usua_pas" id="pas_usua_pas">
			<input type="hidden" name="usua_id" id="pas_usua_id">
			<span id="alert-one"></span><br>
			<input class="boton boton_prin usuario_boton_uno" type="submit" name="cambiar" id="cambiar" value="Cambiar">
		</div>
	</form>
</div>