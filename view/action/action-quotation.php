<?php 
$quotation = new quotationController();
$absence = new absenceController();
$request = new requestController();
$function = new functionModel();
if ($_POST['crud'] == "add-coti") {
	if ($_POST['coti_esta_fk'] == 2) {
		$request->upd_estado($_POST['coti_soli_fk'],2);
	}
	$quotation_data = array(
 		'coti_des' => $_POST['coti_des'],
 		'coti_fec' => $_POST['coti_fec'],
 		'coti_tyc' => $_POST['coti_tyc'],
 		'coti_esta_fk' => $_POST['coti_esta_fk'],
 		'coti_soli_fk' => $_POST['coti_soli_fk'],
 		'coti_usua_fk' => $_SESSION['usua_id']
 	);
 	$coti_id = 0;
 	$coti_id = $quotation->ins($quotation_data);
 	$cdet_sdet_fk = $_POST['cdet_sdet_fk'];
 	$cdet_dto = $_POST['cdet_dto'];
	$cdet_pre = $_POST['cdet_pre'];
	$num_cdet   = COUNT($cdet_sdet_fk);
	$template_query = "REPLACE INTO tbl_cotizacion_detalle (cdet_id, cdet_pre,cdet_dto,cdet_sdet_fk,cdet_coti_fk)";
    $template_query .= " VALUES ";
	for ($i=0; $i < $num_cdet; $i++) { 
		$template_query .= "(0,'".$cdet_pre[$i]."','".$cdet_dto[$i]."',".$cdet_sdet_fk[$i].",".$coti_id."),";
	}
	$template_query = substr($template_query, 0, -1);
	$quotation->set_detalle($template_query);
	//header("Location: facturas&alert=1&text=Factura registrada con exito");
 	//var_dump($quotation_data);
 	echo $template_query;
}else if ($_POST['crud'] == "add-ause") {

	if ($_POST['ause_tie'] == 1) {
		$_POST['ause_dia'] = 1;
		$_POST['ause_fin'] = $_POST['ause_find'];
		$_POST['ause_ffi'] = NULL;
	}else{
		$_POST['ause_med'] = 0;
	}
	$ause_pdf = null;
	if(isset($_FILES['ause_sop']) && $_FILES['ause_sop']['type']=='application/pdf'){
		move_uploaded_file ($_FILES['ause_sop']['tmp_name'] , './public/pdf/ausencia/'.$_FILES['ause_sop']['name']);
		$ause_pdf = "public/pdf/ausencia/".$_FILES['ause_sop']['name'];
	}

	$absence_data = array(
 		'ause_des' => $_POST['ause_des'],
 		'ause_fin' => $_POST['ause_fin'],
 		'ause_ffi' => $_POST['ause_ffi'],
 		'ause_med' => $_POST['ause_med'],
 		'ause_dia' => $_POST['ause_dia'],
 		'ause_sop' => $ause_pdf,
 		'ause_est' => 0,
 		'ause_tipo_fk' => $_POST['ause_tipo_fk'],
 		'ause_usua_fk' => $_POST['ause_usua_fk']
 	);
 	//var_dump($absence_data);

 	if ($absence->ins($absence_data)) {
 		header("Location: ausencias&alert=1&text=Ausencia registrada con exito");
 	}else{
 		header("Location: ausencias&alert=0&text=Error al registrar la ausencia");
 	}
}else if($_POST['crud'] == "del-ause") {
	$absence->del($_POST['ause_id']);
	header("Location: ausencias&alert=1&text=Ausencia eliminado correctamente!");
	
    
}else if($_POST['crud'] == "val-ause") {
	$absence->upd_estado($_POST['ause_id'],$_POST['ause_est']);
	header("Location: ausencias&alert=1&text=Ausencia validada correctamente!");
	 
}else if ($_POST['crud'] == "add-taus") {
	$tabsence_data = array(
 		'taus_nom' => $_POST['taus_nom'],
 		'taus_col' => $_POST['taus_col']
 	);
 	if ($absence->ins_taus($tabsence_data)) {
 		header("Location: ausencias&alert=1&text=Tipo de ausencia registrada con exito");
 	}else{
 		header("Location: ausencias&alert=0&text=Error al registrar el tipo de ausencia");
 	}
}