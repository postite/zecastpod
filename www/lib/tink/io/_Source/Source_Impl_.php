<?php
/**
 * Generated by Haxe 4.0.0 (git build development @ 3018ab1)
 */

namespace tink\io\_Source;

use \tink\streams\_Stream\Reducer_Impl_;
use \tink\streams\_Stream\Stream_Impl_;
use \tink\chunk\ChunkObject;
use \tink\streams\ReductionStep;
use \php\Boot;
use \tink\io\SinkObject;
use \tink\io\_Worker\Worker_Impl_;
use \tink\core\TypedError;
use \tink\streams\RegroupResult;
use \tink\core\_Future\FutureObject;
use \tink\core\_Future\SyncFuture;
use \tink\streams\_Stream\Regrouper_Impl_;
use \haxe\io\Input;
use \tink\io\std\InputSource;
use \haxe\io\Bytes;
use \tink\io\Transformer;
use \tink\streams\StreamObject;
use \tink\chunk\ByteChunk;
use \tink\streams\Empty_hx;
use \tink\_Chunk\Chunk_Impl_;
use \haxe\io\_BytesData\Container;
use \tink\streams\Single;
use \php\_Boot\HxAnon;
use \haxe\ds\Option;
use \tink\core\_Lazy\LazyConst;

final class Source_Impl_ {
	/**
	 * @var StreamObject
	 */
	static public $EMPTY;


	/**
	 * @param StreamObject $this
	 * @param StreamObject $that
	 * 
	 * @return StreamObject
	 */
	static public function append ($this1, $that) {
		#/Users/ut/haxe/haxe_libraries/tink_io/0.6.2/haxelib/src/tink/io/Source.hx:104: characters 5-29
		return $this1->append($that);
	}


	/**
	 * @param StreamObject $this
	 * 
	 * @return StreamObject
	 */
	static public function chunked ($this1) {
		#/Users/ut/haxe/haxe_libraries/tink_io/0.6.2/haxelib/src/tink/io/Source.hx:83: characters 5-16
		return $this1;
	}


	/**
	 * @param StreamObject $s
	 * 
	 * @return FutureObject
	 */
	static public function concatAll ($s) {
		#/Users/ut/haxe/haxe_libraries/tink_io/0.6.2/haxelib/src/tink/io/Source.hx:98: characters 5-93
		return $s->reduce(Chunk_Impl_::$EMPTY, Reducer_Impl_::ofSafe(function ($res, $cur) {
			#/Users/ut/haxe/haxe_libraries/tink_io/0.6.2/haxelib/src/tink/io/Source.hx:98: characters 66-92
			return new SyncFuture(new LazyConst(ReductionStep::Progress(Chunk_Impl_::catChunk($res, $cur))));
		}));
	}


	/**
	 * @param StreamObject $this
	 * 
	 * @return StreamObject
	 */
	static public function dirty ($this1) {
		#/Users/ut/haxe/haxe_libraries/tink_io/0.6.2/haxelib/src/tink/io/Source.hx:19: characters 5-21
		return $this1;
	}


	/**
	 * @param StreamObject $this
	 * 
	 * @return bool
	 */
	static public function get_depleted ($this1) {
		#/Users/ut/haxe/haxe_libraries/tink_io/0.6.2/haxelib/src/tink/io/Source.hx:22: characters 36-56
		return $this1->get_depleted();
	}


	/**
	 * @param StreamObject $this
	 * @param int $len
	 * 
	 * @return StreamObject
	 */
	static public function limit ($this1, $len) {
		#/Users/ut/haxe/haxe_libraries/tink_io/0.6.2/haxelib/src/tink/io/Source.hx:124: characters 5-42
		if ($len === 0) {
			#/Users/ut/haxe/haxe_libraries/tink_io/0.6.2/haxelib/src/tink/io/Source.hx:124: characters 18-42
			return Source_Impl_::$EMPTY;
		}
		#/Users/ut/haxe/haxe_libraries/tink_io/0.6.2/haxelib/src/tink/io/Source.hx:125: lines 125-136
		return $this1->regroup(Regrouper_Impl_::ofIgnoranceSync(function ($chunks)  use (&$len) {
			#/Users/ut/haxe/haxe_libraries/tink_io/0.6.2/haxelib/src/tink/io/Source.hx:126: characters 7-43
			if ($len <= 0) {
				#/Users/ut/haxe/haxe_libraries/tink_io/0.6.2/haxelib/src/tink/io/Source.hx:126: characters 20-43
				return RegroupResult::Terminated(Option::None());
			}
			#/Users/ut/haxe/haxe_libraries/tink_io/0.6.2/haxelib/src/tink/io/Source.hx:127: characters 7-29
			$chunk = ($chunks->arr[0] ?? null);
			#/Users/ut/haxe/haxe_libraries/tink_io/0.6.2/haxelib/src/tink/io/Source.hx:128: characters 7-33
			$length = $chunk->getLength();
			#/Users/ut/haxe/haxe_libraries/tink_io/0.6.2/haxelib/src/tink/io/Source.hx:129: lines 129-133
			$out = ($len === $length ? RegroupResult::Terminated(Option::Some(Stream_Impl_::single($chunk))) : RegroupResult::Converted(Stream_Impl_::single(($len < $length ? $chunk->slice(0, $len) : $chunk))));
			#/Users/ut/haxe/haxe_libraries/tink_io/0.6.2/haxelib/src/tink/io/Source.hx:134: characters 7-20
			$len = $len - $length;
			#/Users/ut/haxe/haxe_libraries/tink_io/0.6.2/haxelib/src/tink/io/Source.hx:135: characters 7-17
			return $out;
		}));
	}


	/**
	 * @param Bytes $b
	 * 
	 * @return StreamObject
	 */
	static public function ofBytes ($b) {
		#/Users/ut/haxe/haxe_libraries/tink_io/0.6.2/haxelib/src/tink/io/Source.hx:146: characters 5-22
		return Source_Impl_::ofChunk(ByteChunk::of($b));
	}


	/**
	 * @param ChunkObject $chunk
	 * 
	 * @return StreamObject
	 */
	static public function ofChunk ($chunk) {
		#/Users/ut/haxe/haxe_libraries/tink_io/0.6.2/haxelib/src/tink/io/Source.hx:140: characters 5-29
		return new Single(new LazyConst($chunk));
	}


	/**
	 * @param TypedError $e
	 * 
	 * @return StreamObject
	 */
	static public function ofError ($e) {
		#/Users/ut/haxe/haxe_libraries/tink_io/0.6.2/haxelib/src/tink/io/Source.hx:86: characters 5-38
		return Stream_Impl_::ofError($e);
	}


	/**
	 * @param FutureObject $f
	 * 
	 * @return StreamObject
	 */
	static public function ofFuture ($f) {
		#/Users/ut/haxe/haxe_libraries/tink_io/0.6.2/haxelib/src/tink/io/Source.hx:89: characters 5-65
		return Stream_Impl_::flatten($f);
	}


	/**
	 * @param string $name
	 * @param Input $input
	 * @param object $options
	 * 
	 * @return StreamObject
	 */
	static public function ofInput ($name, $input, $options = null) {
		#/Users/ut/haxe/haxe_libraries/tink_io/0.6.2/haxelib/src/tink/io/Source.hx:74: lines 74-75
		if ($options === null) {
			#/Users/ut/haxe/haxe_libraries/tink_io/0.6.2/haxelib/src/tink/io/Source.hx:75: characters 7-19
			$options = new HxAnon();
		}
		#/Users/ut/haxe/haxe_libraries/tink_io/0.6.2/haxelib/src/tink/io/Source.hx:76: characters 53-76
		$tmp = Worker_Impl_::ensure($options->worker);
		#/Users/ut/haxe/haxe_libraries/tink_io/0.6.2/haxelib/src/tink/io/Source.hx:76: characters 105-122
		$_g = $options->chunkSize;
		#/Users/ut/haxe/haxe_libraries/tink_io/0.6.2/haxelib/src/tink/io/Source.hx:76: lines 76-79
		return new InputSource($name, $input, $tmp, Bytes::alloc(($_g === null ? 65536 : $_g)), 0);
	}


	/**
	 * @param FutureObject $p
	 * 
	 * @return StreamObject
	 */
	static public function ofPromised ($p) {
		#/Users/ut/haxe/haxe_libraries/tink_io/0.6.2/haxelib/src/tink/io/Source.hx:92: lines 92-95
		return Stream_Impl_::flatten($p->map(function ($o) {
			#/Users/ut/haxe/haxe_libraries/tink_io/0.6.2/haxelib/src/tink/io/Source.hx:92: lines 92-95
			switch ($o->index) {
				case 0:
					#/Users/ut/haxe/haxe_libraries/tink_io/0.6.2/haxelib/src/tink/io/Source.hx:93: characters 24-47
					return $o->params[0];
					break;
				case 1:
					#/Users/ut/haxe/haxe_libraries/tink_io/0.6.2/haxelib/src/tink/io/Source.hx:94: characters 24-34
					return Source_Impl_::ofError($o->params[0]);
					break;
			}
		})->gather());
	}


	/**
	 * @param string $s
	 * 
	 * @return StreamObject
	 */
	static public function ofString ($s) {
		#/Users/ut/haxe/haxe_libraries/tink_io/0.6.2/haxelib/src/tink/io/Source.hx:143: characters 5-22
		return Source_Impl_::ofChunk(Chunk_Impl_::ofBytes(new Bytes(strlen($s), new Container($s))));
	}


	/**
	 * @param StreamObject $this
	 * @param SinkObject $target
	 * @param object $options
	 * 
	 * @return FutureObject
	 */
	static public function pipeTo ($this1, $target, $options = null) {
		#/Users/ut/haxe/haxe_libraries/tink_io/0.6.2/haxelib/src/tink/io/Source.hx:101: characters 5-41
		return $target->consume($this1, $options);
	}


	/**
	 * @param StreamObject $this
	 * @param StreamObject $that
	 * 
	 * @return StreamObject
	 */
	static public function prepend ($this1, $that) {
		#/Users/ut/haxe/haxe_libraries/tink_io/0.6.2/haxelib/src/tink/io/Source.hx:107: characters 5-30
		return $this1->prepend($that);
	}


	/**
	 * @param StreamObject $this
	 * @param int $len
	 * 
	 * @return StreamObject
	 */
	static public function skip ($this1, $len) {
		#/Users/ut/haxe/haxe_libraries/tink_io/0.6.2/haxelib/src/tink/io/Source.hx:113: lines 113-120
		return $this1->regroup(Regrouper_Impl_::ofIgnoranceSync(function ($chunks)  use (&$len) {
			#/Users/ut/haxe/haxe_libraries/tink_io/0.6.2/haxelib/src/tink/io/Source.hx:114: characters 7-29
			$chunk = ($chunks->arr[0] ?? null);
			#/Users/ut/haxe/haxe_libraries/tink_io/0.6.2/haxelib/src/tink/io/Source.hx:115: characters 7-58
			if ($len <= 0) {
				#/Users/ut/haxe/haxe_libraries/tink_io/0.6.2/haxelib/src/tink/io/Source.hx:115: characters 20-58
				return RegroupResult::Converted(Stream_Impl_::single($chunk));
			}
			#/Users/ut/haxe/haxe_libraries/tink_io/0.6.2/haxelib/src/tink/io/Source.hx:116: characters 7-33
			$length = $chunk->getLength();
			#/Users/ut/haxe/haxe_libraries/tink_io/0.6.2/haxelib/src/tink/io/Source.hx:117: characters 27-101
			$out = ($len < $length ? Stream_Impl_::single($chunk->slice($len, $length)) : Empty_hx::$inst);
			#/Users/ut/haxe/haxe_libraries/tink_io/0.6.2/haxelib/src/tink/io/Source.hx:118: characters 7-20
			$len = $len - $length;
			#/Users/ut/haxe/haxe_libraries/tink_io/0.6.2/haxelib/src/tink/io/Source.hx:119: characters 7-17
			return RegroupResult::Converted($out);
		}));
	}


	/**
	 * @param StreamObject $this
	 * @param Transformer $transformer
	 * 
	 * @return StreamObject
	 */
	static public function transform ($this1, $transformer) {
		#/Users/ut/haxe/haxe_libraries/tink_io/0.6.2/haxelib/src/tink/io/Source.hx:110: characters 5-39
		return $transformer->transform($this1);
	}


	/**
	 * @internal
	 * @access private
	 */
	static public function __hx__init ()
	{
		static $called = false;
		if ($called) return;
		$called = true;


self::$EMPTY = Empty_hx::$inst;
	}
}


Boot::registerClass(Source_Impl_::class, 'tink.io._Source.Source_Impl_');
Boot::registerGetters('tink\\io\\_Source\\Source_Impl_', [
	'depleted' => true
]);
Source_Impl_::__hx__init();
