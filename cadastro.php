<?php include("cabecalho.php");  ?>

<?php session_start(); ?>

<section>
	<h1>Cadastrar Usuário</h1>
	
	<?php
	if(isset($_SESSION['nao_cadastrado'])){
		echo "<h3 style='text-align: center;'>Senha diferente</h3>";
	}
	?>
    <form action="cadastraUsuario.php" method="post" class="form-produtos">
        <div class="div-inputs">
			<input type="text" placeholder="Usuário" name="txUsuario" autocomplete="off">
		</div>
        <div class="div-inputs">
			<input type="text" placeholder="Senha" name="txSenha" id="senha" autocomplete="off">
		</div>
        <div class="div-inputs">
			<input type="text" placeholder="Confirmar Senha" name="txConfirmarSenha" id="confirmaSenha" autocomplete="off">
		</div>

        <div class="div-inputs">
			<a href="loginAdm.php">Já tenho uma conta</a>
			<input type="submit" value="Cadastrar" class="btn-salvar">
		</div>
    </form>
</section>


<!--<script>

	function verificaSenha(){
		var senha = document.getElementById("senha");
		var confirmaSenha = document.getElementById("confirmaSenha");
		if(senha != confirmaSenha){
			return false;
			alert("Senha diferente");
		}
		else{
			return true;
		}
	}

</script>-->


<?php include("rodape.php")  ?>