<?php

//helper functions

class H {
	public static function dnd($data) {
		echo '<pre>';
		var_dump($data);
		echo '</pre>';
		die();
	}
	
	public static function e($data) {
		echo $data.'<br>';
	}
	
	public static function d($data) {
		echo '<pre>';
		var_dump($data);
		echo '</pre>';
	}
	
	
	public static function getObjectProperties($obj){
    return get_object_vars($obj);
  }
	
}