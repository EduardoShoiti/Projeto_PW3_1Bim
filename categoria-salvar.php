<?php

    $id = $_POST['idCategoria'];
    $categoria = $_POST['txCategoria'];

    include("conexao.php");

    $stmt = $pdo->prepare("SELECT COUNT(idCategoria) FROM tbcategoria where idCategoria = $id");
    $stmt->execute();

    $row = $stmt ->fetch(PDO::FETCH_BOTH);

    if($row[0] == 0){
        $stmt = $pdo->prepare("INSERT INTO tbCategoria VALUES(null, '$categoria')");
        $stmt->execute();
    } elseif($row[0] == 1){
        $stmt = $pdo->prepare("UPDATE tbCategoria SET categoria = '$categoria' WHERE idCategoria = $id");
        $stmt->execute();
    }

    header("location:categoria-exibir.php");

?>