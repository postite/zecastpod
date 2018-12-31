<?php
/**
 * Generated by Haxe 4.0.0 (git build development @ 3018ab1)
 */

namespace tink\io;

use \php\Boot;
use \php\_Boot\HxException;
use \tink\core\_Future\FutureObject;
use \tink\streams\StreamObject;

class SinkBase implements SinkObject {


	/**
	 * @param StreamObject $source
	 * @param object $options
	 * 
	 * @return FutureObject
	 */
	public function consume ($source, $options) {
		#/Users/ut/haxe/haxe_libraries/tink_io/0.6.2/haxelib/src/tink/io/Sink.hx:109: characters 12-17
		throw new HxException("not implemented");
	}


	/**
	 * @return bool
	 */
	public function get_sealed () {
		#/Users/ut/haxe/haxe_libraries/tink_io/0.6.2/haxelib/src/tink/io/Sink.hx:106: characters 27-38
		return true;
	}
}


Boot::registerClass(SinkBase::class, 'tink.io.SinkBase');
Boot::registerGetters('tink\\io\\SinkBase', [
	'sealed' => true
]);