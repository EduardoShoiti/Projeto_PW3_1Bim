<?php include("cabecalho.php");  ?>
<?php include("menu.php");  ?>
<?php include("conexao.php"); ?>
<?php 
  unset($_SESSION['nao_logado']);
?>


<h1>Bem-vindo, <?php echo $_SESSION['usuario'] ?>! </h1>

<section class="sec-index">
	
		<?php
			$stmt = $pdo->prepare("select count(*) from tbProduto");	
			$stmt ->execute();
			
			$row = $stmt ->fetch(PDO::FETCH_NUM);

			echo "<p>Total de produtos: $row[0]</p>";
		?>

		<br>

		<?php
			$stmt2 = $pdo->prepare("select sum(valor) from tbProduto");	
			$stmt2 ->execute();
			
			$row2 = $stmt2 ->fetch(PDO::FETCH_NUM);

			echo "<p>Soma dos valores dos produtos: $row2[0]</p>";
		?>
		
</section>


<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

<script type="text/javascript">

    // Gráfico 1

    google.charts.load("current", {packages:['corechart']});
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
      var data = google.visualization.arrayToDataTable([
        ["Nota", "Alunos", { role: "style" } ],
        ["I", 7, "#ed2e2e"],
        ["R", 10, "#edde2e"],
        ["B", 19, "#2eb8ed"],
        ["MB", 21, "#43ed2e"]
      ]);

      var view = new google.visualization.DataView(data);
      view.setColumns([0, 1,
                       { calc: "stringify",
                         sourceColumn: 1,
                         type: "string",
                         role: "annotation" },
                       2]);

      var options = {
        title: "Gráfico de Notas",
        width: 600,
        height: 400,
        bar: {groupWidth: "95%"},
        backgroundColor: "none",
		    legend: { position: "none" }
      };
      var chart = new google.visualization.ColumnChart(document.getElementById("grafico_notas"));
      chart.draw(view, options);
  }

    // Gráfico 2

    <?php
      $stmt_tec = $pdo->prepare("SELECT COUNT(idProduto) FROM tbproduto WHERE idCategoria = 2;");	
      $stmt_tec ->execute();			
      $row_tec = $stmt_tec ->fetch(PDO::FETCH_NUM);
      $quant_tec = $row_tec[0];

      $stmt_roupa = $pdo->prepare("SELECT COUNT(idProduto) FROM tbproduto WHERE idCategoria = 3;");	
      $stmt_roupa ->execute();			
      $row_roupa = $stmt_roupa ->fetch(PDO::FETCH_NUM);
      $quant_roupa = $row_roupa[0];

      $stmt_comida = $pdo->prepare("SELECT COUNT(idProduto) FROM tbproduto WHERE idCategoria = 4;");	
      $stmt_comida ->execute();			
      $row_comida = $stmt_comida ->fetch(PDO::FETCH_NUM);
      $quant_comida = $row_comida[0];
    ?>

    google.charts.setOnLoadCallback(drawChart2);

    function drawChart2() {

      // Create the data table.
      var data2 = google.visualization.arrayToDataTable([
          ['Notas', 'Alunos'],
          <?php

          $stmt = $pdo->prepare("select categoria from tbCategoria");	
          $stmt ->execute();
          $stmt_qnt = $pdo->prepare("SELECT DISTINCT(idCategoria) FROM tbproduto");	
          $stmt_qnt ->execute();

          while($row = $stmt ->fetch(PDO::FETCH_NUM)){
            $row_qnt = $stmt_qnt ->fetch(PDO::FETCH_NUM);
        
            $stmt_cat = $pdo->prepare("select count(*) from tbProduto where idCategoria = $row_qnt[0];");	
		        $stmt_cat ->execute();

            $row_cat = $stmt_cat ->fetch(PDO::FETCH_NUM);
          ?>
            ['<?php echo $row[0]?>',<?php echo $row_cat[0]?>],

            <?php } ?>
        ]);

      // Set chart options
      var options2 = {
        title:'Categoria dos Produtos Cadastrados',
        width:800,
        height:600,
        backgroundColor: "none"};

      // Instantiate and draw our chart, passing in some options.
      var chart2 = new google.visualization.PieChart(document.getElementById('grafico-bd'));
      chart2.draw(data2, options2);
    }

</script>

<section>

  <div id="grafico-bd"></div>

</section>



<?php include("rodape.php")  ?>
