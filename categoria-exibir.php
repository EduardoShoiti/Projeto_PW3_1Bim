<?php 
	include("cabecalho.php");
	include("menu.php");
	include("conexao.php");

	echo "<h1> Exibir Categorias </h1>";
?>


<section>
	<form action="categoria-salvar.php" method="post" class="form-produtos">

		<div class="div-inputs">
            <input type="number" name="idCategoria" value='<?php echo @$_GET['id'] ?>' hidden>
        </div>
		<div class="div-inputs">
			<input type="text" placeholder="Categoria" name="txCategoria" value='<?php echo @$_GET['categoria'] ?>'>
		</div>
		<div class="div-inputs">
			<input type="submit" value="Salvar" class="btn-salvar">
		</div>
	</form>
</section>

<section id="tb-categorias">	
	<?php
		$stmt = $pdo->prepare("select * from tbCategoria");	
		$stmt ->execute();
	?>

	<table class="tbAdm" cellpadding="0" cellspacing="0" rules="rows">
		<thead>
			<th> Id Categoria </th>
			<th> Categoria </th>
			<th> &nbsp; </th>
			<th> &nbsp; </th>
		</thead>
		<tbody>
			<?php
				while($row = $stmt ->fetch(PDO::FETCH_BOTH)){
					echo "<tr>";				
						echo "<td>$row[0] </td>";
						echo "<td>" . utf8_encode($row[1]) . "</td>";	
						echo "<td>";
							echo "<a href='categoria-excluir.php?id=$row[0]'>Excluir </a>";
						echo "</td>";
						echo "<td>";
                            echo "<a href='?id=$row[0]&categoria=$row[1]' id='alterar'> Alterar </a>";
                        echo "</td>";			
					echo "</tr>";				
				}	
			?>	
		</tbody>		
	</table>	
</section>

<?php include("rodape.php");?>