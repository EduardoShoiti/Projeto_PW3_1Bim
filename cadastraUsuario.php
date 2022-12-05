<?php require_once("conexao.php"); ?>

<?php
session_start();

$usuario = $_POST['txUsuario'];
$senha = $_POST['txSenha'];
$confsenha = $_POST['txConfirmarSenha'];

if($confsenha == $senha){
    $stmt = $pdo->prepare("INSERT INTO tbusuario (Usuario, senha) VALUES(?, ?);");
    $stmt->bindValue(1, $usuario);
    $stmt->bindValue(2, $senha);
    
    
    if($stmt->execute()){
        $_SESSION['usuario'] = $usuario;
        $_SESSION['senha'] = $senha;
        header("location:pgControle.php");
        exit();
    }
}
else{
    $_SESSION['nao_cadastrado'] = true;
    header('location:cadastro.php');
    exit();
}

?>