<?php namespace Jlnkfrd\SetlistFmApi\DataElements;

class Country {
	public $code = "";
	public $name = "";
	
	public function __construct($properties) {
		foreach ($properties as $key => $val) {
			$key = str_replace('@', '', $key);
			$this->$key = $val;
		}
	}
}