<div class="panel_usuario">
    <?php include 'modules/barLeft.php';?>
    <div class="panel-right">
        <div class="seccion-content">
            <div class="contenedor_padding">
                <?php 
                    if (isset($_GET['ref'])) {
                        include('./view/form/form-fact-edi.php');
                    }?>  
                        <div class="contenedor-flex cont-just-sbet">     
                            <h5 class='titulo titulo_cuat'>Administrar facturas</h5>               
                            <div class="menu-tabs">
                                <button type="button" data-toggle="modal" data-target="#Modal-add-fact" id="add-fact"><i class="fas fa-file-alt"></i>Factura</button>
                                <!--<button  type="button" data-toggle="modal" data-target="#Modal-dow-pdf" id="add-sdet"><i class="fas fa-file-excel"></i>Descargar</button>-->
                            </div>
                        </div>
                    <?php 
                            $function     = new functionModel();
                            $datos = array(
                                0  => 'fact_id'
                            );
                            $datos_val = array(
                                0  => 'fact_id',
                                1  => 'fact_vto',
                                2  => 'fpag_pen',
                                3  => 'clie_ema'
                            );
                            $datos_mail = array(
                                0  => 'fact_id',
                                1  => 'fact_ema'
                            );
                            $num_tit = empty($datos) ? 0 : count($datos);
                            $modal = new functionModel();
                            if ($_GET['r'] == 'facturas' && !isset($_POST['crud'])) {
                                $modal->view_modal("add-fact", $datos, "","", "form-fact-add");
                                $modal->view_modal("del-fact", $datos, "","Eliminar factura", "form-fact-del");
                                $modal->view_modal("val-fact", $datos_val, "","Validar pago", "form-fact-val");
                                $modal->view_modal("env-fact", $datos_mail, "","Enviar correo electronico", "form-fact-env");
                            }
                     ?> 
                     <div class="contenedor-flex cont-tbl" >   
                       <table  id="tablaFact" class="display">
                            <thead>
                                <tr>
                                    <th>Ref.</th>
                                    <th>Nombre</th>
                                    <th>Empresa</th>
                                    <th>Solictud</th>
                                    <th>Generado</th>
                                    <th>Estado</th>
                                    <th>Pagos</th> 
                                    <th>Valor</th>                    
                                    <th style="width: 150px !important;" >Opcion</th>
                                </tr>
                            </thead>
                            <tbody>   
                                <?php
                                $bills = new billController();
                                $bills_data = $bills->sel();
                                $num_bills  = count($bills_data);
                                for ($n = 0; $n < $num_bills; $n++) {
                                    $pay = new billController();
                                    $pagos = $pay->sel_payment($bills_data[$n]['fact_id'],false);

                                ?>
                                <tr>
                                    <td><?php echo $bills_data[$n]['fact_id']; ?></td>
                                    <td><b><?php echo $bills_data[$n]['fact_tit']; ?></b> </td>
                                    <td><?php echo $bills_data[$n]['empr_nom']; ?></td>
                                    <td><?php echo $function->dateText($bills_data[$n]['fact_fin'],"no","","no","no"); ?></td>
                                    <td><?php echo $function->dateText($bills_data[$n]['fact_fec'],"no","","","no"); ?></td>
                                    <td><?php echo $bills_data[$n]['fest_nom']; ?></td>
                                    <td>$<?php echo number_format($pagos[0]['pagos']);?></td>
                                    <td>$<?php echo number_format($bills_data[$n]['fact_vto']); $pendiente = $bills_data[$n]['fact_vto']- $pagos[0]['pagos'];?></td>                        
                                    <td style="width: 150px !important;" >
                                        <div class="tbl-opti">
                                            <?php if ($pendiente > 0) {?>
                                                <button class="btn btn-cir-uno usua-col" data-toggle="modal" data-target="#Modal-val-fact" data-fpag_pen="<?php echo $pendiente; ?>" data-fact_id="<?php echo $bills_data[$n]['fact_id']; ?>" data-clie_ema="<?php echo $bills_data[$n]['clie_ema']; ?>" data-fact_vto="<?php echo $bills_data[$n]['fact_vto']; ?>" data-name="<?php echo $bills_data[$n]['fact_id']; ?>" title="Validar Pago"><span  class="fa fa-dollar-sign"></span></button>
                                            <?php } ?>

                                            <a class="btn btn-cir-uno usua-col" href="facturas&ref=<?php echo $bills_data[$n]['fact_id']; ?>" title="Modificar"><span  class="fa fa-pencil-alt"></span></a>
                                            <button class="btn btn-cir-uno usua-col" data-toggle="modal" data-target="#Modal-del-fact" data-fact_id="<?php echo $bills_data[$n]['fact_id']; ?>" data-name="<?php echo $bills_data[$n]['fact_id']; ?>" title="Eliminar"><span  class="fa fa-trash"></span></button>
                                            <a href="facturas&pdf=<?php echo $bills_data[$n]['fact_id']; ?>" target="_blank" class="btn btn-cir-uno usua-col" title="Descargar PDF"><span  class="fa fa-file-pdf"></span></a>
                                            <button class="btn btn-cir-uno usua-col" data-toggle="modal" data-target="#Modal-env-fact" data-fact_id="<?php echo $bills_data[$n]['fact_id']; ?>" data-fact_ema="<?php echo $bills_data[$n]['clie_ema']; ?>" data-name="<?php echo $bills_data[$n]['fact_id']; ?>" title="Eviar correo"><span  class="far fa-envelope"></span></button>
                                        </div>
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
