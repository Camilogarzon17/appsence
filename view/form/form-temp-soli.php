<?php 
$function     = new functionModel();
$date      = $function->dateText("","","","","no");
$user      = new userController();
$user_data = $user->sel($idUser);
$usua_id    = $user_data[0]['usua_id'];
$usua_nom   = $user_data[0]['usua_nom'];
$usua_ced   = $user_data[0]['usua_nid'];
$usua_ema   = $user_data[0]['usua_ema'];
$usua_pro   = $user_data[0]['usua_pro'];
$usua_pai   = $user_data[0]['usua_pai'];
$usua_ciu   = $user_data[0]['usua_ciu'];
$usua_cel   = $user_data[0]['usua_cel'];
$usua_col   = $function->color_rgb($user_data[0]['usua_col']);
$usua_url   = $user_data[0]['usua_ipe'];
$usua_por   = $user_data[0]['usua_ipo'];
 ?>
<div id=":ps" class="Ar Au" style="display: block; width: 100%; color: white;">
    <div id=":l0" class="Am Al editable Xp0HJf-LW-avf" hidefocus="true" aria-label="Firma" g_editable="true" role="textbox" aria-multiline="true" contenteditable="true" style="direction: ltr;">
        <div class="gmail_signature" data-smartmail="gmail_signature">
            <div dir="ltr">
                <style type="text/css" media="screen">
                    @import url('https://fonts.googleapis.com/css?family=Raleway');
                </style>
                <head>
                    <meta name="viewport" content="width=device-width, user=scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0" />
                </head>
                <div style="width: 100%;max-width: 600px; border-radius: 10px; overflow: hidden; margin: auto;box-shadow: 0px 0px 2px rgba(0,0,0, 0.2);background-color:#fff;">
                    <div style="box-shadow: 0px 0px 2px rgba(0,0,0, 0.2);width:100%;padding:0px;margin:auto;font-family: 'Raleway', sans-serif;color:white;font-size:14px;background-image: url('<?php if ($usua_por != ""): echo $usua_por;else:echo "public/contenido/arm-1867759_1920.jpg";endif;?>');background-repeat: no-repeat; background-position: center; background-size: cover; "><!--Encabezado background: linear-gradient(-70deg, transparent 0, transparent 20%,rgba(<?php echo $usua_col; ?>,0.8) 0, rgba(<?php echo $usua_col; ?>,0.8));-->
                        <div style="background: rgba(<?php echo $usua_col; ?>,0.7);box-sizing: border-box;">
                            <div style="color: white;">
                                <div style="width: 100%;box-sizing: border-box; padding: 15px;">
                                    <div style="text-align:center; width: 100%;">
                                        <img src="https://develtec.net/img/logo/develtec_icono-w.png" style="width: 100px;height:100px;" alt=""><br>
                                        <strong style="font-size:24px;">DEVELTEC</strong><br/>
                                        <p style="margin: 0px">Professional Development of Computer Technologies</p>
                                         <div style="display: flex;flex-wrap: wrap;justify-content:space-around;width: 100%;">
                                            <div style="display: flex;">
                                                <a href="https://www.youtube.com/channel/UCXkV1ePYlIJ6hdCr1b0RKaw" style="padding:0px;margin:0px;display:block;" target="_blank"><img src="https://develtec.net/img/iconos/png/youtube_white.png" width="28" style="padding:0px;margin:0px;border-radius:50%"></a>&nbsp;
                                            <a href="https://www.facebook.com/develtec.web/" style="padding:0px;margin:0px;display:block;" target="_blank"><img src="https://develtec.net/img/iconos/png/facebook_white.png" width="28" style="padding:0px;margin:0px;border-radius:50%"></a>&nbsp;
                                            <a href="https://twitter.com/Develtec_net" style="padding:0px;margin:0px;display:block;" target="_blank"><img src="https://develtec.net/img/iconos/png/twitter_white.png" width="28" style="padding:0px;margin:0px;border-radius:50%"></a>&nbsp;
                                            <a href="https://www.instagram.com/develtec/" style="padding:0px;margin:0px;display:block;" target="_blank"><img src="https://develtec.net/img/iconos/png/instagram-w.png" width="28" style="padding:0px;margin:0px;border-radius:50%"></a>&nbsp;
                                            <a href="https://api.whatsapp.com/send?phone=57<?php echo $usua_cel ?>text=Bienvenido%20a%20nuestro%20chat%20DEVELTEC,%20%C2%BFEn%20que%20te%20podemos%20ayudar?" style="padding:0px;margin:0px" target="_blank"><img src="https://develtec.net/img/iconos/png/whatsapp_white.png" width="28" style="padding:0px;margin:0px;border-radius:50%"></a>
                                            </div>
                                        </div>
                                        <a href="https://develtec.net/" style="box-sizing: border-box; padding: 0px;display:block;width:100%;margin:0px;text-align: center;color:white; text-decoration: none;" target="_blank">www.develtec.net</a>
                                        <h1 id="cot-titulo">Cotización de servicios</h1>
                                    </div>
                                    <div style="box-sizing: border-box; width: 100%;display: flex;flex-wrap: wrap;justify-content: space-between;align-items: center;">
                                        <div>Fusagasugá, Colombia.</div><strong id="cot-fecha"><?php echo $date; ?></strong>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="cot-contenido">
                        <div  style="width:100%;margin:auto;box-sizing: border-box; padding: 15px;color:#000;background-color: white;">
                            <p>Yo, <b><?php echo $usua_nom ?></b>, Ingeniero analista, diseñador y desarrollador de software, de Develtec,
                            identificado con C.C. No. 1069756463, manifiesto que el Señor <b>Manuel José Obando</b>, me debe <b>$200.000</b>,
                                de acuerdo con la solitud de actualización del sistema de iglesias cristiana 01800iglesia.org correspondiente
                                al mes comprendido entre el día 1 de julio y 31 de julio del presente año, llevando a cabo las modificaciones
                                solicitadas que se muestran en la siguiente tabla:</p>
                        </div>
                        <div style="width:100%;margin:auto;box-sizing: border-box; padding: 5px 15px;color:#000;background-color: white;">
                            <table style="width:100%;margin:auto; border: 1px solid rgba(0,0,0, 0.1);background-color: white;box-shadow: 0px 1px 2px rgba(0,0,0, 0.2); border-spacing: 0px">
                                <thead style="background-color: rgb(<?php echo $usua_col; ?>);color: white;">
                                    <tr>
                                        <th style="box-sizing: border-box; padding: 5px;">Actividad</th>
                                        <th style="box-sizing: border-box; padding: 5px;">Estado</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td style="box-sizing: border-box; padding: 5px;border-right: 1px solid rgba(0,0,0, 0.1);border-bottom: 1px solid rgba(0,0,0, 0.1);width: 85%;">
                                            Actualización de diseño página principal (index.php).
                                        </td>
                                        <td style="box-sizing: border-box; padding: 5px;border-right: 1px solid rgba(0,0,0, 0.1);border-bottom: 1px solid rgba(0,0,0, 0.1);width: 15%;">
                                            Terminado
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="box-sizing: border-box; padding: 5px;border-right: 1px solid rgba(0,0,0, 0.1);border-bottom: 1px solid rgba(0,0,0, 0.1);width: 85%;">
                                        Corrección y actualización de paginador.
                                        </td>
                                        <td style="box-sizing: border-box; padding: 5px;border-right: 1px solid rgba(0,0,0, 0.1);border-bottom: 1px solid rgba(0,0,0, 0.1);width: 15%;">
                                            Terminado
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="box-sizing: border-box; padding: 5px;border-right: 1px solid rgba(0,0,0, 0.1);border-bottom: 1px solid rgba(0,0,0, 0.1);width: 85%;">
                                        Actualización y corrección responsive del seguidor de pasos de búsqueda de iglesia.
                                        </td>
                                        <td style="box-sizing: border-box; padding: 5px;border-right: 1px solid rgba(0,0,0, 0.1);border-bottom: 1px solid rgba(0,0,0, 0.1);width: 15%;">
                                            Terminado
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="box-sizing: border-box; padding: 5px;border-right: 1px solid rgba(0,0,0, 0.1);border-bottom: 1px solid rgba(0,0,0, 0.1);width: 85%;">
                                        Actualización de diseño de contenido por cada paso de búsqueda iglesia.
                                        </td>
                                        <td style="box-sizing: border-box; padding: 5px;border-right: 1px solid rgba(0,0,0, 0.1);border-bottom: 1px solid rgba(0,0,0, 0.1);width: 15%;">
                                            Terminado
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="box-sizing: border-box; padding: 5px;border-right: 1px solid rgba(0,0,0, 0.1);border-bottom: 1px solid rgba(0,0,0, 0.1);width: 85%;">
                                        Actualización de mapa mundial, adaptable a dispositivos móviles.
                                        </td>
                                        <td style="box-sizing: border-box; padding: 5px;border-right: 1px solid rgba(0,0,0, 0.1);border-bottom: 1px solid rgba(0,0,0, 0.1);width: 15%;">
                                            Terminado
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="box-sizing: border-box; padding: 5px;border-right: 1px solid rgba(0,0,0, 0.1);border-bottom: 1px solid rgba(0,0,0, 0.1);width: 85%;">
                                        Corrección de redes sociales y links del pie de pagina.
                                        </td>
                                        <td style="box-sizing: border-box; padding: 5px;border-right: 1px solid rgba(0,0,0, 0.1);border-bottom: 1px solid rgba(0,0,0, 0.1);width: 15%;">
                                            Terminado
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="box-sizing: border-box; padding: 5px;border-right: 1px solid rgba(0,0,0, 0.1);border-bottom: 1px solid rgba(0,0,0, 0.1);width: 85%;">
                                        Actualización de diseño banner de publicidad (Comunidades de iglesias).
                                        </td>
                                        <td style="box-sizing: border-box; padding: 5px;border-right: 1px solid rgba(0,0,0, 0.1);border-bottom: 1px solid rgba(0,0,0, 0.1);width: 15%;">
                                            Terminado
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="box-sizing: border-box; padding: 5px;border-right: 1px solid rgba(0,0,0, 0.1);border-bottom: 1px solid rgba(0,0,0, 0.1);width: 85%;">
                                        Actualización de diseño login de acceso al panel de administración principal.
                                        </td>
                                        <td style="box-sizing: border-box; padding: 5px;border-right: 1px solid rgba(0,0,0, 0.1);border-bottom: 1px solid rgba(0,0,0, 0.1);width: 15%;">
                                            Terminado
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="box-sizing: border-box; padding: 5px;border-right: 1px solid rgba(0,0,0, 0.1);border-bottom: 1px solid rgba(0,0,0, 0.1);width: 85%;">
                                            Actualización de diseño y responsive del panel de administración principal:
                                            <ul style="padding-left: 50px;">
                                                <li>Menú de opciones principal, adaptable a dispositivos móviles (efecto animado).</li>
                                                <li>Formulario de búsqueda adaptado a móviles (efecto animado).</li>
                                            </ul>
                                        </td>
                                        <td style="box-sizing: border-box; padding: 5px;border-right: 1px solid rgba(0,0,0, 0.1);border-bottom: 1px solid rgba(0,0,0, 0.1);width: 15%;">
                                            Terminado
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="box-sizing: border-box; padding: 5px;border-right: 1px solid rgba(0,0,0, 0.1);border-bottom: 1px solid rgba(0,0,0, 0.1);width: 85%;">
                                        Actualización de contenido principal del panel de administración (Videos de bienvenida).
                                        </td>
                                        <td style="box-sizing: border-box; padding: 5px;border-right: 1px solid rgba(0,0,0, 0.1);border-bottom: 1px solid rgba(0,0,0, 0.1);width: 15%;">
                                            Terminado
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="box-sizing: border-box; padding: 5px;border-right: 1px solid rgba(0,0,0, 0.1);border-bottom: 1px solid rgba(0,0,0, 0.1);width: 85%;">
                                        Vectorización de logotipo corporativo “01-800 iglesia”.
                                        </td>
                                        <td style="box-sizing: border-box; padding: 5px;border-right: 1px solid rgba(0,0,0, 0.1);border-bottom: 1px solid rgba(0,0,0, 0.1);width: 15%;">
                                            Terminado
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="box-sizing: border-box; padding: 5px;border-right: 1px solid rgba(0,0,0, 0.1);border-bottom: 1px solid rgba(0,0,0, 0.1);width: 85%;">
                                        Actualización de botones (todo el sistema 01800iglesia).
                                        </td>
                                        <td style="box-sizing: border-box; padding: 5px;border-right: 1px solid rgba(0,0,0, 0.1);border-bottom: 1px solid rgba(0,0,0, 0.1);width: 15%;">
                                            Terminado
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div style="background-color:#fff;width:100%;margin:auto;box-sizing: border-box; padding:5px 15px; text-align: center;color:#000;">
                        <strong>“Nuestra ilusión y la razón por la cual existimos es la de servir a nuestros clientes con el mayor agrado posible”</strong>
                    </div>
                    <div style="background-color:#fff;width:100%;margin:auto;box-sizing: border-box; padding: 5px 15px; text-align: left;color:#000;">
                        Atentamente:<br/><strong>Develtec</strong><br>Professional Development of Computer Technologies<br>info@develtec.net
                    </div><br>
                    <div style="width:100%;margin:auto;box-sizing: border-box; padding: 15px;color: rgb(<?php echo $usua_col; ?>);text-align:center;">
                        <h1>Más servicios</h1>
                    </div>
                    <div style="background-color:#fff;width:100%;margin:auto;box-sizing: border-box; padding: 15px; display: flex; flex-wrap: wrap; justify-content: center;">
                        <a href="http://develtec.net/desarrollo-y-mantenimiento-de-paginas-web" title="Diseño web" style="display: block;width:25%; text-decoration: none; min-width: 180px;">
                            <div style="box-sizing: border-box;margin: auto;width: 80px; height:80px; padding: 15px; border-radius: 50%;text-align:center;background-color:rgb(<?php echo $usua_col; ?>);">
                                <img src="https://develtec.net/img/iconos/png/001-codificacion.png" style="width: 50px;height:50px;" alt="Servicio">
                            </div>
                            <div style="text-align: center;width:100%; box-sizing: border-box; padding: 10px 5px;">
                                <h4 style="color:rgb(<?php echo $usua_col; ?>);">DISEÑO WEB</h4>
                                <p style="color:black;">Creación de páginas web fáciles de actualizar y adaptables a cualquier dispositivo.</p>
                            </div>
                        </a>
                        <a href="http://develtec.net/desarrollo-y-mantenimiento-de-software" title="Diseño web" style="display: block;width:25%; text-decoration: none;min-width: 180px;">
                            <div style="box-sizing: border-box;margin: auto;width: 80px; height:80px; padding: 15px; border-radius: 50%;text-align:center;background-color:rgb(<?php echo $usua_col; ?>);">
                                <img src="https://develtec.net/img/iconos/png/006-api.png" style="width: 50px;height:50px;" alt="Servicio">
                            </div>
                            <div style="text-align: center;width:100%;box-sizing: border-box; padding: 10px 5px;">
                                <h4 style="color:rgb(<?php echo $usua_col; ?>);">DESARROLLO DE SOFTWARE</h4>
                                <p style="color:black;">Desarrolló de sistemas informáticos (WEB & DESK).</p>
                            </div>
                        </a>
                        <a href="http://develtec.net/asesoria-y-mantenimiento-de-equipos" style="display: block;width:25%; text-decoration: none;min-width: 180px;">
                            <div style="box-sizing: border-box;margin: auto;width: 80px; height:80px; padding: 15px; border-radius: 50%;text-align:center;background-color:rgb(<?php echo $usua_col; ?>);">
                                <img src="https://develtec.net/img/iconos/png/005-navegador.png" style="width: 50px;height:50px;" alt="Servicio">
                            </div>
                            <div style="text-align: center;width:100%;box-sizing: border-box; padding: 10px 5px;">
                                <h4 style="color:rgb(<?php echo $usua_col; ?>);">SOPORTE TECNICO</h4>
                                <p style="color:black;">Mantenimiento de computadores, hadware y software.</p>
                            </div>
                        </a>
                        <a href="http://develtec.net/diseno-de-publicidad-grafica" title="Diseño web" style="display: block;width:25%; text-decoration: none;min-width: 180px;">
                            <div style="box-sizing: border-box;margin: auto;width: 80px; height:80px; padding: 15px; border-radius: 50%;text-align:center;background-color:rgb(<?php echo $usua_col; ?>);">
                                <img src="https://develtec.net/img/iconos/png/004-instrumentos.png" style="width: 50px;height:50px;" alt="Servicio">
                            </div>
                            <div style="text-align: center;width:100%;box-sizing: border-box; padding: 10px 5px;">
                                <h4 style="color:rgb(<?php echo $usua_col; ?>);">DISEÑO DE PUBLICIDAD</h4>
                                <p style="color:black;">Diseñamos todo tipo de publicidad grafica, para su empresa o negocio.</p>
                            </div>
                        </a>
                    </div>
                    <div style="width:100%;margin:auto;background-color:#fff;">
                        <div style="width: auto; box-sizing: border-box;margin: auto; padding: 0px; text-align: center;">
                            <a href="https://www.youtube.com/channel/UCXkV1ePYlIJ6hdCr1b0RKaw" style="display: inline-flex;border-radius:50%; background-color: rgb(<?php echo $usua_col; ?>); width: 30px; height: 30px; box-sizing: border-box; padding: 5px;margin:0px; text-align: center;" target="_blank">
                                <img src="https://develtec.net/img/iconos/png/003-youtube.png" style="padding:0px;margin:0px;width: 20px; height:20px;">
                            </a>&nbsp;
                            <a href="https://www.facebook.com/develtec.web/" style="display: inline-flex;border-radius:50%; background-color: rgb(<?php echo $usua_col; ?>); width: 30px; height: 30px; box-sizing: border-box; padding: 5px;margin:0px; text-align: center;" target="_blank">
                                <img src="https://develtec.net/img/iconos/png/001-facebook-logo.png" style="padding:0px;margin:0px;width: 20px; height:20px;"></a>&nbsp;
                            <a href="https://twitter.com/Develtec_net" style="display: inline-flex;border-radius:50%; background-color: rgb(<?php echo $usua_col; ?>); width: 30px; height: 30px; box-sizing: border-box; padding: 5px;margin:0px; text-align: center;" target="_blank">
                                <img src="https://develtec.net/img/iconos/png/004-simbolo-de-twitter.png" style="padding:0px;margin:0px;width: 20px; height:20px;"></a>&nbsp;
                            <a href="https://www.instagram.com/develtec/" style="display: inline-flex;border-radius:50%; background-color: rgb(<?php echo $usua_col; ?>); width: 30px; height: 30px; box-sizing: border-box; padding: 5px;margin:0px; text-align: center;" target="_blank">
                                <img src="https://develtec.net/img/iconos/png/002-instagram.png" style="padding:0px;margin:0px;width: 20px; height:20px;"></a>&nbsp;
                            <a href="https://api.whatsapp.com/send?phone=57<?php echo $usua_cel ?>&amp;text=Bienvenido%20a%20nuestro%20chat%20DEVELTEC,%20%C2%BFEn%20que%20te%20podemos%20ayudar?" style="display: inline-flex;border-radius:50%; background-color: rgb(<?php echo $usua_col; ?>); width: 30px; height: 30px; box-sizing: border-box; padding: 5px;margin:0px; text-align: center;" target="_blank">
                                <img src="https://develtec.net/img/iconos/png/005-whatsapp-logo.png" style="padding:0px;margin:0px;width: 20px; height:20px;" >
                            </a><br>
                            <a href="https://develtec.net/" style="box-sizing: border-box; padding: 0px;padding:0px 5px 0px 0px;margin:0px;color: rgb(<?php echo $usua_col; ?>); text-decoration: none;" target="_blank"><span style="margin:0px"></span>www.develtec.net</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="contenedor_padding">
    <h5 class='titulo titulo_cuat usuario_titulo'>Opciones de cotización</h5>
    <p>Luego de realizar las modificaciones necesarias a la anterios cotización, podra enviar o guardar el documento, adicionando la siguiente información.</p><br>
</div>
 <div class="contenedor-flex cont-just-sbet cont-ocho cont-center form_uno">
                        <input class="caja caja_cinc caja-border" type="email" required placeholder="Correo" id="cot-correo">
                        <select class="caja caja_cinc caja-border" id="cot-servicio">
                            <option value="0">Seleccione un servicio</option>
                        </select>
                    </div>
                    <div id="textarea"></div>
                    <center>
                        <button id="btn-guardar" class="boton boton_prin usuario_boton_uno" onclick="guardar_cotizacion();">Guardar</button>
                        <button id="btn-guardar" class="boton boton_prin usuario_boton_uno" onclick="guardar_enviar_cotizacion();">Guardar y enviar</button>
                    </center>