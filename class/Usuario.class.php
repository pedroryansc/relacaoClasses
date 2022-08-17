<?php
    require_once("../autoload.php");

    /* abstract */ class Usuario{
        private $id;
        private $nome;
        private $sobrenome;
        private $email;
        private $senha;
        private $endereco; //Associação (?)
        // Agregação ou Composição? = private $enderecos = array();
        private $contatos;
        public function __construct($id, $nome, $sobrenome, $email, $senha, Endereco $endereco, $idcontato, $tipocontato, $descricaocontato){
            $this->setId($id);
            $this->setNome($nome);
            $this->setSobrenome($sobrenome);
            $this->setEmail($email);
            $this->setSenha($senha);
            $this->setEndereco($endereco); //Associação (?)
            // Agregação ou Composição? = $this->addEndereco(Endereco $endereco);
            $this->contatos = array();
            $this->criarContato($idcontato, $tipocontato, $descricaocontato);
        }

        public function setId($id){ $this->id = $id; }
        public function setNome($nome){ $this->nome = $nome; }
        public function setSobrenome($sobrenome){ $this->sobrenome = $sobrenome; }
        public function setEmail($email){ $this->email = $email; }
        public function setSenha($senha){ $this->senha = $senha; }
        public function setEndereco($endereco){ $this->endereco = $endereco; }

        public function criarContato($id, $tipo, $descricao){
            $contato = new Contato($id, $tipo, $descricao);
            $this->addContato($contato);
        }
        private function addContato(Contato $contato){
            array_push($this->contatos, $contato);
        }

        public function listaContatos(){
            foreach($this->contatos as $contato){
                echo "Tipo: ".$contato->getTipo()."; Descrição: ".$contato->getDescricao()."<br>";
            }
        }

        public function getId(){ return $this->id; }
        public function getNome(){ return $this->nome; }
        public function getSobrenome(){ return $this->sobrenome; }
        public function getEmail(){ return $this->email; }
        public function getSenha(){ return $this->senha; }
        public function getEndereco(){ return $this->endereco; }

        /**
         * public abstract function login($email, $senha);
         */
    }

    /**
     * Instância de objetos e teste de classes
     */

    $end = new Endereco(1, "São João", 123, 456, 789, 101);
    $usuario = new Usuario(1, "Marcela", "Leite", "marcela.leite@ifc.edu.br", 123, $end, 1, "WhatsApp", "4002-8922");
    
    var_dump($usuario);

    echo "<br><br>".$usuario->getEndereco()->getRua()."<br><br>";

    $usuario->criarContato(2, "Twitter", "@pedrosc");

    $usuario->listaContatos();

?>