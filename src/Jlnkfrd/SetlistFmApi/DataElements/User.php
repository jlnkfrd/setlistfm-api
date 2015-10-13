<?php namespace Jlnkfrd\SetlistFmApi\DataElements;

class User {
	public $lastFm = "";
	public $userId = "";
	public $url = "";
	
	public function __construct($properties) {
		foreach ($properties as $key => $val) {
			$key = str_replace('@', '', $key);
			$this->$key = $val;
		}
	}
}