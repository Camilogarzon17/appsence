<div class="contenedor_padding">
    <h3 class="titulo titulo_cuat" id="add-factura">Enviar correo de factura</h3>
    <p>Ingrese los correos a los cuales desea enviar copia del comprobante separados por comas (,).</p>
	<form method="post">
		<div class="contenedor-flex cont-just-sbet form_uno">
			<input type="email" class="caja caja_diez" required="required" multiple name="fact_mail" id="env-fact_fact_ema">
			<button type="submit" class="boton boton_prin usuario_boton_uno">Enviar correo</button>
			<input type="hidden" name="crud" value="env-fact">
			<input type="hidden" id="env-fact_fact_id" name="env_fact_id" >
		</div>
	</form>
</div>