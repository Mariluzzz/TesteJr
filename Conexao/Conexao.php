<?php

class Conexao {
    protected $host, $db, $user, $password;
    private static $instancia = null;
    private $conn;

    public function __construct() 
    {
        $this->setaValoresConexao();
        $this->conexaoBanco();
    }

    public function setaValoresConexao()
    {
        $this->host = 'localhost';
        $this->db = 'test';
        $this->user = 'root';
        $this->password = 'root';
    }

    public function conexaoBanco()
    {
        try {
            $this->conn = new PDO("mysql:host=$this->host;dbname=$this->db;charset=utf8mb4", $this->user, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Erro ao iniciar a conexão com o banco: " . $e->getMessage());
        }
    }

    public static function verificaInstancia() 
    {
        if (self::$instancia == null) {
            self::$instancia = new Conexao();
        }

        return self::$instancia;
    }

    public function getConexaoBanco()
    {
        return $this->conn;
    }

}




?>
