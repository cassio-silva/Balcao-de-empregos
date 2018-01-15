<?php 

class AcessoDados 
{
    private $_server = "localhost";
    private $_user = "root";
    private $_passwd = "";
    private $_bd = "bd_balcao_empregos";
    private $conn;
    
    public function conectaBanco()
    {
        try
        {
            $this->conn = new PDO("mysql:host=$this->_server;dbname=$this->_bd", $this->_user, $this->_passwd);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $this->conn;
        }
        catch (PDOException $e)
        {
            print "Erro ao criar a conexao: ".$e->getMessage() ."</br>";
            die();
        }
    }
    public function encerraConexao()
    {
        if($this->conn != NULL)
        {
            $this->conn = NULL;
        }
    }
    public function buscaRegistro($comando)
    {
        $conexao = $this->conectaBanco();
        $lista = $conexao->query($comando);
        $lista->execute();
        $listaResult = $lista->fetchAll();
        return $listaResult;
    }
    public function executaComando($comando)
    {
        $conexao = $this->conectaBanco();
        $comandoPreparado = $conexao->prepare($comando);
        $comandoPreparado->execute();
        $coluna = $comandoPreparado->fetchColumn();
        return $coluna;
    }
    public function executaSemRetorno($comando)
    {
        $conexao = $this->conectaBanco();
        $conexao->beginTransaction();
        $conexao->exec($comando);
        $conexao->commit();
    }
}