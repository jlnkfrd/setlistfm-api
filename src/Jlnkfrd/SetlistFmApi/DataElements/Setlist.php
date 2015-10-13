<?php namespace Jlnkfrd\SetlistFmApi\DataElements;

use Jlnkfrd\SetlistFmApi\DataElements\Artist;
use Jlnkfrd\SetlistFmApi\DataElements\Venue;

class Setlist {
	public $id = "";
	public $name = "";
	public $state = "";
	public $stateCode = "";
	public $coords = null;
	public $country = null;
	
	public function __construct($properties) {
		$this->coords = new Coordinates($properties->coords);
		$this->country = new Country($properties->country);
		unset($properties->coords, $properties->country);
		
		foreach ($properties as $key => $val) {
			$key = str_replace('@', '', $key);
			$this->$key = $val;
		}
	}
	
	public function full_name($include_country = true) {
		return "{$this->name}, {$this->stateCode}" . ($include_country ? ", {$this->country->code}" : "");
	}
}