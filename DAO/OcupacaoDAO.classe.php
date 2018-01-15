<?php 
include "Classes/Dominio/Ocupacao.php";
include "AcessoDadosPDO.php";
include "IDAO.php";

class OcupacaoDAO implements IDAO
{
    private $TABLE_NAME = "tbl_ocupacao";

    public function selecionar()
    {
        $conexao = new AcessoDados();
        try{
            $listaResult = $conexao->buscaRegistro("SELECT * FROM $this->TABLE_NAME");
            $conexao->encerraConexao();
            return $listaResult;
        }
        catch (PDOException $ex) {
            $desenho = new Desenha();
            $desenho->tratamentoExcecaoPDO($ex->getMessage(), "selecionar");
        }        
    }
    public function selecionarPorId($id)
    {
        $conexao = new AcessoDados();
        try{
            $resultado = $conexao->executaComando("SELECT ocupacao FROM $this->TABLE_NAME WHERE id=$id");
            $conexao->encerraConexao();
            return $resultado;
        }
        catch (Exception $ex) {
            $desenho = new Desenha();
            $desenho->tratamentoExcecaoPDO($ex->getMessage(), "selecionar pelo id");
        }
    }
    public function atualizar($ocupacao)
    {
        
        $this->selecionarPorId($ocupacao->getId());
        $nomeOcupacao = $ocupacao->getNomeOcupacao();
        $conexao = new AcessoDados();
        try{
            $conexao->executaComando("UPDATE $this->TABLE_NAME SET ocupacao='$nomeOcupacao' WHERE id=$idOcupacao");
        }
        catch (Exception $ex) {
            $desenho = new Desenha();
            $desenho->tratamentoExcecaoPDO($ex, "atualizar");
        }
    }
    public function excluir($ocupacao)
    {
    }
    public function inserir($ocupacao)
    {
        $conexao = new AcessoDados();
        $nomeOcupacao = $ocupacao->getNomeOcupacao();
        try{
            $conexao->executaSemRetorno("INSERT INTO $this->TABLE_NAME(ocupacao) VALUES ('$nomeOcupacao')");
            $conexao->encerraConexao();
        }
        catch (PDOException $e) {
            $desenho = new Desenha();
            $desenho->tratamentoExcecaoPDO($e->getMessage(), "inserir");
        }
    }
}