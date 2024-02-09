<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <?php include('header.php');?>
        <title><?php echo $ttl;?></title>
    </head>
    <body>
        <header>
            <?php 
                include ('core/mod_topo/topo.php');
            ?>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>

        </header>
        <main>
            <div class='bn_top' style='background:url(core/imagens/back3.png) no-repeat;background-size: cover'>
                <h1 class="titulo"> Contato </h1>
            </div>

            <section>
                <div class="wrapper" id="contato">
                <p class="subtitulo">INTERESSOU? ENTRE EM CONTATO CONOSCO</p>

                    <div class="bloco_l">
                        <form name='form' id='form' enctype='multipart/form-data' method='post' action='envia_contato'>
                            <label for="nome">*Nome Completo</label>
                            <input name="nome" id="nome" type="text" class="obg" maxlength="100" required />

                            <label for="email">*E-mail</label>
                            <input name="email" id="email" type="email" class="obg" maxlength="100" required />

                            <label for="telefone">Telefone</label>
                            <input name="telefone" id="telefone" type="text" maxlength='20' placeholder='(00) 0000-0000' />
                    </div>
                    <div class="bloco_r">

                            <label for="assunto">Assunto</label>
                            <input name="assunto" id="assunto" type="text"/>

                            <label for="mensagem">Mensagem</label>
                            <textarea id="mensagem" rows="5" name="mensagem" cols="40" maxlength="1000"></textarea>

                            <input type="submit" value='Enviar'>
                        </form>
                    </div>
                    <div class="contatos">
                        <div class="bloco">
                            <i class="fab fa-whatsapp"></i><br>
                            (11) 95608-4794
                        </div>

                        <div class="bloco">
                            <i class="fas fa-phone"></i><br>
                            (11) 4312-5657
                        </div>

                        <div class="bloco">
                            <i class="far fa-envelope"></i><br>
                            comercial@bellacos.com.br
                        </div>
                    </div>

                </div>
            </section>
            <section>
                <div class="contato">
                    <p><i class="fas fa-map-marker-alt icon-contato"></i> Av. Vereador Narciso Yague Guimarães, 1145 sala 710 - Vila Paternio - 08780-200</p>
                </div>
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d543.8300317096446!2d-46.17862098103863!3d-23.51675134493701!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94cdd830dceaaaab%3A0xe184dbb64f0760cc!2sAv.%20Ver.%20Narciso%20Yague%20Guimar%C3%A3es%2C%201145%20-%20sala%20710%20-%20Centro%2C%20Mogi%20das%20Cruzes%20-%20SP%2C%2008780-200!5e0!3m2!1spt-BR!2sbr!4v1636375271893!5m2!1spt-BR!2sbr" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
            </section>

        </main>
        <footer>
            <?php include('core/mod_rodape/rodape.php');?>
        </footer>
        </div>    
    </body>
</html>

<script>
$('#telefone').keypress(function(event) {
   if($('#telefone').val().length < 14){ // Celular com 9 dígitos + 2 dígitos DDD e 4 da máscara
    $('#telefone').mask('(00) 0000-00000');
   } else {
    $('#telefone').mask('(00) 00000-0000');
   }
});</script>



