<script>
    function closeM(){
        $("#modal").remove();
    }
</script>
<?php 
    $val_absence      = new absenceController();
    $val_absence_data = $val_absence->sel_ause($_GET['view']);
    //var_dump($val_absence_data);
    ?>
 <div class="focus-modal" id="modal">
    <div class="container-form width-70-pto">
        <button class="modal-clo" onclick="closeM();" type="button">x</button>
        <div class="cont-flex">
            <div class="usua-inf">
                <div class="usua-data">
                    <div class="usua-img">
                        <img style="width: 100% !important" src="<?php echo $val_absence_data[0]['usua_ipe']; ?>" />
                    </div>
                    <div class="usua-nom">
                        <h5 style="font-size: 18px; font-weight: 600;"><?php echo $val_absence_data[0]['usua_pno']." ".$val_absence_data[0]['usua_sno']." ".$val_absence_data[0]['usua_pap']." ".$val_absence_data[0]['usua_sap']; ?></h5>
                        <p><?php echo $val_absence_data[0]['usua_pro']; ?></p>
                        <!--<b><?php echo ($val_absence_data[0]['usua_rol'] == '1')?"Administrador":"Empleado";?></b>-->
                    </div>
                    <div class="tex-cont">
                        <hr>
                        <h3 class="titulo titulo_cuat" id="val-ause">Validar ausencia <?php echo $_GET['view']; ?></h3>Esta es la información completa de la solicitud. 
                        <ul class="lista">
                            <li><b>Tipo de ausencia:</b> <?php echo $val_absence_data[0]['taus_nom']; ?></li>
                            <li><b>Descripción: </b><?php echo $val_absence_data[0]['ause_des']; ?></li>
                            <li><b>Solicita: </b><?php if ($val_absence_data[0]['ause_med'] != 0) {
                                echo "medio día para el ".$val_absence_data[0]['ause_fin'];
                                if ($val_absence_data[0]['ause_med']==1) {
                                    echo " antes de medio día.</li>";
                                }else{
                                    echo " despues de medio día.</li>";
                                }
                            }else{
                                echo "Los siguientes ".$val_absence_data[0]['ause_dia']." días.</li>
                                <li><b>Desde:</b> ".$val_absence_data[0]['ause_fin']."</li>
                                <li><b>Hasta:</b> ".$val_absence_data[0]['ause_ffi']."</li>";
                            }?>
                        </ul>
                        <br>
                        <form method="post" >
                            <input type="hidden" name="ause_id" value="<?php echo $_GET['view']; ?>">
                            <input type="hidden" name="crud" value="val-ause">
                            <button type="submit" class="boton boton_prin usuario_boton_uno usuario_boton_uno" value="1" name="ause_est"><i class="fas fa-thumbs-up"></i> Aprobar</button>
                            <button type="submit" class="boton boton_prin usuario_boton_uno usuario_boton_uno" value="2" name="ause_est"><i class="fas fa-thumbs-down"></i> Rechazar</button> 
                        </form>
                                           
                    </div> 
                </div>  
            </div>
            <div class="usua-file">
                <?php if (isset($val_absence_data[0]['ause_sop'])){?>
                    <embed src="<?php echo $val_absence_data[0]['ause_sop']; ?>" type="application/pdf" width="100%" height="600px" />
                <?php }else{
                    echo '<div><i class="fas fa-sticky-note"></i>
                    <h3>No existen soportes adjuntos</h3></div>';
                } ?>
            </div> 
        </div>
    </div>    
</div>