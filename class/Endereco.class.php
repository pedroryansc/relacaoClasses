<?php
    class Endereco{
        private $id;
        private $rua;
        private $numero;
        private $bairro;
        private $latitude;
        private $longitude;
        public function __construct($id, $rua, $numero, $bairro, $latitude, $longitude){
            $this->setId($id);
            $this->setRua($rua);
            $this->setNumero($numero);
            $this->setBairro($bairro);
            $this->setLatitude($latitude);
            $this->setLongitude($longitude);
        }

        public function setId($id){ $this->id = $id; }
        public function setRua($rua){ $this->rua = $rua; }
        public function setNumero($numero){ $this->numero = $numero; }
        public function setBairro($bairro){ $this->bairro = $bairro; }
        public function setLatitude($latitude){ $this->latitude = $latitude; }
        public function setLongitude($longitude){ $this->longitude = $longitude; }

        public function getId(){ return $this->id; }
        public function getRua(){ return $this->rua; }
        public function getNumero(){ return $this->numero; }
        public function getBairro(){ return $this->bairro; }
        public function getLatitude(){ return $this->latitude; }
        public function getLongitude(){ return $this->longitude; }
    }
?>