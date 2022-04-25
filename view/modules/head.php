<?php
//Omitir errores de php
error_reporting(E_ALL ^ E_NOTICE);
date_default_timezone_set("America/Bogota");
//Session del navegador
//SESSION_START();
$color_dev = $_SESSION['color'];
//Url actual se la ventana
$page    = $_SERVER['PHP_SELF'];
$dominio = $_SERVER["HTTP_HOST"];
$rest    = $_SERVER["REQUEST_URI"];
$url     = $dominio . $rest;

?>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<!-- Etiqueta de verificacion de propiedad - para Google -->
    <meta name="google-site-verification" content="ftMTCgvzDmZ5QCfAsmKLj4OdB92qM_3mATmeVrzdSZY" />
    <!-- Fin -->
	<meta property="og:url" content="https://develtec.net/<?php echo $_GET['r'] ?>" />
	<meta property="og:title" content="<?php echo (isset($art_tit))? $art_tit : 'Develtec Software Company'; ?>" />
	<meta property="og:type" content="<?php echo $art_int ?>" />
	<meta property="og:description" content="<?php echo $art_int ?>" />
	<meta name="descripcion" content="<?php echo $art_tit ?> | <?php echo $art_int ?>" />
	<meta property="og:image" content="https://develtec.net/<?php echo $art_img ?>" />
	<meta name="theme-color" content="<?php echo $color_dev ?>">
	<meta name="keywords" content="jquery, css3, java, sliding, box, menu, cube, navigation, portfolio, thumbnails" />
	<link rel="icon" type="image/png" href="public/img/logo/logo-ico.png" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0" />	
	<link href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" rel="stylesheet">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
	<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
	<script type="text/javascript" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
	<script type="text/javascript" src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.13.0/css/all.css">
	<link rel="stylesheet" href="./public/css/style.min.css">
	<link href='public/lib/fullcalendar/main.css' rel='stylesheet' />
    <script src='public/lib/fullcalendar/main.js'></script>
    <script src='public/lib/fullcalendar/locales/es.js'></script>

</head>