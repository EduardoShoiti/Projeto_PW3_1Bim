<?php 
	include("cabecalho.php");
	include("menu.php");
	include("conexao.php");

	echo "<h1> Exibir Produtos </h1>";

	$stmt_select = $pdo->prepare("SELECT * FROM tbCategoria");	
	$stmt_select ->execute();
?>

<section>
	<form action="produto-salvar.php" method="post" class="form-produtos">

		<div class="div-inputs">
            <input type="number" name="idProduto" value='<?php echo @$_GET['id'] ?>' hidden>
        </div>

		<div class="div-inputs">
			<input type="text" placeholder="Produto" name="txProduto" value='<?php echo @$_GET['produto'] ?>'>
		</div>

		<div class="div-inputs">
			Categoria:	
			<select name="SelectCategoria" id="IdCategoria">
				<?php
					while($row_select = $stmt_select ->fetch(PDO::FETCH_BOTH)){
						echo "<option value='$row_select[0]'>$row_select[1]</option>";
					}
				?>
				
			</select>
		</div>

		<div class="div-inputs">
			<input type="text" placeholder="Valor" name="txValor" value='<?php echo @$_GET['valor'] ?>'>
		</div>

		<div class="div-inputs">
			<input type="text" placeholder="Imagem" name="txImagem" value='<?php echo @$_GET['img'] ?>'>
		</div>

		<div class="div-inputs">
			<input type="submit" value="Salvar" class="btn-salvar">
		</div>
	</form>
</section>

<section id="tb-produtos">
	<div>

	<?php
		$stmt = $pdo->prepare("SELECT * FROM tbProduto");	
		$stmt ->execute();		
	?>

	<table class="tbAdm" cellpadding="0" cellspacing="0" rules="rows">
		<thead>
			<th> Id </th>
			<th> Produto </th>
			<th> Categoria </th>
			<th> Valor </th>
			<th> &nbsp; </th>
			<th> &nbsp; </th>
		</thead>
		<tbody>
			<?php
				$stmtCategoria = $pdo->prepare("SELECT categoria FROM tbCategoria INNER JOIN tbProduto ON tbCategoria.idCategoria = tbProduto.idCategoria ORDER BY idProduto");
				$stmtCategoria->execute();
		

				while($row = $stmt ->fetch(PDO::FETCH_BOTH)){
					$rowCategoria = $stmtCategoria ->fetch(PDO::FETCH_BOTH);
					echo "<tr>";				
						echo "<td>$row[0] </td>";
						echo "<td>" . utf8_encode($row[1]) . "</td>";
						echo "<td>" . utf8_encode($rowCategoria[0]) . "</td>";
						echo "<td>$row[3] </td>";						
						echo "<td>";
							echo "<a href='produto-excluir.php?id=$row[0]'>Excluir </a>";
						echo "</td>";
						echo "<td>";
                            echo "<a href='?id=$row[0]&produto=$row[1]&idCat=$row[2]&valor=$row[3]&img=$row[4]' id='alterar'> Alterar </a>";
                        echo "</td>";
					echo "</tr>";				
				}	
			?>	
		</tbody>		
	</table>
	</div>
</section>

<?php include("rodape.php");?>