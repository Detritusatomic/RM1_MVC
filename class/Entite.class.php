<?php
class Entite {
    public $table;
    public $class;
    
    public function __construct($t,$c){
        $this->table=$t;
        $this->class=$c;
    }
    
	public function save() {
        $sql = "insert into `".$this->table."` (";
        $database = Database::getInstance();
		$cols=$database->query('show columns from '.$this->table)->fetchAll(PDO::FETCH_COLUMN);
		$nbcols=sizeof($cols);
		for($i=1;$i<$nbcols-1;$i++){
			$sql.="`".$cols[$i]."`,";
		}
		$sql.="`".$cols[$nbcols-1]."`) values ('";
		for($i=1;$i<$nbcols;$i++){
			$temp='$this->'.$cols[$i];
			eval("\$temp = \"$temp\";");
			$sql.=$temp;
			if($i<$nbcols-1)$sql.="','";
		}
		$sql.="')";
		$req = $database->prepare($sql);
        $req->execute();
		if($req){
			$this->id=$this->get('id','mail',$this->mail)['id'];
			return true;
		}
		return false;
    }
	
	public function update(){
		$this->id=$this->get('id','mail',$this->mail)['id'];
		$sql = "update `".$this->table."` SET ";
        $database = Database::getInstance();
		$cols=$database->query('show columns from '.$this->table)->fetchAll(PDO::FETCH_COLUMN);
		$nbcols=sizeof($cols);
		for($i=1;$i<$nbcols;$i++){
			$sql.="`".$cols[$i]."`='";
			$temp='$this->'.$cols[$i];
			eval("\$temp = \"$temp\";");
			$sql.=$temp."'";
			if($i<$nbcols-1)$sql.=",";
		}
		$sql.=" where `id`='".$this->id."'";
		
		$req = $database->prepare($sql);
		
		return $req->execute();
	}

	
    public function getAll(){
        $sql = "SELECT * FROM " . $this->table;
        $database = Database::getInstance();
        $req = $database->prepare($sql);
        $req->execute();
        return $array = $req->fetchObject($this->class);
    }
    
    public function getBy($param,$value){
        $sql = "SELECT * FROM " . $this->table . " WHERE ".$param."=" . $value;
        $database = Database::getInstance();
        $req = $database->prepare($sql);
        $req->execute();
        return $array = $req->fetchObject($this->class);
    }
	
	public function get($param,$param2,$value){
		$sql = "SELECT ".$param." FROM " . $this->table . " WHERE `".$param2."`='" . $value."'";
        $database = Database::getInstance();
        $req = $database->prepare($sql);
        $req->execute();
        return $req->fetch(PDO::FETCH_ASSOC);
	}
}
?>