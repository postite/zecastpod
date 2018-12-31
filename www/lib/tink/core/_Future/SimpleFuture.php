<?php
/**
 * Generated by Haxe 4.0.0 (git build development @ 3018ab1)
 */

namespace tink\core\_Future;

use \tink\core\FutureTrigger;
use \php\Boot;
use \tink\core\_Callback\Callback_Impl_;
use \tink\core\_Callback\LinkObject;

class SimpleFuture implements FutureObject {
	/**
	 * @var \Closure
	 */
	public $f;
	/**
	 * @var FutureObject
	 */
	public $gathered;


	/**
	 * @param \Closure $f
	 * 
	 * @return void
	 */
	public function __construct ($f) {
		#/Users/ut/haxe/haxe_libraries/tink_core/1.18.0/haxelib/src/tink/core/Future.hx:257: characters 5-15
		$this->f = $f;
	}


	/**
	 * @return FutureObject
	 */
	public function eager () {
		#/Users/ut/haxe/haxe_libraries/tink_core/1.18.0/haxelib/src/tink/core/Future.hx:276: characters 5-24
		$ret = ($this->gathered !== null ? $this->gathered : $this->gathered = FutureTrigger::gatherFuture($this));
		#/Users/ut/haxe/haxe_libraries/tink_core/1.18.0/haxelib/src/tink/core/Future.hx:277: characters 5-31
		$ret->handle(Callback_Impl_::fromNiladic(function () {
		}));
		#/Users/ut/haxe/haxe_libraries/tink_core/1.18.0/haxelib/src/tink/core/Future.hx:278: characters 5-15
		return $ret;
	}


	/**
	 * @param \Closure $f
	 * 
	 * @return FutureObject
	 */
	public function flatMap ($f) {
		#/Users/ut/haxe/haxe_libraries/tink_core/1.18.0/haxelib/src/tink/core/Future.hx:268: characters 27-33
		$f1 = $f;
		#/Users/ut/haxe/haxe_libraries/tink_core/1.18.0/haxelib/src/tink/core/Future.hx:268: characters 27-33
		$_gthis = $this;
		#/Users/ut/haxe/haxe_libraries/tink_core/1.18.0/haxelib/src/tink/core/Future.hx:268: characters 5-34
		return Future_Impl_::flatten(new SimpleFuture(function ($cb)  use (&$f1, &$_gthis) {
			#/Users/ut/haxe/haxe_libraries/tink_core/1.18.0/haxelib/src/tink/core/Future.hx:268: characters 27-33
			return ($_gthis->f)(function ($v)  use (&$f1, &$cb) {
				#/Users/ut/haxe/haxe_libraries/tink_core/1.18.0/haxelib/src/tink/core/Future.hx:268: characters 27-33
				$tmp = $f1($v);
				#/Users/ut/haxe/haxe_libraries/tink_core/1.18.0/haxelib/src/tink/core/Future.hx:268: characters 27-33
				Callback_Impl_::invoke($cb, $tmp);
			});
		}));
	}


	/**
	 * @return FutureObject
	 */
	public function gather () {
		#/Users/ut/haxe/haxe_libraries/tink_core/1.18.0/haxelib/src/tink/core/Future.hx:272: lines 272-273
		if ($this->gathered !== null) {
			#/Users/ut/haxe/haxe_libraries/tink_core/1.18.0/haxelib/src/tink/core/Future.hx:272: characters 29-37
			return $this->gathered;
		} else {
			#/Users/ut/haxe/haxe_libraries/tink_core/1.18.0/haxelib/src/tink/core/Future.hx:273: characters 12-67
			return $this->gathered = FutureTrigger::gatherFuture($this);
		}
	}


	/**
	 * @param \Closure $callback
	 * 
	 * @return LinkObject
	 */
	public function handle ($callback) {
		#/Users/ut/haxe/haxe_libraries/tink_core/1.18.0/haxelib/src/tink/core/Future.hx:260: characters 5-23
		return ($this->f)($callback);
	}


	/**
	 * @param \Closure $f
	 * 
	 * @return FutureObject
	 */
	public function map ($f) {
		#/Users/ut/haxe/haxe_libraries/tink_core/1.18.0/haxelib/src/tink/core/Future.hx:262: lines 262-265
		$_gthis = $this;
		#/Users/ut/haxe/haxe_libraries/tink_core/1.18.0/haxelib/src/tink/core/Future.hx:263: lines 263-265
		return new SimpleFuture(function ($cb)  use (&$f, &$_gthis) {
			#/Users/ut/haxe/haxe_libraries/tink_core/1.18.0/haxelib/src/tink/core/Future.hx:264: characters 7-50
			return ($_gthis->f)(function ($v)  use (&$f, &$cb) {
				#/Users/ut/haxe/haxe_libraries/tink_core/1.18.0/haxelib/src/tink/core/Future.hx:264: characters 44-48
				$tmp = $f($v);
				#/Users/ut/haxe/haxe_libraries/tink_core/1.18.0/haxelib/src/tink/core/Future.hx:264: characters 34-49
				Callback_Impl_::invoke($cb, $tmp);
			});
		});
	}
}


Boot::registerClass(SimpleFuture::class, 'tink.core._Future.SimpleFuture');