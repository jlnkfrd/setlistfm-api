<?php namespace Jlnkfrd\SetlistFmApi\Collections;

use Jlnkfrd\SetlistFmApi\Collections\BaseCollection;
use Jlnkfrd\SetlistFmApi\DataElements\Event;

class EventCollection extends BaseCollection {
	
	public function __construct($properties) {
		return parent::__construct($properties, 'Jlnkfrd\SetlistFmApi\DataElements\Event', 'setlist');
	}
}