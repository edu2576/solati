<?php
	
	$type = (!$_GET['type'] ? 'index' : $_GET['type']);
	$id = (!$_GET['id'] ? 0 : $_GET['id']);
	
	require_once 'app/libraries/config.php';

	$config = new Config($type, $id);
	
	
	
