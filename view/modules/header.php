<!DOCTYPE html>
<html>
<?php include "head.php"; ?>
<title><?php echo ucfirst(str_replace("-", " ", $_GET['r'])); ?> | AppSence</title>
<body>
<?php 
if (isset($_SESSION['usua_id'])) {
	?>
	<style>
		.user-color-back,.pre-loader span,.page-item.active .page-link{
			background-color: rgb(<?php echo $color_dev; ?>)!important;
		}
		.btn-uno,.btn-sesion,.menu-tabs button{
			background-color: rgb(<?php echo $color_dev; ?>);
		}
		.menu-secundario a:hover,.seccion-tabs .active,.user-color-text,.usuario_icono_uno,.page-link,.panel_usuario .panel-left .usuario-menu li a:hover,#btn-sesion:hover,.item-select{
			color: rgb(<?php echo $color_dev; ?>)!important;
		}
		.page-item.active .page-link,.panel_usuario .panel-left .usuario-menu li a:hover{
			border-left: 5px solid rgb(<?php echo $color_dev; ?>);
		}
		@media (max-width: 850px) {
			.panel_usuario .panel-left .usuario-menu li a:hover{
				border-left: 0px;
				border-bottom: 5px solid rgb(<?php echo $color_dev; ?>);
			}
		}
		.page-item.active .page-link{
			color: #fff !important;
		}
		.user-color-bord{
			border-color: rgb(<?php echo $color_dev; ?>)!important;
		}
		.float_btn{
			background-color: rgb(<?php echo $color_dev; ?>);
		}
		.menu_circular{
			background-color: rgba(<?php echo $color_dev; ?>,0.7);
		}

		.usuario_titulo {
			color: rgb(<?php echo $color_dev; ?>) !important; }
		.usua-col {
			background: rgb(<?php echo $color_dev; ?>) !important; }
			.usua-col:after {
				background: rgb(<?php echo $color_dev; ?>) !important; }
			.usua-col:before {
				background: rgb(<?php echo $color_dev; ?>) !important; }

		.usuario_logo {
			fill: rgb(<?php echo $color_dev; ?>) !important; }

		.color_rgba_usu {
			background: rgba(<?php echo $color_dev; ?>, 0.8); }

		.usuario_boton_uno {
			background: rgb(<?php echo $color_dev; ?>) !important;
			}
			.usuario_boton_uno:hover {
				background: white !important;
				border-color: rgb(<?php echo $color_dev; ?>) !important;
				color: rgb(<?php echo $color_dev; ?>) !important; }

		.usuario_boton_dos:hover {
			color: rgb(<?php echo $color_dev; ?>) !important; }

		.usuario_borde {
			border-color: rgb(<?php echo $color_dev; ?>) !important; }

		

		.usuario_icono_dos:hover {
			color: rgb(<?php echo $color_dev; ?>) !important; }

		.usuario_tabla th {
			background-color: rgb(<?php echo $color_dev; ?>) !important; }
		.usuario_tabla tr:hover {
			background: rgba(<?php echo $color_dev; ?>, 0.3) !important; }

		.btn-check:checked + label, #btn_edit:checked + label {
			background-color: rgba(<?php echo $color_dev; ?>, 0.5); }

		.btn-check:checked + label:before, #btn_edit:checked + label:before {
			background-color: rgb(<?php echo $color_dev; ?>);
			left: 20px; }

		
		::-webkit-scrollbar-thumb {
			background-color: rgba(<?php echo $color_dev; ?>, 0.5) !important; }

		#mostrar_form + label {
			background: rgb(<?php echo $color_dev; ?>) !important; }
	</style>
<?php }else{ ?>
<style type="text/css" media="screen">
	.cont-pre-loader {
		width: 100vw !important;
		left: 0px !important;
	}
</style>
<?php }?>
<!--PRELOAD PAGINAS-->
<div class="cont-pre-loader" id="content_loader">
	<div class="pre-loader">
       <span></span>
       <span></span>
       <span></span>
       <span></span>
   </div>
</div>
<script>
	window.onload = function(){
		var contenedor = document.getElementById('content_loader');
		contenedor.style.visibility = 'hidden';
		contenedor.style.opacity = '0';
	}
</script>
<?php
/*INCLUIR MENU PRINCIPAL*/
include 'barTop.php';
if (isset($_GET['alert'])) {
	$alert = $_GET['alert'];
	$text  = $_GET['text'];
	if ($alert == '1') {
	    echo "<div class='alert alert-pos'><div class='alert-conten'><p>" . $text . "</p><span class='fa fa-check-circle'></span></div></div>";
	} else if ($alert == '0') {
	    echo "<div class='alert alert-neg'><div class='alert-conten'><p>" . $text . "</p><span class='fa fa-exclamation-circle'></span></div></div>";
	}
}

?>

<!-- FLECHA DE SUBIR-->
<div class="flecha-subir">
	<span class="fa fa-angle-up"></span>
</div>
