<?php
/**
 * Generated by Haxe 4.0.0 (git build development @ 3018ab1)
 */

namespace tink\core\_Callback;

use \php\Boot;

final class CallbackList_Impl_ {


	/**
	 * @return \Array_hx
	 */
	static public function _new () {
		#/Users/ut/haxe/haxe_libraries/tink_core/1.18.0/haxelib/src/tink/core/Callback.hx:153: character 17
		return new \Array_hx();
	}


	/**
	 * @param \Array_hx $this
	 * @param \Closure $cb
	 * 
	 * @return LinkObject
	 */
	static public function add ($this1, $cb) {
		#/Users/ut/haxe/haxe_libraries/tink_core/1.18.0/haxelib/src/tink/core/Callback.hx:160: characters 5-39
		$node = new ListCell($cb, $this1);
		#/Users/ut/haxe/haxe_libraries/tink_core/1.18.0/haxelib/src/tink/core/Callback.hx:161: characters 5-20
		$this1->arr[$this1->length] = $node;
		#/Users/ut/haxe/haxe_libraries/tink_core/1.18.0/haxelib/src/tink/core/Callback.hx:161: characters 5-20
		++$this1->length;

		#/Users/ut/haxe/haxe_libraries/tink_core/1.18.0/haxelib/src/tink/core/Callback.hx:162: characters 5-16
		return $node;
	}


	/**
	 * @param \Array_hx $this
	 * 
	 * @return void
	 */
	static public function clear ($this1) {
		#/Users/ut/haxe/haxe_libraries/tink_core/1.18.0/haxelib/src/tink/core/Callback.hx:170: lines 170-171
		$_g = 0;
		#/Users/ut/haxe/haxe_libraries/tink_core/1.18.0/haxelib/src/tink/core/Callback.hx:170: lines 170-171
		$_g1 = $this1->splice(0, $this1->length);
		#/Users/ut/haxe/haxe_libraries/tink_core/1.18.0/haxelib/src/tink/core/Callback.hx:170: lines 170-171
		while ($_g < $_g1->length) {
			#/Users/ut/haxe/haxe_libraries/tink_core/1.18.0/haxelib/src/tink/core/Callback.hx:170: characters 10-14
			$cell = ($_g1->arr[$_g] ?? null);
			#/Users/ut/haxe/haxe_libraries/tink_core/1.18.0/haxelib/src/tink/core/Callback.hx:170: lines 170-171
			$_g = $_g + 1;
			#/Users/ut/haxe/haxe_libraries/tink_core/1.18.0/haxelib/src/tink/core/Callback.hx:171: characters 7-19
			$cell->clear();
		}
	}


	/**
	 * @param \Array_hx $this
	 * 
	 * @return int
	 */
	static public function get_length ($this1) {
		#/Users/ut/haxe/haxe_libraries/tink_core/1.18.0/haxelib/src/tink/core/Callback.hx:157: characters 5-23
		return $this1->length;
	}


	/**
	 * @param \Array_hx $this
	 * @param mixed $data
	 * 
	 * @return void
	 */
	static public function invoke ($this1, $data) {
		#/Users/ut/haxe/haxe_libraries/tink_core/1.18.0/haxelib/src/tink/core/Callback.hx:166: lines 166-167
		$_g = 0;
		#/Users/ut/haxe/haxe_libraries/tink_core/1.18.0/haxelib/src/tink/core/Callback.hx:166: lines 166-167
		$_g1 = $this1->copy();
		#/Users/ut/haxe/haxe_libraries/tink_core/1.18.0/haxelib/src/tink/core/Callback.hx:166: lines 166-167
		while ($_g < $_g1->length) {
			#/Users/ut/haxe/haxe_libraries/tink_core/1.18.0/haxelib/src/tink/core/Callback.hx:166: characters 10-14
			$cell = ($_g1->arr[$_g] ?? null);
			#/Users/ut/haxe/haxe_libraries/tink_core/1.18.0/haxelib/src/tink/core/Callback.hx:166: lines 166-167
			$_g = $_g + 1;
			#/Users/ut/haxe/haxe_libraries/tink_core/1.18.0/haxelib/src/tink/core/Callback.hx:167: characters 7-24
			if ($cell->cb !== null) {
				#/Users/ut/haxe/haxe_libraries/tink_core/1.18.0/haxelib/src/tink/core/Callback.hx:167: characters 7-24
				Callback_Impl_::invoke($cell->cb, $data);
			}
		}
	}


	/**
	 * @param \Array_hx $this
	 * @param mixed $data
	 * 
	 * @return void
	 */
	static public function invokeAndClear ($this1, $data) {
		#/Users/ut/haxe/haxe_libraries/tink_core/1.18.0/haxelib/src/tink/core/Callback.hx:174: lines 174-175
		$_g = 0;
		#/Users/ut/haxe/haxe_libraries/tink_core/1.18.0/haxelib/src/tink/core/Callback.hx:174: lines 174-175
		$_g1 = $this1->splice(0, $this1->length);
		#/Users/ut/haxe/haxe_libraries/tink_core/1.18.0/haxelib/src/tink/core/Callback.hx:174: lines 174-175
		while ($_g < $_g1->length) {
			#/Users/ut/haxe/haxe_libraries/tink_core/1.18.0/haxelib/src/tink/core/Callback.hx:174: characters 10-14
			$cell = ($_g1->arr[$_g] ?? null);
			#/Users/ut/haxe/haxe_libraries/tink_core/1.18.0/haxelib/src/tink/core/Callback.hx:174: lines 174-175
			$_g = $_g + 1;
			#/Users/ut/haxe/haxe_libraries/tink_core/1.18.0/haxelib/src/tink/core/Callback.hx:175: characters 7-24
			if ($cell->cb !== null) {
				#/Users/ut/haxe/haxe_libraries/tink_core/1.18.0/haxelib/src/tink/core/Callback.hx:175: characters 7-24
				Callback_Impl_::invoke($cell->cb, $data);
			}
		}
	}
}


Boot::registerClass(CallbackList_Impl_::class, 'tink.core._Callback.CallbackList_Impl_');
Boot::registerGetters('tink\\core\\_Callback\\CallbackList_Impl_', [
	'length' => true
]);
