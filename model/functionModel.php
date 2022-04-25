<?php
class functionModel{

    public function view_modal($id, $data = array(), $size, $title, $form) {
        $num_tit = empty($data) ? 0 : count($data);
        $modal = "<div class='modal fade ";
        if ($size != "") {
            $modal .= "bd-example-modal-" . $size;
        }
        $modal .= "' id='Modal-" . $id . "' tabindex='-1' role='dialog' aria-hidden='true'>
          <div class='modal-dialog modal-dialog-centered ";
        if ($size != "") {
            $modal .= "modal-" . $size;
        }
        $modal .= "' role='document'>
            <div class='modal-content'>
                <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                    <span aria-hidden='true'>&times;</span>
                </button>
                <div class='modal-body'>";
        echo $modal;
        $form_dir = "./view/form/" . $form . ".php";
        include "$form_dir";
        echo "</div>
            </div>
          </div>
        </div>";
        if ($id<>"add-serv" && $id<>"add-sdet" && $id<>"add-usua" && $id<>"add-empr" && $id<>"add") {
            echo "<script type='text/javascript'>
                      $('#Modal-".$id."').on('show.bs.modal', function (event) {
                      var button = $(event.relatedTarget)
                      var modal = $(this)
                      var name = button.data('name')
                      modal.find('.modal-title').text('" . $title . " ' + name)\n";
                      for ($i=0; $i < $num_tit; $i++) {
                        echo "var ".$data[$i]." = button.data('".$data[$i]."')\n";
                        if (strpos($data[$i], "_ipe")|| strpos($data[$i], "_ipo")) {
                            echo "document.getElementById('".$id."_".$data[$i]."').setAttribute('src', ".$data[$i].");\n
                            modal.find('.modal-body input#".$id."_".$data[$i]."').val(".$data[$i].")\n";
                        }else if(strpos($data[$i], "_fk") || strpos($data[$i], "_rol")){
                            echo "$('#".$id."_".$data[$i]." option[value='+".$data[$i]."+']').attr('selected',true);";
                        }else if(strpos($data[$i], "_des") || strpos($data[$i], "_con")){
                            echo "document.getElementById('".$id."_".$data[$i]."').value = ".$data[$i].";\n";
                        }else{
                            echo "modal.find('.modal-body input#".$id."_".$data[$i]."').val(".$data[$i].")\n";
                        }
                      }
                    echo"})
                </script>
            ";            
        }else if (isset($data)) {
            echo "<script type='text/javascript'>
                      $('#Modal-".$id."').on('show.bs.modal', function (event) {
                      var button = $(event.relatedTarget)
                      var modal = $(this)
                      modal.find('.modal-title').text('" . $title . " ')\n";
                      for ($i=0; $i < $num_tit; $i++) { 
                      echo "modal.find('.modal-body input#".$id.'_'.$data[$i]."').val('')\n";
                      }
                      echo "})
                </script>
            ";
        }
    }
    public function dateText($date = '', $day = '', $day_month = '', $year = '', $hour = '') {
        $week_days = array("Domingo", "Lunes", "Martes", "Miercoles", "Jueves", "Viernes", "Sabado");
        $months    = array("", "Ene.", "Feb.", "Mar.", "Abr.", "May.", "Jun.", "Jul.", "Ago.", "Sep.", "Oct.", "Nov.", "Dic.");
        if ($date != '') {
            $year_now   = date("Y", strtotime($date));
            $month_now  = date("n", strtotime($date));
            $day_now    = date("j", strtotime($date));
            $hour_now   = date("h");
            $minute_now = date("i");
            $indi_now   = date("a");
        } else {
            $year_now   = date("Y");
            $month_now  = date("n");
            $day_now    = date("j");
            $hour_now   = date("h");
            $minute_now = date("i");
            $indi_now   = date("a");
        }
        $week_day_now = date("w");
        $dateText     = '';
        if ($day != 'no') {
            $dateText .= $week_days[$week_day_now]." ";
        }
        if ($day_month != 'no') {
            $dateText .= $day_now . " de " . $months[$month_now];
        }
        if ($year != 'no') {
            $dateText .= " - " . $year_now;
        }
        if ($hour != 'no') {
            $dateText .= ", hora: " . $hour_now . ":" . $minute_now . " " . $indi_now;
        }

        return $dateText;
    }

    public function validateImg($file = array(), $id, $folder )
    {
        $typePermitido = array("image/jpg", "image/jpeg", "image/png", "image/gif");
        $tamanoLimite  = 2000;
        if (in_array($file['type'], $typePermitido) && $file['size'] <= $tamanoLimite * 1024) {
            $carpeta = "./public/img/".$folder."/" . $id . "/";
            $destino = $carpeta . $file['name'];
            $url_file = "public/img/".$folder."/" . $id . "/" . $file['name'];
            if (!file_exists($carpeta)) {
                mkdir($carpeta);
            }
            if (!file_exists($destino)) {
                copy($file['tmp_name'], $destino);
                return $url_file;
            } else {
                return "existe";
            }
        } else {
            return "nopermitido";
        }
    }

    public function alertas($text, $type){
        if ($type == "pos") {
            echo "<div class='alert alert-pos'><div class='alert-conten'><span class='fa fa-check-circle'></span><p>" . $text . "</p></div></div>";
        } else if ($type == "neg") {
            echo "<div class='alert alert-neg'><div class='alert-conten'><span class='fa fa-exclamation-triangle'></span><p>" . $text . "</p></div></div>";
        }
    }
    public function color_rgb( $colour ) {
        if ( $colour[0] == '#' ) {
                $colour = substr( $colour, 1 );
        }
        if ( strlen( $colour ) == 6 ) {
                list( $r, $g, $b ) = array( $colour[0] . $colour[1], $colour[2] . $colour[3], $colour[4] . $colour[5] );
        } elseif ( strlen( $colour ) == 3 ) {
                list( $r, $g, $b ) = array( $colour[0] . $colour[0], $colour[1] . $colour[1], $colour[2] . $colour[2] );
        } else {
                return false;
        }
        $r = hexdec( $r );
        $g = hexdec( $g );
        $b = hexdec( $b );
        $rgb = $r.",".$g.",".$b;
        return $rgb;
    }

    public function enviar_mail( $id, $mail) {
        $url = $_SERVER['HTTP_HOST']; 
        $bills = new billController();
        $bills_data = $bills->sel($id);
        $num_bills  = count($bills_data);
        $contenido = '<div id=":ps" class="Ar Au" style="display: block; width: 100%;">
            <div id=":l0" class="Am Al editable Xp0HJf-LW-avf" hidefocus="true" aria-label="Firma" g_editable="true" role="textbox" aria-multiline="true" contenteditable="true" style="direction: ltr;">
                <div class="gmail_signature" data-smartmail="gmail_signature">
                    <div dir="ltr">
                        <style type="text/css" media="screen">
                            @import url(\'https://fonts.googleapis.com/css?family=Raleway\');
                        </style>
                        <head>
                            <meta name="viewport" content="width=device-width, user=scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0" />
                        </head>
                        <div style="width: 99%; margin: auto;">';
        for ($n = 0; $n < $num_bills; $n++) {
            $asunt = "Cuenta de cobro: ".$bills_data[$n]['fact_id'];
            $contenido .= '
            <title>Factura '.$bills_data[$n]['fact_id'].' | VidEx</title>
            <body >
                <img src="'.$url.'/logo-1.png" width="250" alt="">
                <table style="margin: 0px;width:100%; ">
                <tbody>
                    <tr>
                        <td colspan="2"><h1 style="font-size: 24px">Cuenta de cobro</h1></td>
                        <td style="text-align: right;"><b>Referencia: '.$bills_data[$n]['fact_id'].'</b><br>
                        <b>Fecha: '.date("d/m/Y", strtotime($bills_data[$n]['fact_fec'])).'</b><br>
                        <b>NIT:</b> '.$bills_data[$n]['usua_nid'].'-9</td>
                    </tr>
                    <tr>
                        <td colspan="3" >Yo, '.$bills_data[$n]['usua_pno'].' '.$bills_data[$n]['usua_sno'].' '.$bills_data[$n]['usua_pap'].' '.$bills_data[$n]['usua_sap'].', '.$bills_data[$n]['usua_pro'].' de VidEx, identificado con C.C. No. '.$bills_data[$n]['usua_nid'].', manifiesto que:</td>
                    </tr>
                    <tr>
                        <td colspan="3"><h4>Información de la empresa:</h4></td>
                    </tr>   
                    <tr>
                        <td style="max-width:110; width:110;"><img src="'.$bills_data[$n]['empr_ipe'].'" style="margin-top: -15px;margin-bottom: -15px;max-height:60px;max-width:100px"  alt=""></td>
                        <td><b>Nombre: </b>'.$bills_data[$n]['empr_nom'].'<br><b>Descripción: </b>'.$bills_data[$n]['empr_des'].'</td>
                        <td style="text-align: right;"><b>NIT/RUT: </b>'.$bills_data[$n]['empr_nit'].'<br><b>Ubicación: </b>'.$bills_data[$n]['empr_ciu'].', '.$bills_data[$n]['empr_pai'].'</td>
                    </tr>
                </tbody>
            </table>
            <table style="width:100%; border-collapse: collapse;">
                <thead>
                    <tr style="background: #D9D9D9; border: 1px solid #D9D9D9;">
                        <th colspan="5" style="text-align: center;"><h4>INFORMACIÓN DEL SERVICIO</h4></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td colspan="4" style="border: 1px solid #D9D9D9;">'.$bills_data[$n]['fact_tit'].'</td>
                        <td style="text-align: right;border: 1px solid #D9D9D9;width: 250px !important;"><b>Fecha de solicitud:</b> '.date("d/m/Y", strtotime($bills_data[$n]['fact_fin'])).'</td>
                    </tr>';
                if (strpos($bills_data[$n]['fact_des'], " ")) {
                    $contenido .= '<tr>
                    <td colspan="5" style="background: #D9D9D9; border: 1px solid #D9D9D9;"><b>Descripción general</b></td>
                    </tr>
                    <tr>
                        <td colspan="5" style="border: 1px solid #D9D9D9;">'.$bills_data[$n]['fact_des'].'</td>
                    </tr>';
                }
            $contenido .= '    
                </tbody>
            </table>
            <table style="width:100%; border-collapse: collapse;">
             <thead>
                 <tr>
                    <td style="background: #D9D9D9; border: 1px solid #D9D9D9;"><b>Nombre</b></td>
                    <td style="background: #D9D9D9; border: 1px solid #D9D9D9;"><b>Descripción</b></td>
                    <td style="background: #D9D9D9; border: 1px solid #D9D9D9;width: 50px;"><b>Dto.</b></td>
                    <td style="background: #D9D9D9; border: 1px solid #D9D9D9;width: 90px;"><b>Precio</b></td>
                </tr>
             </thead>
             <tbody>';
            $billDetalle = new billController();
            $detalle_data = $bills->sel_detalle($id);
            $num_detalle  = count($detalle_data);
             $total_pagar = 0;
    for ($det = 1; $det < $num_detalle; $det++) {
        $contenido .= ' <tr ';
        if($det%2==0) $contenido .='style="background: #F7F7F7;"';
        $contenido .='>
             <td style="border: 1px solid #D9D9D9;">'.$detalle_data[$det]['sdet_nom'].'</td>
             <td style="border: 1px solid #D9D9D9;">'.$detalle_data[$det]['sdet_des'].'</td>
             <td style="border: 1px solid #D9D9D9;">'.$detalle_data[$det]['fdet_dto'].' %</td>
             <td style="border: 1px solid #D9D9D9;">';
             if($detalle_data[$det]['fdet_dto']>0){
                 $contenido .='<del>$ '.number_format($detalle_data[$det]['fdet_pre']).'</del><br>';
                 $desc = $detalle_data[$det]['fdet_pre']*$detalle_data[$det]['fdet_dto']/100;
                 $pre_fin= $detalle_data[$det]['fdet_pre']-$desc;
                 $contenido .='$ '.number_format($pre_fin);
                 $total_pagar = $total_pagar+$pre_fin;
             }else{
                 $contenido .='$ '.number_format($detalle_data[$det]['fdet_pre']);
                 $total_pagar = $total_pagar+$detalle_data[$det]['fdet_pre'];
             }
             $contenido .='</td>
         </tr>';
    }
    $contenido .= '
        <tr>
            <td colspan="3" style="background: #D9D9D9; border: 1px solid #D9D9D9;text-align:right"><b>Total, a pagar:</b></td>
            <td style="background: #D9D9D9; border: 1px solid #D9D9D9;"><b>$ '.number_format($total_pagar).'</b></td>
        </tr>';
$pays = new billController();
$pays_data = $pays->sel_payment($id,true);
$num_pay  = count($pays_data);
$pagos = 0;
for ($p = 0; $p < $num_pay; $p++) {
    $contenido .= ' <tr ';
        if($p%2!=0) $contenido .='style="background: #F7F7F7;"';
        $contenido .='>
            <td style=" border: 1px solid #D9D9D9;"><b>'.substr($pays_data[$p]['fpag_id'],-6).'</b></td>
            <td colspan="2" style="border: 1px solid #D9D9D9;"><b>Nombre de quien paga: </b>'.$pays_data[$p]['fpag_npa'].'<br><b>Medio de pago y fecha: </b>'.$pays_data[$p]['fmpa_nom'].', '.$this->dateText($pays_data[$p]['fpag_fec'],"no","","","no").'<br><b>Número de comprobante: </b>'.$pays_data[$p]['fpag_nco'].' </td>
            <td style="border: 1px solid #D9D9D9;"><b>$ '.number_format($pays_data[$p]['fpag_vpa']).'</b></td>
        </tr>';
        $pagos += $pays_data[$p]['fpag_vpa'];
}
$total = 0;
if ($num_pay>0) {
    if ($pagos<$total_pagar) {
        $total = $total_pagar - $pagos;
    }
   $contenido .= '<tr>
            <td colspan="3" style="background: #D9D9D9; border: 1px solid #D9D9D9;text-align:right"><b>Saldo pendiente:</b></td>
            <td style="background: #D9D9D9; border: 1px solid #D9D9D9;position: relative;"><b>';
            if($total!=0){$contenido .='$ '.number_format($total);}else{ $contenido .='PAGADA <img src="public/img/pdf/pagado.png" style="position: absolute; width:180px;margin-top: -50px; margin-left: -50px; margin-bottom: -30px;margin-right:-50px;z-index:100" alt="">';}
            $contenido .= '</b></td>
        </tr>';
}
             $contenido .= '</tbody>
                </table><p>Términos y condiciones acordadas directamente con '.$bills_data[$n]['clie_pno'].' '.$bills_data[$n]['clie_pap'];
                if(isset($bills_data[$n]['clie_nid'])){ $contenido .= ', identificado con C.C. No. '.$bills_data[$n]['clie_nid'];} $contenido .= '.<br>
            Declaro voluntariamente, que pertenezco al Régimen Simplificado,
            por lo tanto, de acuerdo con el Art. 42 del Decreto 3541 de 1.983 y al Art. 511 del ET., no estoy
            obligado a expedir factura de venta.<br><br>
            <b>Pagos a la cuenta de ahorros:</b><br><b>Bancolombia N° 57187754404</b> a nombre del titular Manuel Obando<br><b>Davivienda N° 450600097650</b> a nombre del titular Manuel Obando.
            </p>
             </body>';
         
        }
        $contenido .= '
                            </div>
                        </div>
                    </div>
                </div>
            </div>';
            $asunto = 'VidEx | '.$asunt;
            $remitente = "noreply@videx.online"; //Aquí va la dirección de quien envía el email.
            //Cabecera de la funcion mail()
            $headers = "From: VidEx | Cuenta de cobro <".$remitente."> \r\n";
            $headers .= "Reply-To: ".$remitente."\r\n"; //La dirección por defecto si se responde el email enviado.
            $headers .= "MIME-Version: 1.0\r\n";
            $headers .= "Content-Type: text/html; charset=UTF-8\r\n";
            if(mail($mail, $asunto, $contenido,$headers)){
                return true;
            }else{
                return false;
            }
    }
}
