<?php
$pagina    = "Solicitudes";
$usuario   = "ok";
$datos = array(
    0  => 'soli_id'
);
$num_tit = empty($datos) ? 0 : count($datos);
$modal = new functionModel();
if ($_GET['r'] == 'solicitudes' && !isset($_POST['crud'])) {
    $modal->view_modal("temp-soli", "", "","", "form-temp-soli");
}
 if (isset($_GET['soli'])) {?>
    <div class="focus-modal">
        <div class="container-form">
            <h2>Hola mundo</h2>
            
        </div>
    </div>
<?php } ?>
<div class="panel_usuario">
    <?php include 'modules/barLeft.php';?>
    <div class="panel-right">
        <div class="seccion-content">
            <div class="contenedor_padding">
                <div class="contenedor-flex cont-just-sbet">
                    <h5 class='titulo titulo_cuat usuario_titulo'>Solicitudes</h5>
                    <div class="menu-tabs">
                        <button type="button" data-toggle="modal" data-target="#Modal-temp-soli" id="temp-soli"><i class="fas fa-file-alt"></i>Formato</button>
                    </div>
                </div>
                <?php             
                    $datos = array(
                        0  => 'soli_id',
                        1  => 'soli_asu',
                        2  => 'soli_des',
                        3  => 'soli_nom',
                        4  => 'soli_ema',
                        5  => 'soli_emp',
                        6  => 'soli_cel',
                        7  => 'soli_ubi',
                        8  => 'soli_fec',
                        9  => 'serv_nom'
                    );
                    $num_tit = empty($datos) ? 0 : count($datos);
                    $modal = new functionModel();
                    $modal->view_modal("ges-soli", $datos, "","", "form-soli-cot");
                 ?> 
                <div class="contenedor-flex form_dos cont-tbl">   
                    <table  id="tablaFact" class="display">
                        <thead>
                            <tr>
                                <th>N°</th>
                                <th>Nombre</th>
                                <th>Correo</th>
                                <th>Celular</th>
                                <th>Empresa</th>
                                <th>Ubicación</th>
                                <th>Servicio</th>
                                <th>Fecha</th>                    
                                <th>Opción</th>
                            </tr>
                        </thead>
                        <tbody>   
                        <?php 
                        $function     = new functionModel();
                        $solicitud = new requestController();
                        $solicitudes_data  = $solicitud->sel();
                        $num_solicitudes   = count($solicitudes_data);
                        for ($n = 0; $n < $num_solicitudes; $n++) {  ?>
                            <tr>
                                <td><?php echo $solicitudes_data[$n]['soli_id']; ?></td>
                                <td><?php echo $solicitudes_data[$n]['soli_nom']; ?></td>
                                <td><?php echo $solicitudes_data[$n]['soli_ema']; ?></td>
                                <td><?php echo $solicitudes_data[$n]['soli_cel']; ?></td>
                                <td><?php echo $solicitudes_data[$n]['soli_emp']; ?></td>
                                <td><?php echo $solicitudes_data[$n]['soli_ubi']; ?></td>
                                <td><?php echo $solicitudes_data[$n]['serv_nom']; ?></td>
                                <td><?php echo $function->dateText($solicitudes_data[$n]['soli_fec'],"no","","","no"); ?></td>
                                <td>
                                    <div class="tbl-opti">
                                        <button class="btn btn-cir-uno usua-col" data-toggle="modal" data-target="#Modal-del-soli" data-usua_id="<?php echo $users_data[$n]['usua_id']; ?>" data-name="<?php echo $users_data[$n]['usua_id']; ?>" title="Eliminar"><span  class="fa fa-trash"></span></button>
                                        <?php if($solicitudes_data[$n]['soli_esta_fk'] == "1"){ ?>
                                        <button class="btn btn-cir-uno usua-col" data-toggle="modal" data-target="#Modal-ges-soli" data-name="<?php echo $solicitudes_data[$n]['soli_esta_fk']; ?>"  
                                            <?php 
                                            for ($i=0; $i < $num_tit; $i++) { 
                                                echo ' data-'.$datos[$i].'="'.$solicitudes_data[$n][$datos[$i]].'" ';
                                            }
                                             ?>
                                        title="Gestionar"><span  class="fas fa-business-time"></span></button>  
                                        <?php } 
                                        if (isset($solicitudes_data[$n]['coti_id'])) {?>
                                            <a href="solicitudes&soli=<?php echo $solicitudes_data[$n]['coti_id']; ?>" class="btn btn-cir-uno usua-col"><span  class="fa fa-eye"></span></a>
                                        <?php }?>      
                                    </div>
                                </td>
                            </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                    <?php
                    if ($num_solicitudes == 0) {
                        echo "<b>No hay solicitudes pendientes</b>";
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include('./view/modules/footer-user.php'); ?>