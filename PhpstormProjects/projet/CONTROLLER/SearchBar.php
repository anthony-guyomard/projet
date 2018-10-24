<?php
/**
 * Created by PhpStorm.
 * User: z17007611
 * Date: 22/10/18
 * Time: 10:42
 */

include_once "MODEL/DbSearchBar.php";
include_once "VIEW/ViewRecette.php";
include_once "VIEW/HtmlPage.php";
class SearchBar
{
    public function SearchBar ()
    {

        $mot = filter_input(INPUT_POST, 'rechercher');
        $SearchBar = new DbSearchBar();
        $dbRow = $SearchBar->rechercherRecette($mot);
        $action = filter_input(INPUT_POST, 'action');

        if($action === 'Valider') {
            $ViewRecette = new ViewRecette();
            foreach ($dbRow as $row) {
                $ViewRecette->ShowAllSearch($row['IDR'], $row['NAME']);
            }
        }
    }
}