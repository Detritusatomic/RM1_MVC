<?php

class Database {
	
	private static $instance;
    
    private function __construct() {}

	public static function getInstance(){
		if (!isset(self::$instance)){
			self::$instance = new PDO('mysql:host='.BDD_SERVER.';dbname='.BDD_NAME,BDD_USER,BDD_MDP,array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
		}
		return self::$instance;
	}
	
	public static function getTables(){
		return self::$instance->query('SHOW TABLES')->fetchAll(PDO::FETCH_COLUMN);
	}
	
	public static function remplirTable($table,$rows=5){
		$cols=self::$instance->query('show columns from '.$table)->fetchAll(PDO::FETCH_COLUMN);
		$nbcols=sizeof($cols);
		$sql='';
		$result=0;
		for($i=0;$i<$rows;$i++){
			$sql='insert into '.$table.'(';
			for($j=1;$j<$nbcols-1;$j++){
				$sql.=$cols[$j].',';
			}
			$sql.=$cols[$nbcols-1].') values ('.str_repeat($i.',',$nbcols-2).'0)';
			$req=self::$instance->prepare($sql);
			$req->execute();
			$result+=$req->rowCount();
		}
		return $result==$rows;
	}
	
}