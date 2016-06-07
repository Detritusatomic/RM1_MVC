<?php
class IndexControleur extends Controleur{
    
    public function index($variables=null){
        $this->loadVue('accueil',$variables);
    }

    public function notFound($variables=null){
        $this->loadVue('_templates/404',$variables);
    }	
}
?>
