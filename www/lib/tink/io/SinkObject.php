<?php
/**
 * Generated by Haxe 4.0.0 (git build development @ 3018ab1)
 */

namespace tink\io;

use \php\Boot;
use \tink\core\_Future\FutureObject;
use \tink\streams\StreamObject;

interface SinkObject {
	/**
	 * @param StreamObject $source
	 * @param object $options
	 * 
	 * @return FutureObject
	 */
	public function consume ($source, $options) ;


	/**
	 * @return bool
	 */
	public function get_sealed () ;
}


Boot::registerClass(SinkObject::class, 'tink.io.SinkObject');
Boot::registerGetters('tink\\io\\SinkObject', [
	'sealed' => true
]);
