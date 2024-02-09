<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <?php include('header.php');?>
        <title></title>
    </head>
    <body>
        <header>
            <?php 
            include ('core/mod_topo/topo.php');
            ?>
                <title><?php echo $ttl;?></title>

        </header>
        <main>
            <section>

            <div class='bn_top' style='background:url(core/imagens/back2.png) no-repeat;background-size: cover'>
                <h1 class="titulo"> Sobre Nós </h1>
            </div>

                <div class="wrapper" id='sobre'>
                    <h3><b>Nossa história</b></h3>

                    <p>A Bellaços foi criada a partir do sonho de ter um atendimento mais humanizado em plena era digital, proporcionar um atendimento personalizado, cuidadoso e de forma leve, mas com diretrizes rígidas garantindo a qualidade do processo desde a primeira ligação até a entrega do material.
                    <br> <br>
                    <p>Formada essencialmente por mulheres, esse foi meu desejo desde o começo, a Bellaços veio para criar pontes de relacionamentos entre as representadas e o cliente final. Tudo isso em um ambiente alegre, pois acredito que pessoas felizes produzem mais e cada vez melhor!

                    <div class="bloco">
                        <h4><b>Valores</b></h4>
                        <p>Transparência <i class="fas fa-check"></i> <br> 
                        Espírito de coletividade <i class="fas fa-check"></i> <br> 
                        Confiabilidade <i class="fas fa-check"></i> </p>
                    </div>

                    <div class="bloco">
                        <h4><b>Missão </b></h4>
                        <p>Prestar um serviço de qualidade com maestria em vendas. <br>
                        Promover o crescimento da carteira de clientes ativa das representadas.</p>
                    </div>

                    <div class="bloco">
                        <h4><b>Visão </b></h4>
                        <p>Ser referência em atendimento, reconhecida pelos clientes e pelas representadas como a melhor opção no setor de Ferro e Aço.</p>
                    </div>

                </div>
            </section>
        </main>
        <footer>
            <?php include('core/mod_rodape/rodape.php');?>
        </footer>
        </div>    
    </body>
</html>
