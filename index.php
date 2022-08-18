<!DOCTYPE html>
<?php
    require("autoload.php");

    require("view/Apresentacao.class.php");
?>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        $tipo = isset($_GET["tipo"]) ? $_GET["tipo"] : 0;
        $procurar = isset($_GET["procurar"]) ? $_GET["procurar"] : "";

        $lista = Quadrado::listar($tipo, $procurar);
        $campos = array("idquadrado"=>"Id", "lado"=>"Lado", "cor"=>"Cor", "tabuleiro_idtabuleiro"=>"Tabuleiro");
        
        $consultar = "processa.php?acao=excluir&id=".$linha["idquadrado"];
        $alterar = "index.php?acao=editar&id=".$linha["idquadrado"];
        $excluir = "processa.php?acao=consultar&id=".$linha["idquadrado"];

        // Apresentacao::$idtabela = "idquadrado";

        // $tabela = Apresentacao::geraTabela("tabela", $campos, $lista, $consultar, $alterar, $excluir);

        // echo $tabela;
    ?>
</body>
</html>