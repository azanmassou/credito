<?php
// Inclure le fichier d'autoloader de PHPMailer
require 'vendor/autoload.php';

$montant = $_POST['creditos-cantidad-a-solicitar'];

$prenom = $_POST['nombre'];
$nom = $_POST['apellidos'];
$email = $_POST['correo-electronico'];
$tel = $_POST['telefono'];
$postal = $_POST['codigo-postal'];

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
$mail->setFrom($_POST['correo-electronico']);
// $mail->addAddress('azanmassouhappylouis@gmail.com');
$mail->addAddress('contact@credito-mas-simple.com'); 

// Configurer le contenu de l'e-mail
$mail->isHTML(true);
$mail->Subject = 'Credito Simple';

$mail->Body = "Hola,\n\n";
$mail->Body .= "Se ha presentado una nueva solicitud de crédito en el :<br>";

$mail->Body .= "creditos-cantidad-a-solicitar : $montant\n<br>";
$mail->Body .= "Nombre : $nom\n<br>";
$mail->Body .= "Nombre : $prenom\n<br>";
$mail->Body .= "Correo electrónico : $email\n<br>";
$mail->Body .= "Teléfono : $tel\n<br>";
$mail->Body .= "Code Postal : $postal\n<br>";

$mail->Body .= "Empréstitos en curso : $emprunt\n<br>";
$mail->Body .= "Coste del préstamo : $total\n<br>";


$mail->Body .= "País : $pays\n<br>";
$mail->Body .= "Gracias\n<br>";

$mail->AltBody = 'Se ha presentado una nueva solicitud de crédito en el :\n\n';

// Envoyer l'e-mail
if(!$mail->send()) {
    echo 'Erreur lors de l\'envoi de l\'e-mail : ' . $mail->ErrorInfo;
} else {
    header("Location: pt/itconfirm.html");
    // echo '0!';
}
