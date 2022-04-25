<?php if ($_SESSION['ok']== true) {    ?>
<div class="menu-principal menu-fixed" id="menu-principal">
    <div class="log-men">
        <img src="./public/img/logo/logo-1.png">
    </div>
    <button type="button" class="btn-sesion">
        <?php     
            if (isset($_SESSION['usua_id'])) {
                echo "<div class='usuario_img'><img src='".$_SESSION['usua_ipe']."' alt='".$_SESSION['nombre']."'></div><div class='usuario_nom'><div class='sesion_nombre'> ".$_SESSION['nombre']."</div></div>";
                if ($usuario != "ok") {
                    echo "<span class='icono_sesion fa fa-ellipsis-v'></span>";
                }
            }
            include 'view/form/form-sesion.php';
        ?>
    </button>
</div>
<?php } ?>
