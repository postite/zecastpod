<?php
/**
 * Generated by Haxe 4.0.0 (git build development @ 3018ab1)
 */

namespace tink\json\_Writer;

use \php\Boot;
use \haxe\format\JsonPrinter;

class StdWriter {
	/**
	 * @param mixed $v
	 * 
	 * @return string
	 */
	static public function stringify ($v) {
		#/Users/ut/haxe/haxe_libraries/tink_json/0.9.0/haxelib/src/tink/json/Writer.hx:104: characters 5-44
		return JsonPrinter::print($v);
	}
}


Boot::registerClass(StdWriter::class, 'tink.json._Writer.StdWriter');
