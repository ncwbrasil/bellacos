<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <?php include('header.php'); ?>
    <title><?php echo $ttl;?></title>
</head>

<body>
    <header>
        <?php
        include('core/mod_topo/topo.php');
        ?>
    </header>
    <main>
        <section>
            <?php include('carousel.php'); ?>
        </section>
        <section>
            <div class="div-icone">
                <img src="core/imagens/icone.png" alt="icone" class="icone">
            </div>
        </section>
        <section>
            <div class="espaco"></div>
            <div class="wrapper">
                <div class="div-linhas">
                    <p class="titulo2 verde">NOSSAS LINHAS</p>
                    <div class="div-card">
                        <div class="card">
                            <a href='produtos/linha_industrial'><img class="imgcard" src="core/imagens/banner-servicos-1.png" alt=""></a>
                        </div>
                        <div class="card">
                            <a href="produtos/linha_civil"><img class="imgcard" src="core/imagens/banner-servicos-2.png" alt=""></a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section>
            <div class="contato">
                <h3 class="verde"><b>ENTRE EM CONTATO CONOSCO</b></h3>
                <p><i class="fas fa-map-marker-alt icon-contato"></i> Av. Vereador Narciso Yague Guimarães, 1145 sala 710 - Vila Paternio - 08780-200</p>
                <p><i class="fas fa-phone icon-contato"></i> (11) 4321-5657 | <i class="fab fa-whatsapp icon-contato"></i> (11) 95608-4794</p>
                <p><i class="fas fa-envelope icon-contato"></i> comercial@bellacos.com.br</p>
            </div>
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d543.8300317096446!2d-46.17862098103863!3d-23.51675134493701!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94cdd830dceaaaab%3A0xe184dbb64f0760cc!2sAv.%20Ver.%20Narciso%20Yague%20Guimar%C3%A3es%2C%201145%20-%20sala%20710%20-%20Centro%2C%20Mogi%20das%20Cruzes%20-%20SP%2C%2008780-200!5e0!3m2!1spt-BR!2sbr!4v1636375271893!5m2!1spt-BR!2sbr" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
        </section>
    </main>
    <footer>
        <?php include('core/mod_rodape/rodape.php'); ?>
    </footer>
    </div>
</body>

</html>