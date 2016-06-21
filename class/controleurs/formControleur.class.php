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
	public function login(){
		$variables=array();
	
		$logs=$this->getPostValue('logs');
		$mdp=$this->getPostValue('mdp');
		
		$user=new User();
		$user1=$user->getBy('mail',$logs);
		$user2=$user->getBy('pseudo',$logs);

		$user1==false?$user=$user2:$user=$user1;
		
		if($user!=false){		
			if(password_verify($mdp, $user->mdp)){
				$session=Session::getInstance();
				$session->__set('user',$user);
				$variables['feedback']['success']='Vous êtes maintenant connecté.';
			}else{
				$variables['feedback']['error']='Mot de passe est incorrect.';
			}
		}else{
			$variables['feedback']['error']='Adresse mail incorrecte ou pseudo incorrect.';
		}
		$this->loadVue('accueil',$variables);
	}
	
	public function editProfil(){
		$variables=array();
		
		$nom=$this->getPostValue('nom');
		$prenom=$this->getPostValue('prenom');
		$pseudo=$this->getPostValue('pseudo');
		
		if(isset($_FILES['avatar']) && $_FILES['avatar']['name']!=''){
			if($_SESSION['user']->avatar=='' || unlink($_SESSION['user']->avatar)){
				$upload=new Upload();
				$avatar=$upload->uploader($_FILES['avatar'],AVATAR_UPLOAD_DIR);
				$user=new User($nom,$prenom,$pseudo,$_SESSION['user']->mail,$_SESSION['user']->mdp,$avatar,$_SESSION['user']->droit,$_SESSION['user']->id);
				if($user->update()){
					$session=Session::getInstance();
					$session->__set('user',$user);
					$variables['feedback']['success']='Profil mis à jour.';
				}else{
					$variables['feedback']['error']='Erreur lors de la mise à jour du profil.';	
				}
			}else{			
				$variables['feedback']['error']='Erreur lors de la suppression de l\'ancien avatar.';
			}
		}else{
			$user=new User($nom,$prenom,$pseudo,$_SESSION['user']->mail,$_SESSION['user']->mdp,$_SESSION['user']->avatar,$_SESSION['user']->droit,$_SESSION['user']->id);
			if($user->update()){
				$session=Session::getInstance();
				$session->__set('user',$user);
				$variables['feedback']['success']='Profil mis à jour.';
			}
		}
		$this->loadVue('profil',$variables);
	}
}
?>
