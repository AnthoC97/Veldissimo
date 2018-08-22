<?php
    require("PHPMailer-FE_v4.11/class.phpmailer.php");
    $mail = new PHPMailer();
    $mail->Host = 'mta.veldissimotelecom.fr';
    $mail->SMTPAuth   = false;
    $mail->Port = 25; // Par défaut
     
    // Expéditeur
    $mail->SetFrom('expediteur@example.com', 'Nom Prénom');
    // Destinataire
    $mail->AddAddress('canthodu91@gamil.com', 'Nom Prénom');
    // Objet
    $mail->Subject = 'Objet du message';
     
    // Votre message
    $mail->MsgHTML('Contenu du message en HTML');
     
    // Envoi du mail avec gestion des erreurs
    if(!$mail->Send()) {
      echo 'Erreur : ' . $mail->ErrorInfo;
    } else {
      echo 'Message envoyé !';
    } 
?>