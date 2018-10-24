<?php

class ViewCompte extends HtmlPage {

    public function comptePage($title) {
        $this->start_page($title);
        if ($_SESSION['Login'] == 'Admin') {
            $this->monCompte();
            $this->inscription();
        }
        elseif ($_SESSION['Login'] == 'Membre'){
            $this->monCompte();
        }
        else {
            $this->nonConnecter();
        }
        $this->end_page();
    }
}