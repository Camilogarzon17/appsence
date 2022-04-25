<?php
if ($_POST['btn_contacto']) {
    $request_set = array(
        'sol_cod' => 0,
        'sol_nom' => $_POST['sol_nom'],
        'sol_ema' => $_POST['sol_ema'],
        'sol_cel' => $_POST['sol_cel'],
        'sol_ciu' => $_POST['sol_ciu'],
        'sol_emp' => $_POST['sol_emp'],
        'sol_asu' => $_POST['sol_asu'],
        'sol_men' => $_POST['sol_men'],
        'sol_tip' => $_POST['sol_tip'],
        'sol_fec' => strftime("%Y-%m-%d %H:%M:%S", time()),
    );
    $new_request = new requestController();
    $new_request->ins($request_set);
}
?>
<div class="contenedor_contacto">
    <input class="boton" type="radio" name="btn_contactar" id="vform_contacto">
    <label for="vform_contacto"> Contactar</label>
    <div class="contenedor_left">
        <!--<iframe style="width: 100%; border:0; height:103%;" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d31827.076195590707!2d-74.40182766164611!3d4.338704348173209!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8e3f04f7770f3b97%3A0x90b173ecbe09c570!2sFusagasug%C3%A1%2C+Cundinamarca!5e0!3m2!1ses!2sco!4v1494692238936"   frameborder="0"  allowfullscreen></iframe>
        <script src="https://maps.googleapis.com/maps/api/js?callback=myMap"></script>-->
    </div>
    <div class="contenedor_right">
        <div class="detalles_contacto">
            <div class="contacto_izqui">
               <ul>
                    <li class="icono_perfil">
                        <span class="fa fa-address-card" aria-hidden="true"></span>
                    </li>
                    <li>
                        <a class="link link_secu link_uno" href="mailto:info@develtec.net,develtec.web@gmail.com"  target="_blank"><span class="fa fa-envelope"></span> info@develtec.net</a>
                    </li>
                    <li>
                        <a class="link link_secu link_uno" href="tel:3138746366"  target="_blank"><span class="fa fa-phone"></span> 313 874 6366</a>
                    </li>
                    <li>
                        <span class="fa fa-map-marked-alt"></span> Fusagasugá / Bogotá D.C. - Colombia
                    </li>
                    <li>
                        <?php include 'view/include/redes-sociales.php';?>
                    </li>
                    <li>

                    </li>
                </ul>
            </div>
            <div class="contacto_derec">
                <div class="contacto_form">
                    <center><input class="boton" type="radio" name="btn_contactar" id="oform_contacto">
                        <label for="oform_contacto"><span class="fa fa-times-circle"></span></label></center>
                    <h2 class="titulo titulo_cuat">Mensaje</h2>
                    <form class="form-one" method="POST">
                        <input class="caja caja_ocho" type="text" name="soli_nom" placeholder="Nombre y Apellido *" required>
                        <input class="caja caja_ocho" type="email" name="soli_ema" placeholder="Correo *" id="email" required>
                        <input class="caja caja_ocho" type="number" name="soli_cel" placeholder="Telefono *" id="telefono" required>
                        <input class="caja caja_ocho" type="text" name="soli_ciu" placeholder="Ciudad y Pais*" required>
                        <input class="caja caja_ocho" type="text" name="soli_emp" placeholder="Empresa" >
                        <select class="caja caja_ocho" name="soli_serv_fk" required>
                            <option value="">Seleccione un servicio...</option>
                                <?php
                                $services      = new serviceController();
                                $services_data = $services->sel();
                                $num_services   = count($services_data);
                                for ($regist = 0; $regist < $num_services; $regist++) {
                                    echo '<option value="' . $services_data[$regist]['serv_id'] . '" >' . $services_data[$regist]['serv_tit'] . "</option>";
                                }
                                ?>
                        </select>
                        <input class="caja caja_ocho" type="text" placeholder="Asunto*" name="soli_asu" required>
                        <center><textarea class="caja caja_ocho" type="text" placeholder="Mensaje*" name="soli_men" id="mensaje" required></textarea></center>
                        <input type="hidden" name="envi-form" value="form-contact">
                        <input class="boton boton_secu" type="submit" name="btn_contacto" value="Enviar" id="enviar"/>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
