<?php
$absence = new absenceController();
if ($_POST['crud'] == "add-ause") {

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