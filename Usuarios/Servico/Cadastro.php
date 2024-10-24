<?php

require_once __DIR__.'/../../Conexao/Conexao.php';
require_once __DIR__.'/../Model/Usuarios.php';

class Cadastro {

    public function registrar($nome, $email, $senha, $codigoUnico)
    {
        $title = Usuarios::getTitle($codigoUnico);
        $title = empty($title) ? 'Não existe titulo para esse cod na api' : $title;
        $usuario = new Usuarios($nome, $email, $senha, $codigoUnico, $title);

        if (!$usuario->salvarUsuario()) {
            return false;
        }

        header('Location: ../../index.php');

    }
}

?>
