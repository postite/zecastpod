<?php
/**
 * Generated by Haxe 4.0.0 (git build development @ 3018ab1)
 */

namespace tink\http\containers;

use \php\_Boot\HxClosure;
use \tink\core\Outcome;
use \tink\http\HeaderField;
use \php\Boot;
use \tink\http\_Method\Method_Impl_;
use \tink\io\_Worker\Worker_Impl_;
use \tink\core\TypedError;
use \tink\core\_Future\FutureObject;
use \tink\_Url\Url_Impl_;
use \tink\core\_Future\SyncFuture;
use \tink\http\IncomingRequestBody;
use \php\_NativeArray\NativeArrayIterator;
use \tink\io\std\InputSource;
use \tink\http\ContainerResult;
use \php\_Boot\HxString;
use \php\Lib;
use \tink\core\_Future\Future_Impl_;
use \tink\http\IncomingRequestHeader;
use \haxe\io\_BytesData\Container as _BytesDataContainer;
use \haxe\io\Bytes;
use \tink\http\IncomingRequest;
use \tink\http\HandlerObject;
use \tink\http\_Header\HeaderName_Impl_;
use \tink\_Chunk\Chunk_Impl_;
use \tink\core\Noise;
use \sys\io\File;
use \tink\http\Container;
use \tink\io\_Sink\SinkYielding_Impl_;
use \tink\io\_Source\Source_Impl_;
use \tink\core\NamedWith;
use \tink\core\_Lazy\LazyConst;
use \php\_Boot\HxAnon;
use \sys\io\FileOutput;
use \tink\http\BodyPart;

class PhpContainer implements Container {
	/**
	 * @var PhpContainer
	 */
	static public $inst;


	/**
	 * @param mixed $a
	 * @param \Closure $process
	 * 
	 * @return \Array_hx
	 */
	static public function getParts ($a, $process) {
		#/Users/ut/haxe/haxe_libraries/tink_http/0.8.2/github/403eb075dff5d7b8ec4a9e08052eb01e1e196722/src/tink/http/containers/PhpContainer.hx:25: characters 5-49
		$map = Lib::hashOfAssociativeArray($a);
		#/Users/ut/haxe/haxe_libraries/tink_http/0.8.2/github/403eb075dff5d7b8ec4a9e08052eb01e1e196722/src/tink/http/containers/PhpContainer.hx:26: characters 5-18
		$ret = new \Array_hx();
		#/Users/ut/haxe/haxe_libraries/tink_http/0.8.2/github/403eb075dff5d7b8ec4a9e08052eb01e1e196722/src/tink/http/containers/PhpContainer.hx:27: characters 18-28
		$name = new NativeArrayIterator(array_map("strval", array_keys($map->data)));
		#/Users/ut/haxe/haxe_libraries/tink_http/0.8.2/github/403eb075dff5d7b8ec4a9e08052eb01e1e196722/src/tink/http/containers/PhpContainer.hx:27: characters 18-28
		while ($name->hasNext()) {
			#/Users/ut/haxe/haxe_libraries/tink_http/0.8.2/github/403eb075dff5d7b8ec4a9e08052eb01e1e196722/src/tink/http/containers/PhpContainer.hx:27: lines 27-34
			$name1 = $name->next();
			#/Users/ut/haxe/haxe_libraries/tink_http/0.8.2/github/403eb075dff5d7b8ec4a9e08052eb01e1e196722/src/tink/http/containers/PhpContainer.hx:29: lines 29-33
			if ($process(($map->data[$name1] ?? null)) !== null) {
				#/Users/ut/haxe/haxe_libraries/tink_http/0.8.2/github/403eb075dff5d7b8ec4a9e08052eb01e1e196722/src/tink/http/containers/PhpContainer.hx:30: lines 30-33
				$x = new NamedWith($name1, $process(($map->data[$name1] ?? null)));
				#/Users/ut/haxe/haxe_libraries/tink_http/0.8.2/github/403eb075dff5d7b8ec4a9e08052eb01e1e196722/src/tink/http/containers/PhpContainer.hx:30: lines 30-33
				$ret->arr[$ret->length] = $x;
				#/Users/ut/haxe/haxe_libraries/tink_http/0.8.2/github/403eb075dff5d7b8ec4a9e08052eb01e1e196722/src/tink/http/containers/PhpContainer.hx:30: lines 30-33
				++$ret->length;
			}
		}

		#/Users/ut/haxe/haxe_libraries/tink_http/0.8.2/github/403eb075dff5d7b8ec4a9e08052eb01e1e196722/src/tink/http/containers/PhpContainer.hx:35: characters 5-15
		return $ret;
	}


	/**
	 * @param string $key
	 * 
	 * @return string
	 */
	static public function getServerVar ($key) {
		#/Users/ut/haxe/haxe_libraries/tink_http/0.8.2/github/403eb075dff5d7b8ec4a9e08052eb01e1e196722/src/tink/http/containers/PhpContainer.hx:18: characters 5-49
		return $_SERVER[$key];
	}


	/**
	 * @return void
	 */
	public function __construct () {
	}


	/**
	 * @return IncomingRequest
	 */
	public function getRequest () {
		#/Users/ut/haxe/haxe_libraries/tink_http/0.8.2/github/403eb075dff5d7b8ec4a9e08052eb01e1e196722/src/tink/http/containers/PhpContainer.hx:40: characters 7-79
		$header = Method_Impl_::ofString($_SERVER["REQUEST_METHOD"], function ($_) {
			#/Users/ut/haxe/haxe_libraries/tink_http/0.8.2/github/403eb075dff5d7b8ec4a9e08052eb01e1e196722/src/tink/http/containers/PhpContainer.hx:40: characters 68-78
			return "GET";
		});
		#/Users/ut/haxe/haxe_libraries/tink_http/0.8.2/github/403eb075dff5d7b8ec4a9e08052eb01e1e196722/src/tink/http/containers/PhpContainer.hx:41: characters 7-34
		$header1 = Url_Impl_::fromString($_SERVER["REQUEST_URI"]);
		#/Users/ut/haxe/haxe_libraries/tink_http/0.8.2/github/403eb075dff5d7b8ec4a9e08052eb01e1e196722/src/tink/http/containers/PhpContainer.hx:44: lines 44-72
		$header2 = null;
		#/Users/ut/haxe/haxe_libraries/tink_http/0.8.2/github/403eb075dff5d7b8ec4a9e08052eb01e1e196722/src/tink/http/containers/PhpContainer.hx:44: lines 44-72
		if (function_exists("getallheaders")) {
			#/Users/ut/haxe/haxe_libraries/tink_http/0.8.2/github/403eb075dff5d7b8ec4a9e08052eb01e1e196722/src/tink/http/containers/PhpContainer.hx:45: characters 11-87
			$raw = Lib::hashOfAssociativeArray(getallheaders());
			#/Users/ut/haxe/haxe_libraries/tink_http/0.8.2/github/403eb075dff5d7b8ec4a9e08052eb01e1e196722/src/tink/http/containers/PhpContainer.hx:46: characters 11-70
			$_g = new \Array_hx();
			#/Users/ut/haxe/haxe_libraries/tink_http/0.8.2/github/403eb075dff5d7b8ec4a9e08052eb01e1e196722/src/tink/http/containers/PhpContainer.hx:46: characters 25-35
			$name = new NativeArrayIterator(array_map("strval", array_keys($raw->data)));
			#/Users/ut/haxe/haxe_libraries/tink_http/0.8.2/github/403eb075dff5d7b8ec4a9e08052eb01e1e196722/src/tink/http/containers/PhpContainer.hx:46: characters 25-35
			while ($name->hasNext()) {
				#/Users/ut/haxe/haxe_libraries/tink_http/0.8.2/github/403eb075dff5d7b8ec4a9e08052eb01e1e196722/src/tink/http/containers/PhpContainer.hx:46: characters 12-69
				$name1 = $name->next();
				#/Users/ut/haxe/haxe_libraries/tink_http/0.8.2/github/403eb075dff5d7b8ec4a9e08052eb01e1e196722/src/tink/http/containers/PhpContainer.hx:46: characters 53-57
				$x = HeaderName_Impl_::ofString($name1);
				#/Users/ut/haxe/haxe_libraries/tink_http/0.8.2/github/403eb075dff5d7b8ec4a9e08052eb01e1e196722/src/tink/http/containers/PhpContainer.hx:46: characters 37-69
				$x1 = new HeaderField($x, ($raw->data[$name1] ?? null));
				#/Users/ut/haxe/haxe_libraries/tink_http/0.8.2/github/403eb075dff5d7b8ec4a9e08052eb01e1e196722/src/tink/http/containers/PhpContainer.hx:46: characters 37-69
				$_g->arr[$_g->length] = $x1;
				#/Users/ut/haxe/haxe_libraries/tink_http/0.8.2/github/403eb075dff5d7b8ec4a9e08052eb01e1e196722/src/tink/http/containers/PhpContainer.hx:46: characters 37-69
				++$_g->length;
			}

			#/Users/ut/haxe/haxe_libraries/tink_http/0.8.2/github/403eb075dff5d7b8ec4a9e08052eb01e1e196722/src/tink/http/containers/PhpContainer.hx:44: lines 44-72
			$header2 = $_g;
		} else {
			#/Users/ut/haxe/haxe_libraries/tink_http/0.8.2/github/403eb075dff5d7b8ec4a9e08052eb01e1e196722/src/tink/http/containers/PhpContainer.hx:48: characters 11-79
			$h = Lib::hashOfAssociativeArray($_SERVER);
			#/Users/ut/haxe/haxe_libraries/tink_http/0.8.2/github/403eb075dff5d7b8ec4a9e08052eb01e1e196722/src/tink/http/containers/PhpContainer.hx:49: characters 11-28
			$headers = new \Array_hx();
			#/Users/ut/haxe/haxe_libraries/tink_http/0.8.2/github/403eb075dff5d7b8ec4a9e08052eb01e1e196722/src/tink/http/containers/PhpContainer.hx:51: characters 20-28
			$k = new NativeArrayIterator(array_map("strval", array_keys($h->data)));
			#/Users/ut/haxe/haxe_libraries/tink_http/0.8.2/github/403eb075dff5d7b8ec4a9e08052eb01e1e196722/src/tink/http/containers/PhpContainer.hx:51: characters 20-28
			while ($k->hasNext()) {
				#/Users/ut/haxe/haxe_libraries/tink_http/0.8.2/github/403eb075dff5d7b8ec4a9e08052eb01e1e196722/src/tink/http/containers/PhpContainer.hx:51: lines 51-60
				$k1 = $k->next();
				#/Users/ut/haxe/haxe_libraries/tink_http/0.8.2/github/403eb075dff5d7b8ec4a9e08052eb01e1e196722/src/tink/http/containers/PhpContainer.hx:52: lines 52-58
				$key = null;
				#/Users/ut/haxe/haxe_libraries/tink_http/0.8.2/github/403eb075dff5d7b8ec4a9e08052eb01e1e196722/src/tink/http/containers/PhpContainer.hx:52: lines 52-58
				switch ($k1) {
					case "CONTENT_LENGTH":
						#/Users/ut/haxe/haxe_libraries/tink_http/0.8.2/github/403eb075dff5d7b8ec4a9e08052eb01e1e196722/src/tink/http/containers/PhpContainer.hx:54: lines 54-57
						if (!array_key_exists("HTTP_CONTENT_LENGTH", $h->data)) {
							#/Users/ut/haxe/haxe_libraries/tink_http/0.8.2/github/403eb075dff5d7b8ec4a9e08052eb01e1e196722/src/tink/http/containers/PhpContainer.hx:52: lines 52-58
							$key = "Content-Length";
						} else if (HxString::substr($k1, 0, 5) === "HTTP_") {
							#/Users/ut/haxe/haxe_libraries/tink_http/0.8.2/github/403eb075dff5d7b8ec4a9e08052eb01e1e196722/src/tink/http/containers/PhpContainer.hx:52: lines 52-58
							$key = \StringTools::replace(HxString::substr($k1, 5), "_", "-");
						} else {
							#/Users/ut/haxe/haxe_libraries/tink_http/0.8.2/github/403eb075dff5d7b8ec4a9e08052eb01e1e196722/src/tink/http/containers/PhpContainer.hx:57: characters 23-31
							continue 2;
						}
						break;
					case "CONTENT_MD5":
						#/Users/ut/haxe/haxe_libraries/tink_http/0.8.2/github/403eb075dff5d7b8ec4a9e08052eb01e1e196722/src/tink/http/containers/PhpContainer.hx:55: lines 55-57
						if (!array_key_exists("HTTP_CONTENT_MD5", $h->data)) {
							#/Users/ut/haxe/haxe_libraries/tink_http/0.8.2/github/403eb075dff5d7b8ec4a9e08052eb01e1e196722/src/tink/http/containers/PhpContainer.hx:52: lines 52-58
							$key = "Content-Md5";
						} else if (HxString::substr($k1, 0, 5) === "HTTP_") {
							#/Users/ut/haxe/haxe_libraries/tink_http/0.8.2/github/403eb075dff5d7b8ec4a9e08052eb01e1e196722/src/tink/http/containers/PhpContainer.hx:52: lines 52-58
							$key = \StringTools::replace(HxString::substr($k1, 5), "_", "-");
						} else {
							#/Users/ut/haxe/haxe_libraries/tink_http/0.8.2/github/403eb075dff5d7b8ec4a9e08052eb01e1e196722/src/tink/http/containers/PhpContainer.hx:57: characters 23-31
							continue 2;
						}
						break;
					case "CONTENT_TYPE":
						#/Users/ut/haxe/haxe_libraries/tink_http/0.8.2/github/403eb075dff5d7b8ec4a9e08052eb01e1e196722/src/tink/http/containers/PhpContainer.hx:53: lines 53-57
						if (!array_key_exists("HTTP_CONTENT_TYPE", $h->data)) {
							#/Users/ut/haxe/haxe_libraries/tink_http/0.8.2/github/403eb075dff5d7b8ec4a9e08052eb01e1e196722/src/tink/http/containers/PhpContainer.hx:52: lines 52-58
							$key = "Content-Type";
						} else if (HxString::substr($k1, 0, 5) === "HTTP_") {
							#/Users/ut/haxe/haxe_libraries/tink_http/0.8.2/github/403eb075dff5d7b8ec4a9e08052eb01e1e196722/src/tink/http/containers/PhpContainer.hx:52: lines 52-58
							$key = \StringTools::replace(HxString::substr($k1, 5), "_", "-");
						} else {
							#/Users/ut/haxe/haxe_libraries/tink_http/0.8.2/github/403eb075dff5d7b8ec4a9e08052eb01e1e196722/src/tink/http/containers/PhpContainer.hx:57: characters 23-31
							continue 2;
						}
						break;
					default:
						#/Users/ut/haxe/haxe_libraries/tink_http/0.8.2/github/403eb075dff5d7b8ec4a9e08052eb01e1e196722/src/tink/http/containers/PhpContainer.hx:56: lines 56-57
						if (HxString::substr($k1, 0, 5) === "HTTP_") {
							#/Users/ut/haxe/haxe_libraries/tink_http/0.8.2/github/403eb075dff5d7b8ec4a9e08052eb01e1e196722/src/tink/http/containers/PhpContainer.hx:52: lines 52-58
							$key = \StringTools::replace(HxString::substr($k1, 5), "_", "-");
						} else {
							#/Users/ut/haxe/haxe_libraries/tink_http/0.8.2/github/403eb075dff5d7b8ec4a9e08052eb01e1e196722/src/tink/http/containers/PhpContainer.hx:57: characters 23-31
							continue 2;
						}
						break;
				}
				#/Users/ut/haxe/haxe_libraries/tink_http/0.8.2/github/403eb075dff5d7b8ec4a9e08052eb01e1e196722/src/tink/http/containers/PhpContainer.hx:59: characters 13-31
				$name2 = HeaderName_Impl_::ofString($key);
				#/Users/ut/haxe/haxe_libraries/tink_http/0.8.2/github/403eb075dff5d7b8ec4a9e08052eb01e1e196722/src/tink/http/containers/PhpContainer.hx:59: characters 13-31
				$x2 = new HeaderField($name2, ($h->data[$k1] ?? null));
				#/Users/ut/haxe/haxe_libraries/tink_http/0.8.2/github/403eb075dff5d7b8ec4a9e08052eb01e1e196722/src/tink/http/containers/PhpContainer.hx:59: characters 13-31
				$headers->arr[$headers->length] = $x2;
				#/Users/ut/haxe/haxe_libraries/tink_http/0.8.2/github/403eb075dff5d7b8ec4a9e08052eb01e1e196722/src/tink/http/containers/PhpContainer.hx:59: characters 13-31
				++$headers->length;

			}

			#/Users/ut/haxe/haxe_libraries/tink_http/0.8.2/github/403eb075dff5d7b8ec4a9e08052eb01e1e196722/src/tink/http/containers/PhpContainer.hx:61: lines 61-70
			if (!array_key_exists("HTTP_AUTHORIZATION", $h->data)) {
				#/Users/ut/haxe/haxe_libraries/tink_http/0.8.2/github/403eb075dff5d7b8ec4a9e08052eb01e1e196722/src/tink/http/containers/PhpContainer.hx:62: lines 62-69
				if (array_key_exists("REDIRECT_HTTP_AUTHORIZATION", $h->data)) {
					#/Users/ut/haxe/haxe_libraries/tink_http/0.8.2/github/403eb075dff5d7b8ec4a9e08052eb01e1e196722/src/tink/http/containers/PhpContainer.hx:63: characters 17-75
					$name3 = HeaderName_Impl_::ofString("Authorization");
					#/Users/ut/haxe/haxe_libraries/tink_http/0.8.2/github/403eb075dff5d7b8ec4a9e08052eb01e1e196722/src/tink/http/containers/PhpContainer.hx:63: characters 17-75
					$x3 = new HeaderField($name3, ($h->data["REDIRECT_HTTP_AUTHORIZATION"] ?? null));
					#/Users/ut/haxe/haxe_libraries/tink_http/0.8.2/github/403eb075dff5d7b8ec4a9e08052eb01e1e196722/src/tink/http/containers/PhpContainer.hx:63: characters 17-75
					$headers->arr[$headers->length] = $x3;
					#/Users/ut/haxe/haxe_libraries/tink_http/0.8.2/github/403eb075dff5d7b8ec4a9e08052eb01e1e196722/src/tink/http/containers/PhpContainer.hx:63: characters 17-75
					++$headers->length;
				} else if (array_key_exists("PHP_AUTH_USER", $h->data)) {
					#/Users/ut/haxe/haxe_libraries/tink_http/0.8.2/github/403eb075dff5d7b8ec4a9e08052eb01e1e196722/src/tink/http/containers/PhpContainer.hx:65: characters 17-81
					$basic = (array_key_exists("PHP_AUTH_PW", $h->data) ? ($h->data["PHP_AUTH_PW"] ?? null) : "");
					#/Users/ut/haxe/haxe_libraries/tink_http/0.8.2/github/403eb075dff5d7b8ec4a9e08052eb01e1e196722/src/tink/http/containers/PhpContainer.hx:66: characters 17-146
					$name4 = HeaderName_Impl_::ofString("Authorization");
					#/Users/ut/haxe/haxe_libraries/tink_http/0.8.2/github/403eb075dff5d7b8ec4a9e08052eb01e1e196722/src/tink/http/containers/PhpContainer.hx:66: characters 75-121
					$s = ($h->data["PHP_AUTH_USER"] ?? null);
					#/Users/ut/haxe/haxe_libraries/tink_http/0.8.2/github/403eb075dff5d7b8ec4a9e08052eb01e1e196722/src/tink/http/containers/PhpContainer.hx:66: characters 49-122
					$result = base64_encode((new Bytes(strlen($s), new _BytesDataContainer($s)))->toString());
					#/Users/ut/haxe/haxe_libraries/tink_http/0.8.2/github/403eb075dff5d7b8ec4a9e08052eb01e1e196722/src/tink/http/containers/PhpContainer.hx:66: characters 17-146
					$headers->arr[$headers->length] = new HeaderField($name4, "Basic " . ($result??'null') . ((":" . ($basic??'null'))??'null'));
					#/Users/ut/haxe/haxe_libraries/tink_http/0.8.2/github/403eb075dff5d7b8ec4a9e08052eb01e1e196722/src/tink/http/containers/PhpContainer.hx:66: characters 17-146
					++$headers->length;

				} else if (array_key_exists("PHP_AUTH_DIGEST", $h->data)) {
					#/Users/ut/haxe/haxe_libraries/tink_http/0.8.2/github/403eb075dff5d7b8ec4a9e08052eb01e1e196722/src/tink/http/containers/PhpContainer.hx:68: characters 17-63
					$name5 = HeaderName_Impl_::ofString("Authorization");
					#/Users/ut/haxe/haxe_libraries/tink_http/0.8.2/github/403eb075dff5d7b8ec4a9e08052eb01e1e196722/src/tink/http/containers/PhpContainer.hx:68: characters 17-63
					$x4 = new HeaderField($name5, ($h->data["PHP_AUTH_DIGEST"] ?? null));
					#/Users/ut/haxe/haxe_libraries/tink_http/0.8.2/github/403eb075dff5d7b8ec4a9e08052eb01e1e196722/src/tink/http/containers/PhpContainer.hx:68: characters 17-63
					$headers->arr[$headers->length] = $x4;
					#/Users/ut/haxe/haxe_libraries/tink_http/0.8.2/github/403eb075dff5d7b8ec4a9e08052eb01e1e196722/src/tink/http/containers/PhpContainer.hx:68: characters 17-63
					++$headers->length;
				}
			}
			#/Users/ut/haxe/haxe_libraries/tink_http/0.8.2/github/403eb075dff5d7b8ec4a9e08052eb01e1e196722/src/tink/http/containers/PhpContainer.hx:44: lines 44-72
			$header2 = $headers;
		}
		#/Users/ut/haxe/haxe_libraries/tink_http/0.8.2/github/403eb075dff5d7b8ec4a9e08052eb01e1e196722/src/tink/http/containers/PhpContainer.hx:39: lines 39-74
		$header3 = new IncomingRequestHeader($header, $header1, "1.1", $header2);
		#/Users/ut/haxe/haxe_libraries/tink_http/0.8.2/github/403eb075dff5d7b8ec4a9e08052eb01e1e196722/src/tink/http/containers/PhpContainer.hx:77: characters 7-34
		$tmp = $_SERVER["REMOTE_ADDR"];
		#/Users/ut/haxe/haxe_libraries/tink_http/0.8.2/github/403eb075dff5d7b8ec4a9e08052eb01e1e196722/src/tink/http/containers/PhpContainer.hx:79: characters 14-34
		$_g1 = $header3->contentType();
		#/Users/ut/haxe/haxe_libraries/tink_http/0.8.2/github/403eb075dff5d7b8ec4a9e08052eb01e1e196722/src/tink/http/containers/PhpContainer.hx:79: lines 79-116
		$tmp1 = null;
		#/Users/ut/haxe/haxe_libraries/tink_http/0.8.2/github/403eb075dff5d7b8ec4a9e08052eb01e1e196722/src/tink/http/containers/PhpContainer.hx:79: characters 14-34
		if ($_g1->index === 0) {
			#/Users/ut/haxe/haxe_libraries/tink_http/0.8.2/github/403eb075dff5d7b8ec4a9e08052eb01e1e196722/src/tink/http/containers/PhpContainer.hx:79: characters 14-34
			if ($_g1->params[0]->type === "multipart") {
				#/Users/ut/haxe/haxe_libraries/tink_http/0.8.2/github/403eb075dff5d7b8ec4a9e08052eb01e1e196722/src/tink/http/containers/PhpContainer.hx:79: characters 14-34
				if ($_g1->params[0]->subtype === "form-data") {
					#/Users/ut/haxe/haxe_libraries/tink_http/0.8.2/github/403eb075dff5d7b8ec4a9e08052eb01e1e196722/src/tink/http/containers/PhpContainer.hx:80: lines 80-115
					if ($header3->method === "POST") {
						#/Users/ut/haxe/haxe_libraries/tink_http/0.8.2/github/403eb075dff5d7b8ec4a9e08052eb01e1e196722/src/tink/http/containers/PhpContainer.hx:79: lines 79-116
						$tmp1 = IncomingRequestBody::Parsed(PhpContainer::getParts($_POST, new HxClosure(BodyPart::class, 'Value'))->concat(PhpContainer::getParts($_FILES, function ($v) {
							#/Users/ut/haxe/haxe_libraries/tink_http/0.8.2/github/403eb075dff5d7b8ec4a9e08052eb01e1e196722/src/tink/http/containers/PhpContainer.hx:88: characters 15-46
							$tmpName = $v["tmp_name"];
							#/Users/ut/haxe/haxe_libraries/tink_http/0.8.2/github/403eb075dff5d7b8ec4a9e08052eb01e1e196722/src/tink/http/containers/PhpContainer.hx:89: characters 15-39
							$name6 = $v["name"];
							#/Users/ut/haxe/haxe_libraries/tink_http/0.8.2/github/403eb075dff5d7b8ec4a9e08052eb01e1e196722/src/tink/http/containers/PhpContainer.hx:92: characters 24-45
							$_g2 = $v["error"];
							#/Users/ut/haxe/haxe_libraries/tink_http/0.8.2/github/403eb075dff5d7b8ec4a9e08052eb01e1e196722/src/tink/http/containers/PhpContainer.hx:92: characters 24-45
							if ($_g2 === 0) {
								#/Users/ut/haxe/haxe_libraries/tink_http/0.8.2/github/403eb075dff5d7b8ec4a9e08052eb01e1e196722/src/tink/http/containers/PhpContainer.hx:94: characters 21-95
								$streamName = "uploaded file \"" . ($name6??'null') . "\" in temporary location \"" . ($tmpName??'null') . "\"";
								#/Users/ut/haxe/haxe_libraries/tink_http/0.8.2/github/403eb075dff5d7b8ec4a9e08052eb01e1e196722/src/tink/http/containers/PhpContainer.hx:95: lines 95-109
								return BodyPart::File(new HxAnon([
									"fileName" => $name6,
									"size" => $v["size"],
									"mimeType" => $v["type"],
									"read" => function ()  use (&$name6, &$tmpName) {
										#/Users/ut/haxe/haxe_libraries/tink_http/0.8.2/github/403eb075dff5d7b8ec4a9e08052eb01e1e196722/src/tink/http/containers/PhpContainer.hx:99: lines 99-102
										$input = File::read($tmpName, true);
										#/Users/ut/haxe/haxe_libraries/tink_http/0.8.2/github/403eb075dff5d7b8ec4a9e08052eb01e1e196722/src/tink/http/containers/PhpContainer.hx:99: lines 99-102
										$options = null;
										#/Users/ut/haxe/haxe_libraries/tink_http/0.8.2/github/403eb075dff5d7b8ec4a9e08052eb01e1e196722/src/tink/http/containers/PhpContainer.hx:99: lines 99-102
										if ($options === null) {
											#/Users/ut/haxe/haxe_libraries/tink_http/0.8.2/github/403eb075dff5d7b8ec4a9e08052eb01e1e196722/src/tink/http/containers/PhpContainer.hx:99: lines 99-102
											$options = new HxAnon();
										}
										#/Users/ut/haxe/haxe_libraries/tink_http/0.8.2/github/403eb075dff5d7b8ec4a9e08052eb01e1e196722/src/tink/http/containers/PhpContainer.hx:99: lines 99-102
										$tmp2 = Worker_Impl_::ensure($options->worker);
										#/Users/ut/haxe/haxe_libraries/tink_http/0.8.2/github/403eb075dff5d7b8ec4a9e08052eb01e1e196722/src/tink/http/containers/PhpContainer.hx:99: lines 99-102
										$_g3 = $options->chunkSize;
										#/Users/ut/haxe/haxe_libraries/tink_http/0.8.2/github/403eb075dff5d7b8ec4a9e08052eb01e1e196722/src/tink/http/containers/PhpContainer.hx:99: lines 99-102
										$tmp3 = null;
										#/Users/ut/haxe/haxe_libraries/tink_http/0.8.2/github/403eb075dff5d7b8ec4a9e08052eb01e1e196722/src/tink/http/containers/PhpContainer.hx:99: lines 99-102
										if ($_g3 === null) {
											#/Users/ut/haxe/haxe_libraries/tink_http/0.8.2/github/403eb075dff5d7b8ec4a9e08052eb01e1e196722/src/tink/http/containers/PhpContainer.hx:99: lines 99-102
											$tmp3 = 65536;
										} else {
											#/Users/ut/haxe/haxe_libraries/tink_http/0.8.2/github/403eb075dff5d7b8ec4a9e08052eb01e1e196722/src/tink/http/containers/PhpContainer.hx:99: lines 99-102
											$v1 = $_g3;
											#/Users/ut/haxe/haxe_libraries/tink_http/0.8.2/github/403eb075dff5d7b8ec4a9e08052eb01e1e196722/src/tink/http/containers/PhpContainer.hx:99: lines 99-102
											$tmp3 = $v1;
										}
										#/Users/ut/haxe/haxe_libraries/tink_http/0.8.2/github/403eb075dff5d7b8ec4a9e08052eb01e1e196722/src/tink/http/containers/PhpContainer.hx:99: lines 99-102
										$tmp4 = Bytes::alloc($tmp3);
										#/Users/ut/haxe/haxe_libraries/tink_http/0.8.2/github/403eb075dff5d7b8ec4a9e08052eb01e1e196722/src/tink/http/containers/PhpContainer.hx:99: lines 99-102
										return new InputSource($name6, $input, $tmp2, $tmp4, 0);
									},
									"saveTo" => function ($path)  use (&$streamName, &$tmpName) {
										#/Users/ut/haxe/haxe_libraries/tink_http/0.8.2/github/403eb075dff5d7b8ec4a9e08052eb01e1e196722/src/tink/http/containers/PhpContainer.hx:103: lines 103-108
										return new SyncFuture(new LazyConst((rename($tmpName, $path) ? Outcome::Success(Noise::Noise()) : Outcome::Failure(new TypedError(null, "Failed to save " . ($streamName??'null') . " to " . ($path??'null'), new HxAnon([
											"fileName" => "tink/http/containers/PhpContainer.hx",
											"lineNumber" => 107,
											"className" => "tink.http.containers.PhpContainer",
											"methodName" => "getRequest",
										]))))));
									},
								]));
							} else {
								#/Users/ut/haxe/haxe_libraries/tink_http/0.8.2/github/403eb075dff5d7b8ec4a9e08052eb01e1e196722/src/tink/http/containers/PhpContainer.hx:110: characters 28-32
								return null;
							}
						})));
					} else {
						#/Users/ut/haxe/haxe_libraries/tink_http/0.8.2/github/403eb075dff5d7b8ec4a9e08052eb01e1e196722/src/tink/http/containers/PhpContainer.hx:115: characters 17-80
						$s1 = file_get_contents("php://input");
						#/Users/ut/haxe/haxe_libraries/tink_http/0.8.2/github/403eb075dff5d7b8ec4a9e08052eb01e1e196722/src/tink/http/containers/PhpContainer.hx:79: lines 79-116
						$tmp1 = IncomingRequestBody::Plain(Source_Impl_::ofChunk(Chunk_Impl_::ofBytes(new Bytes(strlen($s1), new _BytesDataContainer($s1)))));
					}
				} else {
					#/Users/ut/haxe/haxe_libraries/tink_http/0.8.2/github/403eb075dff5d7b8ec4a9e08052eb01e1e196722/src/tink/http/containers/PhpContainer.hx:115: characters 17-80
					$s2 = file_get_contents("php://input");
					#/Users/ut/haxe/haxe_libraries/tink_http/0.8.2/github/403eb075dff5d7b8ec4a9e08052eb01e1e196722/src/tink/http/containers/PhpContainer.hx:79: lines 79-116
					$tmp1 = IncomingRequestBody::Plain(Source_Impl_::ofChunk(Chunk_Impl_::ofBytes(new Bytes(strlen($s2), new _BytesDataContainer($s2)))));
				}
			} else {
				#/Users/ut/haxe/haxe_libraries/tink_http/0.8.2/github/403eb075dff5d7b8ec4a9e08052eb01e1e196722/src/tink/http/containers/PhpContainer.hx:115: characters 17-80
				$s3 = file_get_contents("php://input");
				#/Users/ut/haxe/haxe_libraries/tink_http/0.8.2/github/403eb075dff5d7b8ec4a9e08052eb01e1e196722/src/tink/http/containers/PhpContainer.hx:79: lines 79-116
				$tmp1 = IncomingRequestBody::Plain(Source_Impl_::ofChunk(Chunk_Impl_::ofBytes(new Bytes(strlen($s3), new _BytesDataContainer($s3)))));
			}
		} else {
			#/Users/ut/haxe/haxe_libraries/tink_http/0.8.2/github/403eb075dff5d7b8ec4a9e08052eb01e1e196722/src/tink/http/containers/PhpContainer.hx:115: characters 17-80
			$s4 = file_get_contents("php://input");
			#/Users/ut/haxe/haxe_libraries/tink_http/0.8.2/github/403eb075dff5d7b8ec4a9e08052eb01e1e196722/src/tink/http/containers/PhpContainer.hx:79: lines 79-116
			$tmp1 = IncomingRequestBody::Plain(Source_Impl_::ofChunk(Chunk_Impl_::ofBytes(new Bytes(strlen($s4), new _BytesDataContainer($s4)))));
		}
		#/Users/ut/haxe/haxe_libraries/tink_http/0.8.2/github/403eb075dff5d7b8ec4a9e08052eb01e1e196722/src/tink/http/containers/PhpContainer.hx:76: lines 76-117
		return new IncomingRequest($tmp, $header3, $tmp1);
	}


	/**
	 * @param HandlerObject $handler
	 * 
	 * @return FutureObject
	 */
	public function run ($handler) {
		#/Users/ut/haxe/haxe_libraries/tink_http/0.8.2/github/403eb075dff5d7b8ec4a9e08052eb01e1e196722/src/tink/http/containers/PhpContainer.hx:120: lines 120-134
		$_gthis = $this;
		#/Users/ut/haxe/haxe_libraries/tink_http/0.8.2/github/403eb075dff5d7b8ec4a9e08052eb01e1e196722/src/tink/http/containers/PhpContainer.hx:121: lines 121-134
		return Future_Impl_::async(function ($cb)  use (&$_gthis, &$handler) {
			#/Users/ut/haxe/haxe_libraries/tink_http/0.8.2/github/403eb075dff5d7b8ec4a9e08052eb01e1e196722/src/tink/http/containers/PhpContainer.hx:123: characters 9-21
			$tmp = $_gthis->getRequest();
			#/Users/ut/haxe/haxe_libraries/tink_http/0.8.2/github/403eb075dff5d7b8ec4a9e08052eb01e1e196722/src/tink/http/containers/PhpContainer.hx:122: lines 122-133
			$handler->process($tmp)->handle(function ($res)  use (&$cb) {
				#/Users/ut/haxe/haxe_libraries/tink_http/0.8.2/github/403eb075dff5d7b8ec4a9e08052eb01e1e196722/src/tink/http/containers/PhpContainer.hx:125: characters 17-70
				http_response_code($res->header->statusCode);
				#/Users/ut/haxe/haxe_libraries/tink_http/0.8.2/github/403eb075dff5d7b8ec4a9e08052eb01e1e196722/src/tink/http/containers/PhpContainer.hx:126: characters 19-29
				$h = $res->header->fields->iterator();
				#/Users/ut/haxe/haxe_libraries/tink_http/0.8.2/github/403eb075dff5d7b8ec4a9e08052eb01e1e196722/src/tink/http/containers/PhpContainer.hx:126: characters 19-29
				while ($h->hasNext()) {
					#/Users/ut/haxe/haxe_libraries/tink_http/0.8.2/github/403eb075dff5d7b8ec4a9e08052eb01e1e196722/src/tink/http/containers/PhpContainer.hx:126: lines 126-127
					$h1 = $h->next();
					#/Users/ut/haxe/haxe_libraries/tink_http/0.8.2/github/403eb075dff5d7b8ec4a9e08052eb01e1e196722/src/tink/http/containers/PhpContainer.hx:127: characters 19-62
					header(($h1->name??'null') . ": " . ($h1->value??'null'));
				}

				#/Users/ut/haxe/haxe_libraries/tink_http/0.8.2/github/403eb075dff5d7b8ec4a9e08052eb01e1e196722/src/tink/http/containers/PhpContainer.hx:129: characters 9-137
				$out = SinkYielding_Impl_::ofOutput("output buffer", new FileOutput(fopen("php://output", "w")));
				#/Users/ut/haxe/haxe_libraries/tink_http/0.8.2/github/403eb075dff5d7b8ec4a9e08052eb01e1e196722/src/tink/http/containers/PhpContainer.hx:130: lines 130-132
				Source_Impl_::pipeTo($res->body, $out, new HxAnon(["end" => true]))->handle(function ($o)  use (&$cb) {
					#/Users/ut/haxe/haxe_libraries/tink_http/0.8.2/github/403eb075dff5d7b8ec4a9e08052eb01e1e196722/src/tink/http/containers/PhpContainer.hx:131: characters 11-23
					$cb(ContainerResult::Shutdown());
				});
			});
		});
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


self::$inst = new PhpContainer();
	}
}


Boot::registerClass(PhpContainer::class, 'tink.http.containers.PhpContainer');
PhpContainer::__hx__init();
