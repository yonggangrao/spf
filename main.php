<?php

	require_once 'lib/core.php';
	
	$front = FrontController::getInstance();
	
	$front->route();
	
	echo $front->getBody();
	