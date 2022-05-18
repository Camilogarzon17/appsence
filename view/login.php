<style type="text/css" media="screen">
	.cont-pre-loader{
		width: 100vw !important;
	}    
</style>
<script>
            var passwordTypingTimer;         
            var passwordDoneTypingInterval = 400;
            // $('#myModal').modal('show')
            var passwordHelp = '<br>Try:<ul><li>Adding Special Symbols\n<li>Increasing the Length<li>Using Different case Letters<li>Numbers<li><a onclick="$(\'#breachInfo\').modal(\'show\')" href="#">About password breach data</a></ul>'

            var passwordScore = 0;
            function setupPasswordMeter(elemId) {
                $(document).ready(function() {
                $('#' + elemId).keyup(function(evt) {
                    var result  = zxcvbn(evt.target.value)
                    var score   = result.score
                    var message = result.feedback.warning || 'The password is weak';

                    if (score < 4) {
                        message += passwordHelp
                    } else {
                        message = '<span class="text-success">Strong password 💪</span>'
                    }
                    $('#passwordmessage').html(message);
                    
                    var $bar = $('#strengthBar');
                    passwordScore = score;
                    switch (score) {
                        case 0:
                            $bar.attr('class', 'progress-bar bg-danger')
                                .css('width', '1%');
                            break;
                        case 1:
                            $bar.attr('class', 'progress-bar bg-danger')
                                .css('width', '25%');
                            break;
                        case 2:
                            $bar.attr('class', 'progress-bar bg-danger')
                                .css('width', '50%');
                            break;
                        case 3:
                            $bar.attr('class', 'progress-bar bg-warning')
                                .css('width', '75%');
                            break;
                        case 4:
                            $bar.attr('class', 'progress-bar bg-success')
                                .css('width', '100%');
                            break;
                    }

                    clearTimeout(passwordTypingTimer);
                    passwordTypingTimer = setTimeout(passwordDoneTyping, passwordDoneTypingInterval)
                });
                });

            function passwordDoneTyping() {
                var password = $('#' + elemId)[0].value
                var passhash = sha1(password);
                $.get('https://api.pwnedpasswords.com/range/' + passhash.slice(0, 5), function ( data ) {
                    var hashes = {}
                    var rows = data.split('\n')
                    for (row in rows) {
                        var hashdata = rows[row].split(':')
                        hashes[hashdata[0]] = hashdata[1]
                    }
                    hashsuffix = passhash.slice(5, 40).toUpperCase()
                    var found = hashes[hashsuffix]
                    if(found !== undefined) {
                        if(passwordScore == 4) {
                            $('#passwordmessage').html('Password is strong, but has been breached<br>')
                        }
                        var msg = $('#passwordmessage').html()
                        msg = 'Password was involved in ' + found + ' password breaches <br>' + msg
                        if(passwordScore == 4) {
                            msg += passwordHelp
                        }
                        var $bar = $('#strengthBar');
                        $bar.attr('class', 'progress-bar bg-danger')
                            .css('width', '0%');             
                        $('#passwordmessage').html(msg);
                        
                    }
                });
            }    
            }         
        </script>
<div class="cont-flex cont-alig-cen cont-hful login">
	<div class="cont-flex cont-alig-cen cont-nuev cont-center login-sec">
		<?php 
		$modal = new functionModel();
		$datos = "";        
		$modal->view_modal("pass-usua", $datos, "","Recuperar contraseña", "form-pass-edi");
		?>
		<div class="cont-cuat cont-just-saro">
			<div class="cont-log cont-center">
				<img class="log-img" src="./public/img/logo/logo-1.png" alt="">
				<?php include 'view/form/form-sesion.php';?>
			</div>
		</div>
		<div class="cont-seis">
			<img src="public/img/logo/publicidad.jpg" width="80%" alt="">
		</div>
	</div>
</div>

