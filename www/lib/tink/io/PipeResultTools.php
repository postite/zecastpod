<?php
/**
 * Generated by Haxe 4.0.0 (git build development @ 3018ab1)
 */

namespace tink\io;

use \tink\core\Outcome;
use \tink\chunk\ChunkObject;
use \php\Boot;
use \tink\streams\Conclusion;
use \tink\streams\Single;
use \tink\core\_Lazy\LazyConst;

class PipeResultTools {
	/**
	 * Transform PipeResult to an Outcome of Bool, indicating the source is completely written or not
	 * 
	 * @param PipeResult $result
	 * 
	 * @return Outcome
	 */
	static public function toOutcome ($result) {
		#/Users/ut/haxe/haxe_libraries/tink_io/0.6.2/haxelib/src/tink/io/PipeResult.hx:20: lines 20-24
		switch ($result->index) {
			case 0:
				#/Users/ut/haxe/haxe_libraries/tink_io/0.6.2/haxelib/src/tink/io/PipeResult.hx:21: characters 24-37
				return Outcome::Success(true);
				break;
			case 1:
				#/Users/ut/haxe/haxe_libraries/tink_io/0.6.2/haxelib/src/tink/io/PipeResult.hx:22: characters 26-40
				return Outcome::Success(false);
				break;
			case 2:
				#/Users/ut/haxe/haxe_libraries/tink_io/0.6.2/haxelib/src/tink/io/PipeResult.hx:23: characters 48-58
				return Outcome::Failure($result->params[0]);
				break;
			case 3:
				#/Users/ut/haxe/haxe_libraries/tink_io/0.6.2/haxelib/src/tink/io/PipeResult.hx:23: characters 48-58
				return Outcome::Failure($result->params[0]);
				break;
		}
	}


	/**
	 * @param Conclusion $c
	 * @param mixed $result
	 * @param ChunkObject $buffered
	 * 
	 * @return PipeResult
	 */
	static public function toResult ($c, $result, $buffered = null) {
		#/Users/ut/haxe/haxe_libraries/tink_io/0.6.2/haxelib/src/tink/io/PipeResult.hx:30: lines 30-34
		$mk = function ($s)  use (&$buffered) {
			#/Users/ut/haxe/haxe_libraries/tink_io/0.6.2/haxelib/src/tink/io/PipeResult.hx:31: lines 31-34
			if ($buffered === null) {
				#/Users/ut/haxe/haxe_libraries/tink_io/0.6.2/haxelib/src/tink/io/PipeResult.hx:32: characters 20-21
				return $s;
			} else {
				#/Users/ut/haxe/haxe_libraries/tink_io/0.6.2/haxelib/src/tink/io/PipeResult.hx:33: characters 17-29
				return $s->prepend(new Single(new LazyConst($buffered)));
			}
		};
		#/Users/ut/haxe/haxe_libraries/tink_io/0.6.2/haxelib/src/tink/io/PipeResult.hx:36: lines 36-41
		switch ($c->index) {
			case 0:
				#/Users/ut/haxe/haxe_libraries/tink_io/0.6.2/haxelib/src/tink/io/PipeResult.hx:40: characters 26-53
				return PipeResult::SinkEnded($result, $mk($c->params[0]));
				break;
			case 1:
				#/Users/ut/haxe/haxe_libraries/tink_io/0.6.2/haxelib/src/tink/io/PipeResult.hx:38: characters 30-53
				return PipeResult::SinkFailed($c->params[0], $mk($c->params[1]));
				break;
			case 2:
				#/Users/ut/haxe/haxe_libraries/tink_io/0.6.2/haxelib/src/tink/io/PipeResult.hx:37: characters 23-38
				return PipeResult::SourceFailed($c->params[0]);
				break;
			case 3:
				#/Users/ut/haxe/haxe_libraries/tink_io/0.6.2/haxelib/src/tink/io/PipeResult.hx:39: characters 22-32
				return PipeResult::AllWritten();
				break;
		}
	}
}


Boot::registerClass(PipeResultTools::class, 'tink.io.PipeResultTools');