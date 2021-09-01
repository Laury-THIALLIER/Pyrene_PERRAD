<?php

    session_start();
    $_SESSION['confirmation_formulaire'] = '<p style="color:rebeccapurple;">Votre demande a bien été prise en compte.</p>';

    // Récupération des données du formulaire
    $prenom = htmlspecialchars($_POST['prenom']);
    $nom = htmlspecialchars($_POST['nom']);
    $mail = htmlspecialchars($_POST['mail']);
    $tel = htmlspecialchars($_POST['tel']);
    $message = htmlspecialchars($_POST['message']);


    // Destinataire
    $to  = 'p.perrad@lesprofessionnels.immo';

    // Sujet
    $subject = 'Formulaire - Agent commercial en immobilier';

    // Message
    $message = '
     <html>
      <head>
      </head>
      <body>
        <h3>« Agent commercial en immobilier »</h3>

        </br>

        <p><b>Nom</b> : '.$nom.' - <b>Prénom</b> : '.$prenom.'</p>
        <p><b>Adresse mail</b> : '.$mail.'</p>
        <p><b>Téléphone</b> : '.$tel.'</p>
        <p><b>Message</b> : '.$message.'</p>
      </body>
     </html>
     ';

     // Entête type mail
     $headers[] = 'MIME-Version: 1.0';
     $headers[] = 'Content-type: text/html; charset=iso-8859-1';

     $headers[] = 'From: Site Web <formulaire@admin.fr>';

     // Envoi
     mail($to, $subject, $message, implode("\r\n", $headers));

     //Redirection
     header('Location: ../pages/agent_commercial_en_immobilier.php');
     exit();
 ?>