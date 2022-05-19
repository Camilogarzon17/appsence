<div class="cont-flex cont-alig-cen cont-hful login">
	<div class="cont-flex cont-alig-cen cont-nuev cont-center login-sec">
		<?php 
		$modal = new functionModel();
		$datos = "";        
		$modal->view_modal("pass-usua", $datos, "","Recuperar contraseña", "form-pass-edi");
		?>
		<div class="cont-cuat cont-just-saro">
			<div class="cont-log cont-center">
				<img class="log-img" src="./public/img/logo/logo-1.png" alt="">
				<?php include 'view/form/form-sesion.php';?>
			</div>
		</div>
		<div class="cont-seis">
			<img src="public/img/logo/publicidad.jpg" width="80%" alt="">
		</div>
	</div>
</div>

