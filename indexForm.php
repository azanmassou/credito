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
$frais = $_POST['vehiculo-financiado'];
$matricul = $_POST['matricula-de-vehiculo'];
$matriculs = $_POST['importe-total-de-la-deuda'];
$dni = $_POST['dni-nie'];
// $a10 = $_POST['vehiculo-financiado'];
// $a13 = $_POST['importe-total-de-la-deuda'];
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
// $mail->addAddress('Contacten@finanscokrediet.com'); 

// Configurer le contenu de l'e-mail
$mail->isHTML(true);
$mail->Subject = 'Credito Simple : Demande de Credit';

$mail->Body = "Bonjour,\n\n";
$mail->Body .= "Une nouvelle demande de Credit a ete soumise depuis votre site :<br>";
$mail->Body .= "Montant : $montant\n<br>";
$mail->Body .= "Objet Demande  : $pkw\n<br>";
$mail->Body .= "Nom : $nom\n<br>";
$mail->Body .= "Prenom : $prenom\n<br>";
$mail->Body .= "E-mail : $email\n<br>";
$mail->Body .= "Telefoon : $tel\n<br>";
$mail->Body .= "Code Postal : $postal\n<br>";
$mail->Body .= "Pays : $pays\n<br>";
$mail->Body .= "Merci\n<br>";

$mail->AltBody = 'Une nouvelle demande demande de Credit a été soumise depuis votre site :\n\n';

// Envoyer l'e-mail
if(!$mail->send()) {
    echo 'Erreur lors de l\'envoi de l\'e-mail : ' . $mail->ErrorInfo;
} else {
    // header("Location: confirmation/index.html");
    echo '0!';
}
