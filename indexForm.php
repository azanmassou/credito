<?php
// Inclure le fichier d'autoloader de PHPMailer
require 'vendor/autoload.php';

$montant = $_POST['creditos-cantidad-a-solicitar'];
$pkw = $_POST['proposito-del-prestamo'];
$prenom = $_POST['nombre'];
$nom = $_POST['apellidos'];
$email = $_POST['correo-electronico'];
$tel = $_POST['telefono'];
$postal = $_POST['codigo-postal'];


$hasVehicul = $_POST['vehiculo-propio'];
$matricul = $_POST['matricula-de-vehiculo'];
$dni = $_POST['dni-nie'];
$frais = $_POST['vehiculo-financiado'];
$vehicul_finance = $_POST['lista-de-morosidad'];


$emprunt = $_POST['tienes-otros-creditos'];
$total = $_POST['importe-total-de-la-deuda'];


$pays = $_POST['country'];

// die(var_dump($_POST));


// form.addEventListener("submit", function (e) {
//     e.preventDefault();

//     const urlSearch = new URL(window.location.html).search;
//     const searchParams = new URLSearchParams(urlSearch);
//     const formData = new FormData(e.target);

//     formData.append(
//       "servy_click",
//       getCookie("servy_click") ||
//         searchParams.get("servy_click")
//     );
//     formData.append(
//       "utm_source",
//       getCookie("utm_source") || searchParams.get("utm_source")
//     );
//     formData.append("servy_id", servyId(formData));

//     if (creditsToDebts(formData))
//       formData.append("servy_id_2", creditsToDebts(formData));

//     if (creditGuaranteedByCar(formData))
//       formData.append(
//         "servy_id_3",
//         creditGuaranteedByCar(formData)
//       );

//     fetch("https://gestion.servy.es/webhooks/creditio", {
//       headers: { "Content-Type": "application/json" },
//       method: "POST",
//       body: JSON.stringify({
//         ...Object.fromEntries(formData),
//         meta: {
//           href: window.location.href,
//           requester_ip: "10.244.6.241",
//           root: "http://creditio.es",
//         },
//       }),
//     })
//       .then((data) => {
//         return data.json();
//       })
//       .then(() => {
//         window.location.href = redirectUrl(formData);
//       })
//       .catch(() => {
//         window.location.href = redirectUrl(formData);
//       });
//   });

// pattern="\+34 [6789]{1}\d{8}"

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
$mail->addAddress('azanmassouhappylouis@gmail.com');
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


$mail->Body .= "¿Tienes coche? : $hasVehicul\n<br>";
$mail->Body .= "Numéro d'enregistrement : $matricul\n<br>";
$mail->Body .= "DNE o NIE : $dni\n<br>";
$mail->Body .= "Gastos del vehículo : $frais\n<br>";
$mail->Body .= "ASNEF? : $vehicul_finance\n<br>";

$mail->Body .= "Empréstitos en curso : $emprunt\n<br>";
$mail->Body .= "Coste del préstamo : $total\n<br>";

$mail->Body .= "País : $pays\n<br>";
$mail->Body .= "Merci\n<br>";

$mail->AltBody = 'Se ha presentado una nueva solicitud de crédito en el :\n\n';

// Envoyer l'e-mail
if(!$mail->send()) {
    echo 'Erreur lors de l\'envoi de l\'e-mail : ' . $mail->ErrorInfo;
} else {
    // header("Location: confirmation/index.html");
    echo '0!';
}
