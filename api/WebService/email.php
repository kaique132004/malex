<?php


require 'api/vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

use Kreait\Firebase\Factory;
use Google\Cloud\Firestore\FirestoreClient;

$mail = new PHPMailer();
$mensagem = '';


$factory = (new Factory)
    ->withServiceAccount('api/WebService/api.json');

$firestore = $factory->createFirestore();
$database = $firestore->database();


if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['email'])) {

    $assunto = 'Contato pelo Site';
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $fone = $_POST['fone'];
    $mensagem = $_POST['mens'];


    try {
        date_default_timezone_set('America/Sao_Paulo');
        //Server settings
        $mail->SMTPDebug = 0;
        $mail->Debugoutput = 'html';
        $mail->isSMTP();
        $mail->Host = 'smtp.example.com';
        $mail->SMTPAuth = true;
        $mail->Username = '#############'; //SMTP username
        $mail->Password = '###############'; //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        $mail->isHTML(true);
        $mail->setFrom($email, $nome);
        $mail->addAddress("example@example.com", $assunto);
        $mail->Subject = $assunto;
        $mail->msgHTML("Nome: $nome <br>
                        Email: $email <br>
                        Telefone: $fone <br>
                        Mensagem: $mensagem");
        $mail->AltBody = "Nome: $nome \n
                        Email: $email \n
                        Telefone: $fone \n
                        Mensagem: $mensagem";


        if ($mail->send()) {
            $newData = [
                'nome' => $nome,
                'email' => $email,
                'fone' => $fone,
                'mensagem' => $mensagem,
                'timestamp' => time()
            ];
            $database->collection('mensagens')->add($newData);

            echo "<script>alet(`Mensagem Enviada com Sucesso`)</script>";

        } else {
            echo "Erro ao enviar mensagem!";
        }

        // ############## RESPOSTA AUTOMATICA ###############
        $mail_RES = new PHPMailer();

        $mail_RES->SMTPDebug = 0;
        $mail_RES->Debugoutput = 'html';
        $mail_RES->isSMTP();
        $mail_RES->Host = 'smtp.example.com';
        $mail_RES->SMTPAuth = true;
        $mail_RES->Username = '#######################';
        $mail_RES->Password = '##############'; 
        $mail_RES->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail_RES->Port = 587;
        $mail_RES->isHTML(true);
        $mail_RES->setFrom($email, $nome);    
        $mail_RES->addAddress($email, "Malex do Brasil"); 
        $mail_RES->Subject = "Resposta - " . $assunto;
        $mail_RES->msgHTML("Olá $nome, <br>
                        Agradecemos o seu contato, em breve retornaremos sua mensagem. <br>
                        Atenciosamente, <br>
                        Malex do Brasil");
        $mail_RES->AltBody = "Olá $nome, \n
                        Agradecemos o seu contato, em breve retornaremos sua mensagem. \n
                        Atenciosamente, \n
                        Malex do Brasil";
        $mail_RES->send();

    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}
?>