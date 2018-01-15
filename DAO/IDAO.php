<?php
interface IDAO 
{
    public function selecionar();
    public function selecionarPorId($id);
    public function inserir(Modelo $ocupacao);
    public function atualizar($ocupacao);
    public function excluir($ocupacao);
}