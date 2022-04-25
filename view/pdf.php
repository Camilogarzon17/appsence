<?php
$bill = new billController();
$function = new functionModel();
include('./public/lib/mpdf/mpdf.php');

$html = "";
$bills = new billController();
$bills_data = $bills->sel($_GET['pdf']);
$num_bills  = count($bills_data);
$html .= '
<style type="text/css" media="screen">
	body{
		background-image: url("./public/img/pdf/fond-pdf.png");
		font-family: Arial, Helvetica, sans-serif;
	}
    .tbl-ser{
        width:100%;
    }
    .tbl-ser tr td{
        border: 1px solid #ddd !important;
    }
</style>

';
for ($n = 0; $n < $num_bills; $n++) {
 $html .= '
 <title>Factura '.$bills_data[$n]['fact_id'].' | Develtec</title>
 <body >
 	<img src="./public/img/logo/logo-1.png" width="250" alt="">
 	<table style="margin: 0px;">
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
 			<td width="120"><img src="'.$bills_data[$n]['empr_ipe'].'" style="margin-top: -15px;margin-bottom: -15px;" width="100" alt=""></td>
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
            $html .= '<tr>
            <td colspan="5" style="background: #D9D9D9; border: 1px solid #D9D9D9;"><b>Descripción general</b></td>
            </tr>
            <tr>
                <td colspan="5" style="border: 1px solid #D9D9D9;">'.$bills_data[$n]['fact_des'].'</td>
            </tr>';
        }
    $fact_fec = $bills_data[$n]['fact_fec'];
    $html .= '    
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
    $detalle_data = $bills->sel_detalle($_GET['pdf']);
    $num_detalle  = count($detalle_data);
    for ($det = 1; $det < $num_detalle; $det++) {
        $html .= ' <tr ';
        if($det%2==0) $html .='style="background: #F7F7F7;"';
        $html .='>
             <td style="border: 1px solid #D9D9D9;">'.$detalle_data[$det]['sdet_nom'].'</td>
             <td style="border: 1px solid #D9D9D9;">'.$detalle_data[$det]['sdet_des'].'</td>
             <td style="border: 1px solid #D9D9D9;">'.$detalle_data[$det]['fdet_dto'].' %</td>
             <td style="border: 1px solid #D9D9D9;">$ '.number_format($detalle_data[$det]['fdet_pre']).'</td>
         </tr>';
    }
    $html .= '
        <tr>
            <td colspan="3" style="background: #D9D9D9; border: 1px solid #D9D9D9;text-align:right"><b>Total, a pagar:</b></td>
            <td style="background: #D9D9D9; border: 1px solid #D9D9D9;"><b>$ '.number_format($bills_data[$n]['total']).'</b></td>
        </tr>';
$pays = new billController();
$pays_data = $pays->sel_payment($_GET['pdf'],true);
$num_pay  = count($pays_data);
$pagos = 0;
for ($p = 0; $p < $num_pay; $p++) {
    $html .= ' <tr ';
        if($p%2!=0) $html .='style="background: #F7F7F7;"';
        $html .='>
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
   $html .= '<tr>
            <td colspan="3" style="background: #D9D9D9; border: 1px solid #D9D9D9;text-align:right"><b>Saldo pendiente:</b></td>
            <td style="background: #D9D9D9; border: 1px solid #D9D9D9;"><b>';
            if($total!=0){$html .='$ '.number_format($total);}else{ $html .='PAGADA';}
            $html .= '</b></td>
        </tr>';
}
 $html .= '</tbody>
    </table><p>Términos y condiciones acordadas directamente con el Señor '.$bills_data[$n]['clie_pno'].' '.$bills_data[$n]['clie_pap'].', identificado con C.C. No. '.$bills_data[$n]['clie_nid'].'.<br>
Declaro voluntariamente y bajo la gravedad de juramento, que pertenezco al Régimen Simplificado,
por lo tanto, de acuerdo con el Art. 42 del Decreto 3541 de 1.983 y al Art. 511 del ET., no estoy
obligado a expedir factura de venta.<br><br>

Pagos a la cuenta de ahorros Banco Caja Social N° 24089016073 a nombre del titular Edwin Andres Urrea Torres, DAVIPLATA cuenta N° 313 874 6366 o NEQUI cuenta N° 313 874 6366.
</p>
 </body>';
 
}
$pdf = new mPDF('', 'Letter', '12', '', 10, 10, 10, 10, 3, 3);
$pdf->SetDefaultFont('chelvetica');
$pdf->SetWatermarkImage('./public/img/pdf/fond-pdf.png',-0.4,'D',array(0,0));
$pdf->showWatermarkImage = true;
$pdf->WriteHTML($html);
$pdf->Output('cuenta-de-cobro-'.$_GET['pdf'].$fact_fec.'.pdf','I');
exit;
?>