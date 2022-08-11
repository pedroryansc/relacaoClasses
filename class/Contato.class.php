<?php
    class Contato{
        private $id;
        private $tipo;
        private $descricao;
        public function __construct($id, $tipo, $descricao){
            $this->setId($id);
            $this->setTipo($tipo);
            $this->setDescricao($descricao);
        }

        public function setId($id){ $this->id = $id; }
        public function setTipo($tipo){ $this->tipo = $tipo; }
        public function setDescricao($descricao){ $this->descricao = $descricao; }

        public function getId(){ return $this->id; }
        public function getTipo(){ return $this->tipo; }
        public function getDescricao(){ return $this->descricao; }
    }
?>