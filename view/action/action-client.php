<?php 
$client = new clientController();
$function = new functionModel();
if ($_POST['crud'] == "add-empr") {
	$company_data = array(
		'empr_nom' => $_POST['empr_nom'],
		'empr_des' => $_POST['empr_des'],
		'empr_nit' => $_POST['empr_nit'],
		'empr_web' => $_POST['empr_web'],
		'empr_dir' => $_POST['empr_dir'],
		'empr_ciu' => $_POST['empr_ciu'],
		'empr_pai' => $_POST['empr_pai'],
		'empr_fec' => $_POST['empr_fec'],
		'empr_ipe' => "",
		'empr_ipo' => "",
		'empr_tipo_fk' => $_POST['empr_tipo_fk'],
		'empr_usua_fk' => $_SESSION['usua_id']
	);
    $ejecutar = 0;
    if ($_FILES['empr_ipe']['name'] != '') {
        $url_per = $function->validateImg($_FILES['empr_ipe'], $_SESSION['usua_id'],"empresa");
        if ($url_per == "existe") {
            header("Location: clientes&alert=0&text=No se permite subir las mismas imagenes!");
            $ejecutar++;
        } else if ($url_per == "nopermitido") {
            header("Location: clientes&alert=0&text=Tamaño o tipo de la imagen no permitido!");
            $ejecutar++;
        } else {
            $company_data['empr_ipe'] = $url_per;
        }
    }
    $tex="Error al guardar!";
    if ($_FILES['empr_ipo']['name'] != '') {
        $url_por = $function->validateImg($_FILES['empr_ipo'],  $_SESSION['usua_id'],"empresa");
        if ($url_por == "existe") {
            $tex= "No se permite subir las mismas imagenes!";
            $ejecutar++;
        } else if ($url_por == "nopermitido") {
            $tex= "Tamaño o tipo de la imagen no permitido!";
            $ejecutar++;
        } else {
            $company_data['empr_ipo'] = $url_por;
        }
    }
    if ($ejecutar == 0) {
        $client->ins_company($company_data);
        header("Location: clientes&alert=1&text=Empresa registrada correctamente!");
    } else {
        header("Location: clientes&alert=0&text=".$tex);
    }

} else if ($_POST['crud'] == "edi-empr") {
    $company_data = array(
        'empr_id' => $_POST['empr_id'],
        'empr_nom' => $_POST['empr_nom'],
        'empr_des' => $_POST['empr_des'],
        'empr_nit' => $_POST['empr_nit'],
        'empr_web' => $_POST['empr_web'],
        'empr_dir' => $_POST['empr_dir'],
        'empr_ciu' => $_POST['empr_ciu'],
        'empr_pai' => $_POST['empr_pai'],
        'empr_fec' => $_POST['empr_fec'],
        'empr_ipe' => $_POST['empr_ipea'],
        'empr_ipo' => $_POST['empr_ipoa'],
        'empr_tipo_fk' => $_POST['empr_tipo_fk'],
        'empr_usua_fk' => $_SESSION['usua_id']
    );
    $ejecutar = 0;
    if ($_FILES['empr_ipe']['name'] != '') {
        $url_per = $function->validateImg($_FILES['empr_ipe'], $_POST['empr_id'],"empresa");
        if ($url_per == "existe") {
            header("Location: clientes&alert=0&text=No se permite subir las mismas imagenes!");
            $ejecutar++;
        } else if ($url_per == "nopermitido") {
            header("Location: clientes&alert=0&text=Tamaño o tipo de la imagen no permitido!");
            $ejecutar++;
        } else {
            $company_data['empr_ipe'] = $url_per;
        }
    }
    if ($_FILES['empr_ipo']['name'] != '') {
        $url_por = $function->validateImg($_FILES['empr_ipo'],  $_POST['empr_id'],"empresa");
        if ($url_por == "existe") {
            header("Location: clientes&alert=0&text=No se permite subir las mismas imagenes!");
            $ejecutar++;
        } else if ($url_por == "nopermitido") {
            header("Location: clientes&alert=0&text=Tamaño o tipo de la imagen no permitido!");
            $ejecutar++;
        } else {
            $company_data['empr_ipo'] = $url_por;
        }
    }

    if ($ejecutar == 0) {
        $client->upd_company($company_data);
        header("Location: clientes&alert=1&text=Empresa modificada correctamente!");
    } else {
        header("Location: clientes&alert=0&text=Error al guardar!");
    }

} else if ($_POST['crud'] == "del-empr") {
	if($client->del_company($_POST['empr_id'])){
        header("Location: clientes&alert=1&text=Empresa eliminada correctamente!");
    }else{
        header("Location: clientes&alert=0&text=Error al eliminar la empresa!");
    }
	
} else if ($_POST['crud'] == "add-clie") {
    $ejecutar = 0;
    $client_data = array(
        'clie_ipe' => "",
        'clie_empr_fk' => $_POST['clie_empr_fk'],
        'clie_pno' => $_POST['clie_pno'],
        'clie_sno' => $_POST['clie_sno'],
        'clie_pap' => $_POST['clie_pap'],
        'clie_sap' => $_POST['clie_sap'],
        'clie_ema' => $_POST['clie_ema'],
        'clie_nid' => $_POST['clie_nid'],
        'clie_cel' => $_POST['clie_cel'],
        'clie_dir' => $_POST['clie_dir'],
        'clie_dir' => $_POST['clie_dir'],
        'clie_ciu' => $_POST['clie_ciu'],
        'clie_pai' => $_POST['clie_pai'],
        'clie_pas' => $_POST['clie_pas'],
        'clie_fec' => $_POST['clie_fec'],
        'clie_esta_fk' => $_POST['clie_esta_fk'],
        'clie_usua_fk' => $_SESSION['usua_id']
    );
    if ($_FILES['clie_ipe']['name'] != '') {
        $url_per = $function->validateImg($_FILES['clie_ipe'], $_POST['clie_empr_fk'],"empresa");
        if ($url_per == "existe") {
            header("Location: clientes&alert=0&text=No se permite subir las mismas imagenes!");
            $ejecutar++;
        } else if ($url_per == "nopermitido") {
            header("Location: clientes&alert=0&text=Tamaño o tipo de la imagen no permitido!");
            $ejecutar++;
        } else {
            $client_data['clie_ipe'] = $url_per;
        }
    }
    if ($ejecutar == 0) {
        $client->ins($client_data);
        header("Location: clientes&alert=1&text=Cliente registrado correctamente!");
    } else {
        header("Location: clientes&alert=0&text=Error al guardar!");
    }
    
} else if ($_POST['crud'] == "edi-clie") {
    $ejecutar = 0;
    $client_data = array(
        'clie_ipe' => "",
        'clie_empr_fk' => $_POST['clie_empr_fk'],
        'clie_id' => $_POST['clie_id'],
        'clie_pno' => $_POST['clie_pno'],
        'clie_sno' => $_POST['clie_sno'],
        'clie_pap' => $_POST['clie_pap'],
        'clie_sap' => $_POST['clie_sap'],
        'clie_ema' => $_POST['clie_ema'],
        'clie_nid' => $_POST['clie_nid'],
        'clie_cel' => $_POST['clie_cel'],
        'clie_dir' => $_POST['clie_dir'],
        'clie_ciu' => $_POST['clie_ciu'],
        'clie_pai' => $_POST['clie_pai'],
        'clie_fec' => $_POST['clie_fec'],
        'clie_esta_fk' => $_POST['clie_esta_fk'],
        'clie_usua_fk' => $_SESSION['usua_id']
    );
    if ($_FILES['clie_ipe']['name'] != '') {
        $url_per = $function->validateImg($_FILES['clie_ipe'], $_POST['clie_empr_fk'],"cliente");
        if ($url_per == "existe") {
            header("Location: clientes&alert=0&text=No se permite subir las mismas imagenes!");
            $ejecutar++;
        } else if ($url_per == "nopermitido") {
            header("Location: clientes&alert=0&text=Tamaño o tipo de la imagen no permitido!");
            $ejecutar++;
        } else {
            $client_data['clie_ipe'] = $url_per;
        }
    }
    if ($ejecutar == 0) {
        $client->upd($client_data);
        header("Location: clientes&alert=1&text=Cliente modificado correctamente!");
    } else {
        header("Location: clientes&alert=0&text=Error al actualizar!");
    }
} else if ($_POST['crud'] == "del-clie") {
    if($client->del($_POST['clie_id'])){
        header("Location: clientes&alert=1&text=Cliente eliminado correctamente!");
    }else{
        header("Location: clientes&alert=0&text=Error al eliminar el cliente");
    }
    
}
?>
