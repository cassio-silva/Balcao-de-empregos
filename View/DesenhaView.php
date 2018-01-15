<?php
class Desenha 
{
    public function desenhaTabelaHTML($array)
    {
        foreach($array as $value)
        {
            $texto = 
            "<tr>"
            ."<td>". $value['id']."</td>"
            ."<td>". $value['ocupacao']."</td>"
            ."</tr>";
            echo $texto;
        }
    }
    public function desenhaAlertaBootstrapAviso($mensagem)
    {
        $texto = 
        "<div class='alert alert-warning alert-dismissible' role='alert'>$mensagem
            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                <span aria-hidden='true'>&times;</span>
            </button>
        </div>";
        return $texto;
    }
    public function desenhaAlertaBootstrapSucesso($mensagem)
    {
        $texto = 
        "<div class='alert alert-success alert-dismissible' role='alert'>$mensagem
            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                <span aria-hidden='true'>&times;</span>
            </button>
        </div>";
        return $texto;
    }
    public function desenhaLinha($campo) 
    {
        $texto = "<h1 class=''>$campo</h1>";
        echo $texto;
    }
    public function tratamentoExcecaoPDO($excecaoPDO, $acao)
    {
        $texto = 
            "<div class='container row col-lg-8 col-md-8 col-sm-8'>".
            "<p>Erro ao $acao: $excecaoPDO</p></br>".
            "</div>";
        echo $texto;
    }
}