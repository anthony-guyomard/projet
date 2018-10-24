<?php
/**
 * Created by PhpStorm.
 * User: sylvi
 * Date: 18/10/2018
 * Time: 22:48
 */

include_once 'CONTROLLER/Recette.php';
include_once 'MODEL/DbRecette.php';
include_once 'VIEW/ViewDescriptionRecette.php';

class DescriptionRecette implements InterfaceController
{
    public function display($data = [])
    {
        $id = $data[0];
        $recette = $this->afficherLaRecette($id);

        $myRecette = new ViewDescriptionRecette();
        $myRecette->DecripRecettePage('Recette', $recette);

    }

    public function afficherLaRecette($id){
        $recette = new DbRecette();
        return $recette->getRecette($id);
    }

    public function gestionBurn($data = []) {
        $idrecette = $data[1];
        $action = $data[0];
        $etat = filter_input(INPUT_POST, 'action2');
        if ($action == 'add') {
            $add = new DbRecette();
            $add->addBurn($idrecette, $_SESSION['Ident']);
        }
        elseif ($action == 'del') {
            $del = new DbRecette();
            $del->delBurn($idrecette, $_SESSION['Ident']);
        }

        header('Location: /DescriptionRecette/display/' . $idrecette);
    }

}