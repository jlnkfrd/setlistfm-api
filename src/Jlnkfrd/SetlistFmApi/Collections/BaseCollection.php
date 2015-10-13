<?php namespace Jlnkfrd\SetlistFmApi\Collections;

class BaseCollection {
	public $itemsPerPage = 0;
	public $page = 1;
	public $total = 0;
	public $items = array();

	public function __construct($properties, $class, $item_property = false) {
		$item_property = $item_property ?: strtolower(explode('\\', $class)[3]);
		foreach ($properties->$item_property as $item) {
			array_push($this->items, new $class($item));
		}
		unset($properties->$item_property);

		foreach ($properties as $key => $val) {
			$key = str_replace('@', '', $key);
			$this->$key = $val;
		}
	}

	public function next_page() {
		return $this->page + 1;
	}

	public function total_pages() {
		return ceil($this->total / $this->itemsPerPage);
	}
}