<?php
class Upload {

    public $image_accepted = array('jpg', 'jpeg', 'gif', 'png');
    public $image_size = 2000000;

    public function uploader($file,$dest) {
        if (isset($file['tmp_name'])) {
            $extension = pathinfo($file['name'], PATHINFO_EXTENSION);
            if (in_array(strtolower($extension), $this->image_accepted)) {
                $img_size = filesize($file['tmp_name']);
                if ($img_size <= $this->image_size) {
                    $nomImage = md5(uniqid()) . '.' . $extension;
                    if (move_uploaded_file($file['tmp_name'], $dest . $nomImage)) {
                        return $nomImage;
                    } 
				} 
			} 
		}
		return false;		
    }
}
?>