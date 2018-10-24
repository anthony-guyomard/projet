<?php
/**
 * Created by PhpStorm.
 * User: sylvi
 * Date: 18/10/2018
 * Time: 22:49
 */

class ViewDescriptionRecette extends HtmlPage
{
    public function DecripRecettePage($title, $recette) {

        if ($_SESSION['Login'] == 'Admin' || $_SESSION['Login'] == 'Membre') {
            $this->start_page($title);
            $this->TheRecette($recette);
            $this->LikeBurn($recette['IDR']);
            $this->DelBurn($recette['IDR']);
            echo '</div></section>';
            $this->end_page();
        }
        else {
            header('Location: /Recette');
        }
    }

    public function TheRecette($recette) {
        $this->ShowTheRecette($recette);
    }
}