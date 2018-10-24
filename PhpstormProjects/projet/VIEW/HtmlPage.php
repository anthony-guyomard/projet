<?php
/**
 * Created by PhpStorm.
 * User: b17014741
 * Date: 11/10/2018
 * Time: 16:36
 */

abstract class HtmlPage
{
    public function start_page($title){

        echo '<!doctype html>
             <html lang="fr"> 
             <head>
                <meta charset="utf-8">
                <title>' . $title . '</title>
                <link rel="stylesheet" href="/VIEW/CSS/StyleSheet.css">
                <meta property="og:title" content="Delicieuse recette" /> 
                <meta property="og:image" content="https://www.google.com/search?q=image+de+barbecue&client=firefox-b-ab&source=lnms&tbm=isch&sa=X&ved=0ahUKEwiT8vSeo5_eAhWLIMAKHaUXC6IQ_AUIDigB&biw=1678&bih=898#imgrc=EQxRz3bP1rbhuM:" /> 
                <meta property="og:description" content="Je vous partage cette recette que je trouve bien cool!" />
             </head>
             <body>
             <header>
             <form action="/SearchBar" method="post">
                <ul>
                   <li><a href="/Accueil" class="logo"><img src="https://zupimages.net/up/18/41/6j51.png" height="52" width="40"></a></li>
                   <li><a href="/Recette">Recettes</a></li>
                   <li><a href="/Compte">Mon Compte</a></li>
                   <li><p class="site">Cook & Burn</p></li>
                        <li><input class="input_menu" placeholder="Rechercher une recette" name="rechercher"/>
                        <input class="input_menu2" type="submit" name="action" value="Valider"/></li>
                   <li style="float:right"><a href="/Utilisateur" class="connexion">Connexion</a></li>
               </ul>
             </form>
             </header>';
    }

    public function Entreprise() {
        echo '<section class="sec_princ" style="margin-bottom: 100px;">
                <h2>L\'entreprise</h2>
                <p>Nous sommes une entreprise établie depuis 2010. <br>
                "Cook & Burn" était spécialisé dans la vente de BBQ et a aujourd\'hui évolué dans la vente de BBQ connecté. <br>
                Nous vous offrons une qualité supérieur d\'appareils, qu\'il soit à gaz ou à charbon de bois. <br>
                Nous vous offrons également des services comme ce site où nos clients et visiteurs partage leurs recettes.<br><br>
                Qualité, Connectivité, Service, voilà ce que vous offre "Cook & Burn".
                </p>
                <h2>Meilleure recette du moment !!</h2>
              ';
    }

    public function nonConnecter() {
        $this->start_page('Connexion à votre compte');
        echo '<section class="sec_log">
            <div class="inter_div">
              <h1 class="titre_h1">Connexion</h1>
              <form method="post" action="/Utilisateur" class="formulaire"><br>
                 <label for="ID">Identifiant</label><br>
                 <input type="text" name="Login" placeholder="Adresse Email" class="zone_champ"/><br><br>
                 <label for="PWD">Mot de passe</label><br>
                 <input type="password" name="Password" placeholder="password" class="zone_champ"/><br><br>
                 <label for="PWD"><a href="/MotDePasseOublier" style="font-size:10px; float: right; margin-right: 25%;">mot de passe oublié ?</a></label><br><br>
                 <input type="submit" name="Action" value="Connexion"/><br><br>
              </form>  
              </div>        
          </section>';
        $this->end_page();
    }

    public function connecter() {
        $this->start_page('Votre compte');
        echo '<section class="sec_log">
            <div class="inter_div">
              <h1 class="titre_h1">Vous êtes déjà connecté</h1>
              <a href="/Compte">Mon compte</a>
              <form method="post">                                               
                 <input type="submit" name="Action" value="Deconnexion">                                    
              </form>
            </div>
          </section>';
        $this->end_page();
    }

    public function monCompte() {
        echo '<section class="sec_princ">
              <h1>Mon Compte</h1>
              <div class="parent">
                <div class="enfant">
                    IMG COMPTE <br>
                </div>
                <div class="enfant2"><br>
                    Nom de l\'Utilisateur : ' . $_SESSION['Name'] . '<br>
                    Adresse e-mail : ' . $_SESSION['Email'] . '<br>
                    Statut : ' . $_SESSION['Login'] . '<br><br>
                    <form action="/Utilisateur" method="post">                                               
                        <input type="submit" name="Action" value="Deconnexion">                                    
                    </form>
                </div>
              </div>
              <div class="parent">
                <div class="enfant3">
                    <h3>Vos recettes favorites : </h3>
                </div>
              </div>
              <div class="clear"></div>
            </section>';
    }

    public function inscription() {
        echo '<section class="sec_princ">
                <div class="inter_div">
                    <h1 class="titre_h1">Ajouter un Compte</h1>
                    <form action="/Compte" method="POST">
                        <input type="text" name="NAME" placeholder="Nom"/>
                        <input type="password" name="PASSWORD" placeholder="mot de passe"/><br>
                        <input type="text" name="EMAIL" placeholder="Mail"/>
                        <select name="STATUT">
                            <option>Membre</option>
                            <option>Admin</option>
                        </select><br>
                        <button type="submit" name="Action" value="Inscription">Ajouter le Compte</button>
                    </form>
                </div>
            </section>';
    }

    public function ShowRecette($id, $titre){
        echo '
		<form action="/DescriptionRecette/display/'.$id.'" method="post">
        <button type="submit" name="action" value="'.$id.'">'.$titre.'</button>
		</form><br>';
    }

    public function connexion() {
        echo '
            <form action="/Utilisateur" method="post">
                <button type="submit" name="action">Se connecter</button>
            </form><br>';
    }

    public function ShowTheRecette($recette){
        echo'
            <section class="sec_princ">
                <div class="inter_div">
                    <img src="'. $recette['IMAGE'] .'" height=250px width=200px /><br> 
                    <label> Titre de la recette : </label> <input style="width: 200px; text-align: center;" type="text" name="titre" disabled="true" class="editable" form="editerRecette" value="'.$recette['NAME'].'"/> <br>
                    <label> Date de création : </label> <input style="width: 100px; text-align: center;" type="text" name="titre" disabled="true" class="editable" form="editerRecette" value="'.$recette['DATE'].'"/> <br>
                    <label> Nombre de personnes :  </label> <input style="width: 25px; text-align: center;" type="text" name="titre" disabled="true" class="editable" form="editerRecette" value="'.$recette['NMBRGUESTS'].'"/> <br>
                    <label> Courte Description :  </label> <br> <textarea style="min-width: 350px;max-width: 400px; min-height: 150px; max-height: 350px;" name="descri" disabled="true" class="editable"  form="editerRecette" >'.$recette['SHORTDESCRIP'].'</textarea> <br>
                    <label> Longue Description :  </label> <br> <textarea style="min-width: 350px;max-width: 400px; min-height: 150px; max-height: 350px;" name="descri" disabled="true" class="editable"  form="editerRecette" >'.$recette['LONGDESCRIP'].'</textarea> <br>
                    <label> Ingrédients :  </label> <br> <textarea style="min-width: 350px;max-width: 400px; min-height: 150px; max-height: 350px;" name="descri" disabled="true" class="editable"  form="editerRecette" >'.$recette['INGREDIENTS'].'</textarea> <br>
                    <label> Préparation :  </label> <br> <textarea style="min-width: 350px;max-width: 400px; min-height: 150px; max-height: 350px;" name="ingre" disabled="true" class="editable" form="editerRecette" >'.$recette['STAGE'].'</textarea> <br>
                    <div class="partage">
                        <a target= "blank" href="https://www.facebook.com/sharer/sharer.php?u=http%3A//antantsylfa.alwaysdata.net/DescriptionRecette/display/'.$recette['IDR'].'" class="sharebox1">
                            <span class="fb-icon"></span> partager
                        </a>
                        <a target= "blank" href="https://twitter.com/home?status=http%3A//antantsylfa.alwaysdata.net/DescriptionRecette/display/'.$recette['IDR'].'" class="sharebox2">
                            <span class="twitter-icon"></span> partager
                        </a>
                        
                    </div>
                    <label> Nombre de Burns :  </label> <input style="width: 25px; text-align: center;" type="text" name="titre" disabled="true" class="editable" form="editerRecette" value="'.$recette['NBBURN'].'"/>';

    }

    public function LikeBurn($idR) {
        echo '<a href="/DescriptionRecette/gestionBurn/add/'. $idR . '">Burn</a><br>';
    }

    public function DelBurn($idR) {
        echo '<a href="/DescriptionRecette/gestionBurn/del/'. $idR . '">UnBurn</a>';
    }

    public function motDePasseOublier(){
        echo '
                <section class="sec_princ">
                    <div class="inter_div">
                        <p>Renseigner votre Adresse mail pour recevoir vos identifiants.</p>
                        <form action="/MotDePasseOublier" method="post">
                            <input type="text" name="adrrMail" placeholder="adresse mail..." required>
                            <button type="submit" name="action" value="sendMail">Envoyer</button>
                        </form>
                    </div>
                </section>
        ';
    }

    public function end_page() {
        echo '</body>
          </html>';
    }
}