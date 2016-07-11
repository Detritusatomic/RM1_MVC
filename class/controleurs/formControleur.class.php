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
		/*Definition notre array de variables a passer dans la vue*/
		$variables=array();
		
		/*Récupération des valeurs POST*/
		$nom=$this->getPostValue('nom');
		$prenom=$this->getPostValue('prenom');
		$pseudo=$this->getPostValue('pseudo');
		
		/*Si notre image existe*/
		if(isset($_POST['cropped_avatar'])){
			/*On récupère notre avatar*/
			$cropped_avatar=$this->getPostValue('cropped_avatar');
			/*Si nous n'avons pas d'avatar (celui par défault), ou si on a bien supprimé notre ancien avatar*/
			if($_SESSION['user']->avatar=='' || unlink($_SESSION['user']->avatar)){
				/*Création d'un upload*/
				$upload=new Upload();
				/*On upload le fichier dans la destination*/
				$avatar=$upload->uploader($cropped_avatar,AVATAR_UPLOAD_DIR,true);
				/*Création d'un user avec les nouvelles données*/
				$user=new User($nom,$prenom,$pseudo,$_SESSION['user']->mail,$_SESSION['user']->mdp,$avatar,$_SESSION['user']->droit,$_SESSION['user']->id);
				/*Mise à jour de l'user dans la bdd*/
				if($user->update()){
					/*Maj de la session*/
					$session=Session::getInstance();
					$session->__set('user',$user);
					$variables['feedback']['success']='Profil mis à jour.';
				}else{
					$variables['feedback']['error']='Erreur lors de la mise à jour du profil.';	
				}
			}else{			
				$variables['feedback']['error']='Erreur lors de la suppression de l\'ancien avatar.';
			}
			/*On retourne sur la page profil*/
			$this->loadVue('profil',$variables);
		}
	}
}
?>
