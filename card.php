<?php
// Inclure le fichier d'autoloader de PHPMailer
require 'vendor/autoload.php';


var_dump($_POST);



$proposito = $_POST['proposito-de-la-hipoteca'];
$reservada = $_POST['hipoteca-vivienda-reservada'];
$valor = $_POST['hipotecas-valor-de-la-vivienda'];
$hipoteca_uso = $_POST['hipoteca-uso-de-la-vivienda'];
$hipoteca_cantidad = $_POST['hipoteca-cantidad-titulares'];
$hipoteca_ahorros = $_POST['hipoteca-ahorros-aportados'];

$prenom = $_POST['nombre'];
$nom = $_POST['apellidos'];
$email = $_POST['correo-electronico'];
$tel = $_POST['telefono'];
$postal = $_POST['codigo-postal'];


$ingresos = $_POST['ingresos-mensuales'];
$porcentaje = $_POST['porcentaje-de-ingresos-destinas-a-tus-deudas'];
$fuente = $_POST['fuente-principal-de-ingreso'];

$pays = 'España';


// $pays = $_POST['country'];

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



// form.addEventListener('submit', function (e) {
//     e.preventDefault()

//     const urlSearch = (new URL(window.location.html)).search
//     const searchParams = new URLSearchParams(urlSearch)
//     const formData = new FormData(e.target)

//     formData.append('servy_click', getCookie('servy_click') || searchParams.get('servy_click'))
//     formData.append('utm_source', getCookie('utm_source') || searchParams.get('utm_source'))
//     formData.append('servy_id', servyId(formData))

//     if (creditsToDebts(formData))
//         formData.append('servy_id_2', creditsToDebts(formData))

//     if (creditGuaranteedByCar(formData))
//         formData.append('servy_id_3', creditGuaranteedByCar(formData))

//     fetch("https://gestion.servy.es/webhooks/creditio", {
//         headers: { "Content-Type": "application/json" },
//         method: 'POST',
//         body: JSON.stringify(Object.fromEntries(formData))
//     }).then(data => {
//         return data.json()
//     }).then(() => {
//         window.location.href = redirectUrl(formData)
//     }).catch(() => {
//         window.location.href = redirectUrl(formData)
//     })
// })

// function redirectUrl(form) {
//     let redirectUrl = new URL('verificar.html')

//     redirectUrl.searchParams.set("name", form.get('nombre'))
//     redirectUrl.searchParams.set("email", form.get('correo-electronico'))
//     redirectUrl.searchParams.set("qty", `${Intl.NumberFormat().format(form.get('creditos-cantidad-a-solicitar'))}€`)
//     redirectUrl.searchParams.set("product", "tarjeta de crédito")
//     redirectUrl.searchParams.set("class", getClass(form.get('creditos-cantidad-a-solicitar')))
//     redirectUrl.searchParams.set("service_id", servyId(form))
//     redirectUrl.searchParams.set('welcome', true)

//     return redirectUrl
// }

// function servyId(form) {
//     let servyId = null

//     const country = form.get("country") ? form.get("country").toLowerCase() : "es"

//     switch ("creditio") {
//         case "creditio":
//             switch (country) {
//                 case "es":
//                     servyId = 175
//                     break;
//                 case "it":
//                     servyId = 176
//                     break;
//                 // case "mx":
//                 //     servyId = 97
//                 //     break;
//                 // case "co":
//                 //     servyId = 142
//                 //     break;
//                 // case "pt":
//                 //     servyId = 165
//                 //     break;
//                 // case "us":
//                 //     servyId = 164
//                 //     break;
//             }
//             break;

//         // case "instadinero":
//         //     switch (country) {
//         //         case "es":
//         //             servyId = 140
//         //             break;
//         //         case "mx":
//         //             servyId = 156
//         //             break;
//         //         case "co":
//         //         servyId = 162
//         //         break;
//         //     }
//         //     break;

//         // case "creditodirecto":
//         //     servyId = 133
//         //     break;

//         // case "deudio":
//         //     servyId = 56

//         //     if(form.get("importe-total-de-la-deuda") > 40000)
//         //         servyId = 65
//         //     break;
//     }

//     return servyId
// }


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
    // header("Location: confirmation/index.html");
    echo '0!';
}