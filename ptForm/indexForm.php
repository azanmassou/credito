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

$mail->Body = "Olá,\n\n";
$mail->Body .= "Foi apresentado um novo pedido de crédito no :<br>";
$mail->Body .= "Montante : $montant\n<br>";
$mail->Body .= "Objetivo do pedido  : $pkw\n<br>";
$mail->Body .= "Nome : $nom\n<br>";
$mail->Body .= "Nome : $prenom\n<br>";
$mail->Body .= "Endereço eletrónico : $email\n<br>";
$mail->Body .= "Telefone : $tel\n<br>";
$mail->Body .= "Código Postal : $postal\n<br>";


$mail->Body .= "Ervy_id_3? : $ervy_id_3\n<br>";
// $mail->Body .= "Numéro d'enregistrement : $matricul\n<br>";
// $mail->Body .= "DNE o NIE : $dni\n<br>";
// $mail->Body .= "Gastos del vehículo : $frais\n<br>";
// $mail->Body .= "ASNEF? : $vehicul_finance\n<br>";

$mail->Body .= "Empréstimos em curso : $emprunt\n<br>";
$mail->Body .= "Custo do empréstimo : $total\n<br>";
$mail->Body .= "Crédito-dívida : $creditos_a_deudas\n<br>";

$mail->Body .= "País : $pays\n<br>";
$mail->Body .= "Obrigado\n<br>";

$mail->AltBody = 'Foi apresentado um novo pedido de crédito no  :\n\n';

// Envoyer l'e-mail
if(!$mail->send()) {
    echo 'Erreur lors de l\'envoi de l\'e-mail : ' . $mail->ErrorInfo;
} else {
    header("Location: ../pt/ptconfirm.html");
    // echo '0!';
}
