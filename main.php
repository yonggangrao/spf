<?php

	require_once 'core/core.php';
	require_once 'core/config.php';
	require_once 'core/util.php';
	require_once 'core/lib.php';
	
	$front = FrontController::getInstance();
	
	$front->route();
	
	echo $front->getBody();
