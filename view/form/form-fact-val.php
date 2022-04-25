<?php 
	$mpago = new paymentController();
	$mpago_data = $mpago->sel();
	$num_mpag = count($mpago_data);
	$tpago = new typeController();
	$tpago_data = $tpago->get_tipo_pago();
	$num_tpag = count($tpago_data);
?>
<div class="contenedor_padding">
    <h3 class="titulo titulo_cuat" id="add-factura">Validar pago de factura</h3>
	<form method="post">
		<div class="contenedor-flex cont-just-sbet form_uno">
			<input required class="caja caja_seis" name="fpag_npa" type="text" placeholder="Nombre de quien paga"> 
			<input required class="caja caja_cuat" name="fpag_fec" type="date" >
			<select required name="fpag_mpag_fk" class="caja caja_cinc" onchange="validarMedio(this.value);">
				<option value="">Seleccione el medio de pago</option>}
				option
				<?php 
				for ($n=0; $n < $num_mpag; $n++) { 
					echo '<option value="'.$mpago_data[$n]['fmpa_id'].'">'.$mpago_data[$n]['fmpa_nom'].'</option>';
				}
				 ?>
			</select>
			<input id="val-fact_fpag_nco" required class="caja caja_cinc" name="fpag_nco" type="hidden" placeholder="Numero de comprobante paga">
			<select name="fpag_tpag_fk" class="caja caja_cinc" onchange="validarTipo(this.value);">
				<option value="">Seleccione el tipo de pago</option>
				<?php 
				for ($n=0; $n < $num_tpag; $n++) { 
					echo '<option value="'.$tpago_data[$n]['ftpa_id'].'">'.$tpago_data[$n]['ftpa_nom'].'</option>';
				}?>
			</select>
			<input id="val-fact_fpag_vpa" required class="caja caja_cinc" min="1000" max="500000" name="fpag_vpa" type="hidden" placeholder="Valor del abono" value="">
		
			<br>
			<label>¿Desea enviar correo de confirmación?</label>			
			<label for="env_no">No </label>
			<input type="radio" name="fact_env" onclick="envioMail('N')" checked="checked" id="env_no" value="0">
			<label for="env_si">Si </label>
			<input type="radio" name="fact_env" onclick="envioMail('S')" id="env_si" value="1">
			<input type="hidden" class="caja caja_diez" multiple name="fact_mail" id="val-fact_clie_ema">
			<button type="submit" id="btn_guardar" class="boton boton_prin usuario_boton_uno">Guardar pago</button>
			<input type="hidden" name="fact_vto" id="val-fact_fact_vto" >
			<input type="hidden" name="fpag_pen" id="val-fact_fpag_pen" >
			<input type="hidden" name="crud" value="val-fact">
			<input type="hidden" id="val-fact_fact_id" name="fpag_fact_fk" >
		</div>
	</form>
</div>
<script>
	function validarTipo(value){
		if(value=="2" || value==false){
			document.getElementById("val-fact_fpag_vpa").setAttribute('type', 'hidden');			
		}else{
			var maximo = document.getElementById("val-fact_fpag_pen").value;
			document.getElementById("val-fact_fpag_vpa").setAttribute('type', 'number');
			document.getElementById("val-fact_fpag_vpa").setAttribute('max', maximo);
		}
	}
	function validarMedio(value){
		if(value=="1" || value==false){
			document.getElementById("val-fact_fpag_nco").setAttribute('type', 'hidden');		
		}else{
			document.getElementById("val-fact_fpag_nco").setAttribute('type', 'text');
		}
	}
	function envioMail(value){
		if(value=="N" || value==false){
			document.getElementById("val-fact_clie_ema").setAttribute('type', 'hidden');
			document.getElementById("btn_guardar").innerHTML = "Guardar pago";			
		}else{
			document.getElementById("val-fact_clie_ema").setAttribute('type', 'email');
			document.getElementById("btn_guardar").innerHTML = "Guardar y enviar pago";	
		}
	}

</script>