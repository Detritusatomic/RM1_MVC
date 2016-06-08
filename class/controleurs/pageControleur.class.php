<?php
class PageControleur extends Controleur{
	
    public function home($variables=null){
        $this->loadVue('accueil',$variables);
    }
	
	public function login($variables=null){
        $this->loadVue('accueil',$variables);
    }
	
	public function register($variables=null){
        $this->loadVue('_templates/register',$variables);
    }
	
	public function registerNewUser($variables=null){
		$variables=array();
		$mail=$_POST['mail'];
		$mdp=$_POST['mdp'];
		$user=New User('','',$mail,$mdp,'');
		if($user->save()==true)$variables['feedback']['success']='Vous êtes inscrits, vous pouvez maintenant vous connecter.';
		else $variables['feedback']['error']='L\'inscription a échoué';
        $this->loadVue('_templates/register',$variables);
    }
	
    public function notFound($variables=null){
        $this->loadVue('_templates/404',$variables);
    }	
}
?>
