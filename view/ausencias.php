<?php
$absences  = new absenceController();
?>
<div class="panel_usuario">
    <?php include 'modules/barLeft.php';?>
    <div class="panel-right">
        <div class="seccion-content">
            <div class="contenedor_padding">
                <?php 
                    if (isset($_GET['view'])) {
                        include('./view/form/form-ause-val.php');
                    }?>  
                <div class="cont-flex  cont-just-sbet cont-alig-cen">
                    <h5 class="titulo titulo_cuat">Administrar ausencias</h5>
                    <div class="menu-tabs">
                        <?php if (isset($_GET['calendario'])) { ?>
                            <a class="boton boton_prin usuario_boton_uno usuario_boton_uno" href="ausencias"><i class="fas fa-list"></i>Ver lista</a>
                        <?php }else{ ?>
                            <a class="boton boton_prin usuario_boton_uno usuario_boton_uno" href="ausencias&calendario"><i class="fas fa-calendar"></i>Ver calendario</a>
                        <?php } ?>
                        <button type="button" data-toggle="modal" data-target="#Modal-add-taus" id="add-taus"><i class="far fa-list-alt"></i> Tipo ausencia</button>
                        <button type="button" data-toggle="modal" data-target="#Modal-add-ause" id="add-ause"><i class="fas fa-calendar-plus"></i> Crear ausencia</button>
                    </div>
                </div> 
                <?php
                    if ($_SESSION['usua_rol']!=1) {
                        $absences_data = $absences->sel($_SESSION['usua_id']);
                    }else{
                        $absences_data = $absences->sel('',2);
                    }
                    $num_absences = empty($absences_data) ? 0 : count($absences_data);
                    //var_dump($absences_data);
                    $datos = array(
                        0  => 'ause_id'
                    );
                    
                    $modal = new functionModel();
                    $modal->view_modal("add-ause", $datos, "","Añadir ausencia", "form-ause-add");
                    $modal->view_modal("del-ause", $datos, "","Eliminar ausencia", "form-ause-del");
                    $modal->view_modal("add-taus", $datos, "lg","", "form-taus-add");?>
                    <div class="contenedor-flex cont-tbl" >
                <?php
                if (isset($_GET['calendario'])) {?>
                    <div class="cont-diez">
                    <script>
                      document.addEventListener('DOMContentLoaded', function() {
                        var calendarEl = document.getElementById('calendar');
                        var calendar = new FullCalendar.Calendar(calendarEl, {
                            height: 580,
                            locale: 'es',
                            initialView: 'dayGridMonth',
                            titleFormat:{ year: 'numeric', month: 'long' } ,
                            themeSystem: 'bootstrap',
                            headerToolbar:{
                                left:'title',
                                center:'',
                                right:'today,dayGridMonth,timeGridWeek,prevYear,prev,next,nextYear'
                              },
                          events:[
                                
                                    <?php 
                                    for ($n = 0; $n < $num_absences; $n++) {
                                        echo "{id: '".$absences_data[$n]['ause_id']."',title: '".$absences_data[$n]['usua_pno']." ".$absences_data[$n]['usua_pap']." - ".$absences_data[$n]['ause_des']."',
                                        start: '".$absences_data[$n]['ause_fin']."'";
                                        if ($absences_data[$n]['ause_med']==0) {
                                            echo ", end:'".$absences_data[$n]['ause_ffi']."'";
                                        }
                                        echo ", display:'block',color:'".$absences_data[$n]['taus_col']."', textColor:'black'},";
                                    }
                                    ?>
                                
                            ]
                        });
                        calendar.render();
                        calendar.setOption('locale', 'es');
                      });
                    </script>
                    <div id='calendar'></div>
                    </div>
                <?php }else{
                    $absences2  = new absenceController();
                    if ($_SESSION['usua_rol']!=1) {
                        $absences2_data = $absences2->sel($_SESSION['usua_id']);
                    }else{
                        $absences2_data = $absences2->sel();
                    }
                    $num_absences2 = empty($absences2_data) ? 0 : count($absences2_data);
                    ?>                  
                    <table  id="tablaFact" class="display" >
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Usuario</th>
                                <th>Nombre</th>
                                <th>Descripción</th> 
                                <th>Días</th> 
                                <th>Inicio</th>
                                <th>Fin</th>
                                <th>Tipo</th>
                                <th>Horario</th>
                                <th>Estado</th>              
                                <th style="width: 150px !important;" >Opcion</th>
                            </tr>
                        </thead>
                        <tbody>  
                            <?php 
                            for ($n = 0; $n < $num_absences2; $n++) {
                            ?>
                            <tr>
                                <td><?php echo $absences2_data[$n]['ause_id'];  ?></td>
                                <td><div class="comp-perf usuario_borde">
                                    <img src="<?php echo $absences2_data[$n]['usua_ipe'];  ?>" alt="">    
                                </div></td>
                                <td><?php echo $absences2_data[$n]['usua_pno']." ".$absences2_data[$n]['usua_pap'];  ?></td>
                                <td><?php echo $absences2_data[$n]['ause_des'];  ?></td>
                                <td><?php echo $absences2_data[$n]['ause_dia'];  ?></td>
                                <td><?php echo $absences2_data[$n]['ause_fin'];  ?></td>
                                <td><?php echo $absences2_data[$n]['ause_ffi'];  ?></td>
                                <td><?php echo $absences2_data[$n]['taus_nom'];  ?></td>
                                <td><?php if($absences2_data[$n]['ause_med']==0){echo "N/A";}else if($absences2_data[$n]['ause_med']==1){echo "AM";}else{echo "PM";}?></td>
                                <td><?php if($absences2_data[$n]['ause_est']==0){ echo "Pendiente";}else if($absences2_data[$n]['ause_est']==1){echo "Aprobada";}else{echo "Rechazada";} ?></td>
                                <td>
                                    <div class="cont-flex cont-just-saro">
                                        <?php if($absences2_data[$n]['ause_est']==0 AND $_SESSION['usua_rol']==1){?>
                                            <a href="ausencias&view=<?php echo $absences2_data[$n]['ause_id']; ?>" class="btn btn-cir-uno usua-col" title="Validar"><span class="fa fa-check"></span></a>
                                        <?php } ?>
                                        <button class="btn btn-cir-uno usua-col" data-toggle="modal" data-target="#Modal-edi-sdet" data-sdet_id="47"  data-name="47" title="Modificar"><span class="fa fa-pencil-alt"></span></button>
                                        <button class="btn btn-cir-uno usua-col" data-toggle="modal" data-target="#Modal-del-ause" data-ause_id="<?php echo $absences2_data[$n]['ause_id']; ?>" data-name="<?php echo $absences2_data[$n]['ause_id']; ?>" title="Eliminar"><span class="fa fa-trash"></span></button>
                                    </div>
                                </td>
                            </tr>
                            <?php  } ?>  
                        </tbody>
                    </table> 
                    <?php  } ?>  
                </div>     
            </div>
        </div>
    </div>
</div>
<?php include('./view/modules/footer-user.php'); ?>