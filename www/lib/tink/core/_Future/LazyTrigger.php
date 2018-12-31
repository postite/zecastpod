<?php
/**
 * Generated by Haxe 4.0.0 (git build development @ 3018ab1)
 */

namespace tink\core\_Future;

use \php\_Boot\HxClosure;
use \tink\core\FutureTrigger;
use \php\Boot;
use \tink\core\_Callback\Callback_Impl_;
use \tink\core\_Callback\LinkObject;

class LazyTrigger extends FutureTrigger {
	/**
	 * @var \Closure
	 */
	public $op;


	/**
	 * @param \Closure $op
	 * 
	 * @return void
	 */
	public function __construct ($op) {
		#/Users/ut/haxe/haxe_libraries/tink_core/1.18.0/haxelib/src/tink/core/Future.hx:393: characters 5-17
		$this->op = $op;
		#/Users/ut/haxe/haxe_libraries/tink_core/1.18.0/haxelib/src/tink/core/Future.hx:394: characters 5-12
		parent::__construct();
	}


	/**
	 * @return LazyTrigger
	 */
	public function eager () {
		#/Users/ut/haxe/haxe_libraries/tink_core/1.18.0/haxelib/src/tink/core/Future.hx:398: lines 398-402
		if ($this->op !== null) {
			#/Users/ut/haxe/haxe_libraries/tink_core/1.18.0/haxelib/src/tink/core/Future.hx:399: characters 7-19
			$op = $this->op;
			#/Users/ut/haxe/haxe_libraries/tink_core/1.18.0/haxelib/src/tink/core/Future.hx:400: characters 7-21
			$this->op = null;
			#/Users/ut/haxe/haxe_libraries/tink_core/1.18.0/haxelib/src/tink/core/Future.hx:401: characters 7-25
			Callback_Impl_::invoke($op, new HxClosure($this, 'trigger'));
		}
		#/Users/ut/haxe/haxe_libraries/tink_core/1.18.0/haxelib/src/tink/core/Future.hx:403: characters 5-16
		return $this;
	}


	/**
	 * @param \Closure $f
	 * 
	 * @return FutureObject
	 */
	public function flatMap ($f) {
		#/Users/ut/haxe/haxe_libraries/tink_core/1.18.0/haxelib/src/tink/core/Future.hx:413: lines 413-418
		$_gthis = $this;
		#/Users/ut/haxe/haxe_libraries/tink_core/1.18.0/haxelib/src/tink/core/Future.hx:415: lines 415-418
		if ($this->op === null) {
			#/Users/ut/haxe/haxe_libraries/tink_core/1.18.0/haxelib/src/tink/core/Future.hx:415: characters 23-39
			return parent::flatMap($f);
		} else {
			#/Users/ut/haxe/haxe_libraries/tink_core/1.18.0/haxelib/src/tink/core/Future.hx:416: lines 416-418
			return Future_Impl_::async(function ($cb)  use (&$f, &$_gthis) {
				#/Users/ut/haxe/haxe_libraries/tink_core/1.18.0/haxelib/src/tink/core/Future.hx:417: characters 9-45
				$_gthis->handle(function ($v)  use (&$f, &$cb) {
					#/Users/ut/haxe/haxe_libraries/tink_core/1.18.0/haxelib/src/tink/core/Future.hx:417: characters 29-44
					$f($v)->handle($cb);
				});
			}, true);
		}
	}


	/**
	 * @param \Closure $cb
	 * 
	 * @return LinkObject
	 */
	public function handle ($cb) {
		#/Users/ut/haxe/haxe_libraries/tink_core/1.18.0/haxelib/src/tink/core/Future.hx:421: characters 5-12
		$this->eager();
		#/Users/ut/haxe/haxe_libraries/tink_core/1.18.0/haxelib/src/tink/core/Future.hx:422: characters 5-28
		return parent::handle($cb);
	}


	/**
	 * @param \Closure $f
	 * 
	 * @return FutureObject
	 */
	public function map ($f) {
		#/Users/ut/haxe/haxe_libraries/tink_core/1.18.0/haxelib/src/tink/core/Future.hx:406: lines 406-411
		$_gthis = $this;
		#/Users/ut/haxe/haxe_libraries/tink_core/1.18.0/haxelib/src/tink/core/Future.hx:408: lines 408-411
		if ($this->op === null) {
			#/Users/ut/haxe/haxe_libraries/tink_core/1.18.0/haxelib/src/tink/core/Future.hx:408: characters 23-35
			return parent::map($f);
		} else {
			#/Users/ut/haxe/haxe_libraries/tink_core/1.18.0/haxelib/src/tink/core/Future.hx:409: lines 409-411
			return Future_Impl_::async(function ($cb)  use (&$f, &$_gthis) {
				#/Users/ut/haxe/haxe_libraries/tink_core/1.18.0/haxelib/src/tink/core/Future.hx:410: characters 9-38
				$_gthis->handle(function ($v)  use (&$f, &$cb) {
					#/Users/ut/haxe/haxe_libraries/tink_core/1.18.0/haxelib/src/tink/core/Future.hx:410: characters 32-36
					$tmp = $f($v);
					#/Users/ut/haxe/haxe_libraries/tink_core/1.18.0/haxelib/src/tink/core/Future.hx:410: characters 29-37
					$cb($tmp);
				});
			}, true);
		}
	}
}


Boot::registerClass(LazyTrigger::class, 'tink.core._Future.LazyTrigger');
