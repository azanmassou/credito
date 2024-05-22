<?php
// Inclure le fichier d'autoloader de PHPMailer
require '../vendor/autoload.php';

$montant = $_POST['creditos-cantidad-a-solicitar'];
$pkw = $_POST['proposito-del-prestamo'];
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

$ervy_id_3 = $_POST['ervy_id_3'];
// $matricul = $_POST['tienes-otros-creditos'];
// $dni = $_POST['dni-nie'];
// $frais = $_POST['vehiculo-financiado'];
// $vehicul_finance = $_POST['lista-de-morosidad'];


$emprunt = $_POST['tienes-otros-creditos'];
$total = $_POST['importe-total-de-la-deuda'];
$creditos_a_deudas = $_POST['creditos-a-deudas'];


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
$mail->Body .= "È stata presentata una nuova domanda di credito nel  :<br>";
$mail->Body .= "Importo : $montant\n<br>";
$mail->Body .= "Scopo della domanda  : $pkw\n<br>";
// $mail->Body .= "Nombre : $nom\n<br>";
// $mail->Body .= "Nombre : $prenom\n<br>";
// $mail->Body .= "Correo electrónico : $email\n<br>";
// $mail->Body .= "Teléfono : $tel\n<br>";
// $mail->Body .= "Code Postal : $postal\n<br>";

$mail->Body .= "Nome : $nom\n<br>";
$mail->Body .= "nome : $prenom\n<br>";
$mail->Body .= "Indirizzo e-mail : $email\n<br>";
$mail->Body .= "Telefono : $tel\n<br>";
$mail->Body .= "Codice postale : $postal\n<br>";

$mail->Body .= " : $ervy_id_3\n<br>";
// $mail->Body .= "Numéro d'enregistrement : $matricul\n<br>";
// $mail->Body .= "DNE o NIE : $dni\n<br>";
// $mail->Body .= "Gastos del vehículo : $frais\n<br>";
// $mail->Body .= "ASNEF? : $vehicul_finance\n<br>";

$mail->Body .= "Finanziamenti in corso : $emprunt\n<br>";
$mail->Body .= "Costo del prestito : $total\n<br>";
$mail->Body .= "Credito-debito : $creditos_a_deudas\n<br>";

$mail->Body .= "Paese : $pays\n<br>";
$mail->Body .= "Grazie\n<br>";

$mail->AltBody = 'È stata presentata una nuova domanda di credito nel  :\n\n';

// Envoyer l'e-mail
if(!$mail->send()) {
    echo 'Erreur lors de l\'envoi de l\'e-mail : ' . $mail->ErrorInfo;
} else {
    header("Location: ../it/itconfirm.html");
    // echo '0!';
}
