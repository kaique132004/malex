<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'api/vendor/autoload.php';

$ok = 0;

try {

    if (isset($_POST["email"])) {

        /**
         * @var string $assunto
         * @var string $nome
         * @var string $email
         * @var string $fone
         * @var string $mens
         */
        $assunto = "Site Malex";
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $fone = $_POST['fone'];
        $mens = $_POST['mens'];

        // Alimentar os Atributos e chamar o método inserir Contato
        date_default_timezone_set('America/Sao_Paulo');
        $dataContato = date("Y-m-d H:i:s");

        require_once('api/WebService/site.php');
        $contato = new Site();
        $contato->nome = $nome;
        $contato->email = $email;
        $contato->fone = $fone;
        $contato->mens = $mens;
        $contato->data = $dataContato;

        $contato->InserirContato();

        $phpmail = new PHPMailer(); // Instânciamos a classe PHPmailer para poder utiliza-la  

        $phpmail->isSMTP(); // envia por SMTP

        $phpmail->SMTPDebug = 0; // Opções de debug ( 0, 1 ou 2)
        $phpmail->Debugoutput = 'html';

        $phpmail->Host = "smtp.gmail.com"; // SMTP servers         smtp.gmail.com
        $phpmail->Port = 587; // Porta SMTP do GMAIL

        $phpmail->SMTPSecure = 'tls'; // Autenticação SMTP
        $phpmail->SMTPAuth = true; // Caso o servidor SMTP precise de autenticação   

        $phpmail->Username = "kaique.235.fly@gmail.com"; // SMTP username         
        $phpmail->Password = "rttjsujqkghfqryk"; // SMTP password

        $phpmail->IsHTML(true);

        $phpmail->setFrom($email, $nome); // E-mail do remetende enviado pelo method post  

        $phpmail->addAddress("kaique.235.fly@gmail.com", $assunto); // E-mail do destinatario/*  

        $phpmail->Subject = $assunto; // Assunto do remetende enviado pelo method post

        $phpmail->msgHTML(" Nome: $nome <br>
                            E-mail: $email <br>
                            Telefone: $fone <br>
                            Mensagem: $mens ");

        $phpmail->AlrBody = "   Nome: $nome \n
                                E-mail: $email \n
                                Telefone: $fone \n
                                Mensagem: $mens ";

        if ($phpmail->send()) {

            $ok = 1;
            //echo "A Mensagem foi enviada com sucesso.";

        } else {
            $ok = 2;
            echo "Não foi possível enviar a mensagem. Erro: " . $phpmail->ErrorInfo;
        }

        // ############## RESPOSTA AUTOMATICA
        $phpmailResposta = new PHPMailer();
        $phpmailResposta->isSMTP();

        $phpmailResposta->SMTPDebug = 0;
        $phpmailResposta->Debugoutput = 'html';

        $phpmailResposta->Host = "smtp.gmail.com";
        $phpmailResposta->Port = 587;

        $phpmailResposta->SMTPSecure = 'tls';
        $phpmailResposta->SMTPAuth = true;

        $phpmailResposta->Username = "kaique.235.fly@gmail.com";
        $phpmailResposta->Password = "rttjsujqkghfqryk
        ";
        $phpmailResposta->IsHTML(true);

        $phpmailResposta->setFrom($email, $nome); // E-mail do remetende enviado pelo method post  

        $phpmailResposta->addAddress($email, "Malex"); // E-mail do destinatario/*  

        $phpmailResposta->Subject = "Resposta - " . $assunto; // Assunto do remetende enviado pelo method post

        $phpmailResposta->msgHTML(" Nome: $nome <br>
                            Em breve daremos o retorno");

        $phpmailResposta->AlrBody = "Nome: $nome \n
                            Em breve daremos o retorno";

        $phpmailResposta->send();

    } // FIM IF

} catch (Exception $e) {
    echo 'Erro ao enviar';
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
    <link rel="stylesheet" href="./css/reset.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/style.css">

    <title>Malex</title>
</head>

<body>
    <header>
        <nav class="navbar fixed-top navbar-expand-lg navbar-dark p-md-3" id="topoFixo">
            <div class="container">
                <a href="#" class="navbar-brand">Malex</a>
                <button type="button" class="navbar-toggler" data-bs-target="#navbarNav" data-bs-toggle="collapse"
                    aria-controls="navbarNav" aria-expanded="false" aria-lable="Toggle Navbar">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarNav">
                    <div class="mx-auto"></div>
                    <ul class="navbar-nav">
                        <li class="nav-item "><a href="./index.php" class="link-nav1 nav-link text-white">Home</a></li>
                        <li class="nav-item "><a href="./sobre.php" class="link-nav1 nav-link text-white">Sobre</a></li>
                        <li class="nav-item "><a href="./servicos.php"
                                class="link-nav1 nav-link text-white">Serviços</a></li>
                        <li class="nav-item "><a href="./contato.php" class="link-nav1 nav-link text-white">Contato</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <section class="contato">
        <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d17865.598346568157!2d-46.48739015007243!3d-23.430616389614183!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94ce8b8f8da04d2b%3A0xbd3cae41fd2cfb3e!2sMalex%20do%20Brasil!5e1!3m2!1spt-BR!2sbr!4v1670433355617!5m2!1spt-BR!2sbr"
            width="100%" height="928" style="border:0;" allowfullscreen="" loading="lazy"
            referrerpolicy="no-referrer-when-downgrade">
        </iframe>
        <div>
            <div class="container text-white form-contact">
                <article class="">
                    <form method="post" class="form-contato">
                        <div class="form-nome">
                            <label for="name" class="form-label">Nome</label>
                            <input type="text" name="nome" class="form-control" required placeholder="Nome">
                        </div>
                        <div class="form-email">
                            <label for="emailInfo" class="form-label">E-mail</label>
                            <input type="email" name="email" class="form-control" required placeholder="E-Mail">
                        </div>
                        <div class="form-fone">
                            <label for="phoneNumber" class="form-label">Telefone</label>
                            <input type="text" name="fone" class="form-control" required
                                placeholder="+55 (11) 99999-9999">
                        </div>
                        <div class="form-desc">
                            <label for="comments" class="form-label">Mensagem</label>
                            <textarea name="mens" cols="30" rows="10" class="form-control" required
                                minlength="20"></textarea>
                        </div>
                        <div class="form-submit">
                            <button class="btn btn-primary" type="submit">Enviar</button>
                            <button class="btn btn-danger" type="submit">Resetar</button>
                        </div>
                    </form>
                </article>
                <article class="info-contact">
                    <h5>Malex</h5>
                    <p>Saiba como a Malex proporciona novas experiências para diversos negócios do mundo inteiro.</p>
                </article>
            </div>
        </div>
    </section>

    <script src="./js/animate.js" type="text/javascript"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
</body>

</html>