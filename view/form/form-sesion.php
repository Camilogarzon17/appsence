<?php if (isset($_SESSION['usua_id'])) { 
    $requests   = new requestController();
    $solicitudes = $requests->num_request();?>
<div class="form-sesion">
    <?php
    echo "
    <div class='contenedor-flex cont-just-sbet menu-secundario'>
        <a  href='ajustes'><span class='fa fa-cogs'></span><div class='item-text'>Ajustes de perfil</div></a>
        <!--<a href='solicitudes'><span class='fas fa-mail-bulk'></span><div class='item-text'>Solicitudes de servicio <div class='soli-num'>".$solicitudes."</div></div></a>
        <a href='publicaciones'><span class='fa fa-newspaper'></span><div class='item-text'>Administrar publicaciones</div></a>
        <a href='visitas-web'><span class='fa fa-globe-americas'></span><div class='item-text'>Registro de visitas web</div></a>-->
        <a href='cerrar-sesion'><span title='Cerrar Sesión' class='fa fa-power-off'></span>  Cerrar sesión</a>
    </div>";?>
</div>

<?php }else{?>
    <form name="form-login" method="POST" class="form-login cont-center">
        <h2>Iniciar sesión</h2>
        <input class="caja caja_diez" id="correo" type="text" required placeholder="Usuario" name="email" autocomplete="none" id="email">
        <input class="caja caja_diez" id="contra" type="password" required placeholder="Contraseña" name="password" id="password"><br>
        
                                
        <div class="text-danger" id="passwordmessage"></div>    
        <input class="boton boton_prin usuario_boton_uno usuario_boton_uno" type="submit" name="ingresar" value="Ingresar"/><br>     
    </form>
    <button class="link link_terc link_uno" data-toggle="modal" data-target="#Modal-pass-usua"  data-name="Recuperar contraseña" title="Eviar correo">¿Olvido su contraseña?</button>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/zxcvbn/4.4.2/zxcvbn.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/js-sha1/0.6.0/sha1.min.js"></script>
    <script>
            setupPasswordMeter('contra');              
        </script>
<?php } ?>