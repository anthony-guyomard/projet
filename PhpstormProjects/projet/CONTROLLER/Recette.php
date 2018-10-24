<?php
/**
 * Created by PhpStorm.
 * User: b17014741
 * Date: 12/10/2018
 * Time: 12:45
 */

include_once 'VIEW/ViewRecette.php';
include_once 'MODEL/DbRecette.php';

class Recette implements InterfaceController {

    public function display($data = []) {

        $recette = new ViewRecette();
        $recette->RecettePage();
        $listRecette = $this->afficherRecette();
        if (!($_SESSION['Login'] == 'Admin' || $_SESSION['Login'] == 'Membre')) {
            $recette->VisitorConnexion();
        }
        $recette->text();
        for ($i = 0;$i < sizeof($listRecette); $i = $i+2){
            $recette->ShowAllRecette($listRecette[$i], $listRecette[$i+1]);
        }

        $recette->EndRecettePage();
    }

    public function afficherRecette(){
        $dbR = new DbRecette();
        return $dbR->GetAllRecette();
    }
}