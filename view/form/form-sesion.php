<style>
    .frame {
        position: relative;
    }

    #methods {
        position: absolute;
        top: 19%;
        left: 83%;
        z-index: 10;
        opacity: 0;
    }
    #methods:hover {
        cursor: pointer;
    }
    #methods:checked ~ .fa-eye-slash {
        opacity: 0.5;
    }
    #methods:checked ~ .fa-eye {
        opacity: 0;
    }

    .frame i {
        position: absolute;
        top: 25%;
        left: calc(var(--width));
        font-size: 1.2rem;
    }

    .frame .fa-eye-slash {
        opacity: 0;
    }

    .frame .fa-eye {
        opacity: 0.5;
    }

</style>
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
    <div>
        <form name="form-login" method="POST" class="form-login cont-center">
            <h2>Iniciar sesión</h2>
            <div class="row">
                <div class="col-md-10">
                <input class="caja" id="correo" type="text" required placeholder="Usuario" name="email" autocomplete="none" id="email">
                </div>
                <div class="col-md-10">
                <input class="caja password" id="contra" type="password" required placeholder="Contraseña" name="password" id="password">
            <div class="text-danger" id="passwordmessage"></div>
                </div>
            </div>
            <input class="boton boton_prin usuario_boton_uno usuario_boton_uno" type="submit" name="ingresar" value="Ingresar"/><br>
        </form>
        <button class="link link_terc link_uno" data-toggle="modal" data-target="#Modal-pass-usua"  data-name="Recuperar contraseña" title="Eviar correo">¿Olvido su contraseña?</button>
    </div>
<?php } ?>
<script>

        //initPasswords();

    function initPasswords(custom_class = "") {
        $("input.password").each(function() {

            if ($(this).data("class"))
                custom_class = $(this).data("class");

            if (!$(this).parent().hasClass(`frame`)) {
                var width =  $(this).width();
                if ($(this).hasClass("caja_diez"))
                    width *= 0.97

                this.insertAdjacentHTML('afterend', `<div class="frame ${custom_class}"></div>`);
                var frame = $(this).next("div.frame");
                frame[0].appendChild(this);
                frame.append(`
            <label>
                <input type="checkbox" id="methods" />
                <i class="far fa-eye" style="--width: ${width}px;"></i>
                <i class="far fa-eye-slash" style="--width: ${width}px;"></i>
            </label>
            <br>
        `);
            }
        });

        $('div.frame #methods').click(function () {
            $(this).parent().parent().find('input.password').attr('type', $(this).is(':checked') ? 'text' : 'password');
        });

        $('.modal').on('shown.bs.modal', function () {
            $("div.frame").each(function () {
                var width = $(this).find('input.password').width();

                $(this).find("#methods").parent().find("i").attr("style",`--width: ${width}px;`)
            })
        });
    }
</script>