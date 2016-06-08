<?php

class Moteur {

	private $controleur;
	private $methode;
	private $id;
	private $url;
	
    public function __construct($controleur='page',$methode='home') {
		$this->controleur=$controleur;
		$this->methode=$methode;
		foreach ($_GET as $key=>$get){
			$this->$key=$_GET[$key];
		}
		if(isset($_GET['controleur']))$controleur=$_GET['controleur'];
		$this->url='./class/controleurs/'.$controleur.'Controleur.class.php';
    }
    public function run() {
        if (file_exists($this->url)) {
            require_once $this->url;
            if (method_exists($this->controleur.'Controleur', $this->methode)) {
				$controller_name = $this->controleur.'Controleur';
                $controleur = new $controller_name();
				$controllerMethod = $this->methode ;
				$controleur->$controllerMethod();
				return true;
            }
		}
		require_once './class/controleurs/pageControleur.class.php';
		$controleur = new pageControleur();
		$controleur->notFound();
	}
}
?>