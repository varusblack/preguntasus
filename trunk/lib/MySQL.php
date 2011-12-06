<?php
    class MySQL implements Singleton{
    	
    	private static $link=NULL;
		
		function getInstance(){
			if(self::$link==NULL){
				self::$link=new self;
			}
			return self::$link;		
		}
		
		protected function __construct(){
			$host="localhost";
			$nombreUsuario="root";
			$password="";
			$basededatos="preguntasus"; 
			
			try{
				$this->link = mysqli($host,$nombreUsuario,$password);
				mysql_select_db($basededatos);
			}catch (Exception $e){
				die("No se puedo realizar la conexion");
			}
			
			
		}
    }
?>