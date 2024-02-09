<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <?php 
        include('header.php'); 
        $categoria = $_GET['p1']; 
        $produto = $_GET['p2']; 
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
                <h1 class="titulo"> Produtos </h1>
                <h3 class="subtitulo"> Encontre a solução ideal com a qualidade que só a Bellaços tem! </h3>
            </div>


            <div class="wrapper" id='produtos'>

                <?php 
                    // PRODUTOS SEM CATEGORIAS, SEM SUBGRUPO E SEM SUBCATEGORIA
                    if ( $categoria == '' && $produto == ''){
                        $sql = "SELECT * FROM categorias ORDER BY cat_titulo";
                        $stmt=$PDO->prepare($sql);           
                        $stmt->execute(); 
                        while ($result = $stmt->fetch()){
                            echo "<div class='categoria'> <h3>".$result['cat_titulo']."</h3> </div>";
                            $sql2 = "SELECT * FROM  subcategorias WHERE sub_categoria = :sub_categoria ORDER BY sub_titulo ";
                            $stmt2 = $PDO->prepare($sql2) ; 
                            $stmt2->bindValue(':sub_categoria', $result['cat_id']);
                            $stmt2->execute();
                            $rows = $stmt2->rowCount();
                            if($rows > 0){
                                while($result2 = $stmt2->fetch()){
                                    echo "<div class='subcategoria'> 
                                            ".$result['cat_icone']."<br>".$result2['sub_titulo']." 
                                            <a href='produtos/".$result['cat_url']."/".$result2['sub_url']."'><div class='veja'><i class='fas fa-arrow-right'></i> </div></a>
                                        </div>"; 
                                }
                                $sql3 = "SELECT * FROM  produtos WHERE prod_categoria = :prod_categoria AND prod_subcategoria = :prod_subcategoria ORDER BY prod_titulo";
                                $stmt3 = $PDO->prepare($sql3) ; 
                                $stmt3->bindValue(':prod_categoria', $result['cat_id']);
                                $stmt3->bindValue(':prod_subcategoria', 0);
                                $stmt3->execute();
                                $rows3 = $stmt3->rowCount();
                                if($rows3 > 0){
                                    while($result3 = $stmt3->fetch()){
                                        echo "<div class='produto'> 
                                                ".$result['cat_icone']."<br>".$result3['prod_titulo']."
                                                <a href='produtos/".$result['cat_url']."/".$result['cat_url']."/".$result3['prod_url']."'><div class='veja'><i class='fas fa-arrow-right'></i> </div></a>
                                            </div>"; 
                                    }
                                }
        
                            }
                            else {
                                $sql3 = "SELECT * FROM  produtos WHERE prod_categoria = :prod_categoria";
                                $stmt3 = $PDO->prepare($sql3) ; 
                                $stmt3->bindValue(':prod_categoria', $result['cat_id']);
                                $stmt3->execute();
                                $rows3 = $stmt3->rowCount();
                                if($rows3 > 0){
                                    while($result3 = $stmt3->fetch()){
                                        echo "<div class='produto'> 
                                                ".$result['cat_icone']."<br>".$result3['prod_titulo']." 
                                                <a href='produtos/".$result['cat_url']."/".$result['cat_url']."/".$result3['prod_url']."'><div class='veja'><i class='fas fa-arrow-right'></i> </div></a>
                                            </div>"; 
                                    }
                                }
            
                            }    
                        }
        
                    }
                    
                    else if ($categoria != '' && $produto == '') {
                        
                        $sql_cat = "SELECT * FROM categorias WHERE cat_url = :cat_url"; 
                        $stmt_cat=$PDO->prepare($sql_cat); 
                        $stmt_cat->bindValue(':cat_url', $categoria); 
                        $stmt_cat->execute();
                        $rows_cat=$stmt_cat->rowCount(); 
                        if($rows_cat>0){
                            $result_cat = $stmt_cat->fetch();
                            echo "<h2 class='subtitulo'>".$result_cat['cat_titulo']."</h2>";

                            //PRODUTOS SEM SUBCATEGORIA E SEM SUBGRUPO
                            $sql_sub= "SELECT * FROM produtos 
                            WHERE prod_categoria = :prod_categoria AND prod_subcategoria = :prod_subcategoria AND prod_subgrupo = :prod_subgrupo "; 
                            $stmt_sub=$PDO->prepare($sql_sub); 
                            $stmt_sub->bindValue(':prod_categoria', $result_cat['cat_id']); 
                            $stmt_sub->bindValue(':prod_subcategoria', 0); 
                            $stmt_sub->bindValue(':prod_subgrupo', 0);                             
                            $stmt_sub->execute();
                            $rows_sub=$stmt_sub->rowCount(); 
                            if($rows_sub>0){
                                while($result_sub = $stmt_sub->fetch()){
                                    echo "<div class='produto'> 
                                        <a href='produtos/".$result_cat['cat_url']."/".$result_sub['prod_url']."'>
                                            ".$result_sub['prod_titulo']."<br>
                                            <img src='".$result_sub['prod_imagem']."' class='imagem'>
                                        </a>
                                    </div>";     
                                }   
                            }
                            //PRODUTOS COM SUBCATEGORIA
                            $sql_sub= "SELECT * FROM subcategorias WHERE sub_categoria = :sub_categoria"; 
                            $stmt_sub=$PDO->prepare($sql_sub); 
                            $stmt_sub->bindValue(':sub_categoria', $result_cat['cat_id']); 
                            $stmt_sub->execute();
                            $rows_sub=$stmt_sub->rowCount(); 
                            if($rows_sub>0){
                                while($result_sub = $stmt_sub->fetch()){
                                    //SEM SUBGRUPO
                                    $sql_prod2= "SELECT * FROM produtos 
                                    WHERE prod_subcategoria = :prod_subcategoria"; 
                                    $stmt_prod2=$PDO->prepare($sql_prod2); 
                                    $stmt_prod2->bindValue(':prod_subcategoria', $result_sub['sub_id']); 
                                    $stmt_prod2->execute();
                                    $rows_prod2=$stmt_prod2->rowCount(); 
                                    if($rows_prod2>0){
                                        echo "<div class='categoria'><h3>".$result_sub['sub_titulo']."</h3></div>";
                                        while($result_prod2 = $stmt_prod2->fetch()){
                                            if($result_prod2['prod_subgrupo'] == 0 ){
                                                echo "<div class='produto'> 
                                                    <a href='produtos/".$result_cat['cat_url']."/".$result_prod2['prod_url']."'> 
                                                        ".$result_prod2['prod_titulo']." <br>
                                                        <img src='".$result_prod2['prod_imagem']."' class='imagem'>
                                                    </a>
                                                </div>";     

                                            }
                                        }   
                                    } 

                                    //COM SUBGRUPO
                                    $sql_sg = "SELECT * FROM subgrupo WHERE sg_subcategoria = :sg_subcategoria"; 
                                    $stmt_sg=$PDO->prepare($sql_sg); 
                                    $stmt_sg->bindValue(':sg_subcategoria', $result_sub['sub_id']); 
                                    $stmt_sg->execute();
                                    $rows_sg=$stmt_sg->rowCount(); 
                                    if($rows_sg>0){

                                        while($result_sg = $stmt_sg->fetch()){
                                            $sql_prod3= "SELECT * FROM produtos 
                                            WHERE prod_subgrupo = :prod_subgrupo"; 
                                            $stmt_prod3=$PDO->prepare($sql_prod3); 
                                            $stmt_prod3->bindValue(':prod_subgrupo', $result_sg['sg_id']); 
                                            $stmt_prod3->execute();
                                            $rows_prod3=$stmt_prod3->rowCount(); 
                                            if($rows_prod3>0){
                                                echo "<div class='subgrupo'> <h4><i class='fas fa-angle-double-right'></i>".$result_sg['sg_nome']."</h4></div>";
                                                while($result_prod3 = $stmt_prod3->fetch()){
                                                    if($result_prod3['prod_id'] == 7){
                                                        echo "<div class='produto'> 
                                                                ".$result_prod3['prod_titulo']."<br>
                                                                <img src='".$result_prod3['prod_imagem']."' class='imagem'>
                                                            </div>";     


                                                    }else {
                                                        echo "<div class='produto'> 
                                                                <a href='produtos/".$result_cat['cat_url']."/".$result_prod3['prod_url']."'>
                                                                    ".$result_prod3['prod_titulo']."<br>
                                                                    <img src='".$result_prod3['prod_imagem']."' class='imagem'>
                                                                </a>
                                                            </div>";     
                                                    }
                                                }   
                                            }     
                                        }
                                    }                                    
                                }   
                            }   
                        }
                    }
                    // APRESENTA DESCRICAO DO PRODUTO
                    else if($produto != '') {
                        $sql = "SELECT * FROM produtos 
                        LEFT JOIN categorias ON categorias.cat_id = produtos.prod_categoria
                        LEFT JOIN subcategorias ON subcategorias.sub_id = produtos.prod_subcategoria
                        WHERE prod_url = :prod_url";  
                        $stmt=$PDO->prepare($sql); 
                        $stmt->bindValue(':prod_url', $produto); 
                        $stmt->execute(); 
                        $rows=$stmt->rowCount(); 
                        if($rows>0){
                            $result = $stmt->fetch(); 
                            echo "<div class='categoria'> <h3>".$result['prod_titulo']." </h3></div> <br>";
                            echo "<div class='descricao'>".$result['prod_descricao'].'</div>';
                            include('formulario.php'); 
                        }
                        else {
                            echo "Nenhum produto cadastrado no momento 3!"; 
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
