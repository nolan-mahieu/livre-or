<?php
session_start();
ob_start() ;

if(isset($_GET['page'])){
    $page = $_GET['page'] ;
} else { 
    $page = 'accueil';
}

switch($page) :

    case 'accueil' :
        $title = "Accueil" ;
        require 'view/pages/accueil.php' ;
    break;

    case 'inscription' :
        $title = "Inscription" ;
        require 'view/pages/inscription.php' ; 
    break;

    case 'connexion' :
        $title = "Connexion" ;
        require 'view/pages/connexion.php' ; 
    break;

    case 'deconnexion' :
        require 'view/pages/deconnexion.php' ; 
    break;

    case 'profil' :
        $title = "Profil" ;
        require 'view/pages/profil.php' ; 
    break;
    
    case 'commentaire' :
        $title = "Laisser un commentaire" ;
        require 'view/pages/commentaires.php' ; 
    break;

    case 'livre-or' :
        $title = "Livre d'or" ;
        require 'view/pages/livre-or.php' ; 
    break;
   
    default :
        $title = "Accueil" ;
        require 'view/pages/accueil.php' ;
    break;

endswitch ;

$content = ob_get_clean() ;
require 'template/template.php';