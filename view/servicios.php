<div class="panel_usuario">
    <?php include 'modules/barLeft.php';?>
    <div class="panel-right">
        <div class="seccion-content">
            <div class="contenedor_padding">
                <div class="contenedor-flex cont-just-sbet">
                    <h5 class="titulo titulo_cuat">Servicios</h5>
                    <div class="menu-tabs">
                        <button type="button" data-toggle="modal" data-target="#Modal-add-serv" id="add-serv"><i class="fas fa-list-alt"></i>Categoria</button>
                        <button type="button" data-toggle="modal" data-target="#Modal-add-sdet" id="add-sdet"><i class="fas fa-swatchbook"></i>Servicio</button>
                        <a class="boton boton_prin usuario_boton_uno usuario_boton_uno" href="public/pdf/portafolio.pdf" target="_blank" ><i class="fas fa-file-pdf"></i>Descargar</a>
                    </div>
                </div>
                <?php 
                    $datos = array(
                        0  => 'serv_id',
                    );
                    $datos_serv = array(
                        0  => 'serv_id',
                        1  => 'serv_nom',
                        2  => 'serv_des'
                    );
                    $datos_sdet = array(
                        0  => 'sdet_id',
                        1  => 'sdet_nom',
                        2  => 'sdet_des',
                        3  => 'sdet_gar',
                        4  => 'sdet_val',
                        5  => 'sdet_serv_fk'
                    );
                    $datos_d = array(
                        0  => 'sdet_id',
                    );
                    
                    $modal = new functionModel();
                    if ($_GET['r'] == 'servicios' && !isset($_POST['crud'])) {
                        $modal->view_modal("add-serv", $datos_serv, "","Añadir categoria", "form-serv-add");
                        $modal->view_modal("edi-serv", $datos_serv, "", "Editar categoria", "form-serv-edi");
                        $modal->view_modal("del-serv", $datos, "", "Eliminar categoria", "form-serv-del");
                        $modal->view_modal("add-sdet", $datos_sdet, "","Añadir servicio", "form-sdet-add");
                        $modal->view_modal("edi-sdet", $datos_sdet, "","Editar servicio", "form-sdet-edi");
                        $modal->view_modal("del-sdet", $datos_d, "","Eliminar servicio", "form-sdet-del");
                    }
                 ?> 
                <div class="contenedor-flex cont-just-sbet">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <?php
                    $categorys = new serviceController();
                    $categorys_data = $categorys->sel();
                    $num_categorys  = count($categorys_data);
                    for ($n = 0; $n < $num_categorys; $n++) {
                        echo '<li class="nav-item"><a class="nav-link ';
                        echo ($n==0)?'active':'';
                        echo '" id="correo-tab" data-toggle="tab" href="#cate-'.$categorys_data[$n]['serv_id'].'" role="tab" aria-controls="cate-'.$categorys_data[$n]['serv_id'].'" aria-selected="true">'.$categorys_data[$n]['serv_nom'].'</a>
                            </li>';
                    }
                    ?>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <?php
                        for ($n = 0; $n < $num_categorys; $n++) {
                            $services = new serviceController();
                            $services_data = $services->sel_service($categorys_data[$n]['serv_id']);
                            $services  = count($services_data);
                            echo '<div class="tab-pane fade show '; echo($n==0)?'active':''; echo '" id="cate-'.$categorys_data[$n]['serv_id'].'" role="tabpanel" aria-labelledby="cate-'.$categorys_data[$n]['serv_id'].'-tab">
                                <div class="d-flex justify-content-between">
                                    <div>
                                        <b>'.$categorys_data[$n]['serv_tit'].'</b><br>
                                        '.$categorys_data[$n]['serv_des'].'
                                    </div>
                                    <div class="container-option">
                                        <button class="btn btn-cir-uno usua-col" data-toggle="modal" data-target="#Modal-edi-serv" data-serv_id="'.$categorys_data[$n]['serv_id'].'"data-serv_nom="'.$categorys_data[$n]['serv_nom'].'" data-serv_des="'.$categorys_data[$n]['serv_des'].'" data-name="'.$categorys_data[$n]['serv_id'].'" title="Modificar"><span  class="fa fa-pencil-alt"></span></button>
                                        <button class="btn btn-cir-uno usua-col" data-toggle="modal" data-target="#Modal-del-serv" data-serv_id="'.$categorys_data[$n]['serv_id'].'" data-name="'.$categorys_data[$n]['serv_id'].'" title="Eliminar"><span  class="fa fa-trash"></span></button>
                                    </div>
                                </div>';
                        ?>
                        <div class="cont-tbl">
                        <table  id="tabla-<?php echo $categorys_data[$n]['serv_id']; ?>" class="display">
                            <thead>
                                <tr>
                                    <th>N°</th>
                                    <th>Nombre</th>
                                    <th width="50%">Descripción</th>
                                    <th>Garantia</th>
                                    <th>Precio</th>
                                    <th>Opciones</th>
                                </tr>
                            </thead>
                            <tbody>   
                            <?php 
                            $services = new serviceController();
                            $services_data = $services->sel_service($categorys_data[$n]['serv_id']);
                            $services_num  = count($services_data);
                            for ($reg = 0; $reg < $services_num; $reg++) {
                            ?>
                                <tr>
                                    <td><?php echo $services_data[$reg]['sdet_id']; ?></td>
                                    <td><?php echo $services_data[$reg]['sdet_nom']; ?></td>
                                    <td width="50%"><?php echo $services_data[$reg]['sdet_des']; ?></td>
                                    <td><?php echo $services_data[$reg]['sdet_gar']; ?></td>
                                    <td>$ <?php echo number_format($services_data[$reg]['sdet_val']); ?></td>
                                    <td>
                                        <div class="container-option">
                                            <button class="btn btn-cir-uno usua-col" data-toggle="modal" data-target="#Modal-edi-sdet" data-sdet_id="<?php echo $services_data[$reg]['sdet_id']; ?>"data-sdet_nom="<?php echo $services_data[$reg]['sdet_nom']; ?>" data-sdet_des="<?php echo $services_data[$reg]['sdet_des']; ?>" data-sdet_gar="<?php echo $services_data[$reg]['sdet_gar']; ?>" data-sdet_val="<?php echo $services_data[$reg]['sdet_val']; ?>"
                                            data-sdet_serv_fk="<?php echo $services_data[$reg]['sdet_serv_fk']; ?>" data-name="<?php echo $services_data[$reg]['sdet_id']; ?>" title="Modificar"><span  class="fa fa-pencil-alt"></span></button>
                                            <button class="btn btn-cir-uno usua-col" data-toggle="modal" data-target="#Modal-del-sdet" data-sdet_id="<?php echo $services_data[$reg]['sdet_id']; ?>" data-name="<?php echo $services_data[$reg]['sdet_id']; ?>" title="Eliminar"><span  class="fa fa-trash"></span></button>
                                        </div>                                            
                                    </td>
                                </tr>
                            <?php } ?>
                            </tbody>
                        </table>
                    </div>
                        <?php
                        if ($services_num == 0) {
                            echo "<b>No hay Servicios registrados</b>";
                        }
                        ?>
                        <?php 
                            echo '</div>
                            <script>
                            $(document).ready( function () {
                                $("#tabla-'.$categorys_data[$n]['serv_id'].'").DataTable();
                            });
                            </script>';
                        }
                        ?>
                    </div>        
                </div>
            </div>
        </div>
    </div>
</div>
<?php include('./view/modules/footer-user.php'); ?>