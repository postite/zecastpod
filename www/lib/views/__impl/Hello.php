<?php
/**
 * Generated by Haxe 4.0.0 (git build development @ 3018ab1)
 */

namespace views\__impl;

use \php\Boot;
use \tink\template\_Html\HtmlBuffer_Impl_;
use \tink\template\_Html\Html_Impl_;

class Hello {
	/**
	 * @param object $nav
	 * 
	 * @return string
	 */
	static public function render ($nav = null) {
		#src//views/Hello.tt:1: characters 29-56
		$ret = Html_Impl_::buffer();
		#src//views/Hello.tt:1: characters 29-56
		$ret->arr[$ret->length] = "\x0A   <h1>ZECASTPOD</h1>\x0A    <div class=\"ui vertical menu\">\x0A    ";
		#src//views/Hello.tt:1: characters 29-56
		++$ret->length;

		#src//views/Hello.tt:1: characters 131-134
		$it = $nav->iterator();
		#src//views/Hello.tt:1: characters 131-134
		while ($it->hasNext()) {
			#src//views/Hello.tt:1: characters 125-134
			$it1 = $it->next();
			#src//views/Hello.tt:1: characters 125-137
			$ret->arr[$ret->length] = "\x0A        <a class=\"item\" href=\"";
			#src//views/Hello.tt:1: characters 125-137
			++$ret->length;

			#src//views/Hello.tt:1: characters 170-176
			$ret->arr[$ret->length] = $it1->url;
			#src//views/Hello.tt:1: characters 170-176
			++$ret->length;

			#src//views/Hello.tt:1: characters 170-178
			$ret->arr[$ret->length] = "\">\x0A          <h4 class=\"ui header\">";
			#src//views/Hello.tt:1: characters 170-178
			++$ret->length;

			#src//views/Hello.tt:1: characters 215-223
			$ret->arr[$ret->length] = $it1->title;
			#src//views/Hello.tt:1: characters 215-223
			++$ret->length;

			#src//views/Hello.tt:1: characters 215-225
			$ret->arr[$ret->length] = "</h4>\x0A          <p>";
			#src//views/Hello.tt:1: characters 215-225
			++$ret->length;

			#src//views/Hello.tt:1: characters 246-260
			$ret->arr[$ret->length] = $it1->description;
			#src//views/Hello.tt:1: characters 246-260
			++$ret->length;

			#src//views/Hello.tt:1: characters 246-262
			$ret->arr[$ret->length] = "</p>\x0A        </a>\x0A      ";
			#src//views/Hello.tt:1: characters 246-262
			++$ret->length;

		}

		#src//views/Hello.tt:1: characters 288-293
		$ret->arr[$ret->length] = "\x0A        <a class=\"item\" href=\"/up\">\x0A          <h4 class=\"ui header\">Upload</h4>\x0A          <p>ajouter du contenu</p>\x0A        </a>\x0A        <a class=\"item\" href=\"/viewrss\">\x0A          <h4 class=\"ui header\">view rss</h4>\x0A          <p>back home</p>\x0A        </a>\x0A        <a class=\"item\" href=\"/\">\x0A          <h4 class=\"ui header\">home</h4>\x0A          <p>back home</p>\x0A        </a>\x0A      </div>\x0A    ";
		#src//views/Hello.tt:1: characters 288-293
		++$ret->length;


		#/Users/ut/haxe/haxe_libraries/tink_template/0.3.3/github/947e330e7f57a4877b12c253baac6311cfb5530b/src/tink/template/Generator.hx:121: characters 19-30
		return HtmlBuffer_Impl_::collapse($ret);
	}
}


Boot::registerClass(Hello::class, 'views.__impl.Hello');