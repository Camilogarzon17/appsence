<script>
    $(function(){
        $("#adicionarAdd").on('click',function(){
            $("#tablaAdd tbody tr:eq(0)").clone().removeClass('fila-fijaAdd').appendTo("#tablaAdd");
        });
        $(document).on("click",".eliminarAdd",function(){
            var parent = $(this).parents().get(0);
            $(parent).remove();
        });
    });
</script>
<div class="contenedor_padding">
    <h3 class="titulo titulo_cuat" id="add-factura">Crear factura</h3>
    <form method="POST">
        <div class="contenedor-flex cont-just-sbet form_uno">
            <select class="caja caja_cinc" required name="fact_clie_fk" >
                <option value="">Seleccione el cliente</option>
                <?php
                    $clients      = new clientController();
                    $clients_data = $clients->sel_client_company();
                    $num_clients    = count($clients_data);
                    for ($regist = 0; $regist < $num_clients; $regist++) {
                        echo '<option value="' . $clients_data[$regist]['clie_id'] . '" >' . $clients_data[$regist]['empr_nom'].' - '. $clients_data[$regist]['clie_pno'] .' '.$clients_data[$regist]['clie_pap'] ."</option>";
                    }
                ?>
            </select>
            <label class="fecha_factura"><b>Fecha: <?php $fecha = strftime("%Y-%m-%d");echo "" . $fecha?></b></label>
            <input type="hidden" value="<?php $fecha = strftime("%Y-%m-%d");echo "" . $fecha?>" name="fact_fec">
            <input class="caja caja_diez" type="text" value="<?php echo $fact_tit ?>" required placeholder="Titulo de factura" name="fact_tit">     
                <div class="width-100-pto">
                    <table id="tablaAdd">
                        <tr class="fila-fijaAdd">
                            <td class="width-60-pto">
                                <select class="caja caja_diez" id="fdet_sdet_fk" onchange="seleccion(this)" required name="fdet_sdet_fk[]" >
                                    <option value="">Seleccione el servicio</option>
                                    <?php
                                        $services      = new serviceController();
                                        $services_data = $services->sel_service();
                                        $num_services   = count($services_data);
                                        for ($regist = 0; $regist < $num_services; $regist++) {
                                            echo '<option value="' . $services_data[$regist]['sdet_id'] . '" >'.$services_data[$regist]['serv_nom'] .' - '. $services_data[$regist]['sdet_nom'].': $ '. number_format($services_data[$regist]['sdet_val'])."</option>";
                                        }
                                    ?>
                                </select>
                            </td>
                            <td class="width-25-pto">
                                <input class="caja caja_diez" type="text" required placeholder="Precio" name="fdet_pre[]">
                            </td>
                            <td class="width-20-pto">
                                <input class="caja caja_diez" type="text" required placeholder="% Dto. " name="fdet_dto[]">
                            </td>
                            <td class="eliminarAdd"><button type="button" class="btn btn-cir-uno usua-col"><i class="fa fa-times"></i></button></td>
                        </tr>
                    </table>
                </div>
                <button id="adicionarAdd" type="button" class="boton"><i class="fas fa-plus"></i>  Adicionar</button>
            <textarea rows="3" class="caja caja_diez" type="text" placeholder="Descripcion del trabajo realizado" name="fact_des"></textarea>
            <label class="caja_seis">Fec. inicio: <input class="caja caja_seis" type="date" required placeholder="Fecha de inicio" name="fact_fin"></label>
            <input type="hidden" name="crud" value="add-fact">
            <input class="boton boton_prin usuario_boton_uno" type="submit" name="crear_factura" value="Crear factura">
        </div>
    </form>
</div>
