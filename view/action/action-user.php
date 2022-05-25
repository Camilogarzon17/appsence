<?php 
$user = new userController();
$function = new functionModel();
$Mail = new mailController();

if ($_POST['crud'] == "edi") {
    $user_set = array(
        'usua_id'      => $_POST['usua_id'],
        'usua_pno'     => $_POST['usua_pno'],
        'usua_sno'     => $_POST['usua_sno'],
        'usua_pap'     => $_POST['usua_pap'],
        'usua_sap'     => $_POST['usua_sap'],
        'usua_nid'     => $_POST['usua_nid'],
        'usua_ema'     => $_POST['usua_ema'],
        'usua_ipe'     => $_POST['usua_ipea'],
        'usua_ipo'     => $_POST['usua_ipoa'],
        'usua_col'     => $_POST['usua_col'],
        'usua_pro'     => $_POST['usua_pro'],
        'usua_dir'     => $_POST['usua_dir'],
        'usua_ciu'     => $_POST['usua_ciu'],
        'usua_pai'     => $_POST['usua_pai'],
        'usua_fna'     => $_POST['usua_fna'],
        'usua_cel'     => $_POST['usua_cel'],
        'usua_rol'     => $_POST['usua_rol'],
        'usua_care_fk'     => $_POST['usua_care_fk'],
        'usua_sex'     => $_POST['usua_sex'],
        'usua_esta_fk'     => $_POST['usua_esta_fk']
    );
    $ejecutar = 0;
    if ($_FILES['usua_ipe']['name'] != '') {
        $url_per = $function->validateImg($_FILES['usua_ipe'],$_SESSION['usua_id'],"usuario");
        if ($url_per == "existe") {
            header("Location: ajustes&alert=0&text=No se permite subir las mismas imagenes!");
            $ejecutar++;
        } else if ($url_per == "nopermitido") {
            header("Location: ajustes&alert=0&text=Tamaño o tipo de la imagen no permitido!");
            $ejecutar++;
        } else {
            $user_set['usua_ipe'] = $url_per;
            unlink($_POST['usua_ipea']);
            if ($_POST['usua_id'] == $_SESSION['usua_id']) {
                $_SESSION['usua_ipe'] = $url_per;
            }            
        }
    }
    if ($_FILES['usua_ipo']['name'] != '') {
        $url_por = $function->validateImg($_FILES['usua_ipo'], $_SESSION['usua_id'],"usuario");
        if ($url_por == "existe") {
            header("Location: ajustes&alert=0&text=No se permite subir las mismas imagenes!");
            $ejecutar++;
        } else if ($url_por == "nopermitido") {
            header("Location: ajustes&alert=0&text=Tamaño o tipo de la imagen no permitido!");
            $ejecutar++;
        } else {
            $user_set['usua_ipo'] = $url_por;
            unlink($_POST['usua_ipoa']);
        }
    }
    if ($ejecutar == 0) {
        $user->upd($user_set);
        if ($_POST['usua_id'] == $_SESSION['usua_id']) {
            $_SESSION['color'] = $function->color_rgb($_POST['usua_col']);
        }
        header("Location: ajustes&alert=1&text=Datos modificados correctamente!");
    } else {
        header("Location: ajustes&alert=0&text=Error al guardar los cambios!");
    }
}else if($_POST['crud'] == "add"){
    //echo "Agregar usuario";
    $user_data = array(
        'usua_pno'     => $_POST['usua_pno'],
        'usua_sno'     => $_POST['usua_sno'],
        'usua_pap'     => $_POST['usua_pap'],
        'usua_sap'     => $_POST['usua_sap'],
        'usua_nid'     => $_POST['usua_nid'],
        'usua_ema'     => $_POST['usua_ema'],
        'usua_col'     => $_POST['usua_col'],
        'usua_pro'     => $_POST['usua_pro'],
        'usua_dir'     => $_POST['usua_dir'],
        'usua_ciu'     => $_POST['usua_ciu'],
        'usua_pai'     => $_POST['usua_pai'],
        'usua_fna'     => $_POST['usua_fna'],
        'usua_cel'     => $_POST['usua_cel'],
        'usua_rol'     => $_POST['usua_rol'],
        'usua_pas'     => password_hash($_POST['usua_pas'],PASSWORD_DEFAULT),
        'usua_care_fk'     => $_POST['usua_care_fk'],
        'usua_sex'     => $_POST['usua_sex'],
        'usua_esta_fk'     => $_POST['usua_esta_fk']       
    );
    $ejecutar = 0;
    $user_data['usua_ipe']  = "public/img/usuario/0/user - new.jpg";

    if ($_FILES['usua_ipe']['name'] != '') {
        $url_per = $function->validateImg($_FILES['usua_ipe'],"0","usuario");
        if ($url_per == "existe") {
            header("Location: usuarios&alert=0&text=No se permite subir las mismas imagenes!");
            $ejecutar++;
        } else if ($url_per == "nopermitido") {
            header("Location: usuarios&alert=0&text=Tamaño o tipo de la imagen no permitido!");
            $ejecutar++;
        } else {
            $user_data['usua_ipe'] = $url_per;
        }
    }

    if ($_FILES['usua_ipo']['name'] != '') {
        $url_por = $function->validateImg($_FILES['usua_ipo'], "0","usuario");
        if ($url_por == "existe") {
            header("Location: usuarios&alert=0&text=No se permite subir las mismas imagenes!");
            $ejecutar++;
        } else if ($url_por == "nopermitido") {
            header("Location: usuarios&alert=0&text=Tamaño o tipo de la imagen no permitido!");
            $ejecutar++;
        } else {
            $user_data['usua_ipo'] = $url_por;
        }
    }
    if ($ejecutar == 0) {
        //var_dump($user_data);
        $user->ins($user_data);
        header("Location: usuarios&alert=1&text=Usuario registrado correctamente!");
    } else {
        header("Location: usuarios&alert=0&text=Error al registrar el usuario!");
    }
}else if ($_POST['crud'] == "del") {
    $user->del($_POST['usua_id']);
    header("Location: usuarios&alert=1&text=Usuario eliminado correctamente!");
}else if ($_POST['crud'] == "pas") {
    if (password_verify($_POST['contra-actual'],$_POST['usua_pas'])) {
        $user->update_pass($_POST['contra-nueva2'], $_SESSION['usua_id']);
        $data = $user->sel($_SESSION['usua_id'])[0];
        $Mail->sendChangePasswordMail($data['usua_ema'], $data['usua_pno']." ".$data['usua_pap']);
        $user_s = new sessionController();
        session_destroy();
        header("Location: ajustes&alert=1&text=Contraseña cambiada con exito, por favor inicie sesión nuevamente!");
    } else {
        header("Location: ajustes&alert=0&text=Valide su contraseña actual!");
    }
}else if ($_POST['crud'] == "rec") {
    $user_recu = new sessionController();
    $rec = $user_recu->login($_POST['email']);
    if( empty($rec) ) {
        header("Location: &alert=0&text=Información no encontrada para el usuario ".$_POST['email']."!");
    }else{
        $caracteres='ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789*#./[]';
        $longpalabra=12;
        for($pass='', $n=strlen($caracteres)-1; strlen($pass) < $longpalabra ; ) {
          $x = rand(0,$n);
          $pass.= $caracteres[$x];
        }
        //$asunto = 'Develtec | Restablecimiento de contraseña';
        //$remitente = "noreply@develtec.net"; 
        // $contenido = "Esta es tu nueva contraseña: ".$pass;
        //$headers = "From: Develtec | Restablecimiento de contraseña <".$remitente."> \r\n";
        // $headers .= "Reply-To: andrestorres@develtec.net\r\n"; //La dirección por defecto si se responde el email enviado.
        //$headers .= "MIME-Version: 1.0\r\n";
        //$headers .= "Content-Type: text/html; charset=UTF-8\r\n";
        if($Mail->sendRecoveryMail($_POST['email'],$rec['usua_pno'] . " ".$rec['usua_pap'],$pass)){
            $user->update_pass($pass, $rec[0]['usua_id']);
            header("Location: &alert=1&text=Su contraseña a sido restablecida con exito, verifique su correo ".$_POST['email']."!"); 
        }else{
        header("Location: &alert=0&text=Error al restablecer contraseña!"); 
        }
        
    }   
}else if($_POST['crud'] == "add-carg"){
    $cargo_data = array(
        'care_nom' => $_POST['care_nom'],
        'care_area_fk' => $_POST['care_area_fk']
    );
    //var_dump($cargo_data);
    if($user->ins_cargo($cargo_data)){
        header("Location: usuarios&alert=1&text=Cargo registrado correctamente!");
    } else {
        header("Location: usuarios&alert=0&text=Error al registrar el cargo!");
    }
}else if($_POST['crud'] == "del-carg") {
    $user->del_cargo($_POST['care_id']);
    header("Location: usuarios&alert=1&text=Cargo eliminado correctamente!");
}
 ?>