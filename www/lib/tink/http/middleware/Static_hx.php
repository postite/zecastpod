<?php
/**
 * Generated by Haxe 4.0.0 (git build development @ 3018ab1)
 */

namespace tink\http\middleware;

use \haxe\io\Path;
use \tink\http\MiddlewareObject;
use \php\Boot;
use \tink\http\HandlerObject;

class Static_hx implements MiddlewareObject {
	/**
	 * @var object
	 */
	public $options;
	/**
	 * @var string
	 */
	public $prefix;
	/**
	 * @var string
	 */
	public $root;


	/**
	 *  @param localFolder - Local folder to serve files, relative to `Sys.programPath()`
	 *  @param urlPrefix - Match URLs that start with this string, e.g. "/" matches all urls
	 * 
	 * @param string $localFolder
	 * @param string $urlPrefix
	 * @param object $options
	 * 
	 * @return void
	 */
	public function __construct ($localFolder, $urlPrefix, $options = null) {
		#/Users/ut/haxe/haxe_libraries/tink_http_middleware/0.1.0/github/82c73bb5c4cd37a67f711b71a42e7ec2031d6894/src/tink/http/middleware/Static.hx:42: characters 3-133
		$this->root = Path::addTrailingSlash((Path::isAbsolute($localFolder) ? $localFolder : Path::normalize((Path::directory(\Sys::programPath())??'null') . (("/" . ($localFolder??'null'))??'null'))));
		#/Users/ut/haxe/haxe_libraries/tink_http_middleware/0.1.0/github/82c73bb5c4cd37a67f711b71a42e7ec2031d6894/src/tink/http/middleware/Static.hx:43: characters 19-42
		$_g = (0 >= strlen($urlPrefix) ? null : ord($urlPrefix[0]));
		#/Users/ut/haxe/haxe_libraries/tink_http_middleware/0.1.0/github/82c73bb5c4cd37a67f711b71a42e7ec2031d6894/src/tink/http/middleware/Static.hx:43: lines 43-46
		$this->prefix = ($_g === null ? "/" . ($urlPrefix??'null') : ($_g === 47 ? $urlPrefix : "/" . ($urlPrefix??'null')));
		#/Users/ut/haxe/haxe_libraries/tink_http_middleware/0.1.0/github/82c73bb5c4cd37a67f711b71a42e7ec2031d6894/src/tink/http/middleware/Static.hx:47: characters 3-25
		$this->options = $options;
	}


	/**
	 * @param HandlerObject $handler
	 * 
	 * @return HandlerObject
	 */
	public function apply ($handler) {
		#/Users/ut/haxe/haxe_libraries/tink_http_middleware/0.1.0/github/82c73bb5c4cd37a67f711b71a42e7ec2031d6894/src/tink/http/middleware/Static.hx:51: characters 3-59
		return new StaticHandler($this->root, $this->prefix, $this->options, $handler);
	}
}


Boot::registerClass(Static_hx::class, 'tink.http.middleware.Static');
