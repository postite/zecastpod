<?php
/**
 * Generated by Haxe 4.0.0 (git build development @ 3018ab1)
 */

namespace tink\core;

use \php\_Boot\HxClosure;
use \php\Boot;
use \tink\core\_Future\FutureObject;
use \tink\core\_Future\SyncFuture;
use \tink\core\_Future\SimpleFuture;
use \tink\core\_Callback\Callback_Impl_;
use \tink\core\_Callback\LinkObject;
use \tink\core\_Lazy\LazyConst;
use \tink\core\_Callback\CallbackList_Impl_;

class FutureTrigger implements FutureObject {
	/**
	 * @var \Array_hx
	 */
	public $list;
	/**
	 * @var mixed
	 */
	public $result;


	/**
	 * @param FutureObject $f
	 * 
	 * @return FutureObject
	 */
	static public function gatherFuture ($f) {
		#/Users/ut/haxe/haxe_libraries/tink_core/1.18.0/haxelib/src/tink/core/Future.hx:359: characters 5-19
		$op = null;
		#/Users/ut/haxe/haxe_libraries/tink_core/1.18.0/haxelib/src/tink/core/Future.hx:360: lines 360-367
		return new SimpleFuture(function ($cb)  use (&$op, &$f) {
			#/Users/ut/haxe/haxe_libraries/tink_core/1.18.0/haxelib/src/tink/core/Future.hx:361: lines 361-365
			if ($op === null) {
				#/Users/ut/haxe/haxe_libraries/tink_core/1.18.0/haxelib/src/tink/core/Future.hx:362: characters 9-33
				$op = new FutureTrigger();
				#/Users/ut/haxe/haxe_libraries/tink_core/1.18.0/haxelib/src/tink/core/Future.hx:363: characters 9-29
				$f->handle(new HxClosure($op, 'trigger'));
				#/Users/ut/haxe/haxe_libraries/tink_core/1.18.0/haxelib/src/tink/core/Future.hx:364: characters 9-17
				$f = null;
			}
			#/Users/ut/haxe/haxe_libraries/tink_core/1.18.0/haxelib/src/tink/core/Future.hx:366: characters 7-27
			return $op->handle($cb);
		});
	}


	/**
	 * @return void
	 */
	public function __construct () {
		#/Users/ut/haxe/haxe_libraries/tink_core/1.18.0/haxelib/src/tink/core/Future.hx:320: characters 5-35
		$this->list = new \Array_hx();
	}


	/**
	 * @return FutureObject
	 */
	public function asFuture () {
		#/Users/ut/haxe/haxe_libraries/tink_core/1.18.0/haxelib/src/tink/core/Future.hx:356: characters 5-16
		return $this;
	}


	/**
	 * @return FutureTrigger
	 */
	public function eager () {
		#/Users/ut/haxe/haxe_libraries/tink_core/1.18.0/haxelib/src/tink/core/Future.hx:353: characters 5-16
		return $this;
	}


	/**
	 * @param \Closure $f
	 * 
	 * @return FutureObject
	 */
	public function flatMap ($f) {
		#/Users/ut/haxe/haxe_libraries/tink_core/1.18.0/haxelib/src/tink/core/Future.hx:342: lines 342-346
		if ($this->list === null) {
			#/Users/ut/haxe/haxe_libraries/tink_core/1.18.0/haxelib/src/tink/core/Future.hx:342: characters 18-27
			return $f($this->result);
		} else {
			#/Users/ut/haxe/haxe_libraries/tink_core/1.18.0/haxelib/src/tink/core/Future.hx:344: characters 9-39
			$ret = new FutureTrigger();
			#/Users/ut/haxe/haxe_libraries/tink_core/1.18.0/haxelib/src/tink/core/Future.hx:345: characters 9-56
			CallbackList_Impl_::add($this->list, function ($v)  use (&$f, &$ret) {
				#/Users/ut/haxe/haxe_libraries/tink_core/1.18.0/haxelib/src/tink/core/Future.hx:345: characters 31-55
				$f($v)->handle(new HxClosure($ret, 'trigger'));
			});
			#/Users/ut/haxe/haxe_libraries/tink_core/1.18.0/haxelib/src/tink/core/Future.hx:346: characters 9-12
			return $ret;
		}
	}


	/**
	 * @return FutureTrigger
	 */
	public function gather () {
		#/Users/ut/haxe/haxe_libraries/tink_core/1.18.0/haxelib/src/tink/core/Future.hx:350: characters 5-16
		return $this;
	}


	/**
	 * @param \Closure $callback
	 * 
	 * @return LinkObject
	 */
	public function handle ($callback) {
		#/Users/ut/haxe/haxe_libraries/tink_core/1.18.0/haxelib/src/tink/core/Future.hx:323: characters 19-23
		$_g = $this->list;
		#/Users/ut/haxe/haxe_libraries/tink_core/1.18.0/haxelib/src/tink/core/Future.hx:324: lines 324-328
		if ($_g === null) {
			#/Users/ut/haxe/haxe_libraries/tink_core/1.18.0/haxelib/src/tink/core/Future.hx:325: characters 9-32
			Callback_Impl_::invoke($callback, $this->result);
			#/Users/ut/haxe/haxe_libraries/tink_core/1.18.0/haxelib/src/tink/core/Future.hx:326: characters 9-13
			return null;
		} else {
			#/Users/ut/haxe/haxe_libraries/tink_core/1.18.0/haxelib/src/tink/core/Future.hx:328: characters 9-24
			return CallbackList_Impl_::add($_g, $callback);
		}
	}


	/**
	 * @param \Closure $f
	 * 
	 * @return FutureObject
	 */
	public function map ($f) {
		#/Users/ut/haxe/haxe_libraries/tink_core/1.18.0/haxelib/src/tink/core/Future.hx:333: lines 333-337
		if ($this->list === null) {
			#/Users/ut/haxe/haxe_libraries/tink_core/1.18.0/haxelib/src/tink/core/Future.hx:333: characters 18-40
			return new SyncFuture(new LazyConst($f($this->result)));
		} else {
			#/Users/ut/haxe/haxe_libraries/tink_core/1.18.0/haxelib/src/tink/core/Future.hx:335: characters 9-39
			$ret = new FutureTrigger();
			#/Users/ut/haxe/haxe_libraries/tink_core/1.18.0/haxelib/src/tink/core/Future.hx:336: characters 9-49
			CallbackList_Impl_::add($this->list, function ($v)  use (&$f, &$ret) {
				#/Users/ut/haxe/haxe_libraries/tink_core/1.18.0/haxelib/src/tink/core/Future.hx:336: characters 43-47
				$tmp = $f($v);
				#/Users/ut/haxe/haxe_libraries/tink_core/1.18.0/haxelib/src/tink/core/Future.hx:336: characters 31-48
				$ret->trigger($tmp);
			});
			#/Users/ut/haxe/haxe_libraries/tink_core/1.18.0/haxelib/src/tink/core/Future.hx:337: characters 9-12
			return $ret;
		}
	}


	/**
	 *  Triggers a value for this future
	 * 
	 * @param mixed $result
	 * 
	 * @return bool
	 */
	public function trigger ($result) {
		#/Users/ut/haxe/haxe_libraries/tink_core/1.18.0/haxelib/src/tink/core/Future.hx:375: lines 375-383
		if ($this->list === null) {
			#/Users/ut/haxe/haxe_libraries/tink_core/1.18.0/haxelib/src/tink/core/Future.hx:375: characters 25-30
			return false;
		} else {
			#/Users/ut/haxe/haxe_libraries/tink_core/1.18.0/haxelib/src/tink/core/Future.hx:377: characters 9-30
			$list = $this->list;
			#/Users/ut/haxe/haxe_libraries/tink_core/1.18.0/haxelib/src/tink/core/Future.hx:378: characters 9-25
			$this->list = null;
			#/Users/ut/haxe/haxe_libraries/tink_core/1.18.0/haxelib/src/tink/core/Future.hx:379: characters 9-29
			$this->result = $result;
			#/Users/ut/haxe/haxe_libraries/tink_core/1.18.0/haxelib/src/tink/core/Future.hx:380: characters 9-28
			CallbackList_Impl_::invoke($list, $result);
			#/Users/ut/haxe/haxe_libraries/tink_core/1.18.0/haxelib/src/tink/core/Future.hx:381: characters 9-21
			CallbackList_Impl_::clear($list);
			#/Users/ut/haxe/haxe_libraries/tink_core/1.18.0/haxelib/src/tink/core/Future.hx:382: characters 9-13
			return true;
		}
	}
}


Boot::registerClass(FutureTrigger::class, 'tink.core.FutureTrigger');