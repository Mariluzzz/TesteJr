<?php
require_once __DIR__.'/../../Conexao/Conexao.php';
require_once __DIR__.'/../../Api/Servico/Api.php';

class Usuarios {
    private $id, $nome, $email, $senha, $title, $codigoUnico;

    public function __construct($nome, $email, $senha, $title = '', $codigoUnico) {
        $this->nome = $nome;
        $this->email = $email;
        $this->senha = password_hash($senha, PASSWORD_BCRYPT);
        $this->title = $title;
        $this->codigoUnico = $codigoUnico;
    }

    public function salvarUsuario()
    {
        $conexao = Conexao::verificaInstancia()->getConexaoBanco();
        $stmt = $conexao->prepare("INSERT INTO users (name_user, email_user, password_user, title_user, code_user) VALUES (?, ?, ?, ?, ?)");
        
        return $stmt->execute([$this->nome, $this->email, $this->senha, $this->title, $this->codigoUnico]);
    }

    public static function getTitle($codigoUnico) 
    {
        return Api::buscaTitlePorId($codigoUnico);
    }

    public static function getUserByEmail($email) {
        $conexao = Conexao::verificaInstancia()->getConexaoBanco();
        $stmt = $conexao->prepare("SELECT * FROM users WHERE email_user = ?");
        $stmt->execute([$email]);

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    
}