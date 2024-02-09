<?php include('header.php'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<title>Bellaços Representações - Contato </title>
	<?php
	include('core/mod_includes/php/funcoes-jquery.php');
	?>
</head>

<body style='background:#afbec0; '>
	<?php
	date_default_timezone_set('America/Sao_Paulo');
	$nome = $_POST['nome'];
	$email = $_POST['email'];
	$telefone = $_POST['telefone'];
	$ass = $_POST['assunto'];
	$mensagem = nl2br($_POST['mensagem']);

	// Inclui o arquivo class.phpmailer.php localizado na pasta phpmailer
	require("core/mod_includes/php/phpmailer/class.phpmailer.php");

	// Inicia a classe PHPMailer
	$mail = new PHPMailer();
	// Define os dados do servidor e tipo de conexão
	// =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
	$mail->IsSMTP();
	$mail->Host = "mail.bellacos.com.br"; // Endereço do servidor SMTP (caso queira utilizar a autenticação, utilize o host smtp.seudomínio.com.br)
	$mail->SMTPAuth = false; // Usa autenticação SMTP? (opcional)
	$mail->Username = 'autenticacao@bellacos.com.br'; // Usuário do servidor SMTP
	$mail->Password = 'infomogi123'; // Senha do servidor SMTP

	// Define o remetente
	// =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
	$mail->From = "$email"; // Seu e-mail
	$mail->Sender = "autenticacao@bellacos.com.br"; // Seu e-mail
	$mail->FromName = "$nome"; // Seu nome

	// Define os destinatário(s)
	// =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
	$mail->AddAddress('comercial@bellacos.com.br');
	//$mail->AddAddress('jorge@mogicomp.com.br');

	// Define os dados técnicos da Mensagem
	// =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
	$mail->IsHTML(true); // Define que o e-mail será enviado como HTML

	$mail->CharSet = 'utf-8'; // Charset da mensagem (opcional)

	// Define a mensagem (Texto e Assunto)
	// =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
	$assunto = 'Bellacos Representações - Formulário de Contato'; // mudar o nome da empresa!!
	$mail->Subject  = '=?utf-8?B?' . base64_encode($assunto) . '?='; // Assunto da mensagem
	$mail->Body = '
	<head>
		<style type="text/css">
			@import url("https://fonts.googleapis.com/css2?family=Poppins:wght@500&family=Zen+Kaku+Gothic+New&display=swap");
			.email {
				margin: 30px 2%;
				font-family: "Zen Kaku Gothic New", sans-serif; 
				color: #585857;
				font-size: 18px;
			}
	
			.destaque {
				font-family: "Poppins", sans-serif;
			}
			.mensagem {
				width: 95%;
				margin: 0 auto;
				padding:20%;
				margin-bottom:100px;
			}
	
			.rodape {
				padding: 1% 2%;
				border-top: 2px solid #666;
				font-style: italic;
				font-size:14px;
			}
		</style>
	</head>
	
	<body>
		<div class="email">
			<p><b class="destaque">Nome: </b> ' . $nome . ' </p>
			<p><b class="destaque">E-mail: </b> ' . $email . ' </p>
			<p><b class="destaque">Telefone: </b> ' . $telefone . ' </p>
			<p><b class="destaque">Assunto:</b> ' . $ass . '</p>
			<div class="mensagem">
				<p> <b class="destaque">Mensagem:</b> </p>
				' . $mensagem . '
			</div>
	
			<div class="rodape">
				<b>Este é um email gerado automaticamente pelo sistema.</b><br><br>
				As informações contidas nesta mensagem e nos arquivos anexados são para uso restrito, sendo seu sigilo protegido por lei, não havendo ainda garantia legal quanto à integridade de seu conteúdo. Caso não seja o destinatário, por favor desconsidere essa mensagem. O uso indevido dessas informações será tratado conforme as normas da empresa e a legislação em vigor.
			</div>
	
		</div>
	</body>
';

	// Envia o e-mail
	$enviado = $mail->Send();

	// Limpa os destinatários e os anexos
	$mail->ClearAllRecipients();
	$mail->ClearAttachments();

	// Exibe uma mensagem de resultado 
	if ($enviado) {
		echo "
			<div class='confirmacao'>
				<p><b>$nome</b>, sua mensagem foi enviada com sucesso!</p>
				<p>Siga nossas redes: <!--<a href='' target='_blank'><i class='fab fa-facebook-f icon-rodape '></i></a>--> <i class='fab fa-instagram icon-rodape'></i></p>

				<a href='index/'><button> Voltar para o site </button></a>
			</div>
		";
	} else {
		echo "
			<div class='confirmacao'>
				<p>Erro ao enviar mensagem!</p>
				<p> Mas você pode entrar em contato com a gente através de outros meios: 
				<p>Telefone: <a href='tel:+551143215657'>(11) 4321-5657 </a>
				<p>E-mail: <a href='mailto:comercial@bellacos.com.br'>comercial@bellacos.com.br</a>
				<p> Whatsapp: <a href='https://api.whatsapp.com/send?phone=+5511956084794' target='_blank'>(11) 9 5608-4794</a>

				
				<p>Siga nossas redes: <!--<a href='' target='_blank'><i class='fab fa-facebook-f icon-rodape '></i></a>--> <i class='fab fa-instagram icon-rodape'></i></p>

				<a href='index/'><button> Voltar para o site </button></a>
			</div>
		";
	}

	?>
</body>

</html>