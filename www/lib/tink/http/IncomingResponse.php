<?php
/**
 * Generated by Haxe 4.0.0 (git build development @ 3018ab1)
 */

namespace tink\http;

use \tink\core\_Promise\Promise_Impl_;
use \tink\core\Outcome;
use \php\Boot;
use \tink\core\TypedError;
use \tink\core\_Future\FutureObject;
use \tink\core\_Future\SyncFuture;
use \tink\io\RealSourceTools;
use \haxe\io\_BytesData\Container as _BytesDataContainer;
use \haxe\io\Bytes;
use \tink\streams\StreamObject;
use \tink\http\_Header\HeaderName_Impl_;
use \tink\_Chunk\Chunk_Impl_;
use \tink\io\_Source\Source_Impl_;
use \haxe\Json;
use \php\_Boot\HxAnon;
use \tink\core\_Lazy\LazyConst;
use \httpstatus\_HttpStatusMessage\HttpStatusMessage_Impl_;

class IncomingResponse extends Message {
	/**
	 * @param IncomingResponse $res
	 * 
	 * @return FutureObject
	 */
	static public function readAll ($res) {
		#/Users/ut/haxe/haxe_libraries/tink_http/0.8.2/github/403eb075dff5d7b8ec4a9e08052eb01e1e196722/src/tink/http/Response.hx:110: lines 110-116
		return Promise_Impl_::next(RealSourceTools::all($res->body), function ($b)  use (&$res) {
			#/Users/ut/haxe/haxe_libraries/tink_http/0.8.2/github/403eb075dff5d7b8ec4a9e08052eb01e1e196722/src/tink/http/Response.hx:112: lines 112-115
			if ($res->header->statusCode >= 400) {
				#/Users/ut/haxe/haxe_libraries/tink_http/0.8.2/github/403eb075dff5d7b8ec4a9e08052eb01e1e196722/src/tink/http/Response.hx:113: characters 11-90
				return new SyncFuture(new LazyConst(Outcome::Failure(TypedError::withData($res->header->statusCode, $res->header->reason, $b->toString(), new HxAnon([
					"fileName" => "tink/http/Response.hx",
					"lineNumber" => 113,
					"className" => "tink.http.IncomingResponse",
					"methodName" => "readAll",
				])))));
			} else {
				#/Users/ut/haxe/haxe_libraries/tink_http/0.8.2/github/403eb075dff5d7b8ec4a9e08052eb01e1e196722/src/tink/http/Response.hx:115: characters 11-21
				return new SyncFuture(new LazyConst(Outcome::Success($b)));
			}
		});
	}


	/**
	 * @param TypedError $e
	 * 
	 * @return IncomingResponse
	 */
	static public function reportError ($e) {
		#/Users/ut/haxe/haxe_libraries/tink_http/0.8.2/github/403eb075dff5d7b8ec4a9e08052eb01e1e196722/src/tink/http/Response.hx:120: characters 7-96
		$this1 = new ResponseHeaderBase($e->code, HttpStatusMessage_Impl_::fromCode($e->code), \Array_hx::wrap([new HeaderField(HeaderName_Impl_::ofString("Content-Type"), "application/json")]), "HTTP/1.1");
		#/Users/ut/haxe/haxe_libraries/tink_http/0.8.2/github/403eb075dff5d7b8ec4a9e08052eb01e1e196722/src/tink/http/Response.hx:121: lines 121-125
		$s = Json::phpJsonEncode(new HxAnon([
			"error" => $e->message,
			"details" => $e->data,
		]), null, null);
		#/Users/ut/haxe/haxe_libraries/tink_http/0.8.2/github/403eb075dff5d7b8ec4a9e08052eb01e1e196722/src/tink/http/Response.hx:119: lines 119-126
		return new IncomingResponse($this1, Source_Impl_::ofChunk(Chunk_Impl_::ofBytes(new Bytes(strlen($s), new _BytesDataContainer($s)))));
	}


	/**
	 * @param ResponseHeaderBase $header
	 * @param StreamObject $body
	 * 
	 * @return void
	 */
	public function __construct ($header, $body) {
		#/Users/ut/haxe/haxe_libraries/tink_http/0.8.2/github/403eb075dff5d7b8ec4a9e08052eb01e1e196722/src/tink/http/Response.hx:107: lines 107-129
		parent::__construct($header, $body);
	}
}


Boot::registerClass(IncomingResponse::class, 'tink.http.IncomingResponse');