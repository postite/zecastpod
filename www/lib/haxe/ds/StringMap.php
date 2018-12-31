<?php
/**
 * Generated by Haxe 4.0.0 (git build development @ 3018ab1)
 */

namespace haxe\ds;

use \haxe\IMap;
use \php\Boot;
use \php\_NativeArray\NativeArrayIterator;

/**
 * StringMap allows mapping of String keys to arbitrary values.
 * See `Map` for documentation details.
 * @see https://haxe.org/manual/std-Map.html
 */
class StringMap implements IMap {
	/**
	 * @var mixed
	 */
	public $data;


	/**
	 * Creates a new StringMap.
	 * 
	 * @return void
	 */
	public function __construct () {
		#/Users/ut/haxe/versions/4.0.0-preview.3/std/php/_std/haxe/ds/StringMap.hx:34: characters 3-32
		$this->data = [];
	}


	/**
	 * See `Map.exists`
	 * 
	 * @param string $key
	 * 
	 * @return bool
	 */
	public function exists ($key) {
		#/Users/ut/haxe/versions/4.0.0-preview.3/std/php/_std/haxe/ds/StringMap.hx:46: characters 3-44
		return array_key_exists($key, $this->data);
	}


	/**
	 * See `Map.get`
	 * 
	 * @param string $key
	 * 
	 * @return mixed
	 */
	public function get ($key) {
		#/Users/ut/haxe/versions/4.0.0-preview.3/std/php/_std/haxe/ds/StringMap.hx:42: characters 10-42
		return ($this->data[$key] ?? null);
	}


	/**
	 * See `Map.iterator`
	 * 
	 * @return object
	 */
	public function iterator () {
		#/Users/ut/haxe/versions/4.0.0-preview.3/std/php/_std/haxe/ds/StringMap.hx:63: characters 10-25
		return new NativeArrayIterator($this->data);
	}


	/**
	 * See `Map.keys`
	 * 
	 * @return object
	 */
	public function keys () {
		#/Users/ut/haxe/versions/4.0.0-preview.3/std/php/_std/haxe/ds/StringMap.hx:59: characters 10-72
		return new NativeArrayIterator(array_map("strval", array_keys($this->data)));
	}


	/**
	 * See `Map.remove`
	 * 
	 * @param string $key
	 * 
	 * @return bool
	 */
	public function remove ($key) {
		#/Users/ut/haxe/versions/4.0.0-preview.3/std/php/_std/haxe/ds/StringMap.hx:50: lines 50-55
		if (array_key_exists($key, $this->data)) {
			#/Users/ut/haxe/versions/4.0.0-preview.3/std/php/_std/haxe/ds/StringMap.hx:51: characters 4-27
			unset($this->data[$key]);
			#/Users/ut/haxe/versions/4.0.0-preview.3/std/php/_std/haxe/ds/StringMap.hx:52: characters 4-15
			return true;
		} else {
			#/Users/ut/haxe/versions/4.0.0-preview.3/std/php/_std/haxe/ds/StringMap.hx:54: characters 4-16
			return false;
		}
	}
}


Boot::registerClass(StringMap::class, 'haxe.ds.StringMap');
