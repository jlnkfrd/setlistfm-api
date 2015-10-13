<?php namespace Jlnkfrd\SetlistFmApi\DataElements;

class Coordinates {
	public $lat = "";
	public $long = "";
	
	public function __construct($properties) {
		foreach ($properties as $key => $val) {
			$key = str_replace('@', '', $key);
			$this->$key = $val;
		}
	}
	
	public function display($parenthesis = true) {
		$val = "{$this->lat}, {$this->long}";
		return $parenthesis ? "($val)" : $val;
	}
}