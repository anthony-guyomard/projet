<?php
/**
 * Created by PhpStorm.
 * User: z17007611
 * Date: 22/10/18
 * Time: 08:58
 */

include_once 'AbstractDB.php';

class DbSearchBar extends AbstractDB
{
    public function rechercherRecette($Recherche)
    {
        $link = $this->getDbLink();
        $query = 'SELECT * FROM Recette WHERE NAME LIKE "%'.$Recherche.'%" OR SHORTDESCRIP LIKE "%'.$Recherche.'%" OR INGREDIENTS LIKE "%'.$Recherche.'%"';
        var_dump($query);
        $dbResult = mysqli_query($link, $query);
        $dbRow = [];
        while ($row = $dbResult->fetch_array()) {
            $dbRow[] = $row;
        }
        return $dbRow;

    }
}