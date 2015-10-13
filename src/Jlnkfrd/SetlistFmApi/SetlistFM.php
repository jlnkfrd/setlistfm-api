<?php namespace Jlnkfrd\SetlistFmApi;

use Jlnkfrd\SetlistFmApi\DataElements\Artist;
use Jlnkfrd\SetlistFmApi\DataElements\City;
use Jlnkfrd\SetlistFmApi\DataElements\Event;
use Jlnkfrd\SetlistFmApi\DataElements\User;
use Jlnkfrd\SetlistFmApi\DataElements\Venue;

use Jlnkfrd\SetlistFmApi\Collections\EventCollection;
use Jlnkfrd\SetlistFmApi\Collections\BaseCollection;

class SetlistFm {
	public $email;
	public $app_name;
	public $api_key;
	public $base_url = "http://api.setlist.fm/rest";
	public $api_version = "0.1";

	/**
	 * apiBase
	 *
	 * Returns the base url for the setlist.fm api.
	 * @return string
	**/
	private function apiBase() {
		return $this->base_url . "/" . $this->api_version . "/";
	}
	
	/**
	 * getAttendedByUserId
	 *
	 * Possible params:
	 *		p - the number of the page result (default 1)
	 *		l - the desired result language (default en)
	 *
	 * @param string $user_id
	 * @param mixed[] $params Array of additional request args
	 * @return Jlnkfrd\SetlistFmApi\Collections\EventCollection
	**/
	public function getAttendedByUserId($user_id, $params) {
		$url = $this->apiBase() . "user/$user_id/attended.json" . $this->query($params);
		$response = json_decode(file_get_contents($url));
		return new EventCollection($response->setlists);
	}

	/**
	 * getArtistByMbId
	 *
	 * @param string $mb_id
	 * @return Jlnkfrd\SetlistFmApi\Collections\EventCollection
	**/
	public function getArtistByMbId($mb_id) {
		$url = $this->apiBase() . "artist/$mbid.json";
		$response = json_decode(file_get_contents($url));
		return new Artist($response->artist);
	}
	
	/**
	 * getCityByGeoId
	 *
	 * Possible params:
	 *		l - the desired result language (default en)
	 *
	 * @param string $user_id
	 * @param mixed[] $params Array of additional request args
	 * @return Jlnkfrd\SetlistFmApi\DataElements\City
	**/
	public function getCityByGeoId($geo_id, $params) {
		$url = $this->apiBase() . "city/$geo_id.json" . $this->query($params);
		$response = json_decode(file_get_contents($url));
		return new City($response->city);
	}

	/**
	 * getEditedByUserId
	 *
	 * Possible params:
	 *		p - the number of the page result (default 1)
	 *		l - the desired result language (default en)
	 *
	 * @param string $user_id
	 * @param mixed[] $params Array of additional request args
	 * @return Jlnkfrd\SetlistFmApi\Collections\EventCollection
	**/
	public function getEditedByUserId($user_id, $params) {
		$url = $this->apiBase() . "user/$user_id/edited.json" . $this->query($params);
		$response = json_decode(file_get_contents($url));
		return new EventCollection($response->setlists);
	}

	/**
	 * getSetlistBySetlistId
	 *
	 * Possible params:
	 *		l - the desired result language (default en)
	 *
	 * @param string $setlist_id
	 * @param mixed[] $params Array of additional request args
	 * @return Jlnkfrd\SetlistFmApi\DataElements\Event
	**/
	public function getSetlistBySetlistId($setlist_id, $params) {
		$url = $this->apiBase() . "setlist/$setlist_id.json" . $this->query($params);
		$response = json_decode(file_get_contents($url));
		return new Event($response->setlist);
	}

	/**
	 * getSetlistsByArtistMbId
	 *
	 * Possible params:
	 *		p - the number of the page result (default 1)
	 *		l - the desired result language (default en)
	 *
	 * @param string $mb_id
	 * @param mixed[] $params Array of additional request args
	 * @return Jlnkfrd\SetlistFmApi\Collections\EventCollection
	**/
	public function getSetlistsByArtistMbId($mb_id, $params) {
		$url = $this->apiBase() . "artist/$mb_id/setlists.json" . $this->query($params);
		$response = json_decode(file_get_contents($url));
		return new EventCollection($response->setlists);
	}

	/**
	 * getSetlistByLastFmEventId
	 *
	 * Possible params:
	 *		l - the desired result language (default en)
	 *
	 * @param string $last_fm_event_id
	 * @param mixed[] $params Array of additional request args
	 * @return Jlnkfrd\SetlistFmApi\DataElements\Event
	**/
	public function getSetlistByLastFmEventId($last_fm_event_id, $params) {
		$url = $this->apiBase() . "setlist/lastFm/$last_fm_event_id.json" . $this->query($params);
		$response = json_decode(file_get_contents($url));
		return new Event($response->setlist);
	}

	/**
	 * getSetlistsByVenueId
	 *
	 * Possible params:
	 *		p - the number of the page result (default 1)
	 *		l - the desired result language (default en)
	 *
	 * @param string $venue_id
	 * @param mixed[] $params Array of additional request args
	 * @return Jlnkfrd\SetlistFmApi\Collections\EventCollection
	**/
	public function getSetlistsByVenueId($venue_id, $params) {
		$url = $this->apiBase() . "venue/$venue_id/setlists.json" . $this->query($params);
		$response = json_decode(file_get_contents($url));
		return new EventCollection($response->setlists);
	}

	/**
	 * getSetlistVersionByVersionId
	 *
	 * Possible params:
	 *		l - the desired result language (default en)
	 *
	 * @param string $version_id
	 * @param mixed[] $params Array of additional request args
	 * @return Jlnkfrd\SetlistFmApi\DataElements\Event
	**/
	public function getSetlistVersionByVersionId($version_id, $params) {
		$url = $this->apiBase() . "setlist/version/$version_id.json" . $this->query($params);
		$response = json_decode(file_get_contents($url));
		return new Event($response->setlist);
	}

	/**
	 * getSetlistsByArtistMbIdAndTour
	 *
	 * Possible params:
	 *		p - the number of the page result (default 1)
	 *		l - the desired result language (default en)
	 *
	 * @param string $mb_id
	 * @param string $tour
	 * @param mixed[] $params Array of additional request args
	 * @return Jlnkfrd\SetlistFmApi\Collections\EventCollection
	**/
	public function getSetlistsByArtistMbIdAndTour($mb_id, $tour, $params) {
		$url = $this->apiBase() . "artist/$mb_id/tour/$tour.json" . $this->query($params);
		$response = json_decode(file_get_contents($url));
		return new EventCollection($response->setlists);
	}

	/**
	 * getSetlistVersionByVersionId
	 *
	 * @param string $user_id
	 * @return Jlnkfrd\SetlistFmApi\DataElements\User
	**/
	public function getUserByUserId($user_id) {
		$url = $this->apiBase() . "user/$user_id.json" . $this->query($params);
		$response = json_decode(file_get_contents($url));
		return new User($response->user);
	}

	/**
	 * getVenueByVenueId
	 *
	 * Possible params:
	 *		l - the desired result language (default en)
	 *
	 * @param string $venue_id
	 * @param mixed[] $params Array of additional request args
	 * @return Jlnkfrd\SetlistFmApi\DataElements\Event
	**/
	public function getVenueByVenueId($venue_id, $params) {
		$url = $this->apiBase() . "venue/$venue_id.json" . $this->query($params);
		$response = json_decode(file_get_contents($url));
		return new Venue($response->venue);
	}

	/**
	 * searchArtists
	 *
	 * Possible params:
	 *		artistMbid - the artist's MusicBrainz ID
	 *		artistTmid - the artist's TicketMaster ID
	 *		artistName - the artist's name
	 *		p - the number of the page result (default 1)
	 *
	 * @param mixed[] $params Array of search args
	 * @return Jlnkfrd\SetlistFmApi\Collections\BaseCollection
	**/
	public function searchArtists($params) {
		$url = $this->apiBase() . "search/artists.json" . $this->query($params);
		$response = json_decode(file_get_contents($url));
		return new BaseCollection($response->artists, 'Jlnkfrd\SetlistFmApi\DataElements\Artist', 'cities');
	}

	/**
	 * searchCities
	 *
	 * Possible params:
	 *		name - the name of the city
	 *		stateCode - state code the city lies in
	 *		state - state the city lies in
	 *		country - the city's country
	 *		p - the number of the page result (default 1)
	 *		l - the desired result language (default en)
	 *
	 * @param mixed[] $params Array of search args
	 * @return Jlnkfrd\SetlistFmApi\Collections\BaseCollection
	**/
	public function searchCities($params) {
		$url = $this->apiBase() . "search/cities.json" . $this->query($params);
		$response = json_decode(file_get_contents($url));
		return new BaseCollection($response->cities, 'Jlnkfrd\SetlistFmApi\DataElements\City', 'cities');
	}

	/**
	 * searchCountries
	 *
	 * Possible params:
	 *		l - the desired result language (default en)
	 *
	 * @param mixed[] $params Array of search args
	 * @return Jlnkfrd\SetlistFmApi\Collections\BaseCollection
	**/
	public function searchCountries($params = []) {
		$url = $this->apiBase() . "search/countries.json" . $this->query($params);
		$response = json_decode(file_get_contents($url));
		return new BaseCollection($response->countries, 'Jlnkfrd\SetlistFmApi\DataElements\Country');
	}

	/**
	 * searchSetlists
	 *
	 * Possible params:
	 *		artistMbid - the artist's MusicBrainz ID
	 *		artistTmid - the artist's TicketMaster ID
	 *		artistName - the artist's name
	 *		tour - the tour's name
	 *		date - the date of the event (format dd-MM-yyyy)
	 *		year - the year of the event
	 *		lastFm - the event's Last.fm Event ID
	 *		lastUpdated - format (yyyyMMddHHmmss) sets edited or reverted on or after date
	 *		venueId - the venue id
	 *		venueName - the name of the venue
	 *		cityId - the city's geoid
	 *		stateCode - state code the city lies in
	 *		state - state the city lies in
	 *		countryCode - the country code
	 *		p - the number of the page result (default 1)
	 *		l - the desired result language (default en)
	 *
	 * @param mixed[] $params Array of search args
	 * @return Jlnkfrd\SetlistFmApi\Collections\EventCollection
	**/
	public function searchSetlists($params) {
		$url = $this->apiBase() . "search/setlists.json" . $this->query($params);
		$response = json_decode(file_get_contents($url));
		return new EventCollection($response);
	}

	/**
	 * searchVenues
	 *
	 * Possible params:
	 *		name - the name of the venue
	 *		cityName - the name of the city where the venue is located
	 *		cityId - the city's geoid
	 *		stateCode - state code the city lies in
	 *		state - state the city lies in
	 *		country - the city's country
	 *		p - the number of the page result (default 1)
	 *		l - the desired result language (default en)
	 *
	 * @param mixed[] $params Array of search args
	 * @return Jlnkfrd\SetlistFmApi\Collections\BaseCollection
	**/
	public function searchVenues($params) {
		$url = $this->apiBase() . "search/venues.json" . $this->query($params);
		$response = json_decode(file_get_contents($url));
		return new BaseCollection($response->venues, 'Jlnkfrd\SetlistFmApi\DataElements\Venue');
	}

	/**
	 * query
	 *
	 * Generates the query string given a list of parameters.
	 *
	 * @param mixed[] $params Array of url parameters
	 * @return string
	**/
	public function query($params = []) {
		if (empty($params)) return '';
		else return "?" . http_build_query($params);
	}
}