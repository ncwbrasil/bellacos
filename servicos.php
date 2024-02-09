<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <?php 
        include('header.php'); 
        $servico = $_GET['p1']; 
    ?>
        <title><?php echo $ttl;?></title>

</head>

<body>
    <header>
        <?php
        include('core/mod_topo/topo.php');
        ?>
        <link rel="stylesheet" type="text/css" href="core/mod_includes/js/shadowbox/shadowbox.css">
        <script type="text/javascript" src="core/mod_includes/js/shadowbox/shadowbox.js"></script>
        <script type="text/javascript">
            Shadowbox.init();
        </script>
    </header>

    <main>
        <section>
            <div class='bn_top' style='background:url(core/imagens/back1.png) no-repeat;background-size: cover'>
                <h1 class="titulo"> Serviços </h1>
            </div>


            <div class="wrapper" id='produtos'>

                <?php 
                    // PRODUTOS SEM CATEGORIAS, SEM SUBGRUPO E SEM SUBCATEGORIA
                    if ( $servico == ''){
                        $sql = "SELECT * FROM produtos 
                        LEFT JOIN categorias ON categorias.cat_id = produtos.prod_categoria
                        WHERE cat_id = :cat_id";  
                        $stmt=$PDO->prepare($sql); 
                        $stmt->bindValue(':cat_id', 4); 
                        $stmt->execute(); 
                        $rows=$stmt->rowCount(); 
                        if($rows>0){
                            while($result = $stmt->fetch()){
                                echo "<div class='produto'> 
                                    <a href='servicos/".$result['prod_url']."'>
                                        ".$result['prod_titulo']."<br>
                                        <img src='".$result['prod_imagem']."' class='imagem'>
                                    </a>
                                </div>"; 
                            }
                        }
                    }
                    // APRESENTA DESCRICAO DO PRODUTO
                    else if($servico != '') {
                        $sql = "SELECT * FROM produtos 
                        LEFT JOIN categorias ON categorias.cat_id = produtos.prod_categoria
                        LEFT JOIN subcategorias ON subcategorias.sub_id = produtos.prod_subcategoria
                        WHERE prod_url = :prod_url";  
                        $stmt=$PDO->prepare($sql); 
                        $stmt->bindValue(':prod_url', $servico); 
                        $stmt->execute(); 
                        $rows=$stmt->rowCount(); 
                        if($rows>0){
                            $result = $stmt->fetch(); 
                            echo "<div class='categoria'> <h3>".$result['prod_titulo']." </h3></div> <br>";
                            echo $result['prod_descricao'];
                        }
                        else {
                            echo "Nenhum produto cadastrado no momento!"; 
                        }
                    }            
                ?>
    
                
            </div>
        </section>
    </main>
    
    <footer>
        <?php include('core/mod_rodape/rodape.php'); ?>
    </footer>
    </div>
</body>

</html>
