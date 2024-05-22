<?php
// Inclure le fichier d'autoloader de PHPMailer
require '../vendor/autoload.php';

$montant = $_POST['creditos-cantidad-a-solicitar'];

$prenom = $_POST['nombre'];
$nom = $_POST['apellidos'];
// $email = $_POST['correo-electronico'];
$tel = $_POST['telefono'];
$postal = $_POST['codigo-postal'];

if (!isset($_POST['correo-electronico']) || empty($_POST['correo-electronico']) || !filter_var($_POST['correo-electronico'], FILTER_VALIDATE_EMAIL)){
    header("Location: {$_SERVER['HTTP_REFERER']}?error=email&email={$_POST['correo-electronico']}");
    exit;
}

$email = $_POST['correo-electronico'];

$emprunt = $_POST['tienes-otros-creditos'];
$total = $_POST['importe-total-de-la-deuda'];


$pays = 'IT';

// Créer une nouvelle instance de PHPMailer
$mail = new PHPMailer\PHPMailer\PHPMailer();

// Configurer les paramètres du serveur SMTP
$mail->CharSet = 'utf-8';
$mail->isSMTP();
$mail->Host = 'mail.credito-mas-simple.com';
$mail->SMTPAuth = true;
$mail->Username = 'support@credito-mas-simple.com';
$mail->Password = 'Happylouis66'; // Remplacez par votre mot de passe
$mail->SMTPSecure = 'ssl';
$mail->Port = 465;

// Configurer l'expéditeur et le destinataire
$mail->setFrom($email);
// $mail->addAddress('azanmassouhappylouis@gmail.com');
$mail->addAddress('contact@credito-mas-simple.com'); 

// Configurer le contenu de l'e-mail
$mail->isHTML(true);
$mail->Subject = 'Credito Simple';

$mail->Body = "Ciao,\n\n";
$mail->Body .= "È stata presentata una nuova domanda di credito nel :<br>";

$mail->Body .= "importo dei crediti da applicare : $montant\n<br>";
$mail->Body .= "Nome : $nom\n<br>";
$mail->Body .= "nome : $prenom\n<br>";
$mail->Body .= "Indirizzo e-mail : $email\n<br>";
$mail->Body .= "Telefono : $tel\n<br>";
$mail->Body .= "Codice postale : $postal\n<br>";

$mail->Body .= "Finanziamenti in corso : $emprunt\n<br>";
$mail->Body .= "Costo del prestito : $total\n<br>";


$mail->Body .= "Paese : $pays\n<br>";
$mail->Body .= "Grazie\n<br>";

$mail->AltBody = 'È stata presentata una nuova domanda di credito nel :\n\n';

// Envoyer l'e-mail
if(!$mail->send()) {
    echo 'Erreur lors de l\'envoi de l\'e-mail : ' . $mail->ErrorInfo;
} else {
    header("Location: ../it/itconfirm.html");
    // echo '0!';
}
