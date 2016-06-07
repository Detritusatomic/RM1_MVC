<?php
/*La config*/
require_once './config/config.php';

/*La BD*/
require_once './Class/Database.class.php';
$database=Database::getInstance();

/*Les classes*/
require_once './class/Controleur.class.php';
require_once './Class/Entite.class.php';

/*Les controleurs*/
require_once './class/controleurs/indexControleur.class.php';

/*Les entites*/
require_once './Class/entites/UserEntity.class.php';


/*La session*/
require_once './Class/Session.class.php';
$session=Session::getInstance();

/*Le moteur du site*/
require_once 'Moteur.class.php';
$moteur = new Moteur();
$moteur->run();

/*Clear session*/
/*$session->destroy();*/

?>
