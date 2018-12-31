<?php
/**
 * Generated by Haxe 4.0.0 (git build development @ 3018ab1)
 */

namespace tink\querystring;

use \php\_Boot\HxClosure;
use \tink\core\Outcome;
use \haxe\ds\StringMap;
use \php\Boot;
use \php\_Boot\HxException;
use \tink\core\TypedError;
use \php\_Boot\HxString;
use \tink\core\_Callback\Callback_Impl_;
use \php\_Boot\HxAnon;

class ParserBase {
	/**
	 * @var StringMap
	 */
	public $exists;
	/**
	 * @var \Closure
	 */
	public $onError;
	/**
	 * @var StringMap
	 */
	public $params;
	/**
	 * @var object
	 */
	public $pos;
	/**
	 * @var Outcome
	 */
	public $result;


	/**
	 * @param \Closure $onError
	 * @param object $pos
	 * 
	 * @return void
	 */
	public function __construct ($onError = null, $pos = null) {
		#/Users/ut/haxe/haxe_libraries/tink_querystring/0.6.0/haxelib/src/tink/querystring/Parser.hx:20: characters 5-19
		$this->pos = $pos;
		#/Users/ut/haxe/haxe_libraries/tink_querystring/0.6.0/haxelib/src/tink/querystring/Parser.hx:21: lines 21-24
		$this->onError = ($onError === null ? new HxClosure($this, 'abort') : $onError);
	}


	/**
	 * @param object $e
	 * 
	 * @return void
	 */
	public function abort ($e) {
		#/Users/ut/haxe/haxe_libraries/tink_querystring/0.6.0/haxelib/src/tink/querystring/Parser.hx:55: characters 5-10
		throw new HxException($this->error("" . ($e->reason??'null') . " for " . ($e->name??'null')));
	}


	/**
	 * @param string $field
	 * @param Outcome $o
	 * 
	 * @return mixed
	 */
	public function attempt ($field, $o) {
		#/Users/ut/haxe/haxe_libraries/tink_querystring/0.6.0/haxelib/src/tink/querystring/Parser.hx:67: lines 67-70
		switch ($o->index) {
			case 0:
				#/Users/ut/haxe/haxe_libraries/tink_querystring/0.6.0/haxelib/src/tink/querystring/Parser.hx:68: characters 24-25
				return $o->params[0];
				break;
			case 1:
				#/Users/ut/haxe/haxe_libraries/tink_querystring/0.6.0/haxelib/src/tink/querystring/Parser.hx:69: characters 24-46
				return $this->fail($field, $o->params[0]->message);
				break;
		}
	}


	/**
	 * @param string $reason
	 * @param mixed $data
	 * 
	 * @return TypedError
	 */
	public function error ($reason, $data = null) {
		#/Users/ut/haxe/haxe_libraries/tink_querystring/0.6.0/haxelib/src/tink/querystring/Parser.hx:73: characters 5-66
		return TypedError::withData(422, $reason, $data, $this->pos);
	}


	/**
	 * @param string $field
	 * @param string $reason
	 * 
	 * @return mixed
	 */
	public function fail ($field, $reason) {
		#/Users/ut/haxe/haxe_libraries/tink_querystring/0.6.0/haxelib/src/tink/querystring/Parser.hx:76: characters 5-51
		Callback_Impl_::invoke($this->onError, new HxAnon([
			"name" => $field,
			"reason" => $reason,
		]));
		#/Users/ut/haxe/haxe_libraries/tink_querystring/0.6.0/haxelib/src/tink/querystring/Parser.hx:77: characters 5-16
		return null;
	}


	/**
	 * @param object $input
	 * @param \Closure $name
	 * @param \Closure $value
	 * 
	 * @return void
	 */
	public function init ($input, $name, $value) {
		#/Users/ut/haxe/haxe_libraries/tink_querystring/0.6.0/haxelib/src/tink/querystring/Parser.hx:28: characters 5-28
		$this->params = new StringMap();
		#/Users/ut/haxe/haxe_libraries/tink_querystring/0.6.0/haxelib/src/tink/querystring/Parser.hx:29: characters 5-28
		$this->exists = new StringMap();
		#/Users/ut/haxe/haxe_libraries/tink_querystring/0.6.0/haxelib/src/tink/querystring/Parser.hx:31: lines 31-50
		if ($input !== null) {
			#/Users/ut/haxe/haxe_libraries/tink_querystring/0.6.0/haxelib/src/tink/querystring/Parser.hx:32: characters 20-25
			while ($input->hasNext()) {
				#/Users/ut/haxe/haxe_libraries/tink_querystring/0.6.0/haxelib/src/tink/querystring/Parser.hx:32: lines 32-50
				$pair = $input->next();
				#/Users/ut/haxe/haxe_libraries/tink_querystring/0.6.0/haxelib/src/tink/querystring/Parser.hx:33: characters 9-31
				$name1 = $name($pair);
				#/Users/ut/haxe/haxe_libraries/tink_querystring/0.6.0/haxelib/src/tink/querystring/Parser.hx:34: characters 9-35
				$this1 = $this->params;
				#/Users/ut/haxe/haxe_libraries/tink_querystring/0.6.0/haxelib/src/tink/querystring/Parser.hx:34: characters 9-35
				$v = $value($pair);
				#/Users/ut/haxe/haxe_libraries/tink_querystring/0.6.0/haxelib/src/tink/querystring/Parser.hx:34: characters 9-35
				$this1->data[$name1] = $v;

				#/Users/ut/haxe/haxe_libraries/tink_querystring/0.6.0/haxelib/src/tink/querystring/Parser.hx:35: characters 9-31
				$end = strlen($name1);
				#/Users/ut/haxe/haxe_libraries/tink_querystring/0.6.0/haxelib/src/tink/querystring/Parser.hx:37: lines 37-49
				while ($end > 0) {
					#/Users/ut/haxe/haxe_libraries/tink_querystring/0.6.0/haxelib/src/tink/querystring/Parser.hx:39: characters 11-40
					$name1 = HxString::substring($name1, 0, $end);
					#/Users/ut/haxe/haxe_libraries/tink_querystring/0.6.0/haxelib/src/tink/querystring/Parser.hx:41: characters 11-34
					if (($this->exists->data[$name1] ?? null)) {
						#/Users/ut/haxe/haxe_libraries/tink_querystring/0.6.0/haxelib/src/tink/querystring/Parser.hx:41: characters 29-34
						break;
					}
					#/Users/ut/haxe/haxe_libraries/tink_querystring/0.6.0/haxelib/src/tink/querystring/Parser.hx:43: characters 11-30
					$this->exists->data[$name1] = true;
					#/Users/ut/haxe/haxe_libraries/tink_querystring/0.6.0/haxelib/src/tink/querystring/Parser.hx:45: characters 47-73
					$_g = HxString::lastIndexOf($name1, ".", $end);
					#/Users/ut/haxe/haxe_libraries/tink_querystring/0.6.0/haxelib/src/tink/querystring/Parser.hx:45: characters 19-45
					$_g1 = HxString::lastIndexOf($name1, "[", $end);
					#/Users/ut/haxe/haxe_libraries/tink_querystring/0.6.0/haxelib/src/tink/querystring/Parser.hx:46: characters 37-44
					$end = ($_g1 > $_g ? $_g1 : $_g);

				}
			}
		}
	}


	/**
	 * @param string $name
	 * 
	 * @return mixed
	 */
	public function missing ($name) {
		#/Users/ut/haxe/haxe_libraries/tink_querystring/0.6.0/haxelib/src/tink/querystring/Parser.hx:81: characters 5-39
		return $this->fail($name, "Missing value");
	}


	/**
	 * @param mixed $input
	 * 
	 * @return mixed
	 */
	public function parse ($input) {
		#/Users/ut/haxe/haxe_libraries/tink_querystring/0.6.0/haxelib/src/tink/querystring/Parser.hx:58: characters 12-17
		throw new HxException(TypedError::withData(501, "not implemented", $this->pos, new HxAnon([
			"fileName" => "tink/querystring/Parser.hx",
			"lineNumber" => 58,
			"className" => "tink.querystring.ParserBase",
			"methodName" => "parse",
		])));
	}


	/**
	 * @param mixed $input
	 * 
	 * @return Outcome
	 */
	public function tryParse ($input) {
		#/Users/ut/haxe/haxe_libraries/tink_querystring/0.6.0/haxelib/src/tink/querystring/Parser.hx:62: lines 62-64
		try {
			#/Users/ut/haxe/haxe_libraries/tink_querystring/0.6.0/haxelib/src/tink/querystring/Parser.hx:62: characters 11-32
			return Outcome::Success($this->parse($input));
		} catch (\Throwable $__hx__caught_e) {
			$__hx__real_e = ($__hx__caught_e instanceof HxException ? $__hx__caught_e->e : $__hx__caught_e);
			if ($__hx__real_e instanceof TypedError) {
				$e = $__hx__real_e;
				#/Users/ut/haxe/haxe_libraries/tink_querystring/0.6.0/haxelib/src/tink/querystring/Parser.hx:63: characters 23-33
				return Outcome::Failure($e);
			} else {
				$e1 = $__hx__real_e;
				#/Users/ut/haxe/haxe_libraries/tink_querystring/0.6.0/haxelib/src/tink/querystring/Parser.hx:64: characters 25-57
				return Outcome::Failure($this->error("Parse Error", $e1));
			}
		}
	}
}


Boot::registerClass(ParserBase::class, 'tink.querystring.ParserBase');
