<?php
/*La config*/
require_once './config/config.php';


/*La BD*/
require_once './Class/Database.class.php';
$database=Database::getInstance();

/*Les classes*/
require_once './class/Controleur.class.php';
require_once './class/Entite.class.php';
require_once './class/Upload.class.php';

/*Les entites*/
require_once './class/entites/UserEntity.class.php';

/*La session*/
require_once './class/Session.class.php';
$session=Session::getInstance();

/*Le moteur du site*/
require_once './class/Moteur.class.php';
$moteur = new Moteur();
$moteur->run();


/*Clear session*/
/*$session->destroy();*/

?>
