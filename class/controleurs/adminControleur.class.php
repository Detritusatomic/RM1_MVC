<?php
class AdminControleur extends Controleur{
	
	private $droit;
	
	public function __construct(){
		parent::__construct();
		$this->droit=true;
		if(!isset($_SESSION['user']) || !Session::isAdmin()){
			$this->droit=false;			
		}
    }
	public function home(){
		if($this->droit==false){
			$this->loadVue('accueil');
			return;			
		}
		$this->loadVue('admin/adminIndex');
	}			

}
?>
