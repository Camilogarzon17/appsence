<?php
$url = $_SERVER['HTTP_HOST'];
$destino = "andrestorres.developer@gmail.com";
$function = new functionModel();
$bills = new billController();
$bills_data = $bills->sel($_GET['enviar']);
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
	<title>Factura '.$bills_data[$n]['fact_id'].' | Develtec</title>
	<body >
		<img src="'.$url.'/DEVELTEC-LOGO-2021.png" width="250" alt="">
		<table style="margin: 0px;width:100%; ">
		<tbody>
			<tr>
				<td colspan="2"><h1 style="font-size: 24px">Cuenta de cobro</h1></td>
				<td style="text-align: right;"><b>Referencia: '.$bills_data[$n]['fact_id'].'</b><br>
				<b>Fecha: '.date("d/m/Y", strtotime($bills_data[$n]['fact_fec'])).'</b></td>
			</tr>
			<tr>
				<td colspan="3" >Yo, '.$bills_data[$n]['usua_pno'].' '.$bills_data[$n]['usua_pap'].', '.$bills_data[$n]['usua_pro'].' de Develtec, identificado con C.C. No. '.$bills_data[$n]['usua_nid'].', manifiesto que:</td>
			</tr>
			<tr>
				<td colspan="3"><h4>Información de la empresa:</h4></td>
			</tr>	
			<tr>
				<td width="120"><img src="'.$url.'/'.$bills_data[$n]['empr_ipe'].'" style="margin-top: -15px;margin-bottom: -15px;" width="100" alt=""></td>
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
    $detalle_data = $bills->sel_detalle($_GET['enviar']);
    $num_detalle  = count($detalle_data);
    for ($det = 1; $det < $num_detalle; $det++) {
        $contenido .= ' <tr ';
        if($det%2==0) $contenido .='style="background: #F7F7F7;"';
        $contenido .='>
             <td style="border: 1px solid #D9D9D9;">'.$detalle_data[$det]['sdet_nom'].'</td>
             <td style="border: 1px solid #D9D9D9;">'.$detalle_data[$det]['sdet_des'].'</td>
             <td style="border: 1px solid #D9D9D9;">'.$detalle_data[$det]['fdet_dto'].' %</td>
             <td style="border: 1px solid #D9D9D9;">$ '.number_format($detalle_data[$det]['fdet_pre']).'</td>
         </tr>';
    }
    $contenido .= '
        <tr>
            <td colspan="3" style="background: #D9D9D9; border: 1px solid #D9D9D9;text-align:right"><b>Total, a pagar:</b></td>
            <td style="background: #D9D9D9; border: 1px solid #D9D9D9;"><b>$ '.number_format($bills_data[$n]['total']).'</b></td>
        </tr>';
	$pays = new billController();
	$pays_data = $pays->sel_payment($_GET['enviar'],true);
	$num_pay  = count($pays_data);
	$pagos = 0;
	for ($p = 0; $p < $num_pay; $p++) {
	    $contenido .= ' <tr ';
	        if($p%2!=0) $contenido .='style="background: #F7F7F7;"';
	        $contenido .='>
	            <td style=" border: 1px solid #D9D9D9;"><b>Pago: '.substr($pays_data[$p]['fpag_id'],-6).'</b></td>
	            <td colspan="2" style="border: 1px solid #D9D9D9;"><b>Nombre de quien paga: </b>'.$pays_data[$p]['fpag_npa'].'<br><b>Medio de pago y fecha: </b>'.$pays_data[$p]['fmpa_nom'].', '.$function->dateText($pays_data[$p]['fpag_fec'],"no","","","no").'<br><b>Número de comprobante: </b>'.$pays_data[$p]['fpag_nco'].' </td>
	            <td style="border: 1px solid #D9D9D9;"><b>$ '.number_format($pays_data[$p]['fpag_vpa']).'</b></td>
	        </tr>';
	        $pagos += $pays_data[$p]['fpag_vpa'];
	}
	$total = 0;
	if ($num_pay>0) {
	    if ($pagos<$bills_data[$n]['fact_vto']) {
	        $total = $bills_data[$n]['fact_vto'] - $pagos;
	    }
	   $contenido .= '<tr>
	            <td colspan="3" style="background: #D9D9D9; border: 1px solid #D9D9D9;text-align:right"><b>Saldo pendiente:</b></td>
	            <td style="background: #D9D9D9; border: 1px solid #D9D9D9;"><b>';
	            if($total!=0){$contenido .='$ '.$total;}else{ $contenido .='PAGADA';}
	            $contenido .= '</b></td>
	        </tr>';
	}
	 $contenido .= '</tbody>
	    </table><p>Términos y condiciones acordadas directamente con el Señor '.$bills_data[$n]['clie_pno'].' '.$bills_data[$n]['clie_pap'].', identificado con C.C. No. '.$bills_data[$n]['clie_nid'].'.<br>
	Declaro voluntariamente y bajo la gravedad de juramento, que pertenezco al Régimen Simplificado,
	por lo tanto, de acuerdo con el Art. 42 del Decreto 3541 de 1.983 y al Art. 511 del ET., no estoy
	obligado a expedir factura de venta.<br><br>

	Pagos a la cuenta de ahorros Banco Caja Social N° 24089016073 a nombre del titular Edwin Andres Urrea Torres, DAVIPLATA cuenta N° 313 874 6366 o NEQUI cuenta N° 313 874 6366.
	</p>
	 </body>';
 
}
$contenido .= '
					</div>
				</div>
			</div>
		</div>
	</div>';
	$asunto = 'Develtec | '.$asunt;
	$remitente = "ventas@develtec.net"; //Aquí va la dirección de quien envía el email.
	//Cabecera de la funcion mail()
	$headers = "From: Develtec | Cuenta de cobro <".$remitente."> \r\n";
	$headers .= "Reply-To: ".$remitente."\r\n"; //La dirección por defecto si se responde el email enviado.
	$headers .= "MIME-Version: 1.0\r\n";
	$headers .= "Content-Type: text/html; charset=UTF-8\r\n";
	if(mail($destino, $asunto, $contenido,$headers)){
		echo "<script language =javascript>
            self.location = '../facturas?alert=1&text=Mensaje+enviado+correctamente!';
        </script> ";
	}
	
?>