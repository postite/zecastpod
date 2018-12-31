<?php
/**
 * Generated by Haxe 4.0.0 (git build development @ 3018ab1)
 */

namespace tink\core\_Signal;

use \tink\core\SignalObject;
use \php\_Boot\HxClosure;
use \tink\core\FutureTrigger;
use \tink\core\_Callback\SimpleLink;
use \tink\core\SignalTrigger;
use \php\Boot;
use \tink\core\_Future\FutureObject;
use \tink\core\_Callback\Callback_Impl_;
use \tink\core\Noise;
use \tink\core\_Callback\LinkPair;
use \tink\core\_Callback\CallbackLink_Impl_;
use \tink\core\_Callback\CallbackList_Impl_;

final class Signal_Impl_ {
	/**
	 * @param \Closure $f
	 * 
	 * @return SignalObject
	 */
	static public function _new ($f) {
		#/Users/ut/haxe/haxe_libraries/tink_core/1.18.0/haxelib/src/tink/core/Signal.hx:9: character 17
		return new SimpleSignal($f);
	}


	/**
	 * @param \Closure $create
	 * 
	 * @return SignalObject
	 */
	static public function create ($create) {
		#/Users/ut/haxe/haxe_libraries/tink_core/1.18.0/haxelib/src/tink/core/Signal.hx:129: characters 5-38
		return new Suspendable($create);
	}


	/**
	 *  Creates a new signal whose values will only be emitted when the filter function evalutes to `true`
	 * 
	 * @param SignalObject $this
	 * @param \Closure $f
	 * @param bool $gather
	 * 
	 * @return SignalObject
	 */
	static public function filter ($this1, $f, $gather = true) {
		#/Users/ut/haxe/haxe_libraries/tink_core/1.18.0/haxelib/src/tink/core/Signal.hx:36: lines 36-41
		if ($gather === null) {
			#/Users/ut/haxe/haxe_libraries/tink_core/1.18.0/haxelib/src/tink/core/Signal.hx:36: lines 36-41
			$gather = true;
		}
		#/Users/ut/haxe/haxe_libraries/tink_core/1.18.0/haxelib/src/tink/core/Signal.hx:37: characters 5-112
		$ret = new SimpleSignal(function ($cb)  use (&$f, &$this1) {
			#/Users/ut/haxe/haxe_libraries/tink_core/1.18.0/haxelib/src/tink/core/Signal.hx:37: characters 40-110
			return $this1->handle(function ($result)  use (&$f, &$cb) {
				#/Users/ut/haxe/haxe_libraries/tink_core/1.18.0/haxelib/src/tink/core/Signal.hx:37: characters 77-109
				if ($f($result)) {
					#/Users/ut/haxe/haxe_libraries/tink_core/1.18.0/haxelib/src/tink/core/Signal.hx:37: characters 92-109
					Callback_Impl_::invoke($cb, $result);
				}
			});
		});
		#/Users/ut/haxe/haxe_libraries/tink_core/1.18.0/haxelib/src/tink/core/Signal.hx:39: lines 39-40
		if ($gather) {
			#/Users/ut/haxe/haxe_libraries/tink_core/1.18.0/haxelib/src/tink/core/Signal.hx:39: characters 19-31
			return Signal_Impl_::gather($ret);
		} else {
			#/Users/ut/haxe/haxe_libraries/tink_core/1.18.0/haxelib/src/tink/core/Signal.hx:40: characters 12-15
			return $ret;
		}
	}


	/**
	 *  Creates a new signal by applying a transform function to the result.
	 *  Different from `map`, the transform function of `flatMap` returns a `Future`
	 * 
	 * @param SignalObject $this
	 * @param \Closure $f
	 * @param bool $gather
	 * 
	 * @return SignalObject
	 */
	static public function flatMap ($this1, $f, $gather = true) {
		#/Users/ut/haxe/haxe_libraries/tink_core/1.18.0/haxelib/src/tink/core/Signal.hx:26: lines 26-31
		if ($gather === null) {
			#/Users/ut/haxe/haxe_libraries/tink_core/1.18.0/haxelib/src/tink/core/Signal.hx:26: lines 26-31
			$gather = true;
		}
		#/Users/ut/haxe/haxe_libraries/tink_core/1.18.0/haxelib/src/tink/core/Signal.hx:27: characters 5-100
		$ret = new SimpleSignal(function ($cb)  use (&$f, &$this1) {
			#/Users/ut/haxe/haxe_libraries/tink_core/1.18.0/haxelib/src/tink/core/Signal.hx:27: characters 40-98
			return $this1->handle(function ($result)  use (&$f, &$cb) {
				#/Users/ut/haxe/haxe_libraries/tink_core/1.18.0/haxelib/src/tink/core/Signal.hx:27: characters 77-97
				$f($result)->handle($cb);
			});
		});
		#/Users/ut/haxe/haxe_libraries/tink_core/1.18.0/haxelib/src/tink/core/Signal.hx:29: lines 29-30
		if ($gather) {
			#/Users/ut/haxe/haxe_libraries/tink_core/1.18.0/haxelib/src/tink/core/Signal.hx:29: characters 19-31
			return Signal_Impl_::gather($ret);
		} else {
			#/Users/ut/haxe/haxe_libraries/tink_core/1.18.0/haxelib/src/tink/core/Signal.hx:30: characters 12-15
			return $ret;
		}
	}


	/**
	 *  Creates a new signal which stores the result internally.
	 *  Useful for tranformed signals, such as product of `map` and `flatMap`,
	 *  so that the transformation function will not be invoked for every callback
	 * 
	 * @param SignalObject $this
	 * 
	 * @return SignalObject
	 */
	static public function gather ($this1) {
		#/Users/ut/haxe/haxe_libraries/tink_core/1.18.0/haxelib/src/tink/core/Signal.hx:111: characters 5-25
		$ret = Signal_Impl_::trigger();
		#/Users/ut/haxe/haxe_libraries/tink_core/1.18.0/haxelib/src/tink/core/Signal.hx:112: characters 5-45
		$this1->handle(function ($x)  use (&$ret) {
			#/Users/ut/haxe/haxe_libraries/tink_core/1.18.0/haxelib/src/tink/core/Signal.hx:112: characters 30-44
			CallbackList_Impl_::invoke($ret->handlers, $x);
		});
		#/Users/ut/haxe/haxe_libraries/tink_core/1.18.0/haxelib/src/tink/core/Signal.hx:113: characters 5-26
		return $ret;
	}


	/**
	 * @param \Closure $generator
	 * 
	 * @return SignalObject
	 */
	static public function generate ($generator) {
		#/Users/ut/haxe/haxe_libraries/tink_core/1.18.0/haxelib/src/tink/core/Signal.hx:117: characters 5-25
		$ret = Signal_Impl_::trigger();
		#/Users/ut/haxe/haxe_libraries/tink_core/1.18.0/haxelib/src/tink/core/Signal.hx:118: characters 5-27
		$generator(new HxClosure($ret, 'trigger'));
		#/Users/ut/haxe/haxe_libraries/tink_core/1.18.0/haxelib/src/tink/core/Signal.hx:119: characters 5-15
		return $ret;
	}


	/**
	 *  Creates a new signal by joining `this` and `other`,
	 *  the new signal will be triggered whenever either of the two triggers
	 * 
	 * @param SignalObject $this
	 * @param SignalObject $other
	 * @param bool $gather
	 * 
	 * @return SignalObject
	 */
	static public function join ($this1, $other, $gather = true) {
		#/Users/ut/haxe/haxe_libraries/tink_core/1.18.0/haxelib/src/tink/core/Signal.hx:57: lines 57-65
		if ($gather === null) {
			#/Users/ut/haxe/haxe_libraries/tink_core/1.18.0/haxelib/src/tink/core/Signal.hx:57: lines 57-65
			$gather = true;
		}
		#/Users/ut/haxe/haxe_libraries/tink_core/1.18.0/haxelib/src/tink/core/Signal.hx:58: lines 58-61
		$ret = new SimpleSignal(function ($cb)  use (&$other, &$this1) {
			#/Users/ut/haxe/haxe_libraries/tink_core/1.18.0/haxelib/src/tink/core/Signal.hx:60: characters 16-50
			$a = $this1->handle($cb);
			#/Users/ut/haxe/haxe_libraries/tink_core/1.18.0/haxelib/src/tink/core/Signal.hx:60: characters 16-50
			return new LinkPair($a, $other->handle($cb));
		});
		#/Users/ut/haxe/haxe_libraries/tink_core/1.18.0/haxelib/src/tink/core/Signal.hx:63: lines 63-64
		if ($gather) {
			#/Users/ut/haxe/haxe_libraries/tink_core/1.18.0/haxelib/src/tink/core/Signal.hx:63: characters 19-31
			return Signal_Impl_::gather($ret);
		} else {
			#/Users/ut/haxe/haxe_libraries/tink_core/1.18.0/haxelib/src/tink/core/Signal.hx:64: characters 12-15
			return $ret;
		}
	}


	/**
	 *  Creates a new signal by applying a transform function to the result.
	 *  Different from `flatMap`, the transform function of `map` returns a sync value
	 * 
	 * @param SignalObject $this
	 * @param \Closure $f
	 * @param bool $gather
	 * 
	 * @return SignalObject
	 */
	static public function map ($this1, $f, $gather = true) {
		#/Users/ut/haxe/haxe_libraries/tink_core/1.18.0/haxelib/src/tink/core/Signal.hx:15: lines 15-20
		if ($gather === null) {
			#/Users/ut/haxe/haxe_libraries/tink_core/1.18.0/haxelib/src/tink/core/Signal.hx:15: lines 15-20
			$gather = true;
		}
		#/Users/ut/haxe/haxe_libraries/tink_core/1.18.0/haxelib/src/tink/core/Signal.hx:16: characters 5-100
		$ret = new SimpleSignal(function ($cb)  use (&$f, &$this1) {
			#/Users/ut/haxe/haxe_libraries/tink_core/1.18.0/haxelib/src/tink/core/Signal.hx:16: characters 40-98
			return $this1->handle(function ($result)  use (&$f, &$cb) {
				#/Users/ut/haxe/haxe_libraries/tink_core/1.18.0/haxelib/src/tink/core/Signal.hx:16: characters 87-96
				$this2 = $f($result);
				#/Users/ut/haxe/haxe_libraries/tink_core/1.18.0/haxelib/src/tink/core/Signal.hx:16: characters 77-97
				Callback_Impl_::invoke($cb, $this2);
			});
		});
		#/Users/ut/haxe/haxe_libraries/tink_core/1.18.0/haxelib/src/tink/core/Signal.hx:18: lines 18-19
		if ($gather) {
			#/Users/ut/haxe/haxe_libraries/tink_core/1.18.0/haxelib/src/tink/core/Signal.hx:18: characters 19-31
			return Signal_Impl_::gather($ret);
		} else {
			#/Users/ut/haxe/haxe_libraries/tink_core/1.18.0/haxelib/src/tink/core/Signal.hx:19: characters 12-15
			return $ret;
		}
	}


	/**
	 * @param SignalObject $this
	 * @param \Closure $condition
	 * 
	 * @return FutureObject
	 */
	static public function next ($this1, $condition = null) {
		#/Users/ut/haxe/haxe_libraries/tink_core/1.18.0/haxelib/src/tink/core/Signal.hx:97: characters 5-31
		return Signal_Impl_::nextTime($this1, $condition);
	}


	/**
	 *  Gets the next emitted value as a Future
	 * 
	 * @param SignalObject $this
	 * @param \Closure $condition
	 * 
	 * @return FutureObject
	 */
	static public function nextTime ($this1, $condition = null) {
		#/Users/ut/haxe/haxe_libraries/tink_core/1.18.0/haxelib/src/tink/core/Signal.hx:71: characters 5-32
		$ret = new FutureTrigger();
		#/Users/ut/haxe/haxe_libraries/tink_core/1.18.0/haxelib/src/tink/core/Signal.hx:72: lines 72-73
		$link = null;
		#/Users/ut/haxe/haxe_libraries/tink_core/1.18.0/haxelib/src/tink/core/Signal.hx:72: lines 72-73
		$immediate = false;
		#/Users/ut/haxe/haxe_libraries/tink_core/1.18.0/haxelib/src/tink/core/Signal.hx:75: lines 75-79
		$link = $this1->handle(function ($v)  use (&$immediate, &$condition, &$link, &$ret) {
			#/Users/ut/haxe/haxe_libraries/tink_core/1.18.0/haxelib/src/tink/core/Signal.hx:75: lines 75-79
			if (($condition === null) || $condition($v)) {
				#/Users/ut/haxe/haxe_libraries/tink_core/1.18.0/haxelib/src/tink/core/Signal.hx:76: characters 7-21
				$ret->trigger($v);
				#/Users/ut/haxe/haxe_libraries/tink_core/1.18.0/haxelib/src/tink/core/Signal.hx:77: lines 77-78
				if ($link === null) {
					#/Users/ut/haxe/haxe_libraries/tink_core/1.18.0/haxelib/src/tink/core/Signal.hx:77: characters 25-41
					$immediate = true;
				} else if ($link !== null) {
					#/Users/ut/haxe/haxe_libraries/tink_core/1.18.0/haxelib/src/tink/core/Signal.hx:78: characters 12-25
					$link->cancel();
				}
			}
		});
		#/Users/ut/haxe/haxe_libraries/tink_core/1.18.0/haxelib/src/tink/core/Signal.hx:81: lines 81-82
		if ($immediate) {
			#/Users/ut/haxe/haxe_libraries/tink_core/1.18.0/haxelib/src/tink/core/Signal.hx:82: characters 7-20
			if ($link !== null) {
				#/Users/ut/haxe/haxe_libraries/tink_core/1.18.0/haxelib/src/tink/core/Signal.hx:82: characters 7-20
				$link->cancel();
			}
		}
		#/Users/ut/haxe/haxe_libraries/tink_core/1.18.0/haxelib/src/tink/core/Signal.hx:84: characters 5-26
		return $ret;
	}


	/**
	 *  Transforms this signal and makes it emit `Noise`
	 * 
	 * @param SignalObject $this
	 * 
	 * @return SignalObject
	 */
	static public function noise ($this1) {
		#/Users/ut/haxe/haxe_libraries/tink_core/1.18.0/haxelib/src/tink/core/Signal.hx:103: characters 5-42
		return Signal_Impl_::map($this1, function ($_) {
			#/Users/ut/haxe/haxe_libraries/tink_core/1.18.0/haxelib/src/tink/core/Signal.hx:103: characters 29-41
			return Noise::Noise();
		});
	}


	/**
	 *  Creates a `Signal` from classic signals that has the semantics of `addListener` and `removeListener`
	 *  Example: `var signal = Signal.ofClassical(emitter.addListener.bind(eventType), emitter.removeListener.bind(eventType));`
	 * 
	 * @param \Closure $add
	 * @param \Closure $remove
	 * @param bool $gather
	 * 
	 * @return SignalObject
	 */
	static public function ofClassical ($add, $remove, $gather = true) {
		#/Users/ut/haxe/haxe_libraries/tink_core/1.18.0/haxelib/src/tink/core/Signal.hx:135: lines 135-145
		if ($gather === null) {
			#/Users/ut/haxe/haxe_libraries/tink_core/1.18.0/haxelib/src/tink/core/Signal.hx:135: lines 135-145
			$gather = true;
		}
		#/Users/ut/haxe/haxe_libraries/tink_core/1.18.0/haxelib/src/tink/core/Signal.hx:136: lines 136-140
		$ret = new SimpleSignal(function ($cb)  use (&$remove, &$add) {
			#/Users/ut/haxe/haxe_libraries/tink_core/1.18.0/haxelib/src/tink/core/Signal.hx:137: characters 7-41
			$f = function ($a)  use (&$cb) {
				#/Users/ut/haxe/haxe_libraries/tink_core/1.18.0/haxelib/src/tink/core/Signal.hx:137: characters 28-40
				Callback_Impl_::invoke($cb, $a);
			};
			#/Users/ut/haxe/haxe_libraries/tink_core/1.18.0/haxelib/src/tink/core/Signal.hx:138: characters 7-13
			$add($f);
			#/Users/ut/haxe/haxe_libraries/tink_core/1.18.0/haxelib/src/tink/core/Signal.hx:139: characters 14-25
			$f1 = $remove;
			#/Users/ut/haxe/haxe_libraries/tink_core/1.18.0/haxelib/src/tink/core/Signal.hx:139: characters 14-25
			$a1 = $f;
			#/Users/ut/haxe/haxe_libraries/tink_core/1.18.0/haxelib/src/tink/core/Signal.hx:139: characters 7-28
			return new SimpleLink(function ()  use (&$f1, &$a1) {
				#/Users/ut/haxe/haxe_libraries/tink_core/1.18.0/haxelib/src/tink/core/Signal.hx:139: characters 14-25
				$f1($a1);
			});
		});
		#/Users/ut/haxe/haxe_libraries/tink_core/1.18.0/haxelib/src/tink/core/Signal.hx:143: lines 143-144
		if ($gather) {
			#/Users/ut/haxe/haxe_libraries/tink_core/1.18.0/haxelib/src/tink/core/Signal.hx:143: characters 19-31
			return Signal_Impl_::gather($ret);
		} else {
			#/Users/ut/haxe/haxe_libraries/tink_core/1.18.0/haxelib/src/tink/core/Signal.hx:144: characters 12-15
			return $ret;
		}
	}


	/**
	 * @param SignalObject $this
	 * @param \Closure $selector
	 * @param bool $gather
	 * 
	 * @return SignalObject
	 */
	static public function select ($this1, $selector, $gather = true) {
		#/Users/ut/haxe/haxe_libraries/tink_core/1.18.0/haxelib/src/tink/core/Signal.hx:43: lines 43-51
		if ($gather === null) {
			#/Users/ut/haxe/haxe_libraries/tink_core/1.18.0/haxelib/src/tink/core/Signal.hx:43: lines 43-51
			$gather = true;
		}
		#/Users/ut/haxe/haxe_libraries/tink_core/1.18.0/haxelib/src/tink/core/Signal.hx:44: lines 44-47
		$ret = new SimpleSignal(function ($cb)  use (&$selector, &$this1) {
			#/Users/ut/haxe/haxe_libraries/tink_core/1.18.0/haxelib/src/tink/core/Signal.hx:44: lines 44-47
			return $this1->handle(function ($result)  use (&$selector, &$cb) {
				#/Users/ut/haxe/haxe_libraries/tink_core/1.18.0/haxelib/src/tink/core/Signal.hx:44: characters 84-100
				$_g = $selector($result);
				#/Users/ut/haxe/haxe_libraries/tink_core/1.18.0/haxelib/src/tink/core/Signal.hx:44: characters 84-100
				switch ($_g->index) {
					case 0:
						#/Users/ut/haxe/haxe_libraries/tink_core/1.18.0/haxelib/src/tink/core/Signal.hx:45: characters 21-33
						Callback_Impl_::invoke($cb, $_g->params[0]);
						break;
					case 1:
												break;
				}
			});
		});
		#/Users/ut/haxe/haxe_libraries/tink_core/1.18.0/haxelib/src/tink/core/Signal.hx:49: lines 49-50
		if ($gather) {
			#/Users/ut/haxe/haxe_libraries/tink_core/1.18.0/haxelib/src/tink/core/Signal.hx:49: characters 19-31
			return Signal_Impl_::gather($ret);
		} else {
			#/Users/ut/haxe/haxe_libraries/tink_core/1.18.0/haxelib/src/tink/core/Signal.hx:50: characters 12-15
			return $ret;
		}
	}


	/**
	 *  Creates a new `SignalTrigger`
	 * 
	 * @return SignalTrigger
	 */
	static public function trigger () {
		#/Users/ut/haxe/haxe_libraries/tink_core/1.18.0/haxelib/src/tink/core/Signal.hx:126: characters 5-31
		return new SignalTrigger();
	}


	/**
	 * @param SignalObject $this
	 * @param FutureObject $end
	 * 
	 * @return SignalObject
	 */
	static public function until ($this1, $end) {
		#/Users/ut/haxe/haxe_libraries/tink_core/1.18.0/haxelib/src/tink/core/Signal.hx:88: lines 88-90
		$ret = new Suspendable(function ($yield)  use (&$this1) {
			#/Users/ut/haxe/haxe_libraries/tink_core/1.18.0/haxelib/src/tink/core/Signal.hx:89: characters 24-49
			$this2 = $this1->handle($yield);
			#/Users/ut/haxe/haxe_libraries/tink_core/1.18.0/haxelib/src/tink/core/Signal.hx:89: characters 24-49
			if ($this2 === null) {
				#/Users/ut/haxe/haxe_libraries/tink_core/1.18.0/haxelib/src/tink/core/Signal.hx:89: characters 24-49
				return new HxClosure(CallbackLink_Impl_::class, 'noop');
			} else {
				#/Users/ut/haxe/haxe_libraries/tink_core/1.18.0/haxelib/src/tink/core/Signal.hx:89: characters 24-49
				return new HxClosure($this2, 'cancel');
			}
		});
		#/Users/ut/haxe/haxe_libraries/tink_core/1.18.0/haxelib/src/tink/core/Signal.hx:91: characters 5-25
		$end->handle(Callback_Impl_::fromNiladic(new HxClosure($ret, 'kill')));
		#/Users/ut/haxe/haxe_libraries/tink_core/1.18.0/haxelib/src/tink/core/Signal.hx:92: characters 5-15
		return $ret;
	}
}


Boot::registerClass(Signal_Impl_::class, 'tink.core._Signal.Signal_Impl_');