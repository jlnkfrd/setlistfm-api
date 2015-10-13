<?php namespace Jlnkfrd\SetlistFmApi\DataElements;

use Jlnkfrd\SetlistFmApi\DataElements\City;

class Venue {
	public $id = "";
	public $name = "";
	public $url = "";
	public $city = null;
	
	public function __construct($properties) {
		$this->city = new City($properties->city);
		unset($properties->city);
		
		foreach ($properties as $key => $val) {
			$key = str_replace('@', '', $key);
			$this->$key = $val;
		}
	}
	
	public function full_name($include_country = true) {
		return "{$this->name}, " . $this->city->full_name($include_country);
	}
}