<?php
    if(isset($_POST['contact_mail'])) {
        $to = "lilianpeuron@gmail.com"; // Adresse email du destinataire
        $subject = "Nouveau message du formulaire de contact"; // Sujet du mail
        $message = "Nom : " . $_POST['nom'] . "\n\n";
        $message .= "Prénom : " . $_POST['prenom'] . "\n\n";
        $message .= "Email : " . $_POST['email'] . "\n\n";
        $message .= "Téléphone : " . $_POST['telephone'] . "\n\n";
        $message .= "Message : " . $_POST['message'] . "\n\n";
        $headers = "From: " . $_POST['email'] . "\r\n"; // Adresse email de l'expéditeur

        // Envoi du mail
        if(mail($to, $subject, $message, $headers)) {
            echo "Votre message a bien été envoyé.";
        } else {
            echo "Une erreur est survenue lors de l'envoi du message.";
        }
    }
?>
