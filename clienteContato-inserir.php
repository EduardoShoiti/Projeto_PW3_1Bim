<?php
	$nome = $_POST['txNome'];
	$email = $_POST['txEmail'];
	$assunto = $_POST['txAssunto'];
	$mensagem = $_POST['txMensagem'];	
	
	include("conexao.php");

	session_start();
	
	
	try{
		$stmt = $pdo->prepare("insert into tbcontato values(
			null,'$nome','$email','$assunto','$mensagem'
		)");
		if($stmt->execute()){
			$_SESSION['msg_enviada'] = true;
			header('location:clienteContato.php');
		}
	}
	catch(PDOException $e) {
        echo 'Error: ' . $e->getMessage();
    }		
?>