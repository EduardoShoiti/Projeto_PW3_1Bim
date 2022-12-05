<?php include("clienteCabecalho.php");  ?>
<?php include("conexao.php"); ?>
<?php include("clienteMenu.php"); ?>

<?php
                                             //mudar para img
$stmt = $pdo->prepare("SELECT produto, valor, img FROM tbProduto");
$stmt->execute();

$stmtCategoria = $pdo->prepare("SELECT categoria FROM tbCategoria INNER JOIN tbProduto ON tbCategoria.idCategoria = tbProduto.idCategoria ORDER BY idProduto");
$stmtCategoria->execute();

?>

    <section class="sec-destaque">
        <img src="css/images/destaque2.png" alt="destaque" width="1200px" height="300px">
    </section>

    <section class="sec-produtos">
        <div class="flex-container">
            <?php
            while ($row = $stmt->fetch(PDO::FETCH_BOTH)) {
                $rowCategoria = $stmtCategoria->fetch(PDO::FETCH_BOTH);
            ?>
                <div class="div-produto">
                    <figure>
                        <div>                               <!-- mudar para img -->
                            <img src="css/images/produtos/<?php echo $row['img'] ?>" alt="imagem produto" width="300px" height="200px">
                        </div>
                        <hr>
                        <figcaption>
                            <p class="nome"><?php echo utf8_encode($row['produto']) ?></p>
                            <p class="categoria"><?php echo $rowCategoria['categoria'] ?></p>
                            <p class="valor">R$<?php echo $row['valor'] ?></p>

                        </figcaption>
                    </figure>
                </div>
            <?php } ?>

        </div>

        <div id="ver-mais"> Ver Mais </div>

    </section>

    <!-- script Ver Mais -->
    <script>
        let verMais = document.getElementById('ver-mais');
        let mostrarItem = 8;

        verMais.onclick = () => {
            let caixas = [...document.querySelectorAll('.sec-produtos .flex-container .div-produto')];
            for (var i = mostrarItem; i < mostrarItem + 8; i++) {
                caixas[i].style.display = 'inline-block';
            }
            mostrarItem += 8;
        }
    </script>




<?php include("rodape.php")  ?>