<style>
    .password-indicator__header-suffix {
        text-transform: uppercase;
    }

    .password-indicator__boxes {
        line-height: 24px;
        vertical-align: middle;
    }

    .password-indicator__box {
        display: inline-block;
        box-sizing: border-box;
        width: calc(18% - 3px);
        background-color: #8f8a8a;
        height: 8px;
    }

    .password-indicator__box + .password-indicator__box {
        margin-left: 4px;
    }

    .password-indicator--strength-1 .password-indicator__box:nth-child(1) {
        background-color: #ed5756;
    }

    .password-indicator--strength-2 .password-indicator__box:nth-child(-n+2) {
        background-color: #ed5756;
    }

    .password-indicator--strength-3 .password-indicator__box:nth-child(-n+3) {
        background-color: #f5d249;
    }

    .password-indicator--strength-4 .password-indicator__box:nth-child(-n+4) {
        background-color: #f5d249;
    }

    .password-indicator--strength-5 .password-indicator__box:nth-child(-n+5) {
        background-color: #75cb81;
    }

    .password-indicator--strength-5 .password-indicator__box {
        background-color: #75cb81;
    }

    .password-indicator__requirement {
        line-height: 24px;
        color: #8f8a8a;
    }

    .password-indicator__requirement.password-indicator__requirement--valid .password-indicator__requirement {
        color: #75cb81;
    }

    .password-indicator__requirement.password-indicator__requirement--valid {
        color: #75cb81;
    }

    .password-indicator__requirement svg {
        fill: currentColor;
        margin-right: 8px;
    }
</style>
<div class='contenedor_padding'>
    <h3 class='titulo titulo_cuat'>Cambio de contraseña</h3>
    <p>Recuerde que su contraseña debe ser totalmente personal, para evitar cualquier tipo de fraude.</p>
    <form method="POST" class="form-one">
        <div class="contenedor-flex cont-just-sbet form_uno">
            <input class="caja caja_diez password" type="password" required placeholder="Contraseña actual" name="contra-actual">
            <input class="caja caja_diez password" type="password" id="nPass1" required placeholder="Nueva contraseña"
                   name="contra-nueva1">
            <div class="caja_diez">
                <div class="popover-content"></div>
            </div>
            <input class="caja caja_diez  password" type="password" id="nPass2" required placeholder="Confirme contraseña"
                   name="contra-nueva2">
            <input type="hidden" name="r" value="ajustes">
            <input type="hidden" name="crud" value="pas">
            <input type="hidden" name="usua_pas" id="pas_usua_pas">
            <input type="hidden" name="usua_id" id="pas_usua_id">
            <span id="alert-one"></span><br><br>
            <input class="boton boton_prin usuario_boton_uno" type="submit" name="cambiar" id="cambiar" value="Cambiar">
        </div>
    </form>
</div>

<script>
    (function (exports) {
        function PasswordStrengthValidator() {
            function createReturnValue(strength, met, isEmpty = false) {
                var strengthNames = ['Muy Debil', "Debil", 'Media', 'Fuerte', 'Muy Fuerte']
                return {
                    text: isEmpty ? '' : strengthNames[strength - 1],
                    strength: strength,
                    requirements: [
                        {
                            text: 'Usar por lo menos 12 caracteres',
                            isMet: met.isLongEnough
                        },
                        {
                            text: 'Usa al menos 1 número',
                            isMet: met.hasNumberCharacter
                        },
                        {
                            text: 'Usa al menos 1 mayúscula',
                            isMet: met.hasUpperCaseCharacter
                        },
                        {
                            text: 'Usa al menos 1 minuscula',
                            isMet: met.hasLowerCaseCharacter
                        },
                        {
                            text: 'Usa al menos 1 carácter especial',
                            isMet: met.hasSpecialCharacter
                        }
                    ]
                };
            }

            this.validate = function (input) {
                var minLength = 12
                var strength = 0;

                var lowerCaseRegexp = /[a-z]+/;
                var upperCaseRegexp = /[A-Z]+/;
                var numbersRegexp = /[0-9]+/;

                var isEmpty = !input || input.length === 0

                var met = {
                    isLongEnough: false,
                    hasSpecialCharacter: false,
                    hasLowerCaseCharacter: false,
                    hasUpperCaseCharacter: false,
                    hasNumberCharacter: false,
                }

                if (isEmpty) {
                    return createReturnValue(strength, met, isEmpty);
                }

                met.hasSpecialCharacter = input.replace(upperCaseRegexp, "").replace(lowerCaseRegexp, "").replace(numbersRegexp, "").trim().length > 0
                met.hasLowerCaseCharacter = lowerCaseRegexp.test(input)
                met.hasUpperCaseCharacter = upperCaseRegexp.test(input)
                met.hasNumberCharacter = numbersRegexp.test(input)
                met.isLongEnough = input.length >= minLength

                Object.entries(met).forEach(([key, value]) => {
                    if (value)
                        strength++;
                });

                return createReturnValue(strength, met);
            }
        }

        exports.PasswordStrengthValidator = PasswordStrengthValidator;
    })(window);

    (function (exports) {
        function getCheckmarkSvg() {
            return '<svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="13" height="10" viewBox="0 0 13 10" style="enable-background:new 0 0 13 10;" xml:space="preserve"><path d="M12.942,1.187l-0.391-0.411V0.775l-0.267-0.281l-0.412-0.433c-0.077-0.081-0.202-0.081-0.279,0l-0.434,0.456L4.802,7.201L1.453,3.68c-0.077-0.081-0.202-0.081-0.279,0L0.058,4.853c-0.077,0.081-0.077,0.213,0,0.293l4.558,4.793c0.077,0.081,0.202,0.081,0.279,0l7.634-8.026h0.002l0.412-0.433C13.019,1.399,13.019,1.267,12.942,1.187z"/></svg>';
        }

        function getBox() {
            return $('<div />').addClass('password-indicator__box');
        }

        function PasswordStrengthPopover(options) {
            this.options = options;

            this.render = function (validity) {
                if (validity.strength != 5)
                    $('#cambiar').attr("style","display: none");
                else
                    $('#cambiar').attr("style","");

                var passwordIndicator = $('<div />')
                    .addClass('password-indicator')
                    .addClass('password-indicator--strength-' + validity.strength)

                var header = $('<div />')
                    .addClass('password-indicator__header')
                    .text('Seguridad de la contraseña: ');

                var headerSuffix = $('<span />')
                    .addClass('password-indicator__header-suffix')
                    .text(validity.text);

                header.append(headerSuffix);

                var boxes = $('<div />')
                    .addClass('password-indicator__boxes')
                    .append(getBox)
                    .append(getBox)
                    .append(getBox)
                    .append(getBox)
                    .append(getBox);

                var requirements = $('<div />')
                    .addClass('password-indicator__requirements')

                $(validity.requirements).each(function () {
                    var requirement = $('<div />')
                        .addClass('password-indicator__requirement')
                        .toggleClass('password-indicator__requirement--valid', this.isMet)
                        .append(getCheckmarkSvg())
                        .append($('<span>').text(this.text));

                    requirements.append(requirement);
                })

                passwordIndicator
                    .append(header)
                    .append(boxes)
                    .append(requirements)

                $(options.mount)
                    .empty()
                    .append(passwordIndicator);
            }
        }

        exports.PasswordStrengthPopover = PasswordStrengthPopover;
    })(window);

    var validator = new PasswordStrengthValidator();
    var popover = new PasswordStrengthPopover({mount: '.popover-content'});

    function render(password) {
        popover.render(validator.validate(password));
    }

    render();
    $('#nPass1').keyup(function (e) {
        render(e.target.value);
    });
</script>