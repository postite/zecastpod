<?php
/**
 * Generated by Haxe 4.0.0 (git build development @ 3018ab1)
 */

namespace tink\json;

use \php\Boot;
use \haxe\format\JsonPrinter;

class Writer0 extends BasicWriter {
	/**
	 * @return void
	 */
	public function __construct () {
		#/Users/ut/haxe/haxe_libraries/tink_json/0.9.0/haxelib/src/tink/json/macros/Macro.hx:106: characters 29-36
		parent::__construct();
	}


	/**
	 * @param object $value
	 * 
	 * @return void
	 */
	public function parse0 ($value) {
		#/Users/ut/haxe/haxe_libraries/tink_json/0.9.0/haxelib/src/tink/json/macros/GenWriter.hx:120: characters 9-28
		$_this = $this->buf;
		#/Users/ut/haxe/haxe_libraries/tink_json/0.9.0/haxelib/src/tink/json/macros/GenWriter.hx:120: characters 9-28
		$_this->b = ($_this->b??'null') . (chr(123)??'null');

		#/Users/ut/haxe/haxe_libraries/tink_json/0.9.0/haxelib/src/tink/json/macros/GenWriter.hx:151: characters 19-59
		$value1 = $value->content;
		#/Users/ut/haxe/haxe_libraries/tink_json/0.9.0/haxelib/src/tink/json/macros/GenWriter.hx:129: characters 13-35
		$this->buf->add("\"content\":");
		#/Users/ut/haxe/haxe_libraries/tink_json/0.9.0/haxelib/src/tink/json/macros/GenWriter.hx:41: characters 18-68
		$s = JsonPrinter::print(base64_encode($value1->toString()));
		#/Users/ut/haxe/haxe_libraries/tink_json/0.9.0/haxelib/src/tink/json/macros/GenWriter.hx:41: characters 18-68
		$this->buf->add($s);



		#/Users/ut/haxe/haxe_libraries/tink_json/0.9.0/haxelib/src/tink/json/macros/GenWriter.hx:151: characters 19-59
		$value2 = $value->name;
		#/Users/ut/haxe/haxe_libraries/tink_json/0.9.0/haxelib/src/tink/json/macros/GenWriter.hx:128: characters 18-37
		$_this1 = $this->buf;
		#/Users/ut/haxe/haxe_libraries/tink_json/0.9.0/haxelib/src/tink/json/macros/GenWriter.hx:128: characters 18-37
		$_this1->b = ($_this1->b??'null') . (chr(44)??'null');

		#/Users/ut/haxe/haxe_libraries/tink_json/0.9.0/haxelib/src/tink/json/macros/GenWriter.hx:129: characters 13-35
		$this->buf->add("\"name\":");
		#/Users/ut/haxe/haxe_libraries/tink_json/0.9.0/haxelib/src/tink/json/macros/GenWriter.hx:26: characters 18-41
		$s1 = JsonPrinter::print($value2);
		#/Users/ut/haxe/haxe_libraries/tink_json/0.9.0/haxelib/src/tink/json/macros/GenWriter.hx:26: characters 18-41
		$this->buf->add($s1);




		#/Users/ut/haxe/haxe_libraries/tink_json/0.9.0/haxelib/src/tink/json/macros/GenWriter.hx:156: characters 9-28
		$_this2 = $this->buf;
		#/Users/ut/haxe/haxe_libraries/tink_json/0.9.0/haxelib/src/tink/json/macros/GenWriter.hx:156: characters 9-28
		$_this2->b = ($_this2->b??'null') . (chr(125)??'null');

	}


	/**
	 * @param object $value
	 * 
	 * @return string
	 */
	public function write ($value) {
		#/Users/ut/haxe/haxe_libraries/tink_json/0.9.0/haxelib/src/tink/json/macros/Macro.hx:118: characters 9-20
		$this->init();
		#src/Server.hx:72: lines 72-90
		$this->parse0($value);
		#/Users/ut/haxe/haxe_libraries/tink_json/0.9.0/haxelib/src/tink/json/macros/Macro.hx:120: characters 9-40
		return $this->buf->b;
	}
}


Boot::registerClass(Writer0::class, 'tink.json.Writer0');
