<div class="contenedor_padding">
	<h3 class='titulo titulo_cuat'>Añadir tipo de ausencia</h3>
    <form method="POST">
        <div class="contenedor-flex cont-just-sbet form_uno">
            <input class="caja caja_seis" type="text" required placeholder="Nombre del tipo de ausencia" name="taus_nom" id="add-taus   _taus  _nom">
            <div class="caja_dos pos-rel-dos">
                <div class="cont-btn-color">
                    <div class="btn-color-tit">
                        Color
                    </div>
                    <div class="btn-color">
                        <input type="color" id="edi-taus_taus_col" value="#009EE2" name="taus_col">
                    </div>
                </div>
            </div>
            <input type="hidden" name="crud" value="add-taus">
            <input class="boton boton_prin usuario_boton_uno" type="submit" name="añadir" value="Añadir">
        </div>
    </form>
    <?php $type_absences  = new absenceController();
        $type_absences = $type_absences->sel_tipo();
        $num_type = empty($type_absences) ? 0 : count($type_absences);
        $datos_tipo = array(
            0  => 'taus_id'
        );
        $modal_t = new functionModel();
        $modal_t->view_modal("del-taus", $datos_tipo, "","Eliminar tipo de ausencia", "form-taus-del");
    ?>
    <table  id="tablaClient" class="display" >
        <thead>
            <tr>
                <th>#</th>
                <th style="width: 60% !important;" >Tipo</th>
                <th>Color</th>             
                <th style="width: 150px !important;" >Opcion</th>
            </tr>
        </thead>
        <tbody>
        <?php for ($n = 0; $n < $num_type; $n++) { ?>
            <tr>
                <td><?php echo $type_absences[$n]['taus_id'];  ?></td>
                <td style="width: 60% !important;" ><?php echo $type_absences[$n]['taus_nom'];  ?></td>
                <td>
                    <div style="height: 40px;width: 40px;border-radius: 50%;background: <?php echo $type_absences[$n]['taus_col'];  ?>;"></div>
                </td>
                <td>
                    <div class="cont-flex cont-just-saro">
                        <button class="btn btn-cir-uno usua-col" data-toggle="modal" data-target="#Modal-edi-sdet" data-sdet_id="47"  data-name="47" title="Modificar"><span class="fa fa-pencil-alt"></span></button>
                        <button class="btn btn-cir-uno usua-col" data-toggle="modal" data-target="#Modal-del-taus" data-taus_id="<?php echo $type_absences[$n]['taus_id'];  ?>" data-name="<?php echo $type_absences[$n]['taus_id'];  ?>" title="Eliminar"><span class="fa fa-trash"></span></button>
                    </div>
                </td>
            </tr>
        <?php  } ?>  
        </tbody>
    </table> 
                
</div>
