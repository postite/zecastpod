<?php
/**
 * Generated by Haxe 4.0.0 (git build development @ 3018ab1)
 */

namespace tink\core\_Future;

use \php\Boot;
use \tink\core\_Callback\Callback_Impl_;
use \tink\core\_Callback\LinkObject;
use \tink\core\_Lazy\LazyObject;

class SyncFuture implements FutureObject {
	/**
	 * @var LazyObject
	 */
	public $value;


	/**
	 * @param LazyObject $value
	 * 
	 * @return void
	 */
	public function __construct ($value) {
		#/Users/ut/haxe/haxe_libraries/tink_core/1.18.0/haxelib/src/tink/core/Future.hx:228: characters 5-23
		$this->value = $value;
	}


	/**
	 * @return SyncFuture
	 */
	public function eager () {
		#/Users/ut/haxe/haxe_libraries/tink_core/1.18.0/haxelib/src/tink/core/Future.hx:245: characters 5-16
		return $this;
	}


	/**
	 * @param \Closure $f
	 * 
	 * @return FutureObject
	 */
	public function flatMap ($f) {
		#/Users/ut/haxe/haxe_libraries/tink_core/1.18.0/haxelib/src/tink/core/Future.hx:235: characters 7-28
		$l = $this->value->map($f);
		#/Users/ut/haxe/haxe_libraries/tink_core/1.18.0/haxelib/src/tink/core/Future.hx:234: lines 234-237
		return new SimpleFuture(function ($cb)  use (&$l) {
			#/Users/ut/haxe/haxe_libraries/tink_core/1.18.0/haxelib/src/tink/core/Future.hx:236: characters 21-46
			return $l->get()->handle($cb);
		});
	}


	/**
	 * @return SyncFuture
	 */
	public function gather () {
		#/Users/ut/haxe/haxe_libraries/tink_core/1.18.0/haxelib/src/tink/core/Future.hx:248: characters 5-16
		return $this;
	}


	/**
	 * @param \Closure $cb
	 * 
	 * @return LinkObject
	 */
	public function handle ($cb) {
		#/Users/ut/haxe/haxe_libraries/tink_core/1.18.0/haxelib/src/tink/core/Future.hx:240: characters 5-21
		Callback_Impl_::invoke($cb, $this->value->get());
		#/Users/ut/haxe/haxe_libraries/tink_core/1.18.0/haxelib/src/tink/core/Future.hx:241: characters 5-16
		return null;
	}


	/**
	 * @param \Closure $f
	 * 
	 * @return FutureObject
	 */
	public function map ($f) {
		#/Users/ut/haxe/haxe_libraries/tink_core/1.18.0/haxelib/src/tink/core/Future.hx:231: characters 5-40
		return new SyncFuture($this->value->map($f));
	}
}


Boot::registerClass(SyncFuture::class, 'tink.core._Future.SyncFuture');
