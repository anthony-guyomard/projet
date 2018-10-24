<?php
/**
 * Created by PhpStorm.
 * User: sylvi
 * Date: 16/10/2018
 * Time: 21:09
 */

class MotDePasseOublier implements InterfaceController
{
    public function display($data = []) {
        $this->envoyerMail();

        include_once 'VIEW/ViewMotDePasseOublier.php';
        $motDePassOublier = new ViewMotDePasseOublier();

        if ($_SESSION['mailSendMail'] === 'nonVerifier'){
            $motDePassOublier->alert("L'adresse mail renseigné n'existe pas !");
            $_SESSION['mailSendMail'] = '';
        }

        $motDePassOublier->MdpLostPage('Mot de passe oublier');
    }

    public function envoyerMail(){
        include_once 'MODEL/DbMotDePasseOublier.php';
        $bd = new DbMotDePasseOublier();

        $mail = filter_input(INPUT_POST, 'adrrMail');
        $action = filter_input(INPUT_POST, 'action');

        if ($action === 'sendMail'){
            $bd->envoyerInformationMdp($mail);
        }
    }
}