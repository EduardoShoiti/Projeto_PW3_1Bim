<?php include("clienteCabecalho.php");  ?>
<?php include("conexao.php"); ?>
<?php include("clienteMenu.php"); ?>

<?php

session_start();

?>

	<h1>Entre em Contato</h1>

	<?php
		if(isset($_SESSION['msg_enviada'])){
			echo "<script>alert('Mensagem Enviada!');</script>";
			unset($_SESSION['msg_enviada']);
		}
	?>

	<form action="clienteContato-inserir.php" method="post" class="form-produtos">
		<div class="div-inputs">
			<input type="text" name="txNome" placeholder="Nome" />
		</div>
		
		<div class="div-inputs">
			<input type="text" name="txEmail" placeholder="E-mail" />
		</div>
		
		<div class="div-inputs">
			<input type="text" name="txAssunto" placeholder="Assunto" />
		</div>
		
		<div class="div-inputs">
			<textarea name="txMensagem" placeholder="Mensagem"></textarea>
		</div>
		
		<div class="div-inputs"> 
			<input type="submit" value="Enviar" class="btn-salvar cliente"/>
		</div>
	</form>