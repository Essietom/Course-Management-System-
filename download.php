
<?php

function forceDownload($file) {
 //Check file exist or not
  if (file_exists($file)) {
     if(ini_get('zlib.output_compression')) { 
      // required for IE
                ini_set('zlib.output_compression', 'Off');  
        }

        // Get mine type of file.
   $finfo = finfo_open(FILEINFO_MIME_TYPE); // return mime type ala mimetype extension
   $mimeType = finfo_file($finfo, $file) . "\n";
   finfo_close($finfo);
        header('Expires: 0');
        header('Pragma: public'); 
        header('Cache-Control: private',false);
        header('Content-Type:'.$mimeType);
        header('Content-Disposition: attachment; filename="'.basename($file).'"');
        header('Content-Transfer-Encoding: binary');
        header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
        header('Content-Length: '.filesize($file));
        header('Connection: close');
        readfile($file);
        exit;
  } else {
   return "File does not exist";
  }
}


if(isset($_REQUEST['file']) && !empty($_REQUEST['file'])) {
   forceDownload($_REQUEST['file']); 
}


?>

<?php
// function output_file($file,$name,$mime_type='')
// {
// 	if(! is_readable($fil))
// 		die "file not found";
// 	$size=filesize($file);
// 	$name=rawurldecode($name);
// 	$known_mime_types=array(
// 		"zip"="application/zip",
// 		"doc"="application/msword",
// 		"pdf"="application/pdf"
// 		);
// 	if($mime_type=="")
// 	{
// 		$file_extensiom=strtolower(substr(strrchr($file, "."),1));
// 		if(array_key_exists($file_extension, $known_mime_types))
// 		{
// 			$mime_type=$known_mime_types[$file_extension];
// 		}

// 		else
// 		{
// 			$mime_type="application/force-download";
// 		}
// 	}

// 	@ob_end_clean();

// }



?>


