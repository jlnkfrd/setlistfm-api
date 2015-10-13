<?php namespace Jlnkfrd\SetlistFmApi\DataElements;

use Jlnkfrd\SetlistFmApi\DataElements\Artist;
use Jlnkfrd\SetlistFmApi\DataElements\Venue;

class Event {
	public $id = "";
	public $eventDate = "";
	public $tour = "";
	public $versionId = "";
	public $lastUpdated = "";
	public $url = "";
	public $artist = null;
	public $sets = null;
	public $venue = null;
	
	public function __construct($properties) {
		$this->artist = new Artist($properties->artist);
		$this->venue = new Venue($properties->venue);
		unset($properties->artist, $properties->sets, $properties->venue);
		
		foreach ($properties as $key => $val) {
			$key = str_replace('@', '', $key);
			$this->$key = $val;
		}
	}
}