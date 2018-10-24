<?php
/**
 * Created by PhpStorm.
 * User: sylvi
 * Date: 16/10/2018
 * Time: 21:10
 */

include_once 'AbstractDB.php';

class DbMotDePasseOublier extends AbstractDB
{
    /**
     * @param $mail
     */
    public function envoyerInformationMdp($mail){
        $query = mysqli_query($this->getDbLink(), 'SELECT * FROM User WHERE EMAIL = "'.$mail.'"');
        if (mysqli_num_rows($query)> 0 ){
            $dbRow = mysqli_fetch_assoc($query);
            $mdp = $dbRow ['PASSWORD'];

            $to      = $mail;
            $subject = 'Votre mot de passe';
            $message = 'Votre mot de passe est : ' . $mdp . '. Merci de ne pas en tenir compte si ce mail ne vous est pas destiné.';
            $headers = 'From: webmaster@example.com' . "\r\n" .
                'Reply-To: webmaster@example.com' . "\r\n" .
                'X-Mailer: PHP/' . phpversion();

            mail($to, $subject, $message, $headers);

            $_SESSION['mailSendMail'] = '';
        }
        else{
            $_SESSION['mailSendMail'] = 'nonVerifier';
        }
    }
}