<html xmlns="http://www.w3.org/1999/xhtml" lang="pt-br">
<meta http-equiv="Content-Language" content="pt-br">

<head>
    <?php
    include('header.php');
    $busca = '%' . $_POST['busca'] . '%';
    ?>
    <title><?php echo $ttl; ?></title>
</head>

<body>
    <header>
        <?php
        #region MOD INCLUDES
        include('core/mod_topo/topo.php');
        include('core/mod_includes/php/funcoes-jquery.php');
        #endregion
        ?>
    </header>
    <main>
        <section class="busca">
            <div class='bn_top' style='background:url(core/imagens/back1.png) no-repeat;background-size: cover'>
                <h1> <i class="fas fa-search"></i> Resultado das Buscas </h1>
            </div>

            <div class="wrapper" id='produtos'>
                <?php
                $sql = "SELECT * FROM produtos 
                    LEFT JOIN categorias ON categorias.cat_id = produtos.prod_categoria
                    LEFT JOIN subcategorias ON subcategorias.sub_id = produtos.prod_subcategoria
                    WHERE prod_titulo like :prod_titulo OR prod_descricao like :prod_descricao OR cat_titulo like :cat_titulo OR sub_titulo like :sub_titulo
                    ORDER BY prod_titulo";
                $stmt = $PDO->prepare($sql);
                $stmt->bindValue(':prod_titulo', $busca);
                $stmt->bindValue(':prod_descricao', $busca);
                $stmt->bindValue(':cat_titulo', $busca);
                $stmt->bindValue(':sub_titulo', $busca);
                $stmt->execute();
                $rows = $stmt->rowCount();
                if ($rows > 0) {
                    while ($result = $stmt->fetch()) {
                        echo "<div class='produto'> 
                            <a href='produtos/".$result['cat_url']."/".$result['prod_url']."'> 
                                ".$result['prod_titulo']." <br>
                                <img src='".$result['prod_imagem']."' class='imagem'>
                            </a>
                        </div>";     
}
                } else {
                    echo "Nenhum registro encontrado!";
                }


                ?>
            </div>
        </section>
        <?php
        include('core/mod_rodape/rodape.php');
        ?>
    </main>
</body>

</html>