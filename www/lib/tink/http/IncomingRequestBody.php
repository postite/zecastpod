<?php
/**
 * Generated by Haxe 4.0.0 (git build development @ 3018ab1)
 */

namespace tink\http;

use \php\Boot;
use \tink\streams\StreamObject;
use \php\_Boot\HxEnum;

class IncomingRequestBody extends HxEnum {
	/**
	 * @param \Array_hx $parts
	 * 
	 * @return IncomingRequestBody
	 */
	static public function Parsed ($parts) {
		return new IncomingRequestBody('Parsed', 1, [$parts]);
	}


	/**
	 * @param StreamObject $source
	 * 
	 * @return IncomingRequestBody
	 */
	static public function Plain ($source) {
		return new IncomingRequestBody('Plain', 0, [$source]);
	}


	/**
	 * Returns array of (constructorIndex => constructorName)
	 *
	 * @return string[]
	 */
	static public function __hx__list () {
		return [
			1 => 'Parsed',
			0 => 'Plain',
		];
	}


	/**
	 * Returns array of (constructorName => parametersCount)
	 *
	 * @return int[]
	 */
	static public function __hx__paramsCount () {
		return [
			'Parsed' => 1,
			'Plain' => 1,
		];
	}
}


Boot::registerClass(IncomingRequestBody::class, 'tink.http.IncomingRequestBody');
