<?php
$facture_data = $factures->clientFacture($_GET['cod']);
$fact_cod     = $facture_data[0]['fact_cod'];
$fact_cli_id  = $facture_data[0]['fact_cli_id'];
$fact_cli_emp = $facture_data[0]['cli_emp'];
$fact_ser_id  = $facture_data[0]['fact_ser_id'];
$fact_ser_nom = $facture_data[0]['serv_nom'];
$fact_tit     = $facture_data[0]['fact_tit'];
$fact_nom     = $facture_data[0]['fact_nom'];
$fact_des     = $facture_data[0]['fact_des'];
$fact_fec     = $facture_data[0]['fact_fec'];
$fact_fin     = $facture_data[0]['fact_fin'];
$fact_pre     = $facture_data[0]['fact_pre'];
$fact_dto     = $facture_data[0]['fact_dto'];

?>
<div class='focus-modal'>
    <div class='container-form width-40-pto bgd-gris-uno'>
        <div class="contenedor_padding">
            <h3 class="titulo titulo_cuat usuario_titulo">Modificar factura </h3>
            <form method="post" class="form_Rusu" action="pros/fact_modificar.php?fact_cod=<?php echo $fact_cod ?>" enctype="multipart/form-data" >
                <div class="contenedor-flex cont-just-sbet form_uno">
                    <select class="caja caja_cinc" required name="fact_cliente" >
                        <option value="<?php echo $fact_cli_id ?>"><?php echo $fact_cli_emp ?></option>
                                <?php
$consulUsers = "SELECT * FROM tbl_cliente;";
$resultUsers = $conexion->query($consulUsers);
while ($extraidoClient = $resultUsers->fetch_assoc()) {?>
                                    <option value="<?php echo $extraidoClient['cli_id'] ?>"><?php echo $extraidoClient['cli_emp'] ?></option>
                                <?php }?>
                            </select>
                            <label class="fecha_factura"><b>N° <?php echo $fact_cod ?> | Fecha: <?php echo $fact_fec ?></b></label>
                            <input type="hidden" value="<?php echo $fact_fec ?>" name="fact_fecha">
                            <input type="hidden" value="<?php echo $fact_cod ?>" name="fact_codigo">
                            <input class="caja caja_diez" type="text" value="<?php echo $fact_tit ?>" required placeholder="Titulo de factura" name="fact_nombre">
                            <input class="caja caja_cinc" type="text" value="<?php echo $fact_nom ?>" required placeholder="Nombre de quien recibe" name="fact_nombre">
                            <label class="caja_cinc">Fec. inicio: <input class="caja caja_seis" type="date" required placeholder="Fecha de inicio" value="<?php echo $fact_fin ?>" name="fact_finicio"></label>
                            <select class="caja caja_diez" required name="fact_servicio" >
                                <option value="<?php echo $fact_ser_id ?>"><?php echo $fact_ser_nom ?></option>
                                <?php
$consulUsers = "SELECT * FROM tbl_servicios;";
$resultUsers = $conexion->query($consulUsers);
while ($extraidoServ = $resultUsers->fetch_assoc()) {?>
                                    <option value="<?php echo $extraidoServ['serv_id'] ?>"><?php echo $extraidoServ['serv_nom'] ?></option>
                                <?php }?>
                    </select>
                    <textarea style="height: 200px;" class="caja caja_diez" type="text" required placeholder="Descripcion del trabajo realizado" name="fact_descripcion"><?php echo $fact_des ?></textarea>
                    <input class="caja caja_cinc" type="text" value="<?php echo $fact_pre ?>" required placeholder="Precio del servicio" name="fact_precio">
                    <input class="caja caja_cinc" type="text" value="<?php echo $fact_dto ?>" required placeholder="Porcentaje de descuento" name="fact_descuento">
                    <input class="boton boton_prin usuario_boton_uno" type="submit" name="modificar" value="Modificar">
                </div>
            </form>
        </div>
    </div>
</div>