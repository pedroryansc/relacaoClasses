<?php
    class Apresentacao{
        public static $idtabela = "";
        /**
         * Gera uma tabela em HTML com base nos parâmetros
         * @param String $classe Informar a classe CSS para definir o estilo da tabela
         * @param array $campos Informar lista de campos que devem ser exibidos
         * @param array $lista Informar lista de valores da tabela
         * @param String $consultar Link para consultar o elemento da tabela
         * @param String $alterar Link para alterar o elemento da tabela
         * @param String $excluir Link para excluir o elemento da tabela
         * @return
         */
        public static function geraTabela($classe, array $campos, array $lista, $consultar, $alterar, $excluir){
            $tabela = "<table class=$classe>";
            // Gerar cabeçalho da tabela
            $tabela .= "<thead><tr>";
            foreach($campos as $item){
                $tabela .= "<th>{$item[1]}</th>"; // Exemplo item["id"=>"Identificador"]
            }
            $tabela .= "</tr></thead>";
            // Gerar itens da tabela
            foreach($lista as $linha){
                $tabela .= "<tr>";
                foreach($campos as $chave=>$valor){ // Para cada campo do vetor $campos
                    $tabela .= "<td>".$linha[$chave]."</td>";
                }
                // Opções de consultar, alterar e excluir
                $tabela .= "<td><a href=".$consultar.$linha[self::$idtabela].">Consultar</a></td>
                            <td><a href=".$alterar.$linha[self::$idtabela].">Alterar</a></td>
                            <td><a href=".$excluir.$linha[self::$idtabela].">Excluir</a></td>";
                //Finaliza tabela
                $tabela .= "</tr>";
            }
            $tabela .= "</table>";
            return $tabela;
        }

        public static function geraTabelaView($classe, $lista, $consultar, $alterar, $excluir){
            $tabela = "<table class=$classe>";
            // Gerar cabeçalho da tabela
            $tabela .= "<thead><tr>";
            // Gerar itens da tabela
            foreach($lista as $linha){
                $tabela .= "<tr>";
                foreach($campos as $chave=>$valor){ // Para cada campo do da lista
                    $tabela .= "<td>".$linha[$chave]."</td>";
                }
                // Opções de consultar, alterar e excluir
                $tabela .= "<td><a href=".$consultar.$linha["id"].">Consultar</a></td>
                            <td><a href=".$alterar.$linha["id"].">Alterar</a></td>
                            <td><a href=".$excluir.$linha["id"].">Excluir</a></td>";
                //Finaliza tabela
                $tabela .= "</tr>";
            }
            $tabela .= "</table>";
            return $tabela;
        }
    }
?>