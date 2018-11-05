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


            if (!preg_match("#[a-zA-ZÀÁÂÃÄÅàáâãäåÒÓÔÕÖØòóôõöøÈÉÊËèéêëÇçÌÍÎÏìíîïÙÚÛÜùúûüÿÑñ' ]$#", trim($_POST["name"]))) {
                $errors["nameError"] = "Veuillez entrer un nom valide.";
            }

            if (!preg_match("#[a-zA-ZÀÁÂÃÄÅàáâãäåÒÓÔÕÖØòóôõöøÈÉÊËèéêëÇçÌÍÎÏìíîïÙÚÛÜùúûüÿÑñ' ]$#", trim($_POST["firstname"]))) {
                $errors["firstnameError"] = "Veuillez entrer un prénom valide.";
            }

            if (!preg_match(" /^[^\W][a-zA-Z0-9_]+(\.[a-zA-Z0-9_]+)*\@[a-zA-Z0-9_]+(\.[a-zA-Z0-9_]+)*\.[a-zA-Z]{2,4}$/", trim($_POST["mail"]))) {
                $errors["mailError"] = "Veuillez entrer un mail valide.";
            }

            if (!preg_match("/[a-zA-Z0-9]/", trim($_POST["adress"]))) {
                $errors["adressError"] = "Veuillez entrer une adresse valide.";
            }

            if (preg_match("/[0-9]{6}/", trim($_POST["zipcode"]))) {
                $errors["zipcodeError"] = "Veuillez entrer un code postal valide.";
            }


            //start validation
            //not empty
            if (empty($_POST['name'])) {

                $errors['nameError'] = "Veuillez entrer votre nom.";
            }

            if (empty($_POST['firstname'])) {

                $errors['firstnameError'] = "Veuillez entrer votre prénom.";
            }

            if (empty($_POST['mail'])) {

                $errors['mailError'] = "Veuillez entrer votre email.";
            }

            if (empty($_POST['adress'])) {

                $errors['adressError'] = "Veuillez entrer votre adresse.";
            }

            if (empty($_POST['message'])) {

                $errors['messageError'] = "Veuillez entrer votre message.";
            }

            if (empty($_POST['zipcode'])) {

                $errors['zipcodeError'] = "Veuillez entrer votre code postal.";
            }

            //Check
            if (count($errors) == 0) {

                // Create the SMTP Transport
                $transport = (new Swift_SmtpTransport('smtp.gmail.com', 465, 'ssl'))
                    ->setUsername(APP_LOGIN_USER)
                    ->setPassword(APP_LOGIN_PWD);


                // Create the Mailer using your created Transport
                $mailer = new Swift_Mailer($transport);

                // Create a message
                $message = new Swift_Message();

                // Set a "subject"
                $message->setSubject($_POST['object']);

                // Set the "From address"
                $message->setFrom([$_POST['mail'] => $_POST['name'].' '.$_POST['firstname'].' '.$_POST['mail']]);

                $message->addTo(APP_LOGIN_USER, $_POST['name'].' '.$_POST['firstname']  );


                // Set the plain-text "Body"
                $message->setBody('Adresse Postale :' . $_POST['zipcode']);

                // Set a "Body"
                $message->addPart( $_POST['message']);


                // Send the message
                $result = $mailer->send($message);

                header('location:/contact');
                exit();
            }
        }
        return $this->twig->render('form.html.twig', ['POST' => $_POST,'errors' => $errors]);
    }
}