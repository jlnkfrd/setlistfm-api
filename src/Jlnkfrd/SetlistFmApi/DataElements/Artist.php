<?php namespace Jlnkfrd\SetlistFmApi\DataElements;

class Artist {
	public $disambiguation = "";
	public $mbid = "";
	public $name = "";
	public $sort_name = "";
	public $tmid = "";
	public $url = "";
	
	public function __construct($properties) {
		foreach ($properties as $key => $val) {
			$key = str_replace('@', '', $key);
			$this->$key = $val;
		}
	}
}