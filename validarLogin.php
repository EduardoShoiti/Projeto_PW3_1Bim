<?php require_once("conexao.php"); ?>
<?php

session_start();

?>

<?php

$usuario = $_POST['txUsuario'];
$senha = $_POST['txSenha'];

$stmt = $pdo->prepare("SELECT COUNT(Usuario) FROM tbusuario WHERE Usuario = ? AND senha = ?");
$stmt->bindValue(1, $usuario);
$stmt->bindValue(2, $senha);
$stmt->execute();

$row = $stmt ->fetch(PDO::FETCH_BOTH);

if($row[0] == 0){
    $_SESSION['nao_logado'] = true;
    header("location:loginAdm.php");
    exit();
} elseif($row[0] == 1){
    $_SESSION['usuario'] = $usuario;
    $_SESSION['senha'] = $senha;
    header("location:pgControle.php");
    exit();
}



?>