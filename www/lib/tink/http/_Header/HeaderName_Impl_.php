<?php
/**
 * Generated by Haxe 4.0.0 (git build development @ 3018ab1)
 */

namespace tink\http\_Header;

use \php\Boot;

final class HeaderName_Impl_ {


	/**
	 * @param string $s
	 * 
	 * @return string
	 */
	static public function _new ($s) {
		#/Users/ut/haxe/haxe_libraries/tink_http/0.8.2/github/403eb075dff5d7b8ec4a9e08052eb01e1e196722/src/tink/http/Header.hx:235: character 10
		return $s;
	}


	/**
	 * @param string $s
	 * 
	 * @return string
	 */
	static public function ofString ($s) {
		#/Users/ut/haxe/haxe_libraries/tink_http/0.8.2/github/403eb075dff5d7b8ec4a9e08052eb01e1e196722/src/tink/http/Header.hx:238: characters 12-43
		return strtolower($s);
	}
}


Boot::registerClass(HeaderName_Impl_::class, 'tink.http._Header.HeaderName_Impl_');
