<?php
/**
 * Created by PhpStorm.
 * User: sylvi
 * Date: 13/10/2018
 * Time: 11:54
 */

class Compte implements InterfaceController {

    public function display($data = []) {
        include_once 'VIEW/ViewCompte.php';
        $compte = new ViewCompte();
        $compte->comptePage('Votre compte');

        $action = filter_input(INPUT_POST, 'Action');

        if ($action == 'Inscription') {
            include_once 'MODEL/DbUser.php';

            $name = filter_input(INPUT_POST, 'NAME');
            $email = filter_input(INPUT_POST, 'EMAIL');
            $password = filter_input(INPUT_POST, 'PASSWORD');
            $statut = filter_input(INPUT_POST, 'STATUT');

            $Db = new DbUser();
            $Db->Inscription($name, $email, $password, $statut);
        }
    }

}