<?php
class PageControleur extends Controleur{
	
    public function home($variables=null){
        $this->loadVue('accueil',$variables);
    }
	
	public function register($variables=null){
        $this->loadVue('_templates/register',$variables);
    }
	
	public function profil($variables=null){
		if(isset($_SESSION['user']))$this->loadVue('profil',$variables);
		else $this->loadVue('accueil',$variables);
	}
	
	public function logout($variables=null){
		$variables=array();
		$session=Session::getInstance();
		$session->destroy();
		$session=Session::getInstance();
		$variables['feedback']['success']='Vous êtes déconnecté.';
        $this->loadVue('accueil',$variables);
	}
	
    public function notFound($variables=null){
        $this->loadVue('_templates/404',$variables);
    }	
}
?>
