<style type="text/css" media="screen">
body{
  background-color: #F0F0F0;
}

  @media (max-width: 768px) {
    .menu-fixed{
      position: absolute;
    }
    .panel_usuario{
      top: 0px;
      height: initial !important; 
      margin-bottom: 44px;
    }
      <?php if (($_GET['r']=="clientes" AND isset($_GET['id'])) OR $_GET['r']=="ajustes") {
    echo ".panel-right{
      margin-top: 0px !important;
    }";
  } ?>
    .panel-right{
      position: relative;
      height: initial !important;

    }
    .btn-bar-mob{
      position: relative;
    }
    .menu-principal ul li a,.menu-fixed ul li ul li a{
      color: #fff !important;
    }
    .menu-fixed ul li a{
      color: #000 !important;
    }
    .logo_mobil{
      left: 0px !important;
      transform: translateX(0%);
    }
  }
    .menu-principal ul li a,.menu-fixed ul li ul li a{
      color: #fff !important;
    }
    .menu-fixed ul li a{
      color: #000 !important;
    } 
</style>
<script>
  $(document).ready(function () {
    $('#tablaFact').DataTable({
      "order": [[ 0, "desc" ]],
      language: {
            url: '//cdn.datatables.net/plug-ins/1.11.3/i18n/es_es.json'
        }
    });
    $('.dataTables_length').addClass('bs-select');
  });
  $(document).ready(function () {
    $('#tablaClient').DataTable({
      "order": [[ 0, "asc" ]],
      language: {
            url: '//cdn.datatables.net/plug-ins/1.11.3/i18n/es_es.json'
        }
    });
    $('.dataTables_length').addClass('bs-select');
  });
</script>
<?php $pagina = $_GET['r']; ?>
<input type="checkbox" name="view_panel" id="view_panel">
<label for="view_panel"><span class="fa fa-bars"></span></label>
<div class="panel-left">

  <div class="cont-comp">
    <div class="comp-log">
      <img src='./public/img/logo/logo-1.png'>
    </div>
  <?php

if (isset($_SESSION['usua_id'])) {
    echo "<div class='comp-inf'>
      <div class='comp-img'>
        <img src='".$_SESSION['usua_ipe']."' alt='".$_SESSION['nombre']."'>
      </div>
      <div class='comp-tex'>
        <div>
          <h5>Bienvenido</h5>
          <div class='sesion_nombre'> ".$_SESSION['nombre']."</div>
        </div>  
      </div>
    </div>";
}?>
  </div>
  <ul class="usuario-menu">
    <li id="ajustes">
      <a href='ajustes' <?php if ($pagina == "ajustes"): echo 'class="item-select"';endif; ?>><span class='fa fa-cogs'></span><div class="item-text">Ajustes</div></a>
    </li>
    <?php if ($_SESSION['usua_rol']==1) {?>
    <li id="usuarios">
      <a href='usuarios' <?php if ($pagina == "usuarios"): echo 'class="item-select"';endif; ?>><span class='fa fa-users'></span><div class="item-text">Empleados</div></a>
    </li>
    <!--<li id="clientes">
      <a href='clientes' <?php echo($pagina == "clientes")?'class="item-select"':''; ?>><span class='fas fa-handshake'></span><div class="item-text">Clientes</div></a>
    </li>
    <li id="facturas">
      <a href='facturas' <?php echo($pagina == "facturas")?'class="item-select"':''; ?> ><span class='fas fa-file-invoice-dollar'></span><div class="item-text">Facturas</div></a>
    </li>
    <li id="servicios">
      <a href='servicios' <?php echo($pagina == "servicios")?'class="item-select"':''; ?>><span class='fa fa-list-alt'></span><div class="item-text">Servicios</div></a>
    </li>-->
  <?php } ?>
    <li id="ausencias">
      <a href='ausencias' <?php echo($pagina == "ausencias")?'class="item-select"':''; ?> ><span class="fas fa-calendar-check"></span><div class="item-text">Ausencias</div></a>
    </li>
    <!--<li id="solicitudes">
      <a href='solicitudes' <?php echo($pagina == "solicitudes")?'class="item-select"':''; ?> ><span class='fas fa-mail-bulk'></span><div class="item-text">Solicitudes</div></a>
    </li>
    <li id="publicaciones">
      <a href='publicaciones' <?php if ($pagina == "publicaciones"): echo 'class="item-select"';endif; ?>><span class='fa fa-newspaper'></span><div class="item-text">Publicaciones</div></a>
    </li>
    <li id="visitas-web">
      <a href='visitas-web' <?php if ($pagina == "visitas-web"): echo 'class="item-select"';endif; ?>><span class='fa fa-globe-americas'></span><div class="item-text">Visitas web</div></a>
    </li>-->
    <li id="cerrar-sesion">
      <a href='cerrar-sesion' <?php if ($pagina == "cerrar-sesion"): echo 'class="item-select"';endif; ?>><span class='fa fa-power-off'></span><div class="item-text">Cerrar sesión</div></a>
    </li>
  </ul>
</div>