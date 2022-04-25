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

</script>
<div class="contenedor_padding">
    <h3 class="titulo titulo_cuat" id="ges-soli">Cotización de servicios</h3>
    <form method="POST">
        <div class="contenedor-flex cont-just-sbet form_uno">
            <input class="caja caja_cinc" type="text" required placeholder="Nombre del solicitante" name="soli_nom" id="ges-soli_soli_nom" disabled> 
            <input class="caja caja_cinc" type="text" required placeholder="Nombre del solicitante" name="soli_ema" id="ges-soli_soli_ema" disabled> 
            <input class="caja caja_cinc" type="text" required placeholder="Nombre del solicitante" name="soli_emp" id="ges-soli_soli_emp" disabled>     
            <input class="caja caja_cinc" type="text" required placeholder="Nombre del solicitante" name="soli_cel" id="ges-soli_soli_cel" disabled> 
            <input class="caja caja_cinc" type="text" required placeholder="Nombre del solicitante" name="soli_ubi" id="ges-soli_soli_ubi" disabled> 
            <input class="caja caja_cinc" type="text" required placeholder="Nombre del solicitante" name="soli_fec" id="ges-soli_soli_fec" disabled>
            <input class="caja caja_cinc" type="text" required placeholder="Nombre del solicitante" name="soli_serv_fk" id="ges-soli_serv_nom" disabled> 
            <input class="caja caja_cinc" type="text" required placeholder="Nombre del solicitante" name="soli_asu" id="ges-soli_soli_asu" disabled> 
            <textarea class="caja caja_diez" name="soli_des" id="ges-soli_soli_des" disabled></textarea> 
            <h4>Descripción de cotización</h4>
            <textarea rows="3" class="caja caja_diez" type="text" required placeholder="Descripcion de cotización" name="coti_des"></textarea> 
            <div>Seleccione el servicio que mas se ajuste a la solicitud:</div>          
            <div class="width-100-pto">
                <table id="tabla">
                    <tr class="fila-fija">
                        <td class="width-60-pto">
                            <select class="caja caja_diez" id="cdet_sdet_fk" onchange="seleccion(this)" required name="cdet_sdet_fk[]" >
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
                            <input class="caja caja_diez" type="text" required placeholder="Precio" name="cdet_pre[]">
                        </td>
                        <td class="width-20-pto">
                            <input class="caja caja_diez" type="text" required placeholder="% Dto. " name="cdet_dto[]">
                        </td>
                        <td class="eliminar"><button type="button" class="btn btn-cir-uno usua-col"><i class="fa fa-times"></i></button></td>
                    </tr>
                </table>
            </div>
            <button id="adicionar" type="button" class="boton"><i class="fas fa-plus"></i>  Adicionar</button>
            <label><b>Estado:</b> Creada
            	<input type="radio" name="coti_esta_fk" value="1" placeholder="Creada">
            	Enviada <input type="radio" name="coti_esta_fk" value="2" placeholder="Enviada">
            </label>  
            <textarea rows="3" class="caja caja_diez" type="text" required placeholder="Terminos y condiciones de cotización" name="coti_tyc"></textarea>
            <input type="hidden" value="<?php $fecha = strftime("%Y-%m-%d");echo "" . $fecha?>" name="coti_fec">
            <input type="hidden" name="coti_soli_fk" id="ges-soli_soli_id">
            <input type="hidden" name="crud" value="add-coti">
            <input class="boton boton_prin usuario_boton_uno" type="submit" name="responder-solicitud" value="Responder">
        </div>
    </form>
</div>
