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

$mail->Body = "Hello,\n\n";
$mail->Body .= "A new loan application has been filed with the :<br>";
$mail->Body .= "Amount : $montant\n<br>";
$mail->Body .= "Object of the request  : $pkw\n<br>";
$mail->Body .= "Name : $nom\n<br>";
$mail->Body .= "Name : $prenom\n<br>";
$mail->Body .= "E-mail address : $email\n<br>";
$mail->Body .= "Phone : $tel\n<br>";
$mail->Body .= "Zip Code : $postal\n<br>";


$mail->Body .= "Ervy_id_3? : $ervy_id_3\n<br>";

$mail->Body .= "Borrowings in process : $emprunt\n<br>";
$mail->Body .= "Cost of the loan : $total\n<br>";
$mail->Body .= "Credit-to-debt : $creditos_a_deudas\n<br>";

$mail->Body .= "Country : $pays\n<br>";
$mail->Body .= "Thank you\n<br>";

$mail->AltBody = 'A new loan application has been filed with the :\n\n';

// Envoyer l'e-mail
if(!$mail->send()) {
    echo 'Erreur lors de l\'envoi de l\'e-mail : ' . $mail->ErrorInfo;
} else {
    header("Location: ../us/usconfirm.html");
    // echo '0!';
}
