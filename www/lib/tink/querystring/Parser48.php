<?php
/**
 * Generated by Haxe 4.0.0 (git build development @ 3018ab1)
 */

namespace tink\querystring;

use \php\_Boot\HxClosure;
use \php\Boot;
use \php\_Boot\HxException;
use \tink\core\TypedError;
use \tink\web\forms\_FormField\FormField_Impl_;
use \php\_Boot\HxAnon;
use \tink\http\BodyPart;

class Parser48 extends ParserBase {
	/**
	 * @param \Closure $onError
	 * @param object $pos
	 * 
	 * @return void
	 */
	public function __construct ($onError = null, $pos = null) {
		#/Users/ut/haxe/haxe_libraries/tink_querystring/0.6.0/haxelib/src/tink/querystring/macros/GenParser.hx:114: lines 114-125
		parent::__construct($onError, $pos);
	}


	/**
	 * @param object $p
	 * 
	 * @return string
	 */
	public function getName ($p) {
		#/Users/ut/haxe/haxe_libraries/tink_querystring/0.6.0/haxelib/src/tink/querystring/macros/GenParser.hx:116: characters 34-47
		return $p->name;
	}


	/**
	 * @param object $p
	 * 
	 * @return BodyPart
	 */
	public function getValue ($p) {
		#/Users/ut/haxe/haxe_libraries/tink_querystring/0.6.0/haxelib/src/tink/querystring/macros/GenParser.hx:117: characters 35-49
		return $p->value;
	}


	/**
	 * @param object $input
	 * 
	 * @return object
	 */
	public function parse ($input) {
		#/Users/ut/haxe/haxe_libraries/tink_querystring/0.6.0/haxelib/src/tink/querystring/macros/GenParser.hx:121: characters 9-44
		$this->init($input, new HxClosure($this, 'getName'), new HxClosure($this, 'getValue'));
		#/Users/ut/haxe/haxe_libraries/tink_querystring/0.6.0/haxelib/src/tink/querystring/macros/GenParser.hx:122: characters 9-29
		return $this->parse0("");
	}


	/**
	 * @param string $prefix
	 * 
	 * @return object
	 */
	public function parse0 ($prefix) {
		#/Users/ut/haxe/haxe_libraries/tink_querystring/0.6.0/haxelib/src/tink/querystring/macros/GenParser.hx:194: characters 26-29
		$prefix1 = ($prefix === "" ? "desc" : ($prefix??'null') . ".desc");
		#/Users/ut/haxe/haxe_libraries/tink_querystring/0.6.0/haxelib/src/tink/querystring/macros/GenParser.hx:217: lines 217-220
		$__o = (($this->exists->data[$prefix1] ?? null) ? FormField_Impl_::toString(($this->params->data[$prefix1] ?? null)) : $this->missing($prefix1));
		#/Users/ut/haxe/haxe_libraries/tink_querystring/0.6.0/haxelib/src/tink/querystring/macros/GenParser.hx:217: lines 217-220
		$__o1 = $this->parse1(($prefix === "" ? "fileToUpload" : ($prefix??'null') . ".fileToUpload"));
		#/Users/ut/haxe/haxe_libraries/tink_querystring/0.6.0/haxelib/src/tink/querystring/macros/GenParser.hx:217: lines 217-220
		$__o2 = $this->parse1(($prefix === "" ? "imgToUpload" : ($prefix??'null') . ".imgToUpload"));
		#/Users/ut/haxe/haxe_libraries/tink_querystring/0.6.0/haxelib/src/tink/querystring/macros/GenParser.hx:194: characters 26-29
		$prefix2 = ($prefix === "" ? "title" : ($prefix??'null') . ".title");
		#/Users/ut/haxe/haxe_libraries/tink_querystring/0.6.0/haxelib/src/tink/querystring/macros/GenParser.hx:228: characters 7-10
		return new HxAnon([
			"desc" => $__o,
			"fileToUpload" => $__o1,
			"imgToUpload" => $__o2,
			"title" => (($this->exists->data[$prefix2] ?? null) ? FormField_Impl_::toString(($this->params->data[$prefix2] ?? null)) : $this->missing($prefix2)),
		]);
	}


	/**
	 * @param string $prefix
	 * 
	 * @return object
	 */
	public function parse1 ($prefix) {
		#/Users/ut/haxe/haxe_libraries/tink_querystring/0.6.0/haxelib/src/tink/querystring/macros/GenParser.hx:275: lines 275-277
		try {
			#/Users/ut/haxe/haxe_libraries/tink_querystring/0.6.0/haxelib/src/tink/querystring/macros/GenParser.hx:150: lines 150-151
			if (($this->exists->data[$prefix] ?? null)) {
				#/Users/ut/haxe/haxe_libraries/tink_querystring/0.6.0/haxelib/src/tink/querystring/macros/GenParser.hx:150: characters 29-62
				return FormField_Impl_::getFile(($this->params->data[$prefix] ?? null));
			} else {
				#/Users/ut/haxe/haxe_libraries/tink_querystring/0.6.0/haxelib/src/tink/querystring/macros/GenParser.hx:151: characters 14-29
				return $this->missing($prefix);
			}
		} catch (\Throwable $__hx__caught_e) {
			$__hx__real_e = ($__hx__caught_e instanceof HxException ? $__hx__caught_e->e : $__hx__caught_e);
			if ($__hx__real_e instanceof TypedError) {
				$e = $__hx__real_e;
				#/Users/ut/haxe/haxe_libraries/tink_querystring/0.6.0/haxelib/src/tink/querystring/macros/GenParser.hx:276: characters 35-63
				return $this->fail($prefix, $e->message);
			} else {
				$e1 = $__hx__real_e;
				#/Users/ut/haxe/haxe_libraries/tink_querystring/0.6.0/haxelib/src/tink/querystring/macros/GenParser.hx:277: characters 27-59
				return $this->fail($prefix, \Std::string($e1));
			}
		}
	}
}


Boot::registerClass(Parser48::class, 'tink.querystring.Parser48');
