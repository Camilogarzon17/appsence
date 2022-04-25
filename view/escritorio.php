
  <div class="panel_usuario">
    <?php include 'modules/barLeft.php';?>
    <div class="panel-right">
      <div class="contenedor-flex content-grafic cont-just-sbet">
       <?php
        $factures = new billController();
        $resul_fact = $factures->fact_grafic('',true);
        $resul_fact_est = $factures->fact_grafic('',false);
        $resul_pays = $factures->pays_total('');
        $pendiente = $resul_fact_est[1]['total'] - $resul_pays[2]['total_pago'];
                ?>
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
                        $informe_data = $informe->sel_payment_month('','mes');
                        $num_informe  = count($informe_data);
                        $informe_anio      = new billController();
                        $informe_data_anio = $informe_anio->sel_payment_month('','anio');
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
  </div>
  <script src="./public/js/script_usuario.js"></script>
  </body>
</html>