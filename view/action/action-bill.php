<?php 
$bill = new billController();
$function = new functionModel();
if ($_POST['crud'] == "add-fact") {
	$bill_data = array(
		'fact_tit' => $_POST['fact_tit'],
		'fact_des' => $_POST['fact_des'],
		'fact_clie_fk' => $_POST['fact_clie_fk'],
		'fact_fec' => $_POST['fact_fec'],
		'fact_fin' => $_POST['fact_fin'],
		'fact_usua_fk' => $_SESSION['usua_id'],
		'fact_esta_fk' => 2
	);
	$fact_id = $bill->ins($bill_data);
	$fdet_sdet_fk = $_POST['fdet_sdet_fk'];
	$fdet_dto = $_POST['fdet_dto'];
	$fdet_pre = $_POST['fdet_pre'];
	$num_fdet   = COUNT($fdet_sdet_fk);
	$template_query = "REPLACE INTO tbl_factura_detalle (fdet_id, fdet_fec,fdet_pre,fdet_dto,fdet_sdet_fk,fdet_fact_fk)";
    $template_query .= " VALUES ";
    $total_pagar = 0;
	for ($i=0; $i < $num_fdet; $i++) { 
		$template_query .= "(0,'".$_POST['fact_fec']."','".$fdet_pre[$i]."','".$fdet_dto[$i]."',".$fdet_sdet_fk[$i].",".$fact_id."),";
		$total_paga += $fdet_pre[$i];
	}
	$template_query = substr($template_query, 0, -1);
	$bill->upd_precio($fact_id,$total_paga);
	$bill->set_detalle($template_query);
	header("Location: facturas&alert=1&text=Factura registrada con exito");
}else if ($_POST['crud'] == "edi-fact") {
	$bill_data = array(
		'fact_id' => $_POST['fact_id'],
		'fact_tit' => $_POST['fact_tit'],
		'fact_des' => $_POST['fact_des'],
		'fact_clie_fk' => $_POST['fact_clie_fk'],
		'fact_fec' => $_POST['fact_fec'],
		'fact_fin' => $_POST['fact_fin'],
		'fact_usua_fk' => $_SESSION['usua_id'],
		'fact_esta_fk' => $_POST['fact_esta_fk']
	);
	//var_dump($bill_data);
	$bill->upd($bill_data);
	$fact_id = $_POST['fact_id'];
	$fdet_id = $_POST['fdet_id'];
	$fdet_sdet_fk = $_POST['fdet_sdet_fk'];
	$fdet_dto = $_POST['fdet_dto'];
	$fdet_pre = $_POST['fdet_pre'];
	$num_fdet   = COUNT($fdet_sdet_fk);
	$template_query = "REPLACE INTO tbl_factura_detalle (fdet_id, fdet_fec,fdet_pre,fdet_dto,fdet_sdet_fk,fdet_fact_fk)";
    $template_query .= " VALUES ";
    $aInicial = array();
    $aNuevo = array();
    $cont = 0;
    $total_paga = 0;
    //var_dump($fdet_id);
	for ($i=0; $i < $num_fdet; $i++) { 
		if (empty($fdet_id[$i])) {
			$fdet_id[$i] = "0";
		}else{
			$aNuevo[$i] = $fdet_id[$i];
			$cont++;
		}
		$template_query .= "(".$fdet_id[$i].",'".$_POST['fact_fec']."','".$fdet_pre[$i]."','".$fdet_dto[$i]."',".$fdet_sdet_fk[$i].",".$fact_id."),";
		$total_paga += $fdet_pre[$i];
	}
	$template_query = substr($template_query, 0, -1);
	//echo $template_query;
	//echo "Nuevos";
	//var_dump($aNuevo);
	$fdetalle = $bill->sel_detalle($fact_id);
	$num_res    = count($fdetalle);
    for ($regist = 0; $regist < $num_res; $regist++) {
    	$aInicial[$regist] = $fdetalle[$regist]['fdet_id'];
    }
    //echo "Antiguos";
	//var_dump($aInicial);
	$aFinal = array_diff($aInicial,$aNuevo);
	//echo "Final";
	//var_dump($aFinal);
	
	//echo $template_query;
	$bill->upd_precio($fact_id,$total_paga);
	$bill->set_detalle($template_query);
	if (!empty($aFinal)) {
		$num    = count($aFinal);
		foreach ($aFinal as $i => $value) {
		    //echo  " Eliminar: ".$aFinal[$i];
		    $bill->del_detalle($aFinal[$i]);
		}
	}
	header("Location: facturas&alert=1&text=Factura modificada con exito");
}else if ($_POST['crud'] == "del-fact") {
	$bill->del($_POST['fact_id']);
	header("Location: facturas&alert=1&text=Factura eliminada con exito");
}else if ($_POST['crud'] == "val-fact") {
	if ($_POST['fpag_tpag_fk']=="2") {
		$_POST['fpag_vpa'] = $_POST['fpag_pen'];
		$bill->upd_status($_POST['fpag_fact_fk'],3);
	}
	if (empty($_POST['fpag_nco'])) {
		$_POST['fpag_nco'] = "N/A";
	}
	$pay_data = array(
		'fpag_fec' => $_POST['fpag_fec'],
		'fpag_nco' => $_POST['fpag_nco'],
		'fpag_npa' => $_POST['fpag_npa'],
		'fpag_vpa' => $_POST['fpag_vpa'],
		'fact_vto' => $_POST['fact_vto'],
		'fpag_fact_fk' => $_POST['fpag_fact_fk'],
		'fpag_tpag_fk' => $_POST['fpag_tpag_fk'],
		'fpag_mpag_fk' => $_POST['fpag_mpag_fk']
	);
	if ($_POST['fact_env']==1) {
		if($function->enviar_mail($_POST['fpag_fact_fk'],$_POST['fact_mail'])){
			$bill->ins_payment($pay_data);
			header("Location: facturas&alert=1&text=Pago registrado y enviado a ".$_POST['fact_mail']." con exito");
		}else{
			header("Location: facturas&alert=0&text=Error al enviar la información");
		}
		
	}else{
		$bill->ins_payment($pay_data);
		header("Location: facturas&alert=1&text=Pago registrado con exito");
	}
}else if ($_POST['crud'] == "env-fact") {
	if($function->enviar_mail($_POST['env_fact_id'],$_POST['fact_mail'])){
		header("Location: facturas&alert=1&text=Pago registrado y enviado a ".$_POST['fact_mail']." con exito");
	}else{
		header("Location: facturas&alert=0&text=Error al enviar la información");
	}	
}

?>