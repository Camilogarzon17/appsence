<script>
    $(function(){
        $("#adicionar").on('click',function(){
            $("#tabla tbody tr:eq(0)").clone().removeClass('fila-fija').appendTo("#tabla");
        });
        $(document).on("click",".eliminar",function(){
            var parent = $(this).parents().get(0);
            $(parent).remove();
        });
    });
    function closeM(){
        $("#modal").remove();
    }

</script>
<?php 
	$bills = new billController();
	$bills_data = $bills->sel($_GET['ref']);
	$num_bills  = count($bills_data);
	for ($n = 0; $n < $num_bills; $n++) {
 ?>
 <div class="focus-modal" id="modal">
    <div class="container-form width-40-pto">
        <button class="modal-clo" onclick="closeM();" type="button">x</button>
        <div class="contenedor_padding">
            <h3 class="titulo titulo_cuat" id="add-factura">Modificar factura: <?php echo $_GET['ref']; ?></h3>
            <form method="POST">
                <input type="hidden" name="fact_id" value="<?php echo $bills_data[$n]['fact_id']; ?>">
                <div class="contenedor-flex cont-just-sbet form_uno">
                    <select class="caja caja_cinc" required name="fact_clie_fk" >
                        <option value="">Seleccione el cliente</option>
                        <?php
                            $clients      = new clientController();
                            $clients_data = $clients->sel_client_company();
                            $num_clients    = count($clients_data);
                            for ($regist = 0; $regist < $num_clients; $regist++) {
                                echo '<option value="' . $clients_data[$regist]['clie_id'] . '" ';
                                echo ($clients_data[$regist]['clie_id']==$bills_data[$n]['fact_clie_fk'])?"selected":"";
                                echo ' >' . $clients_data[$regist]['empr_nom'].' - '. $clients_data[$regist]['clie_pno'] .' '.$clients_data[$regist]['clie_pap'] ."</option>";
                            }
                        ?>
                    </select>
                    <label class="caja_cinc">Fecha fin: <input class="caja caja_seis" type="date" required placeholder="Fecha de inicio" name="fact_fin" value="<?php echo $bills_data[$n]['fact_fec']; ?>"></label>
                    <input type="hidden" value="<?php $fecha = strftime("%Y-%m-%d");echo "" . $fecha?>" name="fact_fec">
                    <input class="caja caja_diez" type="text" value="<?php echo $bills_data[$n]['fact_tit'];?>" required placeholder="Titulo de factura" name="fact_tit">     
                        <div class="width-100-pto">
                            <table id="tabla">
                                <?php 
                                $billDetalle = new billController();
                                $detalle_data = $bills->sel_detalle($_GET['ref']);
                                $num_detalle  = count($detalle_data);
                                for ($det = 1; $det < $num_detalle; $det++) {
                                     ?>
                                    <tr <?php echo($det==1)?'class="fila-fija"':''; ?> >
                                        <td class="width-60-pto">
                                            <select class="caja caja_diez" id="fdet_sdet_fk" onchange="seleccion(this)" required name="fdet_sdet_fk[]" >
                                                <option value="">Seleccione el servicio</option>
                                                <?php
                                                    $services      = new serviceController();
                                                    $services_data = $services->sel_service();
                                                    $num_services   = count($services_data);
                                                    for ($regist = 0; $regist < $num_services; $regist++) {
                                                        echo '<option value="' . $services_data[$regist]['sdet_id'] . '"';
                                                        echo($detalle_data[$det]['fdet_sdet_fk']==$services_data[$regist]['sdet_id'])?"selected":"";
                                                        echo ' >'.$services_data[$regist]['serv_nom'] .' - '. $services_data[$regist]['sdet_nom'].': $ '. number_format($services_data[$regist]['sdet_val'])."</option>";
                                                    }
                                                ?>
                                            </select>
                                        </td>
                                        <td class="width-25-pto">
                                            <input class="caja caja_diez" type="text" required placeholder="Precio" name="fdet_pre[]" value="<?php echo $detalle_data[$det]['fdet_pre']; ?>">
                                        </td>
                                        <td class="width-20-pto">
                                            <input class="caja caja_diez" type="text" required placeholder="% Dto. " name="fdet_dto[]" value="<?php echo $detalle_data[$det]['fdet_dto']; ?>">
                                        </td>
                                        <td class="eliminar">
                                            
                                            <button type="button" class="btn btn-cir-uno usua-col"><i class="fa fa-times"></i></button>
                                        </td>
                                    </tr>
                                    <input type="hidden" name="fdet_id[]" value="<?php echo $detalle_data[$det]['fdet_id']; ?>">
                                <?php } ?>
                            </table>
                        </div>
                        <button id="adicionar" type="button" class="boton"><i class="fas fa-plus"></i>  Adicionar</button>
                    <textarea rows="3" class="caja caja_diez" type="text" required placeholder="Descripcion del trabajo realizado" name="fact_des"><?php echo $bills_data[$n]['fact_des']; ?></textarea>
                    <label class="caja_seis">Fec. inicio: <input class="caja caja_seis" type="date" required placeholder="Fecha de inicio" name="fact_fin" value="<?php echo $bills_data[$n]['fact_fin']; ?>"></label>
                    <select class="caja caja_cuat" id="fact_esta_fk" onchange="seleccion(this)" required name="fact_esta_fk" >
                        <option value="" name="estado">Seleccione el estado</option>
                        <?php
                            $estado      = new billController();
                            $estado_data = $estado->sel_estado();
                            $num_estado   = count($estado_data);
                            for ($regist = 0; $regist < $num_estado; $regist++) {
                                echo '<option value="' . $estado_data[$regist]['fest_id'] . '" ';
                                echo ($estado_data[$regist]['fest_id']==$bills_data[$n]['fact_esta_fk'])?" selected ":"";
                                echo ' >'.$estado_data[$regist]['fest_nom'] ."</option>";
                            }
                        ?>
                    </select>
                    <input type="hidden" name="crud" value="edi-fact">
                    <input class="boton boton_prin usuario_boton_uno" type="submit" name="crear_factura" value="Modificar factura">
                </div>
            </form>
        </div>
    </div>    
</div>
<?php } ?>