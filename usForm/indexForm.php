<?php
// Inclure le fichier d'autoloader de PHPMailer
require '../vendor/autoload.php';

$montant = $_POST['creditos-cantidad-a-solicitar'];
$pkw = $_POST['proposito-del-prestamo'];
$prenom = $_POST['nombre'];
$nom = $_POST['apellidos'];
$email = $_POST['correo-electronico'];
$tel = $_POST['telefono'];
$postal = $_POST['codigo-postal'];


$ervy_id_3 = $_POST['ervy_id_3'];
// $matricul = $_POST['tienes-otros-creditos'];
// $dni = $_POST['dni-nie'];
// $frais = $_POST['vehiculo-financiado'];
// $vehicul_finance = $_POST['lista-de-morosidad'];


$emprunt = $_POST['tienes-otros-creditos'];
$total = $_POST['importe-total-de-la-deuda'];
$creditos_a_deudas = $_POST['creditos-a-deudas'];


$pays = 'Us';

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
$mail->Body .= "Importe : $montant\n<br>";
$mail->Body .= "Objeto de la solicitud  : $pkw\n<br>";
$mail->Body .= "Nombre : $nom\n<br>";
$mail->Body .= "Nombre : $prenom\n<br>";
$mail->Body .= "Correo electrónico : $email\n<br>";
$mail->Body .= "Teléfono : $tel\n<br>";
$mail->Body .= "Code Postal : $postal\n<br>";


$mail->Body .= "Ervy_id_3? : $ervy_id_3\n<br>";

$mail->Body .= "Empréstitos en curso : $emprunt\n<br>";
$mail->Body .= "Coste del préstamo : $total\n<br>";
$mail->Body .= "Creditos-a-deudas : $creditos_a_deudas\n<br>";

$mail->Body .= "País : $pays\n<br>";
$mail->Body .= "Gracias\n<br>";

$mail->AltBody = 'Se ha presentado una nueva solicitud de crédito en el :\n\n';

// Envoyer l'e-mail
if(!$mail->send()) {
    echo 'Erreur lors de l\'envoi de l\'e-mail : ' . $mail->ErrorInfo;
} else {
    header("Location: ../us/usconfirm.html");
    // echo '0!';
}
