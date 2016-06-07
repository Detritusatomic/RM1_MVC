<?php
class Controleur {
    
	private $url;
	
    public function __construct(){
		$this->url='./views/';
    }
	
	public function loadVue($vue, $param=null) {
        $VARIABLES = $param;
        require $this->url.'_templates/header.php';
		if(DEBUGGER==true)require $this->url.'_templates/debugger.php';
        require $this->url.'_templates/menu.php';
        require $this->url.$vue.'.php';
        require $this->url.'_templates/footer.php';
    }
 
}
?>