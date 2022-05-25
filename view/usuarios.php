<?php
$users   = new userController();
$users_data = $users->sel();
$num_users = empty($users_data) ? 0 : count($users_data);
$datos_users = array_keys($users_data[0]);
$num_tit = empty($datos_users) ? 0 : count($datos_users);
?>
 <div class="panel_usuario">
    <input type="checkbox" name="view_panel" id="view_panel">
    <label for="view_panel"><span class="fa fa-bars"></span></label>
    <?php include 'modules/barLeft.php';?>
    <div class="panel-right">
        <div class="seccion-content">
            <div class="contenedor_padding">
                <div class="contenedor-flex cont-just-sbet">
                    <h5 class="titulo titulo_cuat">Empleados</h5>
                    <div class="menu-tabs">
                        <button type="button" data-toggle="modal" data-target="#Modal-add-carg" id="add-carg"><i class="fas fa-portrait"></i>Añadir cargo</button>
                        <button type="button" data-toggle="modal" data-target="#Modal-add-usua" id="add-usua" ><i class="fas fa-user-plus"></i>Agregar</button>
                    </div>
                </div>
                <?php 
                    $datos = array(
                        0  => 'usua_id'
                    );
                    $datos_carg = array(
                        0  => 'care_id'
                    );
                    $modal = new functionModel();
                    $modal->view_modal("add-carg", $datos_carg, "lg","", "form-carg-add");
                    $modal->view_modal("add-usua", $datos, "","", "form-usua-add");
                    $modal->view_modal("edi-usua", $datos_users, "","", "form-usua-edi");
                    $modal->view_modal("del-usua", $datos, "","Eliminar usuario", "form-usua-del");
                 ?> 
                <div class="contenedor-flex form_dos cont-tbl"> 
                   <table  id="tablaFact" class="display">
                        <thead>
                            <tr>
                                <th>Cod.</th>
                                <th>Imagen</th>
                                <th>Nombre</th>
                                <th>Correo</th>
                                <th>Celular</th>
                                <th>Rol</th>
                                <th>Ciudad</th> 
                                <th>Pais</th>                    
                                <th style="width: 150px !important;" >Opcion</th>
                            </tr>
                        </thead>
                        <tbody>  
                        <?php  for ($n = 0; $n < $num_users; $n++) {?>
                            <tr>
                                <td><?php echo $users_data[$n]['usua_id']; ?></td>
                                <td>
                                    <div class="cont-img-uno usuario_borde">
                                        <img class="usu_img" src="<?php echo $users_data[$n]['usua_ipe']; ?>">
                                        <span class="text_fond">Sin Imagen</span>
                                    </div>
                                </td>
                                <td>
                                    <b><?php echo $users_data[$n]['usua_nom']; ?></b>
                                </td>
                                <td>
                                    <?php echo $users_data[$n]['usua_ema']; ?>
                                </td>
                                <td>
                                    <?php echo $users_data[$n]['usua_cel']; ?>
                                </td>
                                <td>
                                    <?php echo ($users_data[$n]['usua_rol'] == '1')?"Administrador":"Empleado"; ?>
                                </td>
                                <td>
                                    <?php echo $users_data[$n]['usua_ciu']; ?>
                                </td>
                                <td>
                                    <?php echo $users_data[$n]['usua_pai']; ?>
                                </td>
                                <td>
                                    <?php if ($users_data[$n]['usua_id'] != $idUser) {?>
                                        <div class="container-option">
                                            <button class="btn btn-cir-uno usua-col" data-toggle="modal" data-target="#Modal-edi-usua" data-name="<?php echo $users_data[$n]['usua_nom']; ?>" 
                                                <?php for ($i=0; $i < $num_tit; $i++) { 
                                                    echo ' data-'.$datos_users[$i].'="'.$users_data[$n][$datos_users[$i]].'" ';
                                                }?> title="Editar"><span  class="fa fa-pencil-alt"></span></button>                
                                            <button class="btn btn-cir-uno usua-col" data-toggle="modal" data-target="#Modal-del-usua" data-usua_id="<?php echo $users_data[$n]['usua_id']; ?>" data-name="<?php echo $users_data[$n]['usua_id']; ?>" title="Eliminar"><span  class="fa fa-trash"></span></button>
                                        </div>
                                    <?php }?>
                                </td>
                            </tr>
                        <?php }?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include('./view/modules/footer-user.php'); ?>