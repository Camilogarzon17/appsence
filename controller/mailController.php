<?php

require('./public/lib/mailer/src/PHPMailer.php');
require("./public/lib/mailer/src/SMTP.php");
require('./public/lib/mailer/src/Exception.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


class mailController
{

    private static $host = 'smtp.mailtrap.io';
    private static $username = '4870ef8a8bc3c1';
    private static $password = 'c015cdcdef9b62';
    private static $encryption = 'tls';
    private static $port = 25;
    private static $from_mail = 'info@appsense.com';
    private static $from_name = 'Appsense';

    private $oMail;

    public function __construct()
    {
        $this->oMail = new PHPMailer();
        $this->oMail->isSMTP();
        $this->oMail->Host = self::$host;
        $this->oMail->Username = self::$username;
        $this->oMail->Password = self::$password;
        $this->oMail->SMTPAuth = true;
        $this->oMail->SMTPSecure = self::$encryption;
        $this->oMail->Port = self::$port;
        $this->oMail->From = self::$from_mail;
        $this->oMail->FromName = self::$from_name;
        $this->oMail->ContentType = 'text/html';
        $this->oMail->CharSet = 'UTF-8';
    }


    public function sendRecoveryMail($address, $name, $password)
    {

        $this->oMail->addAddress($address, $name);
        if ($this->send("password_recovery", "Recuperación de contraseña ", $password)) {
            return ["type" => "pos", "text" => "Mensaje enviado"];
        } else {
            //echo $oMail->ErrorInfo;
            return ["type" => "neg", "text" => "Ocurrió un error enviando el correo de recuperación"];
        }
    }

    public function sendChangePasswordMail($address, $name = "")
    {

        $this->oMail->addAddress($address, $name);

        if ($this->send("change_password", "Cambio de contraseña")) {
            return ["type" => "pos", "text" => "Mensaje enviado"];
        } else {
            //echo $this->oMail->ErrorInfo;
            return ["type" => "neg", "text" => "Ocurrió un error enviando el correo de cambio de contraseña"];
        }
    }

    private function send($view, $subject = "", $password = "")
    {
        $this->oMail->Subject = $subject;
        include('./view/mail/'.$view.".php");
        //$this->oMail->Body = file_get_contents('./view/mail/'.$view.".php");
        $this->oMail->Body = $HTML;
        return $this->oMail->send();
    }
}
