<?php
/**
 * Generated by Haxe 4.0.0 (git build development @ 3018ab1)
 */

namespace views\__impl;

use \php\Boot;
use \tink\template\_Html\HtmlBuffer_Impl_;
use \tink\template\_Html\Html_Impl_;

class HeaderHome {
	/**
	 * @return string
	 */
	static public function render () {
		#src//views/HeaderHome.tt:1: characters 25-29
		$ret = Html_Impl_::buffer();
		#src//views/HeaderHome.tt:1: characters 25-29
		$ret->arr[$ret->length] = "\x0A<div class=\"ui sticky\">\x0A      <img id=\"noyeux\" src=\"/noyeuxjoel.jpeg\">\x0A    </div>\x0A";
		#src//views/HeaderHome.tt:1: characters 25-29
		++$ret->length;

		#/Users/ut/haxe/haxe_libraries/tink_template/0.3.3/github/947e330e7f57a4877b12c253baac6311cfb5530b/src/tink/template/Generator.hx:121: characters 19-30
		return HtmlBuffer_Impl_::collapse($ret);
	}
}


Boot::registerClass(HeaderHome::class, 'views.__impl.HeaderHome');