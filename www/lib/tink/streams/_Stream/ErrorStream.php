<?php
/**
 * Generated by Haxe 4.0.0 (git build development @ 3018ab1)
 */

namespace tink\streams\_Stream;

use \php\Boot;
use \tink\core\TypedError;
use \tink\streams\Conclusion;
use \tink\core\_Future\FutureObject;
use \tink\streams\StreamBase;
use \tink\core\_Future\SyncFuture;
use \tink\streams\Step;
use \tink\core\_Lazy\LazyConst;

class ErrorStream extends StreamBase {
	/**
	 * @var TypedError
	 */
	public $error;


	/**
	 * @param TypedError $error
	 * 
	 * @return void
	 */
	public function __construct ($error) {
		#/Users/ut/haxe/haxe_libraries/tink_streams/0.3.2/haxelib/src/tink/streams/Stream.hx:186: characters 5-23
		parent::__construct();
		#/Users/ut/haxe/haxe_libraries/tink_streams/0.3.2/haxelib/src/tink/streams/Stream.hx:186: characters 5-23
		$this->error = $error;
	}


	/**
	 * @param \Closure $handler
	 * 
	 * @return FutureObject
	 */
	public function forEach ($handler) {
		#/Users/ut/haxe/haxe_libraries/tink_streams/0.3.2/haxelib/src/tink/streams/Stream.hx:192: characters 12-49
		return new SyncFuture(new LazyConst(Conclusion::Failed($this->error)));
	}


	/**
	 * @return FutureObject
	 */
	public function next () {
		#/Users/ut/haxe/haxe_libraries/tink_streams/0.3.2/haxelib/src/tink/streams/Stream.hx:189: characters 12-41
		return new SyncFuture(new LazyConst(Step::Fail($this->error)));
	}
}


Boot::registerClass(ErrorStream::class, 'tink.streams._Stream.ErrorStream');