<?php
$user         = new userController();
$user_data    = $user->sel($_SESSION['usua_id']);
$user_nom     = $user_data[0]['usua_pno']." ".$user_data[0]['usua_sno']." ".$user_data[0]['usua_pap']." ".$user_data[0]['usua_sap'];
$function     = new functionModel();
$fech_text    = $function->dateText($user_data[0]['usua_fna'],'si','si','si','no');
$datos = array_keys($user_data[0]);
$num_tit = empty($datos) ? 0 : count($datos);
$datos_pass = array(
    0 => 'usua_pas',
    1 => 'usua_id'
 );
?>
<div class="panel_usuario">
    <?php include 'modules/barLeft.php';?>
    <div class="panel-right">
        <div class="cont-flex">
            <div class="cli-inf">
                <div class="cli-por" style="background-image: url('<?php echo (!empty($user_data[0]['usua_ipo']))?$user_data[0]['usua_ipo']:"public/img/logo/fondo.png"; ?>');">
                    <div class="cli-img">
                        <img style="width: 100% !important" src="<?php echo $user_data[0]['usua_ipe']; ?>" />
                    </div>
                </div>
                <div class="cli-tex">
                    <span><?php echo ($user_data[0]['usua_rol'] == '1')?"Administrador":"Empleado";?></span>
                    <h3><?php echo $user_nom; ?></h3>
                    <p><?php echo $user_data[0]['usua_pro']; ?></p>
                    
                    <div class="tex-cont">
                        <hr>
                        <h5>Información personal</h5>
                        <ul class="lista">
                            <li><i class="fas fa-portrait"></i> <?php echo $user_data[0]['care_nom']; ?></li>
                            <li><i class="fa fa-address-card"></i> <?php echo $user_data[0]['usua_nid']; ?></li>
                            <!--<li><i class="fa fa-address-card"></i> <?php echo $user_data[0]['usua_car']; ?></li>-->
                            <li><i class="fa fa-calendar-alt"></i> <?php echo $fech_text ?></li>
                            <li><i class="fas fa-phone-alt"></i> <?php echo $user_data[0]['usua_cel']; ?></li>
                            <li><i class="fa fa-envelope"></i> <?php echo $user_data[0]['usua_ema']; ?></li>
                            <li><i class="fas fa-map-marker-alt"></i> <?php echo $user_data[0]['usua_dir']." ". $user_data[0]['usua_ciu'] . " - " . $user_data[0]['usua_pai']; ?> </li>
                        </ul>                        
                    </div>   
                </div>
            </div>
            <div class="cli-data">
                <?php 
                    $total_pen = new absenceModel();
                    $pendientes = $total_pen->sel($_SESSION['usua_id'],'0',false);
                    $total_ace = new absenceModel();
                    $aceptadas = $total_ace->sel($_SESSION['usua_id'],1,false);
                    $total_rec = new absenceModel();
                    $rechazadas = $total_rec->sel($_SESSION['usua_id'],2,false);
                    $total_dias = new absenceModel();
                    $dias = $total_dias->sel($_SESSION['usua_id'],1,true);
                    $modal = new functionModel();
                    $modal->view_modal("edi-usua", $datos, "","", "form-usua-edi");
                    $modal->view_modal("pas", $datos_pass, "","", "form-usua-pas");
                 ?>
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                  <li class="nav-item">
                    <a class="nav-link active" id="ausencia-tab" data-toggle="tab" href="#ausencia" role="tab" aria-controls="ausencia" aria-selected="true">Ausencias</a>
                  </li>
                  <!--<li class="nav-item">
                    <a class="nav-link" id="firma-tab" data-toggle="tab" href="#firma" role="tab" aria-controls="firma" aria-selected="true">Firma</a>
                  </li>-->
                  <li class="nav-item">
                      <button type="button" class="btn btn-uno" data-toggle="modal" data-target="#Modal-edi-usua"
                    <?php    
                        for ($i=0; $i < $num_tit; $i++) { 
                            echo ' data-'.$datos[$i].'="'.$user_data[0][$datos[$i]].'" ';
                        }
                    ?>
                    ><i class="fas fa-pencil-alt"></i>Editar</button>
                  </li>
                  <li class="nav-item">
                      <button type="button" class="btn btn-uno" data-toggle="modal" data-target="#Modal-pas" data-usua_id="<?php echo $user_data[0]['usua_id']; ?>" data-usua_pas="<?php echo $user_data[0]['usua_pas']; ?>" id="pass"><i class=" fas fa-key"></i>Contraseña</button>
                  </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                  <div class="tab-pane fade show active" id="ausencia" role="tabpanel" aria-labelledby="ausencias-tab">
                    <div class="cont-resu">
                        <div class="resu-item bck-col-1">
                            <h3>Solicitudes</h3>
                            <p>pendientes</p>
                            <span><?php echo $pendientes[0]['total']; ?></span>
                        </div>
                        <div class="resu-item bck-col-2">
                            <h3>Solicitudes</h3>
                            <p>aceptada</p>
                            <span><?php echo $aceptadas[0]['total']; ?></span>
                        </div>
                        <div class="resu-item bck-col-3">
                            <h3>Solicitudes</h3>
                            <p>rechazadas</p>
                            <span><?php echo $rechazadas[0]['total']; ?></span>
                        </div>
                        <div class="resu-item bck-col-4">
                            <h3>Total</h3>
                            <p>de días ausentes</p>
                            <span><?php echo (empty($dias[0]['dias']))?"0":$dias[0]['dias']; ?></span>
                        </div>
                    </div>
                    <?php
                        $absences  = new absenceController();
                        $absences_data = $absences->sel($_SESSION['usua_id']);
                        $num_absences = empty($absences_data) ? 0 : count($absences_data);
    
                     ?> 
                    <script>
                      document.addEventListener('DOMContentLoaded', function() {
                        var calendarEl = document.getElementById('calendar');
                        var calendar = new FullCalendar.Calendar(calendarEl, {
                          initialView: 'dayGridMonth',
                          height: 490,
                          locale: 'es',
                          header:{
                            left:'today,prev,next',
                            center:'title',
                            right:'month,basicWeek,basicDay,agendaWeek,agendaDay'
                          },
                          events:[
                            <?php 
                            for ($n = 0; $n < $num_absences; $n++) {
                                echo "{title: '".$absences_data[$n]['ause_des']."',
                                start: '".$absences_data[$n]['ause_fin']."'";
                                if ($absences_data[$n]['ause_med']==0) {
                                    echo ", end:'".$absences_data[$n]['ause_ffi']."', display:'block',backgroundColor:'rgb(0,158,226)', textColor:'black' ";
                                }
                                echo "},";
                            }
                            ?>
                            ]
                        });
                        calendar.render();
                      });
                    </script>
                    <div id='calendar'></div>
                    
                </div>
                </div>
            </div>
        </div>
    </div>
</div>
  <script src="./public/js/script_usuario.js"></script>
  </body>
</html>