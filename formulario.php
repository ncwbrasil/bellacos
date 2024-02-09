<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>

<div class='form_produto'>
    <h2>Entre em contato </h2> <br>
    <form name='form' id='form' enctype='multipart/form-data' method='post' action='envia_contato'>
        <input type='hidden' name="assunto" id="assunto" type="text" value='<?php echo "Contato referente ao produto : ".$result['prod_titulo']?>'/>

        <label for="nome">*Nome Completo</label>
        <input name="nome" id="nome" type="text" class="obg" maxlength="100" required />

        <label for="email">*E-mail</label>
        <input name="email" id="email" type="email" class="obg" maxlength="100" required />

        <label for="telefone">Telefone</label>
        <input name="telefone" id="telefone" type="text" maxlength='20' placeholder='(00) 0000-0000' />

        <label for="mensagem">Mensagem</label>
        <textarea id="mensagem" rows="5" name="mensagem" cols="40" maxlength="1000"></textarea>

        <input type="submit" value='Enviar'>
    </form>

</div>

<script>
$('#telefone').keypress(function(event) {
   if($('#telefone').val().length < 14){ // Celular com 9 dígitos + 2 dígitos DDD e 4 da máscara
    $('#telefone').mask('(00) 0000-00000');
   } else {
    $('#telefone').mask('(00) 00000-0000');
   }
});</script>

