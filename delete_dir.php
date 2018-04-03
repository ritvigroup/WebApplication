<?php

function delete_directory($dirname) {
         if (is_dir($dirname))
           $dir_handle = opendir($dirname);
	 if (!$dir_handle)
	      return false;
	 while($file = readdir($dir_handle)) {
	       if ($file != "." && $file != "..") {
	            if (!is_dir($dirname."/".$file))
	                 unlink($dirname."/".$file);
	            else
	                 delete_directory($dirname.'/'.$file);
	       }
	 }
	 closedir($dir_handle);
	 rmdir($dirname);
	 return true;
}


$array_folder = array('../uploads', 'event', 'uploads', 'ritvigroup/event', 'ritvigroup/image', 'ritvigroup/post', 'ritvigroup/complaint', 'ritvigroup/doc');

foreach($array_folder AS $folders) {
	delete_directory('./'.$folders);
}

?>