<?php
/**
 * Generated by Haxe 4.0.0 (git build development @ 3018ab1)
 */

namespace tink\streams;

use \php\Boot;
use \tink\core\_Future\Future_Impl_;

class BlendStream extends Generator {
	/**
	 * @param StreamObject $a
	 * @param StreamObject $b
	 * 
	 * @return void
	 */
	public function __construct ($a, $b) {
		#/Users/ut/haxe/haxe_libraries/tink_streams/0.3.2/haxelib/src/tink/streams/Stream.hx:649: characters 5-22
		$first = null;
		#/Users/ut/haxe/haxe_libraries/tink_streams/0.3.2/haxelib/src/tink/streams/Stream.hx:651: lines 651-656
		$wait = function ($s)  use (&$first) {
			#/Users/ut/haxe/haxe_libraries/tink_streams/0.3.2/haxelib/src/tink/streams/Stream.hx:652: lines 652-655
			return $s->next()->map(function ($o)  use (&$first, &$s) {
				#/Users/ut/haxe/haxe_libraries/tink_streams/0.3.2/haxelib/src/tink/streams/Stream.hx:653: characters 9-36
				if ($first === null) {
					#/Users/ut/haxe/haxe_libraries/tink_streams/0.3.2/haxelib/src/tink/streams/Stream.hx:653: characters 27-36
					$first = $s;
				}
				#/Users/ut/haxe/haxe_libraries/tink_streams/0.3.2/haxelib/src/tink/streams/Stream.hx:654: characters 9-17
				return $o;
			})->gather();
		};
		#/Users/ut/haxe/haxe_libraries/tink_streams/0.3.2/haxelib/src/tink/streams/Stream.hx:658: characters 5-22
		$n1 = $wait($a);
		#/Users/ut/haxe/haxe_libraries/tink_streams/0.3.2/haxelib/src/tink/streams/Stream.hx:659: characters 5-22
		$n2 = $wait($b);
		#/Users/ut/haxe/haxe_libraries/tink_streams/0.3.2/haxelib/src/tink/streams/Stream.hx:661: lines 661-670
		parent::__construct(Future_Impl_::async(function ($cb)  use (&$n2, &$n1, &$first, &$b, &$a) {
			#/Users/ut/haxe/haxe_libraries/tink_streams/0.3.2/haxelib/src/tink/streams/Stream.hx:662: lines 662-669
			Future_Impl_::first($n1, $n2)->handle(function ($o1)  use (&$n2, &$n1, &$first, &$b, &$cb, &$a) {
				#/Users/ut/haxe/haxe_libraries/tink_streams/0.3.2/haxelib/src/tink/streams/Stream.hx:662: lines 662-669
				switch ($o1->index) {
					case 0:
						#/Users/ut/haxe/haxe_libraries/tink_streams/0.3.2/haxelib/src/tink/streams/Stream.hx:664: characters 14-67
						$tmp = Step::Link($o1->params[0], new BlendStream($o1->params[1], ($first === $a ? $b : $a)));
						#/Users/ut/haxe/haxe_libraries/tink_streams/0.3.2/haxelib/src/tink/streams/Stream.hx:664: characters 11-68
						$cb($tmp);
						break;
					case 1:
						#/Users/ut/haxe/haxe_libraries/tink_streams/0.3.2/haxelib/src/tink/streams/Stream.hx:668: characters 11-22
						$cb(Step::Fail($o1->params[0]));
						break;
					case 2:
						#/Users/ut/haxe/haxe_libraries/tink_streams/0.3.2/haxelib/src/tink/streams/Stream.hx:666: characters 11-44
						Boot::deref((($first === $a ? $n2 : $n1)))->handle($cb);
						break;
				}
			});
		}));
	}
}


Boot::registerClass(BlendStream::class, 'tink.streams.BlendStream');
