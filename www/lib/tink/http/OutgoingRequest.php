<?php
/**
 * Generated by Haxe 4.0.0 (git build development @ 3018ab1)
 */

namespace tink\http;

use \php\Boot;
use \tink\streams\StreamObject;

class OutgoingRequest extends Message {
	/**
	 * @param OutgoingRequestHeader $header
	 * @param StreamObject $body
	 * 
	 * @return void
	 */
	public function __construct ($header, $body) {
		#/Users/ut/haxe/haxe_libraries/tink_http/0.8.2/github/403eb075dff5d7b8ec4a9e08052eb01e1e196722/src/tink/http/Request.hx:118: characters 1-77
		parent::__construct($header, $body);
	}
}


Boot::registerClass(OutgoingRequest::class, 'tink.http.OutgoingRequest');