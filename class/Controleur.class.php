<?php
class Controleur {
    
	private $url;
	
    public function __construct(){
		$this->url='./views/';
    }
	
	public function loadVue($vue, $param=null) {
        $VARIABLES = $param;
        require $this->url.'_templates/header.php';
		if(DEBUGGER)require $this->url.'_templates/debugger.php';
        require $this->url.'_templates/menu.php';
		$this->getFeedback($param);
		if(LOGIN)require $this->url.'_templates/login.php';
        require $this->url.$vue.'.php';
        require $this->url.'_templates/footer.php';
    }
	
	public function getFeedback($variables){
		if(!FEEDBACK)return;
		if(isset($variables['feedback']['success'])){
			echo '<div class="card teal"><div class="card-content white-text center">'.$variables['feedback']['success'].'</div></div>';
		}
		if(isset($variables['feedback']['error'])){
			echo '<div class="card red lignthen-1"><div class="card-content white-text center">'.$variables['feedback']['error'].'</div></div>';
		}
	}
	
	
}
?>