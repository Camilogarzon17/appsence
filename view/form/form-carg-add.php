<div class="contenedor_padding">
	<h3 class='titulo titulo_cuat' id='modaltitle'>Añadir cargo</h3>
    <form method="POST">
        <div class="contenedor-flex cont-just-sbet form_uno">
            <select class="caja caja_cuat" required name="care_area_fk" id="add_care_area_fk" >
                <option>Seleccione el area/departamento</option>
                <?php
                $area      = new userController();
                $area_data = $area->sel_area();
                $num_empr    = count($area_data);
                for ($x = 0; $x < $num_empr; $x++) {
                    echo '<option value="' . $area_data[$x]['area_id'] . '" >' . $area_data[$x]['area_nom'] . "</option>";
                }
                ?>
            </select>
            <input class="caja caja_cuat" type="text" required placeholder="Nombre del cargo" name="care_nom" id="add-care_care_nom">
            <input type="hidden" name="crud" value="add-carg">
            <input class="boton boton_prin usuario_boton_uno" type="submit" name="añadir" value="Añadir">
        </div>
    </form>
    <?php $cargo_area  = new userController();
        $cargo_area = $cargo_area->sel_cargo();
        $num_type = empty($cargo_area) ? 0 : count($cargo_area);
        $datos_carg = array(
            0  => 'care_id'
        );
        $modal_t = new functionModel();
        $modal_t->view_modal("del-carg", $datos_carg, "","Eliminar cargo", "form-carg-del");
    ?>
    <table  id="tablaClient" class="display" >
        <thead>
            <tr>
                <th>#</th>
                <th style="width: 45% !important;" >Area</th>
                <th style="width: 30% !important;">Nombre</th>             
                <th style="width: 150px !important;" >Opción</th>
            </tr>
        </thead>
        <tbody>
        <?php for ($n = 0; $n < $num_type; $n++) { ?>
            <tr>
                <td><?php echo $cargo_area[$n]['care_id'];  ?></td>
                <td style="width: 45% !important;"><?php echo $cargo_area[$n]['area_nom'];  ?></td>
                <td style="width: 30% !important;"><?php echo $cargo_area[$n]['care_nom'];  ?></td>
                <td>
                    <div class="cont-flex cont-just-saro">
                        <button class="btn btn-cir-uno usua-col" data-toggle="modal" data-target="#Modal-edi-sdet" data-sdet_id="47"  data-name="47" title="Modificar"><span class="fa fa-pencil-alt"></span></button>
                        <button class="btn btn-cir-uno usua-col" data-toggle="modal" data-target="#Modal-del-carg" data-care_id="<?php echo $cargo_area[$n]['care_id'];  ?>" data-name="<?php echo $cargo_area[$n]['care_id'];  ?>" title="Eliminar"><span class="fa fa-trash"></span></button>
                    </div>
                </td>
            </tr>
        <?php  } ?>  
        </tbody>
    </table> 
                
</div>
