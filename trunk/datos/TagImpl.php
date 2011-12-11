<?php
    class TagImpl implements Tag{
    	
		private $tag;
		
		public function __construct($tag){
			$this->tag=$tag;
		}
		
		public function __get(){
			return $this->tag;
		}
		
		public function __set($tag){
			$this->tag = $tag;
		}
		
		
    }
?>