<?php
/**
 * Created by PhpStorm.
 * User: sylvi
 * Date: 15/10/2018
 * Time: 20:05
 */

include_once 'AbstractDB.php';

class DbRecette extends AbstractDB
{
    public function GetAllRecette()
    {
        $query = 'SELECT * FROM Recette';
        $dbResult = mysqli_query($this->getDbLink(), $query);

        $list = array();

        while($dbRow = mysqli_fetch_assoc($dbResult)) {

            $idRe = $dbRow['IDR'];
            $nameRe = $dbRow['NAME'];

            $list[] = $idRe;
            $list[] = $nameRe;
        }
        return $list;
    }

    public function getRecette($idR){

        $link = $this->getDbLink();
        $query = 'SELECT * FROM Recette WHERE IDR = "' . $idR . '"';
        $dbResult = mysqli_query($link, $query);
        $dbRow = mysqli_fetch_assoc($dbResult);

        $dbRow['IDR'];
        $dbRow['NAME'];
        $dbRow['NMBRGUESTS'];
        $dbRow['SHORTDESCRIP'];
        $dbRow['LONGDESCRIP'];
        $dbRow['INGREDIENTS'];
        $dbRow['STAGE'];
        $dbRow['DATE'];
        $dbRow['IMAGE'];

        //$query = 'SELECT COUNT(*) AS NBBURN FROM Burn WHERE IDR = '.$idR;
        $query = 'SELECT COUNT(*) AS NBBURN FROM Burn WHERE IDR = ?';

        /* Crée une requête préparée */
        if ($stmt = mysqli_prepare($link, $query)) {
            mysqli_stmt_bind_param($stmt, "i", $idR);
            mysqli_stmt_execute($stmt);
            $dbResult2 = mysqli_stmt_get_result($stmt);
            $dbRow2 = mysqli_fetch_assoc($dbResult2);
            $dbRow['NBBURN'] = $dbRow2['NBBURN'];
        }

        /*$dbResult = mysqli_query($link, $query);
        $dbRow2 = mysqli_fetch_assoc($dbResult);*/


        return $dbRow;
    }

    public function addBurn($idRecette, $idUser) {
        $query = 'INSERT INTO `Burn`(`IDR`, `IDU`) VALUES ("'.$idRecette.'","'.$idUser.'")';
        $this->executeQuery($query);
    }

    public function delBurn($idRecette, $idUser) {
        $query = 'DELETE FROM Burn WHERE IDR = "'.$idRecette.'" AND IDU = "'.$idUser.'"';
        $this->executeQuery($query);
    }
}