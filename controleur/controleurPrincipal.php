<?php

function controleurPrincipal($action){
    $lesActions = array();
    $lesActions["defaut"] = "controleur.connexion.php";
    $lesActions['accueil'] = "controleur.accueil.php";
    $lesActions['congressiste'] = "controleur.congressiste.php";
    $lesActions['connexion'] = "controleur.connexion.php";
    $lesActions['inscription'] = "controleur.inscription.php";
    $lesActions['deconnexion'] = "controleur.deconnexion.php";

    
    if (array_key_exists ( $action , $lesActions )){
        return $lesActions[$action];
    }
    else{
        return $lesActions["defaut"];
    }

}

?>