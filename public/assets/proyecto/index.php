<?php
	if (!empty($_SERVER['HTTPS']) && ('on' == $_SERVER['HTTPS'])) {
		$uri = 'https://';
	} else {
		$uri = 'http://';
	}
	$uri .= $_SERVER['HTTP_HOST'];
	//echo $uri;die;
	//print_r($_SERVER);die;
	header('Location: '.$uri.'/public/');
	exit;
?>
Something is wrong with the XAMPP installation :-(
