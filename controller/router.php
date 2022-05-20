<?php 
class router {
    public $router;

    public function __construct($route) {
        $session_options = array(
            'use_only_cookies' => 1,
            'read_and_close' => true
        );
        if( !isset($_SESSION) )  session_start();
        if( isset($_POST['email']) && isset($_POST['password']) ) {
            $user_session = new sessionController();
            $session = $user_session->login($_POST['email'], $_POST['password']);
            $alert = new functionModel();
            if( empty($session) ) {
                $login_form = new viewController();
                $login_form->load_view('login');
                $user_session->newHistory($_POST['email'], $_POST['password']);
                $alert->alertas("El usuario " . $_POST['email'] . " y el password proporcionado no coinciden","neg");
            } else { 
                if ($session[0]["usua_esta_fk"]==1) {                   
                    $_SESSION['ok'] = true;
                    $function   = new functionModel();
                    foreach ($session as $row) {
                        $_SESSION['usua_id'] = $row["usua_id"]; 
                        $_SESSION['correo'] = $row['usua_ema'];
                        $_SESSION['nombre'] = $row['usua_pno']." ".$row['usua_pap']; 
                        $_SESSION['usua_ipe'] = $row['usua_ipe'];
                        $_SESSION['usua_rol'] = $row['usua_rol'];
                        $_SESSION['color'] = $function->color_rgb($row['usua_col']);
                    }
                    if (empty($_GET['r'])) {
                        header('Location: ./ajustes');
                    }else{
                        header('Location: ./'.$_GET['r']);
                    }
                }else{
                    $alert->alertas("El usuario " . $_POST['email'] . " se encuentra en estado inactivo, comuniquese con el proveedor de servicios","neg");
                }
            }
        } 
        
        if( !isset($_SESSION['ok']) )  $_SESSION['ok'] = false;
        if($_SESSION['ok']== false ) $_GET['r'] = 'login';
        if( $_SESSION['ok']== true AND isset($_GET['r']) AND  $_GET['r'] ==  'login') $_GET['r'] = 'escritorio';
        if( $_SESSION['ok']== true AND empty($_GET['r'])) $_GET['r'] = 'escritorio';
        $this->router = isset($_GET['r']) ? $_GET['r'] : 'login';
        $controller = new viewController();

        switch ($this->router) {
            case 'login':
                if (isset($_POST['crud'])) $controller->load_page('action/action-user'); 
                else if (!isset($_POST['envi-form'])) $controller->load_view('login'); 
                else if ($_POST['envi-form'] == 'form-contact') $controller->load_page('action/action-contact'); 
                break;
            case 'escritorio':
                $controller->load_view('escritorio');
                break;
            case 'ajustes':
                if (!isset($_POST['crud'])) $controller->load_view('ajustes');
                else if ($_POST['crud'] == 'edi') $controller->load_page('action/action-user');
                else if ($_POST['crud'] == 'pas') $controller->load_page('action/action-user');
                break;
            case 'ausencias':
                if (!isset($_POST['crud'])) $controller->load_view('ausencias');
                else if ($_POST['crud'] == 'add-ause') $controller->load_page('action/action-quotation');
                else if ($_POST['crud'] == 'del-ause') $controller->load_page('action/action-quotation');
                else if ($_POST['crud'] == 'val-ause') $controller->load_page('action/action-quotation');
                else if ($_POST['crud'] == 'add-taus') $controller->load_page('action/action-quotation');
                else if ($_POST['crud'] == 'del-taus') $controller->load_page('action/action-quotation');
                break;
            case 'usuarios':
                if (!isset($_POST['crud'])) $controller->load_view('usuarios');
                else if ($_POST['crud'] == 'edi') $controller->load_page('action/action-user');
                else if ($_POST['crud'] == 'add') $controller->load_page('action/action-user');
                else if ($_POST['crud'] == 'del') $controller->load_page('action/action-user');
                else if ($_POST['crud'] == 'add-carg') $controller->load_page('action/action-user');
                else if ($_POST['crud'] == 'del-carg') $controller->load_page('action/action-user');
                break;
            case 'cerrar-sesion':
                $user_session = new sessionController();
                $user_session->logout();
                break;
            default:
                $controller->load_page($this->router);
                break;
        }
        
    }
}

?>