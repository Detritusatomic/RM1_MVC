<?php
class FormControleur extends Controleur{
	
	public function register($variables=null){
		$variables=array();
		
		$mail=$this->getPostValue('mail');
		$mdp=$this->getPostValue('mdp');
		$vmdp=$this->getPostValue('vmdp');
		
		if (filter_var($mail, FILTER_VALIDATE_EMAIL)) { 
			if($mdp==$vmdp){
				$mdp = password_hash($mdp, PASSWORD_BCRYPT, ['cost' => 10]);
				$user=New User(null,null,null,$mail,$mdp,null);
				if(!$user->getBy('mail',$mail)){
					
					if($user->save()==true){
						$variables['feedback']['success']='Vous êtes inscrits, vous pouvez maintenant vous connecter.';
					}else{
						$variables['mail']=$mail;
						$variables['feedback']['error']='L\'inscription a échoué.';
					}	
				}else{
					$variables['mail']=$mail;
					$variables['feedback']['error']='L\'adresse mail éxiste déjà.';	
				}	
			}else{
				$variables['mail']=$mail;
				$variables['feedback']['error']='La vérification du mot de passe est incorecte.';
			}
		}else{
			$variables['mail']=$mail;
			$variables['feedback']['error']='Cette adresse mail n\'est pas valide.';
		}
		$this->loadVue('_templates/register',$variables);
    }
}
?>
