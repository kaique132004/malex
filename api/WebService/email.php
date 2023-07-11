<?php
require 'api/vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;

// Configurações do servidor de e-mail
$host = 'smtp.example.com';
$port = 587;
$username = 'seu-email@example.com';
$password = 'sua-senha';

// Crie uma instância do PHPMailer
$mail = new PHPMailer();
$mail->isSMTP();
$mail->Host = $host;
$mail->Port = $port;
$mail->SMTPAuth = true;
$mail->Username = $username;
$mail->Password = $password;
$mail->SMTPSecure = 'tls';

// Configurações do remetente e destinatário
$remetente = 'seu-email@example.com';
$destinatario = 'destinatario@example.com';

$mail->setFrom($remetente);
$mail->addAddress($destinatario);

// Configuração do assunto e corpo do e-mail
$assunto = 'Formulário de Contato';
$mensagem = '';

// Processamento dos dados do formulário
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Capturar os dados do formulário
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $mensagem = $_POST['mensagem'];

    // Montar o corpo do e-mail
    $mensagem .= "\n\nNome: $nome";
    $mensagem .= "\nE-mail: $email";

    // Configurar o assunto e corpo do e-mail
    $mail->Subject = $assunto;
    $mail->Body = $mensagem;

    // Enviar o e-mail
    if ($mail->send()) {
        echo 'E-mail enviado com sucesso!';
    } else {
        echo 'Erro ao enviar o e-mail. Por favor, tente novamente mais tarde.';
    }
}
?>
