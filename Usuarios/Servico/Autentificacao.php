<?php

require_once __DIR__."/../Model/Usuarios.php";

class Autentificacao {
    
    public static function login($email, $senha) 
    {
        $usuario = Usuarios::getUserByEmail($email);

        if ($usuario && password_verify($senha, $usuario['password_user'])) {
            session_start();
            $_SESSION['id_usuario'] = $usuario['in_user'];
            return true;
        }

        return false;
    }

    public static function checarUsuarioLogado()
    {
        session_start();
        return isset($_SESSION['id_usuario']);
    }

    public static function sairSessao()
    {
        session_start();
        session_destroy();
    }
}