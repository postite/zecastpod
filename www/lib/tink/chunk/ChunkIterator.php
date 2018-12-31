<?php
/**
 * Generated by Haxe 4.0.0 (git build development @ 3018ab1)
 */

namespace tink\chunk;

use \php\Boot;

class ChunkIterator {
	/**
	 * @var bool
	 */
	public $_hasNext;
	/**
	 * @var ChunkCursor
	 */
	public $target;


	/**
	 * @param ChunkCursor $target
	 * 
	 * @return void
	 */
	public function __construct ($target) {
		#/Users/ut/haxe/haxe_libraries/tink_chunk/0.2.0/haxelib/src/tink/chunk/ChunkIterator.hx:12: characters 5-25
		$this->target = $target;
		#/Users/ut/haxe/haxe_libraries/tink_chunk/0.2.0/haxelib/src/tink/chunk/ChunkIterator.hx:13: characters 5-54
		$this->_hasNext = $target->length > $target->currentPos;
	}


	/**
	 * @return bool
	 */
	public function hasNext () {
		#/Users/ut/haxe/haxe_libraries/tink_chunk/0.2.0/haxelib/src/tink/chunk/ChunkIterator.hx:17: characters 5-20
		return $this->_hasNext;
	}


	/**
	 * @return int
	 */
	public function next () {
		#/Users/ut/haxe/haxe_libraries/tink_chunk/0.2.0/haxelib/src/tink/chunk/ChunkIterator.hx:20: characters 5-34
		$ret = $this->target->currentByte;
		#/Users/ut/haxe/haxe_libraries/tink_chunk/0.2.0/haxelib/src/tink/chunk/ChunkIterator.hx:21: characters 5-29
		$this->_hasNext = $this->target->next();
		#/Users/ut/haxe/haxe_libraries/tink_chunk/0.2.0/haxelib/src/tink/chunk/ChunkIterator.hx:22: characters 5-15
		return $ret;
	}
}


Boot::registerClass(ChunkIterator::class, 'tink.chunk.ChunkIterator');
