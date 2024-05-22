<?php
// Inclure le fichier d'autoloader de PHPMailer
require '../vendor/autoload.php';


// var_dump($_POST);



$proposito = $_POST['proposito-de-la-hipoteca'];
$reservada = $_POST['hipoteca-vivienda-reservada'];
$valor = $_POST['hipotecas-valor-de-la-vivienda'];
$hipoteca_uso = $_POST['hipoteca-uso-de-la-vivienda'];
$hipoteca_cantidad = $_POST['hipoteca-cantidad-titulares'];
$hipoteca_ahorros = $_POST['hipoteca-ahorros-aportados'];

$prenom = $_POST['nombre'];
$nom = $_POST['apellidos'];
// $email = $_POST['correo-electronico'];
$tel = $_POST['telefono'];
$postal = $_POST['codigo-postal'];


$ingresos = $_POST['ingresos-mensuales'];
$porcentaje = $_POST['porcentaje-de-ingresos-destinas-a-tus-deudas'];
$fuente = $_POST['fuente-principal-de-ingreso'];

if (!isset($_POST['correo-electronico']) || empty($_POST['correo-electronico']) || !filter_var($_POST['correo-electronico'], FILTER_VALIDATE_EMAIL)){
    header("Location: {$_SERVER['HTTP_REFERER']}?error=email&email={$_POST['correo-electronico']}");
    exit;
}

$email = $_POST['correo-electronico'];
$pays = 'ES';

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

$mail->Body = "Hola,\n\n";
$mail->Body .= "Se ha presentado una nueva solicitud de crédito en el :<br>";

$mail->Body .= "Nombre : $nom\n<br>";
$mail->Body .= "Nombre : $prenom\n<br>";
$mail->Body .= "Correo electrónico : $email\n<br>";
$mail->Body .= "Teléfono : $tel\n<br>";
$mail->Body .= "Code Postal : $postal\n<br>";


$mail->Body .= "Proposito : $proposito\n<br>";
$mail->Body .= "Reservada : $reservada\n<br>";
$mail->Body .= "Valor : $valor\n<br>";
$mail->Body .= "Hipoteca_uso : $hipoteca_uso\n<br>";
$mail->Body .= "Hipoteca_ahorros : $hipoteca_ahorros\n<br>";

$mail->Body .= "Porcentaje : $porcentaje\n<br>";
$mail->Body .= "Ingresos : $ingresos\n<br>";
$mail->Body .= "Fuente : $fuente\n<br>";

$mail->Body .= "País : $pays\n<br>";
$mail->Body .= "Gracias\n<br>";

$mail->AltBody = 'Se ha presentado una nueva solicitud de crédito en el :\n\n';

// Envoyer l'e-mail
if(!$mail->send()) {
    echo 'Erreur lors de l\'envoi de l\'e-mail : ' . $mail->ErrorInfo;
} else {
    header("Location: ../confirm.html");
    // echo '0!';
}
