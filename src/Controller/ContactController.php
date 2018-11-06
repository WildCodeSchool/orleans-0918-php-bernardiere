<?php
namespace Controller;
// ... ajoute ces 2 use

use \Swift_SmtpTransport;
use \Swift_Mailer;
use \Swift_Message;


class ContactController extends AbstractController
{

    public function formcheck()
    {
        $errors = [];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            foreach ($_POST as $postName=>$postValue){
                $cleanPost[$postName]=trim($postValue);
            }


            if (!preg_match("#[a-zA-ZÀÁÂÃÄÅàáâãäåÒÓÔÕÖØòóôõöøÈÉÊËèéêëÇçÌÍÎÏìíîïÙÚÛÜùúûüÿÑñ' ]$#", $cleanPost["name"])) {
                $errors["nameError"] = "Veuillez entrer un nom valide.";
            }

            if (!preg_match("#[a-zA-ZÀÁÂÃÄÅàáâãäåÒÓÔÕÖØòóôõöøÈÉÊËèéêëÇçÌÍÎÏìíîïÙÚÛÜùúûüÿÑñ' ]$#", $cleanPost["firstname"])) {
                $errors["firstnameError"] = "Veuillez entrer un prénom valide.";
            }

            if (!filter_var($cleanPost["mail"], FILTER_VALIDATE_EMAIL)) {
                $errors["mailError"] = "Veuillez entrer un mail valide.";
            }


            if (preg_match("/[0-9]{6}/", $cleanPost["zipcode"])) {
                $errors["zipcodeError"] = "Veuillez entrer un code postal valide.";
            }


            //start validation
            //not empty
            if (empty($cleanPost['name'])) {

                $errors['nameError'] = "Veuillez entrer votre nom.";
            }

            if (empty($cleanPost['firstname'])) {

                $errors['firstnameError'] = "Veuillez entrer votre prénom.";
            }

            if (empty($cleanPost['mail'])) {

                $errors['mailError'] = "Veuillez entrer votre email.";
            }

            if (empty($cleanPost['adress'])) {

                $errors['adressError'] = "Veuillez entrer votre adresse.";
            }

            if (empty($cleanPost['message'])) {

                $errors['messageError'] = "Veuillez entrer votre message.";
            }

            if (empty($cleanPost['zipcode'])) {

                $errors['zipcodeError'] = "Veuillez entrer votre code postal.";
            }

            //Check
            if (empty($errors)) {

                // Create the SMTP Transport
                $transport = (new Swift_SmtpTransport('smtp.gmail.com', 465, 'ssl'))
                    ->setUsername(APP_LOGIN_USER)
                    ->setPassword(APP_LOGIN_PWD);


                // Create the Mailer using your created Transport
                $mailer = new Swift_Mailer($transport);

                // Create a message
                $message = new Swift_Message();

                // Set a "subject"
                $message->setSubject($cleanPost['object']);

                // Set the "From address"
                $message->setFrom([$cleanPost['mail'] => $cleanPost['name'].' '.$cleanPost['firstname'].' '.$cleanPost['mail']]);

                $message->addTo(APP_LOGIN_USER, $cleanPost['name'].' '.$cleanPost['firstname']  );


                // Set the plain-text "Body"
                $message->setBody('Adresse Postale :' . $cleanPost['zipcode']);

                // Set a "Body"
                $message->addPart( $cleanPost['message']);


                // Send the message
                $result = $mailer->send($message);

                header('location:/contact');
                exit();
            }
        }
        return $this->twig->render('contact.html.twig', ['data' => $cleanPost,'errors' => $errors]);
}