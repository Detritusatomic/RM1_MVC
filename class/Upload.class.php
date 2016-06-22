<?php
class Upload {

    public function uploader($file,$dest,$crop=true) {
		if($crop){
			$data = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $file));
			$temp='img/avatar/temp'.md5(uniqid()).'.png';
			file_put_contents($temp,$data);
			$imagecache=new ImageCache();
			$imagecache->cached_image_directory=$dest;
			$cached_src=$imagecache->cache($temp);
			unlink($temp);
			return $cached_src;		
		}
    }
}
?>