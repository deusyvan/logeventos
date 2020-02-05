<?php 
class Historico {
    
    private $pdo;
    public function __construct()
    {
        $this->pdo = new PDO("mysql:dbname=logeventos;host=localhost", "dfsweb","28033011");
    }
    
    public function registrar($acao)
    {
        $ip = $_SERVER['REMOTE_ADDR'];
        
        $sql = "INSERT INTO historico SET ip = :ip, data_acao = NOW(), acao = :acao";
        $sql = $this->pdo->prepare($sql);
        $sql->bindValue(":acao", $acao);
        $sql->bindValue(":ip", $ip);
        $sql->execute();
    }
}