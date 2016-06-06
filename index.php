<?php
/*La config*/
require_once './config/config.php';

/*La BD*/
require_once './Class/Database.class.php';
$database=Database::getInstance();

/*Les classes*/
require_once './Class/Entite.class.php';
require_once './Class/entites/UserEntity.class.php';


/*La session*/
require_once './Class/Session.class.php';
$session=Session::getInstance();

/*Le site*/
require_once './views/_templates/header.php';
if($debugger==true)require_once './views/_templates/debugger.php';
require_once './views/_templates/menu.php';
require_once './views/accueil.php';
require_once './views/_templates/footer.php';


/*Clear session*/
$session->destroy();

?>
