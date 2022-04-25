<?php 
$vis_pais=htmlentities(addslashes($_POST["visi_pai"]));
                        $vis_codi=htmlentities(addslashes($_POST["visi_cod"]));
                        $vis_fech=htmlentities(addslashes($_POST["visi_fec"]));
                        $numero_vist = 0;
                        require_once("conexion.php");
                        if ($vis_codi!="") {
                            $vistas = "SELECT cont_id, cont_pais, cont_ip , cont_fecha FROM contador WHERE cont_id = '$vis_codi'";
                            $vist = mysqli_query($conexion, $vistas);
                            while ($result_vista= mysqli_fetch_array($vist)) {
                                $numero_vist++;
                            }; 
                            echo "<p>Codigo: $vis_codi <br>
                            Visitas recibidas al sitio: $numero_vist </p> ";                    
                        }else if ($vis_fech!="" && $vis_pais!="") {
                            $vistas = "SELECT cont_id, cont_pais, cont_ip , cont_fecha FROM contador WHERE cont_pais = '$vis_pais' AND cont_fecha > '$vis_fech 00:00:00' AND cont_fecha < '$vis_fech 23:59:59' GROUP BY cont_ip ORDER BY cont_id ASC;";
                            $vist = mysqli_query($conexion, $vistas);
                            while ($result_vista= mysqli_fetch_array($vist)) {
                                $numero_vist++;
                            }; 
                            echo "<p>País: $vis_pais <br>
                            Fecha: $vis_fech <br>
                            Visitas recibidas al sitio: $numero_vist </p> "; 
                        }else if ($vis_pais=="todos" || $vis_pais=="" && $vis_codi=="" && $vis_fech==""){
                           $vistas = "SELECT c1.cont_id, cont_pais, cont_ip , c2.cont_fecha FROM contador c1 RIGHT JOIN (SELECT cont_id, MAX(cont_fecha) as cont_fecha FROM contador WHERE cont_id > '394' GROUP BY cont_ip) c2 ON c1.cont_id = c2.cont_id ORDER BY cont_id DESC;";
                            $vist = mysqli_query($conexion, $vistas);
                            while ($result_vista= mysqli_fetch_array($vist)) {
                                $numero_vist++;
                            };
                            echo "<p>País: Todos <br>
                            Fecha: Todas <br>
                            Codigo: Todos <br>
                            Visitas recibidas al sitio: $numero_vist </p> "; 
                        }else if ($vis_fech!="") {
                            $vistas = "SELECT cont_fecha, cont_ip, cont_id, cont_pais FROM contador WHERE cont_fecha > '$vis_fech 00:00:00' AND cont_fecha < '$vis_fech 23:59:59' GROUP BY cont_ip ORDER BY cont_id ASC";
                            $vist = mysqli_query($conexion, $vistas);
                            while ($result_vista= mysqli_fetch_array($vist)) {
                                $numero_vist++;
                            };
                            echo "Fecha: $vis_fech<br>
                            Visitas recibidas al sitio: $numero_vist </p> ";                       
                        }else{
                            $vistas = "SELECT cont_id, cont_pais, cont_ip , cont_fecha FROM contador WHERE cont_pais = '$vis_pais' GROUP BY cont_ip ORDER BY cont_id ASC;";
                            $vist = mysqli_query($conexion, $vistas);
                            while ($result_vista= mysqli_fetch_array($vist)) {
                                $numero_vist++;
                            }; 
                            echo "<p>País: $vis_pais <br>
                            Visitas recibidas al sitio: $numero_vist </p> "; 
                        }

<?php
                        if ($vis_codi!="") {
                            $consulta = "SELECT cont_id, cont_pais, cont_ip , cont_fecha FROM contador WHERE cont_id = '$vis_codi'";
                            $result = mysqli_query($conexion, $consulta);
                            while ($extraido = mysqli_fetch_array($result)) {
                                echo "<tr><td>".$extraido['cont_id']."</td>
                                <td>".$extraido['cont_pais']."</td>
                                <td>".$extraido['cont_ip']."</td>
                                <td>".$extraido['cont_fecha']."</td>
                                </tr>";
                            }
                            $vis_pai="";
                            $vis_fech="";
                        }else if ($vis_fech!="" && $vis_pais!="") {
                            $consulta = "SELECT cont_id, cont_pais, cont_ip , cont_fecha FROM contador WHERE cont_pais = '$vis_pais' AND cont_fecha > '$vis_fech 00:00:00' AND cont_fecha < '$vis_fech 23:59:59' GROUP BY cont_ip ORDER BY cont_id ASC;";
                            $result = mysqli_query($conexion, $consulta);
                            while ($extraido = mysqli_fetch_array($result)) {
                                echo "<tr><td>".$extraido['cont_id']."</td>
                                <td>".$extraido['cont_pais']."</td>
                                <td>".$extraido['cont_ip']."</td>
                                <td>".$extraido['cont_fecha']."</td>
                                </tr>";
                            }
                            $vis_codi="";
                        }else if ($vis_pais=="todos" || $vis_pais=="" && $vis_codi=="" && $vis_fech==""){
                            $consulta = "SELECT c1.cont_id, cont_pais, cont_ip , c2.cont_fecha FROM contador c1 RIGHT JOIN (SELECT cont_id, MAX(cont_fecha) as cont_fecha FROM contador WHERE cont_id > '394' GROUP BY cont_ip) c2 ON c1.cont_id = c2.cont_id ORDER BY cont_id DESC;";
                            $result = mysqli_query($conexion, $consulta);
                            while ($extraido = mysqli_fetch_array($result)) {
                                echo "<tr><td>".$extraido['cont_id']."</td>
                                <td>".$extraido['cont_pais']."</td>
                                <td>".$extraido['cont_ip']."</td>
                                <td>".$extraido['cont_fecha']."</td>
                                </tr>";
                            }
                        }else if ($vis_fech!="") {
                            $consulta = "SELECT cont_fecha, cont_ip, cont_id, cont_pais FROM contador WHERE cont_fecha > '$vis_fech 00:00:00' AND cont_fecha < '$vis_fech 23:59:59' GROUP BY cont_ip ORDER BY cont_id ASC";
                            $result = mysqli_query($conexion, $consulta);
                            while ($extraido = mysqli_fetch_array($result)) {
                                echo "<tr>
                                <td>".$extraido['cont_id']."</td>
                                <td>".$extraido['cont_pais']."</td>
                                <td>".$extraido['cont_ip']."</td>
                                <td>".$extraido['cont_fecha']."</td>
                                </tr>";
                            }
                            $vis_codi="";
                            $vis_pais="";
                        }else{
                            $consulta = "SELECT cont_id, cont_pais, cont_ip , cont_fecha FROM contador WHERE cont_pais = '$vis_pais' GROUP BY cont_ip ORDER BY cont_id ASC;";
                            $result = mysqli_query($conexion, $consulta);
                            while ($extraido = mysqli_fetch_array($result)) {
                                echo "<tr><td>".$extraido['cont_id']."</td>
                                <td>".$extraido['cont_pais']."</td>
                                <td>".$extraido['cont_ip']."</td>
                                <td>".$extraido['cont_fecha']."</td>
                                </tr>";
                            }
                            $vis_codi="";
                            $vis_fech="";
                        }
                        ?>
 ?>