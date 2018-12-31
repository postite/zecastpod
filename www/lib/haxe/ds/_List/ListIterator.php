<?php
/**
 * Generated by Haxe 4.0.0 (git build development @ 3018ab1)
 */

namespace haxe\ds\_List;

use \php\Boot;

class ListIterator {
	/**
	 * @var ListNode
	 */
	public $head;


	/**
	 * @param ListNode $head
	 * 
	 * @return void
	 */
	public function __construct ($head) {
		#/Users/ut/haxe/versions/4.0.0-preview.3/std/haxe/ds/List.hx:270: characters 3-19
		$this->head = $head;
	}


	/**
	 * @return bool
	 */
	public function hasNext () {
		#/Users/ut/haxe/versions/4.0.0-preview.3/std/haxe/ds/List.hx:274: characters 3-22
		return $this->head !== null;
	}


	/**
	 * @return mixed
	 */
	public function next () {
		#/Users/ut/haxe/versions/4.0.0-preview.3/std/haxe/ds/List.hx:278: characters 3-23
		$val = $this->head->item;
		#/Users/ut/haxe/versions/4.0.0-preview.3/std/haxe/ds/List.hx:279: characters 3-19
		$this->head = $this->head->next;
		#/Users/ut/haxe/versions/4.0.0-preview.3/std/haxe/ds/List.hx:280: characters 3-13
		return $val;
	}
}


Boot::registerClass(ListIterator::class, 'haxe.ds._List.ListIterator');