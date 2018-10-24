<?php

class ViewRecette extends HtmlPage {

    public function RecettePage() {
        $this->start_page('Liste des Recettes');
        echo '<section class="sec_princ">';

    }

    public function VisitorConnexion() {
        echo '<p>Afin de pouvoir consulter l\'intégralité d\'une recette, vous devez posséder un compte.</p>';
        $this->connexion();
    }

    public function text() {
        echo '<h1>Listes des recettes</h1>';
    }

    public function ShowAllRecette($var, $titre){
        $this->ShowRecette($var, $titre);
    }


    public function EndRecettePage() {
        echo '</section>';
        $this->end_page();
    }

    public function ShowAllSearch($var, $titre){
        $this->start_page("Recettes pour '.$titre.'");
        $this->ShowRecette($var, $titre);
    }
}