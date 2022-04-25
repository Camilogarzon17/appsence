<?php
$companys  = new clientController();
$factures = new billController();

?>
<div class="panel_usuario">
    <?php include 'modules/barLeft.php';?>
    <div class="panel-right">
        <?php if (isset($_GET['id'])) {
            $info_company = $companys->sel_client_company($_GET['id']);
            $num_person = empty($info_company) ? 0 : count($info_company);
            ?>
            <div class="cont-flex">
                <div class="cli-inf">
                    <div class="cli-por" style="background-image: url('<?php echo (isset($info_company[0]['empr_ipo']))?"public/img/logo/fondo.png":$info_company[0]['empr_ipo']; ?>');">
                        <div class="cli-img">
                            <img src="<?php echo $info_company[0]['empr_ipe'] ?>" />
                        </div>
                    </div>
                    <div class="cli-tex">
                        <span><?php echo $info_company[0]['etip_nom'] ?></span>
                        <h3><?php echo $info_company[0]['empr_nom'] ?></h3>
                        <p><?php echo $info_company[0]['empr_des'] ?></p>
                        
                        <div class="tex-cont">
                            <hr>
                            <h5>Información de contacto</h5>
                            <ul class="lista">
                                <li><i class="fas fa-briefcase"></i> <?php echo $info_company[0]['empr_nit'] ?></li>
                                <li><i class="fas fa-phone-alt"></i> <?php echo $info_company[0]['clie_cel'] ?></li>
                                <li><i class="fas fa-envelope-open-text"></i> <?php echo $info_company[0]['clie_ema'] ?></li>
                                <li><i class="fas fa-map-marker-alt"></i> <?php echo $info_company[0]['empr_dir'].", ".$info_company[0]['empr_ciu']." - ".$info_company[0]['empr_pai'] ?> </li>
                                <li><i class="fas fa-globe-americas"></i> <?php echo $info_company[0]['empr_web'] ?></li>
                            </ul>
                            <hr>
                            <h5>Personal</h5>
                            <ul class="lista">
                                <?php for ($i=0; $i < $num_person; $i++) { ?>
                                    <li><i class="far fa-user"></i> <?php echo $info_company[$i]['clie_pno']." ".$info_company[$i]['clie_pap']." - ".$info_company[$i]['clie_ema'] ?></li>
                                <?php } ?>
                            </ul>
                        </div>   
                    </div>
                </div>
                <?php $resul_fact = $factures->fact_grafic($_GET['id'],true);
                $resul_fact_est = $factures->fact_grafic($_GET['id'],false);
                $resul_pays = $factures->pays_total($_GET['id']);
                $pendiente = $resul_fact_est[1]['total'] - $resul_pays[2]['total_pago'];
                ?>
                <div class="cli-data">
                    <div class="cont-resu">
                        <div class="resu-item bck-col-1">
                            <h3>Facturas</h3>
                            <p>emitidas</p>
                            <span><?php echo $resul_fact[0]['cantidad']; ?></span>
                        </div>
                        <div class="resu-item bck-col-2">
                            <h3>Facturas</h3>
                            <p>pendientes por pagar</p>
                            <span><?php echo $resul_fact_est[1]['cantidad']; ?></span>
                        </div>
                        <div class="resu-item bck-col-3">
                            <h3>Saldo</h3>
                            <p>pendiente por pagar</p>
                            <span>$ <?php echo number_format($pendiente); ?></span>
                        </div>
                        <div class="resu-item bck-col-4">
                            <h3>Total</h3>
                            <p>de ingresos</p>
                            <span>$ <?php echo number_format($resul_fact[0]['total']); ?></span>
                        </div>
                    </div>
                    <?php 
                        $months = array("", "Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");
                        for ($x = 1; $x <= 12; $x = $x + 1) {
                            $precio[$x] = 0;
                        }
                        $actual = date('Y');
                        $years = array();
                        $years[0] = "Mes";
                        for ($i=5; $i > 0; $i--) { 
                            $years[$i] = $actual;
                            $actual--;
                        }
                        
                        $year = date("Y");
                        $informe      = new billController();
                        $informe_data = $informe->sel_payment_month($_GET['id'],'mes');
                        $num_informe  = count($informe_data);
                        $informe_anio      = new billController();
                        $informe_data_anio = $informe_anio->sel_payment_month($_GET['id'],'anio');
                        $num_informe_anio  = count($informe_data_anio);
                        
                     ?>
                    <div class="cont-graf">
                       <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
                        <script type="text/javascript">
                          google.charts.load('current', {'packages':['corechart']});
                          google.charts.setOnLoadCallback(drawVisualization);

                          function drawVisualization() {
                            var data = google.visualization.arrayToDataTable([
                              <?php
                            
                                for ($n = 0; $n < $num_informe; $n++) {
                                    $mon = (int) date("m", strtotime($informe_data[$n]['fpag_fec']));
                                    for ($i=1; $i < sizeof($years); $i++) { 
                                        $y   = date("Y", strtotime($informe_data[$n]['fpag_fec']));
                                        for ($m=1; $m <= 12; $m++) { 
                                            if ($m == $mon) {
                                                $mes[$m]=$m;
                                                if ($y == $years[$i]) {
                                                    $barra[$months[$m]][$y]  = $informe_data[$n]['total'];
                                                    $anio[$y]=$y;
                                                } 
                                            }
                                        }                                       
                                    }   
                                }
                                $anios = array();
                                $anios[0] = "Mes";
                                for ($x=0; $x < sizeof($years); $x++) { 
                                    if ($years[$x]==$anio[$years[$x]]) {
                                        $anios[]=$years[$x];
                                    }
                                }
                                $meses = array();
                                $meses[0] = "";
                                for ($x=1; $x < sizeof($months); $x++) { 
                                    if ($x==$mes[$x]) {
                                        $meses[]=$x;
                                    }
                                }
                                echo "[";
                                for ($i=0; $i < sizeof($anios); $i++) { 
                                    echo "'".$anios[$i]."'";
                                    if ($i<(sizeof($anios)-1)) {
                                      echo ",";
                                    }  
                                }  
                                echo "],"; 
                                for ($i=1; $i < sizeof($months); $i++) {
                                    for ($b=0; $b < sizeof($meses); $b++) { 
                                        if ($i==$meses[$b]) {
                                            echo "['".$months[$i]."',";
                                            for ($a=1; $a < sizeof($anios); $a++) {
                                                $me = $months[$i];
                                                echo(isset($barra[$me][$anios[$a]]))?$barra[$me][$anios[$a]]:"0";
                                                if ($a<(sizeof($anios)-1)) {
                                                  echo ",";
                                                } 
                                            } 
                                            echo "]";
                                            if ($i<sizeof($months)) {
                                              echo ",";
                                            } 
                                        } 
                                    }     
                                } ?>
                            ]);

                            var options = {
                              title : 'Producción mensual de los ultimos 5 años',
                              vAxis: {title: 'Ingresos'},
                              hAxis: {title: 'Meses'},
                              seriesType: 'bars',
                              series: {5: {type: 'line'}}
                            };

                            var chart = new google.visualization.ComboChart(document.getElementById('chart_div'));
                            chart.draw(data, options);
                          }
                        </script>
                       <div class="graf-item" id="chart_div" style="width: 100%; height: 500px;"></div>
                        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
                        <script type="text/javascript">
                          google.charts.load("current", {packages:["corechart"]});
                          google.charts.setOnLoadCallback(drawChart);
                          function drawChart() {
                            var data = google.visualization.arrayToDataTable([
                              ['Año', 'Total'],
                            <?php
                                for ($n = 0; $n < $num_informe_anio; $n++) {
                                    $y   = date("Y", strtotime($informe_data_anio[$n]['fpag_fec']));
                                    echo "['".$y."',".$informe_data_anio[$n]['total']."]"; 
                                    if ($n<$num_informe_anio-1) {
                                        echo ",";
                                    }
                                }
                            ?>
                            ]);

                            var options = {
                              title: 'Producción total por año',
                              pieHole: 0.4,
                            };

                            var chart = new google.visualization.PieChart(document.getElementById('donutchart'));
                            chart.draw(data, options);
                          }
                        </script>
                         <div class="graf-item" id="donutchart" style="width: 100%; height: 300px;"></div>
                    </div>
                </div>
            </div>
        <?php  }else{ 
            $companys_data = $companys->sel_company();
            $num_companys = empty($companys_data) ? 0 : count($companys_data);
            $datos_companys = array_keys($companys_data[0]);
            $num_tit = empty($datos_companys) ? 0 : count($datos_companys);
        ?>
        <div class="seccion-content">
            <div class="contenedor_padding">
                <div class="cont-flex  cont-just-sbet cont-alig-cen">
                    <h5 class="titulo titulo_cuat">Empresas y clientes</h5>
                    <div class="menu-tabs">
                        <button type="button" data-toggle="modal" data-target="#Modal-add-empr" id="add-empr"><i class="fas fa-building"></i>Empresa</button>
                        <button type="button" data-toggle="modal" data-target="#Modal-add-clie" id="add-clie"><i class="fas fa-user-plus"></i>Cliente</button>
                    </div>
                </div> 
                <?php 
                    $datos = array(
                        0  => 'empr_id'
                    );
                    
                    $modal = new functionModel();
                    $modal->view_modal("add-empr", $datos, "","Añadir empresa", "form-empr-add");
                    $modal->view_modal("edi-empr", $datos_companys, "","", "form-empr-edi");
                    $modal->view_modal("del-empr", $datos, "","Eliminar empresa", "form-empr-del");
                    $modal->view_modal("add-clie", $datos, "","", "form-clie-add");
                    
                 ?>  
                <div class="cont-flex  cont-just-sbet cont-alig-top">
                    <div class="contenedor-flex form_dos"> 
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="empresa-tab" data-toggle="tab" href="#empresa" role="tab" aria-controls="empresa" aria-selected="true">Empresas</a>
                            </li>
                            <li><a class="nav-link" id="cliente-tab" data-toggle="tab" href="#cliente" role="tab" aria-controls="cliente" aria-selected="true">Clientes</a></li> 
                        </ul> 
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active cont-tbl" id="empresa" role="tabpanel" aria-labelledby="empresa-tab">
                                <br>
                                <div class="cont-tbl">
                                    <table  id="tablaFact" class="display">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Imagen</th>
                                                <th>Nombre</th>
                                                <th>Pagina web</th>
                                                <th>Tipo</th>
                                                <th>NIT</th>
                                                <th>Ciudad</th> 
                                                <th>Pais</th>                    
                                                <th style="width: 150px !important;" >Opcion</th>
                                            </tr>
                                        </thead>
                                        <tbody>  
                                            <?php 
                                            for ($n = 0; $n < $num_companys; $n++) {
                                            ?>
                                            <tr>
                                                <td><?php echo $companys_data[$n]['empr_id'];  ?></td>
                                                <td><div class="comp-perf usuario_borde">
                                                    <img src="<?php echo $companys_data[$n]['empr_ipe'];  ?>" alt="">    
                                                </div></td>
                                                <td><?php echo $companys_data[$n]['empr_nom'];  ?></td>
                                                <td><?php echo $companys_data[$n]['empr_web'];  ?></td>
                                                <td><?php echo $companys_data[$n]['etip_nom'];  ?></td>
                                                <td><?php echo $companys_data[$n]['empr_nit'];  ?></td>
                                                <td><?php echo $companys_data[$n]['empr_ciu'];  ?></td>
                                                <td><?php echo $companys_data[$n]['empr_pai'];  ?></td>
                                                <td>
                                                    <div class="cont-flex cont-just-saro">
                                                        <button class="btn btn-cir-uno usua-col" data-toggle="modal" data-target="#Modal-edi-empr" data-empr_id="<?php echo $companys_data[$n]['empr_id']; ?>" data-name="<?php echo $companys_data[$n]['empr_nom']; ?>"
                                                        <?php 
                                                            for ($i=0; $i < $num_tit; $i++) { 
                                                                echo ' data-'.$datos_companys[$i].'="'.$companys_data[$n][$datos_companys[$i]].'" ';
                                                            }
                                                        ?>
                                                        title="Editar"><span  class="fa fa-pencil-alt"></span></button>
                                                        <button class="btn btn-cir-uno usua-col" data-toggle="modal" data-target="#Modal-del-empr" data-empr_id="<?php echo $companys_data[$n]['empr_id']; ?>" data-name="<?php echo $companys_data[$n]['empr_nom']; ?>" title="Eliminar"><span  class="fa fa-trash"></span></button>
                                                        <?php if ($companys_data[$n]['empr_tipo_fk']!=5 && $companys_data[$n]['empr_tipo_fk']!=6) {
                                                            echo '<a href="clientes&id='.$companys_data[$n]['empr_id'].'" class="btn btn-cir-uno usua-col" title="Ver estadisticas"><span  class="fas fa-chart-pie"></span></a>';
                                                        } ?>
                                                    </div>
                                                </td>
                                            </tr>
                                            <?php  } ?>  
                                        </tbody>
                                    </table> 
                                </div>
                            </div>
                            <div class="tab-pane fade show" id="cliente" role="tabpanel" aria-labelledby="cliente-tab"> <br>
                                <div class="cont-tbl">
                                <table  id="tablaClient" class="display cont-tbl">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Imagen</th>
                                            <th>Nombre</th>
                                            <th>Correo electronico</th>
                                            <th>Cedula</th>
                                            <th>Celular</th>
                                            <th>Ciudad</th> 
                                            <th>Pais</th>                    
                                            <th style="width: 150px !important;" >Opcion</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                             <?php
                                $clients = new clientController();
                                $clients_data = $clients->sel_client_company();
                                $num_clients  = count($clients_data);
                                $datos_clients = array(
                                    0  => 'clie_id',
                                    1  => 'clie_ema',
                                    2  => 'clie_id',
                                    3  => 'clie_pno',
                                    4  => 'clie_sno',
                                    5  => 'clie_pap',
                                    6  => 'clie_sap',
                                    7  => 'clie_cel',
                                    8  => 'clie_nid',
                                    9  => 'clie_dir',
                                    10  => 'clie_ciu',
                                    11  => 'clie_pai',
                                    12  => 'clie_ipe',
                                    13  => 'clie_fec',
                                    14  => 'clie_empr_fk',
                                    15  => 'clie_esta_fk',
                                    16  => 'clie_usua_fk'
                                );
                                $datos_clie_del = array(
                                    0  => 'clie_id'
                                );
                                $num_tit_clie = empty($datos_clients) ? 0 : count($datos_clients);
                                $modal->view_modal("edi-clie", $datos_clients, "","", "form-clie-edi");
                                $modal->view_modal("del-clie", $datos_clie_del, "","Eliminar cliente", "form-clie-del");

                                for ($regist = 0; $regist < $num_clients; $regist++) {
                                ?>
                                <tr>
                                    <td><?php echo $clients_data[$regist]['clie_id']; ?></td>
                                    <td>
                                        <div class="comp-perf usuario_borde">
                                            <img src="<?php echo $clients_data[$regist]['clie_ipe'];  ?>" >    
                                        </div>
                                    </td>
                                    <td><?php echo $clients_data[$regist]['clie_pno']." ".$clients_data[$regist]['clie_sno']." ".$clients_data[$regist]['clie_pap']." ".$clients_data[$regist]['clie_sap']; ?>
                                    </td>
                                    <td>
                                        <?php echo $clients_data[$regist]['clie_ema']; ?>
                                    </td>
                                    <td>
                                        <?php echo $clients_data[$regist]['clie_nid']; ?>
                                    </td>
                                    <td>
                                        <?php echo $clients_data[$regist]['clie_cel']; ?>
                                    </td>
                                    <td>
                                        <?php echo $clients_data[$regist]['clie_ciu']; ?>
                                    </td>
                                    <td>
                                        <?php echo $clients_data[$regist]['empr_nom']; ?>
                                    </td>
                                    <td>
                                        <div class="cont-flex cont-just-saro">
                                            <button class="btn btn-cir-uno usua-col" data-toggle="modal" data-target="#Modal-edi-clie" data-clie_id="<?php echo $clients_data[$regist]['clie_id']; ?>" data-name="<?php echo $clients_data[$regist]['clie_nid']; ?>"
                                            <?php 
                                                for ($i=0; $i < $num_tit_clie; $i++) { 
                                                    echo ' data-'.$datos_clients[$i].'="'.$clients_data[$regist][$datos_clients[$i]].'" ';
                                                }
                                            ?>
                                            title="Editar"><span  class="fa fa-pencil-alt"></span></button>
                                            <button class="btn btn-cir-uno usua-col" data-toggle="modal" data-target="#Modal-del-clie" data-clie_id="<?php echo $clients_data[$regist]['clie_id']; ?>" data-name="<?php echo $clients_data[$regist]['clie_nid']; ?>" title="Eliminar"><span  class="fa fa-trash"></span></button>

                                        </div>
                                    </td>
                                </tr>
                                <?php } ?>
                                </tbody>
                                </table>
                                </div>  
                            </div>
                        </div>   
                    </div> 
                </div>       
            </div>
        </div>
    <?php } ?>
    </div>
</div>
<?php include('./view/modules/footer-user.php'); ?>