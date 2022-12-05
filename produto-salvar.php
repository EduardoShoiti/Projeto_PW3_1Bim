<?php

    $id = $_POST['idProduto'];
    $produto = $_POST['txProduto'];
    $idCat = $_POST['SelectCategoria'];
    $valor = $_POST['txValor'];
    $imagem = $_POST['txImagem'];


    include("conexao.php");

    $stmt = $pdo->prepare("SELECT COUNT(idProduto) FROM tbproduto where idProduto = $id");
    $stmt->execute();

    $row = $stmt ->fetch(PDO::FETCH_BOTH);

    if($row[0] == 0){
        $stmt = $pdo->prepare("INSERT INTO tbProduto VALUES(null, '$produto', $idCat, $valor, '$imagem')");
        $stmt->execute();
    } elseif($row[0] == 1){                                                                                   //mudar para img
        $stmt = $pdo->prepare("UPDATE tbProduto SET produto = '$produto', idCategoria = $idCat, valor = $valor, img = '$imagem' WHERE idProduto = $id");
        $stmt->execute();
    }

     header("location:produto-exibir.php");

?>