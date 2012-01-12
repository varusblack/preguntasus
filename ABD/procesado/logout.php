<?php
    session_start();
	
	if(!isset($_SESSION)){
		Header("Location:/abd/index.php");
		die();
	}else{
		session_unset();
		session_destroy();
		Header("Location:/abd/index.php");
		die();
	}
?>