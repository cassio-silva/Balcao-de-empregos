<?php
    class Ocupacao
    {
        private $id;
        private $nomeOcupacao;
        
        public function getId(){
            return $this->id;
        }
        public function setId($id){
            $this->id = $id;
            return $this;
        }
        
        public function getNomeOcupacao() {
            return $this->nomeOcupacao;
        }
        public function setNomeOcupacao($nomeOcupacao) {
            $this->nomeOcupacao = $nomeOcupacao;
            return $this;
        }
    }