<div class="panel_usuario">
    <?php include 'modules/barLeft.php';?>
    <div class="panel-right">
        <div class="seccion-content">
            <div class="contenedor_padding">
                <div class="contenedor-flex cont-just-sbet">
                    <h5 class="titulo titulo_cuat">Publicaciones</h5>
                    <div class="menu-tabs">
                        <button type="button" data-toggle="modal" data-target="#Modal-add-publ" id="add-publ"><i class="fas fa-newspaper"></i>Agregar</button>
                    </div>
                </div>
                <?php 
                    $datos = array(
                        0  => 'fact_id'
                    );
                     if ($_GET['r'] == 'publicaciones' && !isset($_POST['crud'])) {
                        $modal = new functionModel();
                        $modal->view_modal("add-publ", $datos,"","","form-publ-add");
                    }
                ?>
            </div>
        </div>
        <div class="contenedor_top">
            <div class="cont-tres">
                <div class="contenedor_padding">

                </div>
            </div>
            
        </div>
    </div>
</div>
<?php include('./view/modules/footer-user.php'); ?>