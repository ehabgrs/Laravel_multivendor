<?php

define('PAGINATION_COUNT', 15);

function getCssFolder()
{
	return app()->getLocale() == 'ar' ? 'css-rtl' : 'css';
}


function upload_file($folder , $image)
{
	$filename = $image->hashName();
	$file = $image->storeAs('/',$filename , $folder);
	return $filename;
}

function image_path($folder,$name)
{
	$name = $name ?? 'sample.jpg';
	return asset('assets/admin/uploads/'.$folder.'/'.$name);
}

/*
function file_check($filename)
{
	$file_headers = @get_headers($filename);

	if($file_headers[0] == 'HTTP/1.0 404 Not Found'){
		  return "The file $filename does not exist";
	} else if ($file_headers[0] == 'HTTP/1.0 302 Found' && $file_headers[7] == 'HTTP/1.0 404 Not Found'){
		  return "The file $filename does not exist, and I got redirected to a custom 404 page..";
	} else {
		  return 1;
	}
}*/

?>