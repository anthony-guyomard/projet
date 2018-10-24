<?php
/**
 * Created by PhpStorm.
 * User: Sylvian Brunet
 * Date: 12/10/2018
 * Time: 12:33
 */

include_once 'AbstractDB.php';

class DbUser extends AbstractDB
{

    public function VerifDb($Login, $Password)
    {
        $query = 'SELECT * FROM User WHERE EMAIL = \'' . $Login . '\' AND PASSWORD = \'' . $Password . '\'';

        $dbResult = mysqli_query($this->getDbLink(), $query);
        $dbRow = mysqli_fetch_assoc($dbResult);

        $Type = $dbRow ['STATUT'];
        $Email = $dbRow ['EMAIL'];
        $Id = $dbRow ['ID'];
        $Name = $dbRow ['NAME'];

        if ($Type == 'Admin' || $Type == 'Membre') {
            $_SESSION['Login'] = $Type;
            $_SESSION['Email'] = $Email;
            $_SESSION['Ident'] = $Id;
            $_SESSION['Name'] = $Name;
        }
    }

    public function Deconnexion(){
        $_SESSION = array();
        session_destroy();
    }

    public function Inscription($name, $email, $password, $statut) {

        $query= 'INSERT INTO User (`NAME`, `EMAIL`, `PASSWORD`, `STATUT`) VALUES ("'.$name.'","'.$email.'","'.$password.'","'.$statut.'" )';

        mysqli_query($this->getDbLink(), $query);

        header('Location: /Compte');
    }
}