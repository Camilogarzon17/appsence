<div class="panel_usuario">
    <?php include('modules/barLeft.php'); ?>
    <div class="panel-right">
        <div class="seccion-content">
            <div class="contenedor_padding">
                <div class="contenedor-flex cont-just-sbet">
                    <h5 class="titulo titulo_cuat">Visitas web</h5>
                </div>      
                <div>            
                    <table  id="tablaFact" class="display">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>País</th> 
                                <th>IP</th>
                                <th>Fecha de ingreso</th>
                            </tr>   
                        </thead>
                        <tbody>   
                            <?php
                            $regist = new registController();
                            $regist_data = $regist->sel();
                            $num_regist  = count($regist_data);
                            for ($n = 0; $n < $num_regist; $n++) {
                            ?>
                            <tr>
                                <td><?php echo $regist_data[$n]['cont_id']; ?></td>
                                <td><?php echo $regist_data[$n]['cont_pai']; ?></td>
                                <td><?php echo $regist_data[$n]['cont_ip']; ?></td>
                                <td><?php echo $regist_data[$n]['cont_fec']; ?></td>
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