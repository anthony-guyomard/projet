<?php
/**
 * Created by PhpStorm.
 * User: b17014741
 * Date: 11/10/2018
 * Time: 16:30
 */

include_once 'VIEW/ViewAccueil.php';
include_once 'MODEL/DbRecette.php';

class Accueil implements InterfaceController
{
    public function display($data = []) {
        include_once 'VIEW/ViewAccueil.php';
        $accueil = new ViewAccueil();

        $accueil->accueilPage();
    }
}