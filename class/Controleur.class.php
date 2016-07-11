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
		if(LOGIN && !isset($_SESSION['user']))require $this->url.'_templates/login.php';
        require $this->url.$vue.'.php';
        require $this->url.'_templates/footer.php';
    }
	
	public function getFeedback($variables){
		if(!FEEDBACK)return;
		if(isset($variables['feedback']['success'])){
			echo '<a id="feedback" onclick="Materialize.toast(`'.$variables['feedback']['success'].'`,5000,`teal`)" hidden>Feedback</a>';
			echo '<script type="text/javascript">function feedback(){document.getElementById("feedback").click();}feedback();</script>';
		}
		if(isset($variables['feedback']['error'])){
			echo '<a id="feedback" onclick="Materialize.toast(`'.$variables['feedback']['error'].'`,5000,`red`)" hidden>Feedback</a>';
			echo '<script type="text/javascript">function feedback(){document.getElementById("feedback").click();}feedback();</script>';
		}
	}
	
	public function getPostValue($key) {
        if (isset($_POST[$key]))
            return htmlspecialchars($_POST[$key]);
        else
            return null;
    }
	
}
?>