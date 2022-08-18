<?php
    require_once("autoload.php");

    class Quadrado extends Forma{
        private $lado;
        public function __construct($id, $lado, $cor, $tabuleiro){
            parent::__construct($id, $cor, $tabuleiro);
            $this->setLado($lado);
        }

        public function setLado($lado){
            if($lado > 0)
                $this->lado = $lado;
            else
                throw new Exception("Valor do lado inválido: $lado");
        }

        public function getLado(){ return $this->lado; }

        public function insere(){
            $sql = "INSERT INTO quadrado (lado, cor, tabuleiro_idtabuleiro) VALUES(:lado, :cor, :tabuleiro)";
            $par = array(":lado"=>$this->getLado(), ":cor"=>$this->getCor(), ":tabuleiro"=>$this->getIdTabuleiro());
            return parent::executaComando($sql, $par);
        }

        public static function listar($tipo = 0, $info = ""){
            $sql = "SELECT * FROM view quadrado";
            if($tipo > 0 && $info <> ""){
                switch($tipo){
                    case(1): $sql .= " WHERE Id = :info"; break;
                    case(2): $sql .= " WHERE Lado LIKE :info"; $info .= "%"; break;
                    case(3): $sql .= " WHERE Cor LIKE :info"; $info = "%".$info."%"; break;
                    case(4): $sql .= " WHERE Tabuleiro = :info"; break;
                }
                $par = array(":info"=>$info);
            } else
                $par = array();
            return parent::buscar($sql, $par);
        }

        /**
         * 1. Montar SQL - Comando para inserir os dados
         * 2. "Vincular" os parâmetros
         * 3. Executar e retornar o resultado
         * @access public
         * @return String
         */

        public function editar(){
            $sql = "UPDATE quadrado
                    SET lado = :lado, cor = :cor, tabuleiro_idtabuleiro = :tabuleiro
                    WHERE idquadrado = :id";
            $par = array(":lado"=>$this->getLado(),
                        ":cor"=>$this->getCor(),
                        ":tabuleiro"=>$this->getIdTabuleiro(),
                        ":id"=>$this->getId());
            return parent::executaComando($sql, $par);
        }
        
        public function excluir(){
            $sql = "DELETE FROM quadrado WHERE idquadrado = :id";
            $par = array(":id"=>$this->getId());
            return parent::executaComando($sql, $par);
        }

        public function calculaArea(){
            return pow($this->getLado(), 2);
        }
        public function calculaPerimetro(){
            return $this->getLado() * 4;
        }

        public function __toString(){
            return "<a href='quadrado.php'>Voltar à página de quadrados</a> <br>".
                    "<br>".
                    "<header>".
                        "<h2>Quadrado ".$this->getId()."</h2>".
                    "</header>".
                    "<br>".
                    "Lado: ".$this->getLado()." <br>".
                    "Área: ".$this->calculaArea()." <br>".
                    "Perímetro: ".$this->calculaPerimetro()." <br>".
                    "<br>";
        }
        public function desenha(){
            return $this->__toString().
                    "<div style='
                        width: ".$this->getLado()."em;
                        height: ".$this->getLado()."em;
                        background: ".$this->getCor().";
                    '></div>";
        }
    }
?>