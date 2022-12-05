<?php include("cabecalho.php");  ?>
<?php

session_start();


?>

<section>
    <h1 style="margin-bottom: 2%;">Login</h1>

    <?php
        if(isset($_SESSION['nao_logado'])){
            echo "<h3 style='text-align: center;'>Usuário ou senha inválido!</h3>";
        }
    ?>

    <form action="validarLogin.php" method="post" class="form-produtos">
        <div class="div-inputs">
			<input type="text" placeholder="Usuário" name="txUsuario">
		</div>
        <div class="div-inputs">
			<input type="password" placeholder="Senha" name="txSenha">
		</div>

        <div class="div-inputs">
            <a href="cadastro.php">Criar Conta</a>
			<input type="submit" value="Login" class="btn-salvar">
		</div>
    </form>
</section>



<?php include("rodape.php")  ?>