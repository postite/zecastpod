<?php
/**
 * Generated by Haxe 4.0.0 (git build development @ 3018ab1)
 */

namespace tink\web\routing;

use \tink\querystring\Parser10 as QuerystringParser10;
use \tink\core\_Promise\Promise_Impl_;
use \php\_Boot\HxClosure;
use \tink\json\Parser11;
use \tink\core\Outcome;
use \php\Boot;
use \tink\core\TypedError;
use \tink\core\_Future\FutureObject;
use \tink\core\_Future\SyncFuture;
use \tink\querystring\Parser11 as QuerystringParser11;
use \tink\_Stringly\Stringly_Impl_;
use \tink\core\_Promise\Next_Impl_;
use \tink\json\Parser10;
use \tink\web\routing\_Response\Response_Impl_;
use \tink\querystring\_Pairs\Pairs_Impl_;
use \php\_Boot\HxAnon;
use \tink\core\_Lazy\LazyConst;

class Router11 {
	/**
	 * @var \Root
	 */
	public $target;


	/**
	 * @param \Root $target
	 * 
	 * @return void
	 */
	public function __construct ($target) {
		#/Users/ut/haxe/haxe_libraries/tink_web/0.1.4/github/7c93ab66f476c97e62510c653bb4e58e918e1471/src/tink/web/macros/Routing.hx:218: characters 11-31
		$this->target = $target;
	}


	/**
	 * @param Context $ctx
	 * 
	 * @return FutureObject
	 */
	public function cook ($ctx) {
		#src/Server.hx:63: lines 63-68
		return Promise_Impl_::next(Promise_Impl_::ofOutcome(Outcome::Success($this->target->cook())), Next_Impl_::ofSafeSync(function ($v) {
			#src/Server.hx:63: lines 63-68
			return $v;
		}));
	}


	/**
	 * @param Context $ctx
	 * 
	 * @return FutureObject
	 */
	public function dbOne ($ctx) {
		#src/Server.hx:217: lines 217-220
		return Promise_Impl_::next(Promise_Impl_::ofOutcome(Outcome::Success($this->target->dbOne())), Next_Impl_::ofSafeSync(function ($v) {
			#src/Server.hx:217: lines 217-220
			return Response_Impl_::ofString($v);
		}));
	}


	/**
	 * @param Context $ctx
	 * @param string $id
	 * 
	 * @return FutureObject
	 */
	public function delete ($ctx, $id) {
		#src/Server.hx:85: lines 85-88
		$d = $this->target;
		#src/Server.hx:85: lines 85-88
		$_g = Stringly_Impl_::parse($id, function ($s) {
			#src/Server.hx:85: lines 85-88
			return Stringly_Impl_::toInt($s);
		});
		#src/Server.hx:85: lines 85-88
		$d1 = null;
		#src/Server.hx:85: lines 85-88
		switch ($_g->index) {
			case 0:
				#src/Server.hx:85: lines 85-88
				$d1 = $_g->params[0];
				break;
			case 1:
				#src/Server.hx:85: lines 85-88
				return Promise_Impl_::ofOutcome(Outcome::Failure($_g->params[0]));
				break;
		}
		#src/Server.hx:85: lines 85-88
		return Promise_Impl_::next(Promise_Impl_::ofOutcome(Outcome::Success($d->delete($d1))), Next_Impl_::ofSafeSync(function ($v) {
			#src/Server.hx:85: lines 85-88
			return Response_Impl_::ofHtml($v);
		}));
	}


	/**
	 * @param Context $ctx
	 * 
	 * @return FutureObject
	 */
	public function files ($ctx) {
		#src/Server.hx:118: lines 118-153
		$_gthis = $this;
		#src/Server.hx:118: lines 118-153
		$_g1 = null;
		#src/Server.hx:118: lines 118-153
		$_g = $ctx->request->header->contentType();
		#src/Server.hx:118: lines 118-153
		if ($_g->index === 0) {
			#src/Server.hx:118: lines 118-153
			$v = $_g->params[0];
			#src/Server.hx:118: lines 118-153
			$_g1 = "" . ($v->type??'null') . "/" . ($v->subtype??'null');
		} else {
			#src/Server.hx:118: lines 118-153
			$_g1 = "application/json";
		}
		#src/Server.hx:118: lines 118-153
		$tmp = null;
		#src/Server.hx:118: lines 118-153
		switch ($_g1) {
			case "application/json":
				#src/Server.hx:118: lines 118-153
				$tmp = Promise_Impl_::next($ctx->allRaw(), function ($b) {
					#src/Server.hx:118: lines 118-153
					return new SyncFuture(new LazyConst((new Parser10())->tryParse($b->toString())));
				});
				break;
			case "application/x-www-form-urlencoded":
			case "multipart/form-data":
				#src/Server.hx:118: lines 118-153
				$tmp = Promise_Impl_::next($ctx->parse(), function ($pairs) {
					#src/Server.hx:118: lines 118-153
					return new SyncFuture(new LazyConst((new QuerystringParser10())->tryParse(Pairs_Impl_::ofIterable($pairs))));
				});
				break;
			default:
				#src/Server.hx:118: lines 118-153
				$tmp = Promise_Impl_::ofOutcome(Outcome::Failure(new TypedError(406, "Cannot process Content-Type " . ($_g1??'null'), new HxAnon([
					"fileName" => "tink/web/macros/Routing.hx",
					"lineNumber" => 611,
					"className" => "tink.web.routing.Router11",
					"methodName" => "files",
				]))));
				break;
		}
		#src/Server.hx:118: lines 118-153
		return Promise_Impl_::next($tmp, function ($body)  use (&$_gthis) {
			#src/Server.hx:118: lines 118-153
			return Promise_Impl_::next($_gthis->target->files($body)->map(new HxClosure(Outcome::class, 'Success'))->gather(), Next_Impl_::ofSafeSync(function ($v1) {
				#src/Server.hx:118: lines 118-153
				return Response_Impl_::ofHtml($v1);
			}));
		});
	}


	/**
	 * @param Context $ctx
	 * 
	 * @return FutureObject
	 */
	public function filesRec ($ctx) {
		#src/Server.hx:156: lines 156-167
		$_gthis = $this;
		#src/Server.hx:156: lines 156-167
		$_g1 = null;
		#src/Server.hx:156: lines 156-167
		$_g = $ctx->request->header->contentType();
		#src/Server.hx:156: lines 156-167
		if ($_g->index === 0) {
			#src/Server.hx:156: lines 156-167
			$v = $_g->params[0];
			#src/Server.hx:156: lines 156-167
			$_g1 = "" . ($v->type??'null') . "/" . ($v->subtype??'null');
		} else {
			#src/Server.hx:156: lines 156-167
			$_g1 = "application/json";
		}
		#src/Server.hx:156: lines 156-167
		$tmp = null;
		#src/Server.hx:156: lines 156-167
		switch ($_g1) {
			case "application/json":
				#src/Server.hx:156: lines 156-167
				$tmp = Promise_Impl_::next($ctx->allRaw(), function ($b) {
					#src/Server.hx:156: lines 156-167
					return new SyncFuture(new LazyConst((new Parser10())->tryParse($b->toString())));
				});
				break;
			case "application/x-www-form-urlencoded":
			case "multipart/form-data":
				#src/Server.hx:156: lines 156-167
				$tmp = Promise_Impl_::next($ctx->parse(), function ($pairs) {
					#src/Server.hx:156: lines 156-167
					return new SyncFuture(new LazyConst((new QuerystringParser10())->tryParse(Pairs_Impl_::ofIterable($pairs))));
				});
				break;
			default:
				#src/Server.hx:156: lines 156-167
				$tmp = Promise_Impl_::ofOutcome(Outcome::Failure(new TypedError(406, "Cannot process Content-Type " . ($_g1??'null'), new HxAnon([
					"fileName" => "tink/web/macros/Routing.hx",
					"lineNumber" => 611,
					"className" => "tink.web.routing.Router11",
					"methodName" => "filesRec",
				]))));
				break;
		}
		#src/Server.hx:156: lines 156-167
		return Promise_Impl_::next($tmp, function ($body)  use (&$_gthis) {
			#src/Server.hx:156: lines 156-167
			return Promise_Impl_::next($_gthis->target->filesRec($body), Next_Impl_::ofSafeSync(function ($v1) {
				#src/Server.hx:156: lines 156-167
				return Response_Impl_::ofHtml($v1);
			}));
		});
	}


	/**
	 * @param Context $ctx
	 * 
	 * @return FutureObject
	 */
	public function filesUpdate ($ctx) {
		#src/Server.hx:170: lines 170-182
		$_gthis = $this;
		#src/Server.hx:170: lines 170-182
		$_g1 = null;
		#src/Server.hx:170: lines 170-182
		$_g = $ctx->request->header->contentType();
		#src/Server.hx:170: lines 170-182
		if ($_g->index === 0) {
			#src/Server.hx:170: lines 170-182
			$v = $_g->params[0];
			#src/Server.hx:170: lines 170-182
			$_g1 = "" . ($v->type??'null') . "/" . ($v->subtype??'null');
		} else {
			#src/Server.hx:170: lines 170-182
			$_g1 = "application/json";
		}
		#src/Server.hx:170: lines 170-182
		$tmp = null;
		#src/Server.hx:170: lines 170-182
		switch ($_g1) {
			case "application/json":
				#src/Server.hx:170: lines 170-182
				$tmp = Promise_Impl_::next($ctx->allRaw(), function ($b) {
					#src/Server.hx:170: lines 170-182
					return new SyncFuture(new LazyConst((new Parser11())->tryParse($b->toString())));
				});
				break;
			case "application/x-www-form-urlencoded":
			case "multipart/form-data":
				#src/Server.hx:170: lines 170-182
				$tmp = Promise_Impl_::next($ctx->parse(), function ($pairs) {
					#src/Server.hx:170: lines 170-182
					return new SyncFuture(new LazyConst((new QuerystringParser11())->tryParse(Pairs_Impl_::ofIterable($pairs))));
				});
				break;
			default:
				#src/Server.hx:170: lines 170-182
				$tmp = Promise_Impl_::ofOutcome(Outcome::Failure(new TypedError(406, "Cannot process Content-Type " . ($_g1??'null'), new HxAnon([
					"fileName" => "tink/web/macros/Routing.hx",
					"lineNumber" => 611,
					"className" => "tink.web.routing.Router11",
					"methodName" => "filesUpdate",
				]))));
				break;
		}
		#src/Server.hx:170: lines 170-182
		return Promise_Impl_::next($tmp, function ($body)  use (&$_gthis) {
			#src/Server.hx:170: lines 170-182
			return Promise_Impl_::next($_gthis->target->filesUpdate($body), Next_Impl_::ofSafeSync(function ($v1) {
				#src/Server.hx:170: lines 170-182
				return Response_Impl_::ofHtml($v1);
			}));
		});
	}


	/**
	 * @param Context $ctx
	 * 
	 * @return FutureObject
	 */
	public function getRss ($ctx) {
		#src/Server.hx:92: lines 92-99
		return Promise_Impl_::next(Promise_Impl_::ofOutcome(Outcome::Success($this->target->getRss())), Next_Impl_::ofSafeSync(function ($v) {
			#src/Server.hx:92: lines 92-99
			return $v;
		}));
	}


	/**
	 * @param Context $ctx
	 * 
	 * @return FutureObject
	 */
	public function getRssView ($ctx) {
		#src/Server.hx:71: lines 71-76
		return Promise_Impl_::next(Promise_Impl_::ofOutcome(Outcome::Success($this->target->getRssView())), Next_Impl_::ofSafeSync(function ($v) {
			#src/Server.hx:71: lines 71-76
			return Response_Impl_::ofHtml($v);
		}));
	}


	/**
	 * @param Context $ctx
	 * 
	 * @return FutureObject
	 */
	public function hello ($ctx) {
		#src/Server.hx:57: lines 57-60
		return Promise_Impl_::next(Promise_Impl_::ofOutcome(Outcome::Success($this->target->hello())), Next_Impl_::ofSafeSync(function ($v) {
			#src/Server.hx:57: lines 57-60
			return Response_Impl_::ofHtml($v);
		}));
	}


	/**
	 * @param Context $ctx
	 * @param string $id
	 * 
	 * @return FutureObject
	 */
	public function modif ($ctx, $id) {
		#src/Server.hx:79: lines 79-82
		$d = $this->target;
		#src/Server.hx:79: lines 79-82
		$_g = Stringly_Impl_::parse($id, function ($s) {
			#src/Server.hx:79: lines 79-82
			return Stringly_Impl_::toInt($s);
		});
		#src/Server.hx:79: lines 79-82
		$d1 = null;
		#src/Server.hx:79: lines 79-82
		switch ($_g->index) {
			case 0:
				#src/Server.hx:79: lines 79-82
				$d1 = $_g->params[0];
				break;
			case 1:
				#src/Server.hx:79: lines 79-82
				return Promise_Impl_::ofOutcome(Outcome::Failure($_g->params[0]));
				break;
		}
		#src/Server.hx:79: lines 79-82
		return Promise_Impl_::next(Promise_Impl_::ofOutcome(Outcome::Success($d->modif($d1))), Next_Impl_::ofSafeSync(function ($v) {
			#src/Server.hx:79: lines 79-82
			return Response_Impl_::ofHtml($v);
		}));
	}


	/**
	 * @param Context $ctx
	 * @param string $id
	 * 
	 * @return FutureObject
	 */
	public function podId ($ctx, $id) {
		#src/Server.hx:112: lines 112-115
		$d = $this->target;
		#src/Server.hx:112: lines 112-115
		$_g = Stringly_Impl_::parse($id, function ($s) {
			#src/Server.hx:112: lines 112-115
			return Stringly_Impl_::toInt($s);
		});
		#src/Server.hx:112: lines 112-115
		$d1 = null;
		#src/Server.hx:112: lines 112-115
		switch ($_g->index) {
			case 0:
				#src/Server.hx:112: lines 112-115
				$d1 = $_g->params[0];
				break;
			case 1:
				#src/Server.hx:112: lines 112-115
				return Promise_Impl_::ofOutcome(Outcome::Failure($_g->params[0]));
				break;
		}
		#src/Server.hx:112: lines 112-115
		return Promise_Impl_::next(Promise_Impl_::ofOutcome(Outcome::Success($d->podId($d1))), Next_Impl_::ofSafeSync(function ($v) {
			#src/Server.hx:112: lines 112-115
			return Response_Impl_::ofHtml($v);
		}));
	}


	/**
	 * @param Context $ctx
	 * 
	 * @return FutureObject
	 */
	public function route ($ctx) {
		#/Users/ut/haxe/haxe_libraries/tink_web/0.1.4/github/7c93ab66f476c97e62510c653bb4e58e918e1471/src/tink/web/macros/Routing.hx:222: characters 11-34
		$l = $ctx->parts->length - $ctx->depth;
		#/Users/ut/haxe/haxe_libraries/tink_web/0.1.4/github/7c93ab66f476c97e62510c653bb4e58e918e1471/src/tink/web/macros/Routing.hx:143: characters 22-31
		$_g = $l > 3;
		#/Users/ut/haxe/haxe_libraries/tink_web/0.1.4/github/7c93ab66f476c97e62510c653bb4e58e918e1471/src/tink/web/macros/Routing.hx:143: characters 22-31
		$_g1 = $l > 2;
		#/Users/ut/haxe/haxe_libraries/tink_web/0.1.4/github/7c93ab66f476c97e62510c653bb4e58e918e1471/src/tink/web/macros/Routing.hx:143: characters 22-31
		$_g2 = $l > 1;
		#/Users/ut/haxe/haxe_libraries/tink_web/0.1.4/github/7c93ab66f476c97e62510c653bb4e58e918e1471/src/tink/web/macros/Routing.hx:143: characters 22-31
		$_g3 = $l > 0;
		#/Users/ut/haxe/haxe_libraries/tink_web/0.1.4/github/7c93ab66f476c97e62510c653bb4e58e918e1471/src/tink/web/macros/Routing.hx:140: characters 22-41
		$_g4 = $ctx->part(2);
		#/Users/ut/haxe/haxe_libraries/tink_web/0.1.4/github/7c93ab66f476c97e62510c653bb4e58e918e1471/src/tink/web/macros/Routing.hx:140: characters 22-41
		$_g5 = $ctx->part(1);
		#/Users/ut/haxe/haxe_libraries/tink_web/0.1.4/github/7c93ab66f476c97e62510c653bb4e58e918e1471/src/tink/web/macros/Routing.hx:140: characters 22-41
		$_g6 = $ctx->part(0);
		#/Users/ut/haxe/haxe_libraries/tink_web/0.1.4/github/7c93ab66f476c97e62510c653bb4e58e918e1471/src/tink/web/macros/Routing.hx:137: characters 22-39
		switch ($ctx->request->header->method) {
			case "GET":
				#/Users/ut/haxe/haxe_libraries/tink_web/0.1.4/github/7c93ab66f476c97e62510c653bb4e58e918e1471/src/tink/web/macros/Routing.hx:143: characters 22-31
				switch ($_g3) {
					case false:
						#src/Server.hx:56: characters 8-11
						return Promise_Impl_::ofSpecific($this->hello($ctx));
						break;
					case true:
						#/Users/ut/haxe/haxe_libraries/tink_web/0.1.4/github/7c93ab66f476c97e62510c653bb4e58e918e1471/src/tink/web/macros/Routing.hx:140: characters 22-41
						switch ($_g6) {
							case "cook":
								#/Users/ut/haxe/haxe_libraries/tink_web/0.1.4/github/7c93ab66f476c97e62510c653bb4e58e918e1471/src/tink/web/macros/Routing.hx:143: characters 22-31
								if ($_g2 === false) {
									#src/Server.hx:62: characters 8-15
									return Promise_Impl_::ofSpecific($this->cook($ctx));
								} else {
									#src/Server.hx:29: characters 16-44
									$this1 = $ctx->request->header->url;
									#src/Server.hx:29: characters 16-44
									return Promise_Impl_::ofOutcome(Outcome::Failure(new TypedError(404, "Not Found: [" . ($ctx->request->header->method??'null') . "] " . ((($this1->query === null ? $this1->path : ($this1->path??'null') . "?" . ($this1->query??'null')))??'null'), new HxAnon([
										"fileName" => "Server.hx",
										"lineNumber" => 29,
										"className" => "tink.web.routing.Router11",
										"methodName" => "route",
									]))));
								}
								break;
							case "dbone":
								#/Users/ut/haxe/haxe_libraries/tink_web/0.1.4/github/7c93ab66f476c97e62510c653bb4e58e918e1471/src/tink/web/macros/Routing.hx:143: characters 22-31
								if ($_g2 === false) {
									#src/Server.hx:216: characters 8-15
									return Promise_Impl_::ofSpecific($this->dbOne($ctx));
								} else {
									#src/Server.hx:29: characters 16-44
									$this11 = $ctx->request->header->url;
									#src/Server.hx:29: characters 16-44
									return Promise_Impl_::ofOutcome(Outcome::Failure(new TypedError(404, "Not Found: [" . ($ctx->request->header->method??'null') . "] " . ((($this11->query === null ? $this11->path : ($this11->path??'null') . "?" . ($this11->query??'null')))??'null'), new HxAnon([
										"fileName" => "Server.hx",
										"lineNumber" => 29,
										"className" => "tink.web.routing.Router11",
										"methodName" => "route",
									]))));
								}
								break;
							case "delete":
								#/Users/ut/haxe/haxe_libraries/tink_web/0.1.4/github/7c93ab66f476c97e62510c653bb4e58e918e1471/src/tink/web/macros/Routing.hx:143: characters 22-31
								if ($_g2 === true) {
									#/Users/ut/haxe/haxe_libraries/tink_web/0.1.4/github/7c93ab66f476c97e62510c653bb4e58e918e1471/src/tink/web/macros/Routing.hx:143: characters 22-31
									if ($_g1 === false) {
										#src/Server.hx:84: characters 8-21
										return Promise_Impl_::ofSpecific($this->delete($ctx, $_g5));
									} else {
										#src/Server.hx:29: characters 16-44
										$this12 = $ctx->request->header->url;
										#src/Server.hx:29: characters 16-44
										return Promise_Impl_::ofOutcome(Outcome::Failure(new TypedError(404, "Not Found: [" . ($ctx->request->header->method??'null') . "] " . ((($this12->query === null ? $this12->path : ($this12->path??'null') . "?" . ($this12->query??'null')))??'null'), new HxAnon([
											"fileName" => "Server.hx",
											"lineNumber" => 29,
											"className" => "tink.web.routing.Router11",
											"methodName" => "route",
										]))));
									}
								} else {
									#src/Server.hx:29: characters 16-44
									$this13 = $ctx->request->header->url;
									#src/Server.hx:29: characters 16-44
									return Promise_Impl_::ofOutcome(Outcome::Failure(new TypedError(404, "Not Found: [" . ($ctx->request->header->method??'null') . "] " . ((($this13->query === null ? $this13->path : ($this13->path??'null') . "?" . ($this13->query??'null')))??'null'), new HxAnon([
										"fileName" => "Server.hx",
										"lineNumber" => 29,
										"className" => "tink.web.routing.Router11",
										"methodName" => "route",
									]))));
								}
								break;
							case "modif":
								#/Users/ut/haxe/haxe_libraries/tink_web/0.1.4/github/7c93ab66f476c97e62510c653bb4e58e918e1471/src/tink/web/macros/Routing.hx:143: characters 22-31
								if ($_g2 === true) {
									#/Users/ut/haxe/haxe_libraries/tink_web/0.1.4/github/7c93ab66f476c97e62510c653bb4e58e918e1471/src/tink/web/macros/Routing.hx:143: characters 22-31
									if ($_g1 === false) {
										#src/Server.hx:78: characters 8-20
										return Promise_Impl_::ofSpecific($this->modif($ctx, $_g5));
									} else {
										#src/Server.hx:29: characters 16-44
										$this14 = $ctx->request->header->url;
										#src/Server.hx:29: characters 16-44
										return Promise_Impl_::ofOutcome(Outcome::Failure(new TypedError(404, "Not Found: [" . ($ctx->request->header->method??'null') . "] " . ((($this14->query === null ? $this14->path : ($this14->path??'null') . "?" . ($this14->query??'null')))??'null'), new HxAnon([
											"fileName" => "Server.hx",
											"lineNumber" => 29,
											"className" => "tink.web.routing.Router11",
											"methodName" => "route",
										]))));
									}
								} else {
									#src/Server.hx:29: characters 16-44
									$this15 = $ctx->request->header->url;
									#src/Server.hx:29: characters 16-44
									return Promise_Impl_::ofOutcome(Outcome::Failure(new TypedError(404, "Not Found: [" . ($ctx->request->header->method??'null') . "] " . ((($this15->query === null ? $this15->path : ($this15->path??'null') . "?" . ($this15->query??'null')))??'null'), new HxAnon([
										"fileName" => "Server.hx",
										"lineNumber" => 29,
										"className" => "tink.web.routing.Router11",
										"methodName" => "route",
									]))));
								}
								break;
							case "pod":
								#/Users/ut/haxe/haxe_libraries/tink_web/0.1.4/github/7c93ab66f476c97e62510c653bb4e58e918e1471/src/tink/web/macros/Routing.hx:143: characters 22-31
								if ($_g2 === true) {
									#/Users/ut/haxe/haxe_libraries/tink_web/0.1.4/github/7c93ab66f476c97e62510c653bb4e58e918e1471/src/tink/web/macros/Routing.hx:143: characters 22-31
									if ($_g1 === false) {
										#src/Server.hx:111: characters 8-18
										return Promise_Impl_::ofSpecific($this->podId($ctx, $_g5));
									} else {
										#src/Server.hx:29: characters 16-44
										$this16 = $ctx->request->header->url;
										#src/Server.hx:29: characters 16-44
										return Promise_Impl_::ofOutcome(Outcome::Failure(new TypedError(404, "Not Found: [" . ($ctx->request->header->method??'null') . "] " . ((($this16->query === null ? $this16->path : ($this16->path??'null') . "?" . ($this16->query??'null')))??'null'), new HxAnon([
											"fileName" => "Server.hx",
											"lineNumber" => 29,
											"className" => "tink.web.routing.Router11",
											"methodName" => "route",
										]))));
									}
								} else {
									#src/Server.hx:29: characters 16-44
									$this17 = $ctx->request->header->url;
									#src/Server.hx:29: characters 16-44
									return Promise_Impl_::ofOutcome(Outcome::Failure(new TypedError(404, "Not Found: [" . ($ctx->request->header->method??'null') . "] " . ((($this17->query === null ? $this17->path : ($this17->path??'null') . "?" . ($this17->query??'null')))??'null'), new HxAnon([
										"fileName" => "Server.hx",
										"lineNumber" => 29,
										"className" => "tink.web.routing.Router11",
										"methodName" => "route",
									]))));
								}
								break;
							case "rss":
								#/Users/ut/haxe/haxe_libraries/tink_web/0.1.4/github/7c93ab66f476c97e62510c653bb4e58e918e1471/src/tink/web/macros/Routing.hx:143: characters 22-31
								if ($_g2 === false) {
									#src/Server.hx:91: characters 8-14
									return Promise_Impl_::ofSpecific($this->getRss($ctx));
								} else {
									#src/Server.hx:29: characters 16-44
									$this18 = $ctx->request->header->url;
									#src/Server.hx:29: characters 16-44
									return Promise_Impl_::ofOutcome(Outcome::Failure(new TypedError(404, "Not Found: [" . ($ctx->request->header->method??'null') . "] " . ((($this18->query === null ? $this18->path : ($this18->path??'null') . "?" . ($this18->query??'null')))??'null'), new HxAnon([
										"fileName" => "Server.hx",
										"lineNumber" => 29,
										"className" => "tink.web.routing.Router11",
										"methodName" => "route",
									]))));
								}
								break;
							case "up":
								#/Users/ut/haxe/haxe_libraries/tink_web/0.1.4/github/7c93ab66f476c97e62510c653bb4e58e918e1471/src/tink/web/macros/Routing.hx:143: characters 22-31
								switch ($_g2) {
									case false:
										#src/Server.hx:101: characters 8-13
										return Promise_Impl_::ofSpecific($this->up($ctx, null, null));
										break;
									case true:
										#/Users/ut/haxe/haxe_libraries/tink_web/0.1.4/github/7c93ab66f476c97e62510c653bb4e58e918e1471/src/tink/web/macros/Routing.hx:143: characters 22-31
										if ($_g1 === true) {
											#/Users/ut/haxe/haxe_libraries/tink_web/0.1.4/github/7c93ab66f476c97e62510c653bb4e58e918e1471/src/tink/web/macros/Routing.hx:143: characters 22-31
											if ($_g === false) {
												#src/Server.hx:102: characters 8-25
												return Promise_Impl_::ofSpecific($this->up($ctx, $_g5, $_g4));
											} else {
												#src/Server.hx:29: characters 16-44
												$this19 = $ctx->request->header->url;
												#src/Server.hx:29: characters 16-44
												return Promise_Impl_::ofOutcome(Outcome::Failure(new TypedError(404, "Not Found: [" . ($ctx->request->header->method??'null') . "] " . ((($this19->query === null ? $this19->path : ($this19->path??'null') . "?" . ($this19->query??'null')))??'null'), new HxAnon([
													"fileName" => "Server.hx",
													"lineNumber" => 29,
													"className" => "tink.web.routing.Router11",
													"methodName" => "route",
												]))));
											}
										} else {
											#src/Server.hx:29: characters 16-44
											$this110 = $ctx->request->header->url;
											#src/Server.hx:29: characters 16-44
											return Promise_Impl_::ofOutcome(Outcome::Failure(new TypedError(404, "Not Found: [" . ($ctx->request->header->method??'null') . "] " . ((($this110->query === null ? $this110->path : ($this110->path??'null') . "?" . ($this110->query??'null')))??'null'), new HxAnon([
												"fileName" => "Server.hx",
												"lineNumber" => 29,
												"className" => "tink.web.routing.Router11",
												"methodName" => "route",
											]))));
										}
										break;
								}
								break;
							case "viewrss":
								#/Users/ut/haxe/haxe_libraries/tink_web/0.1.4/github/7c93ab66f476c97e62510c653bb4e58e918e1471/src/tink/web/macros/Routing.hx:143: characters 22-31
								if ($_g2 === false) {
									#src/Server.hx:70: characters 8-18
									return Promise_Impl_::ofSpecific($this->getRssView($ctx));
								} else {
									#src/Server.hx:29: characters 16-44
									$this111 = $ctx->request->header->url;
									#src/Server.hx:29: characters 16-44
									return Promise_Impl_::ofOutcome(Outcome::Failure(new TypedError(404, "Not Found: [" . ($ctx->request->header->method??'null') . "] " . ((($this111->query === null ? $this111->path : ($this111->path??'null') . "?" . ($this111->query??'null')))??'null'), new HxAnon([
										"fileName" => "Server.hx",
										"lineNumber" => 29,
										"className" => "tink.web.routing.Router11",
										"methodName" => "route",
									]))));
								}
								break;
							default:
								#src/Server.hx:29: characters 16-44
								$this112 = $ctx->request->header->url;
								#src/Server.hx:29: characters 16-44
								return Promise_Impl_::ofOutcome(Outcome::Failure(new TypedError(404, "Not Found: [" . ($ctx->request->header->method??'null') . "] " . ((($this112->query === null ? $this112->path : ($this112->path??'null') . "?" . ($this112->query??'null')))??'null'), new HxAnon([
									"fileName" => "Server.hx",
									"lineNumber" => 29,
									"className" => "tink.web.routing.Router11",
									"methodName" => "route",
								]))));
								break;
						}
						break;
				}
				break;
			case "POST":
				#/Users/ut/haxe/haxe_libraries/tink_web/0.1.4/github/7c93ab66f476c97e62510c653bb4e58e918e1471/src/tink/web/macros/Routing.hx:140: characters 22-41
				switch ($_g6) {
					case "files":
						#/Users/ut/haxe/haxe_libraries/tink_web/0.1.4/github/7c93ab66f476c97e62510c653bb4e58e918e1471/src/tink/web/macros/Routing.hx:143: characters 22-31
						if ($_g3 === true) {
							#/Users/ut/haxe/haxe_libraries/tink_web/0.1.4/github/7c93ab66f476c97e62510c653bb4e58e918e1471/src/tink/web/macros/Routing.hx:143: characters 22-31
							if ($_g2 === false) {
								#src/Server.hx:117: characters 3-8
								return Promise_Impl_::ofSpecific($this->files($ctx));
							} else {
								#src/Server.hx:29: characters 16-44
								$this113 = $ctx->request->header->url;
								#src/Server.hx:29: characters 16-44
								return Promise_Impl_::ofOutcome(Outcome::Failure(new TypedError(404, "Not Found: [" . ($ctx->request->header->method??'null') . "] " . ((($this113->query === null ? $this113->path : ($this113->path??'null') . "?" . ($this113->query??'null')))??'null'), new HxAnon([
									"fileName" => "Server.hx",
									"lineNumber" => 29,
									"className" => "tink.web.routing.Router11",
									"methodName" => "route",
								]))));
							}
						} else {
							#src/Server.hx:29: characters 16-44
							$this114 = $ctx->request->header->url;
							#src/Server.hx:29: characters 16-44
							return Promise_Impl_::ofOutcome(Outcome::Failure(new TypedError(404, "Not Found: [" . ($ctx->request->header->method??'null') . "] " . ((($this114->query === null ? $this114->path : ($this114->path??'null') . "?" . ($this114->query??'null')))??'null'), new HxAnon([
								"fileName" => "Server.hx",
								"lineNumber" => 29,
								"className" => "tink.web.routing.Router11",
								"methodName" => "route",
							]))));
						}
						break;
					case "filesRec":
						#/Users/ut/haxe/haxe_libraries/tink_web/0.1.4/github/7c93ab66f476c97e62510c653bb4e58e918e1471/src/tink/web/macros/Routing.hx:143: characters 22-31
						if ($_g3 === true) {
							#/Users/ut/haxe/haxe_libraries/tink_web/0.1.4/github/7c93ab66f476c97e62510c653bb4e58e918e1471/src/tink/web/macros/Routing.hx:143: characters 22-31
							if ($_g2 === false) {
								#src/Server.hx:155: characters 3-8
								return Promise_Impl_::ofSpecific($this->filesRec($ctx));
							} else {
								#src/Server.hx:29: characters 16-44
								$this115 = $ctx->request->header->url;
								#src/Server.hx:29: characters 16-44
								return Promise_Impl_::ofOutcome(Outcome::Failure(new TypedError(404, "Not Found: [" . ($ctx->request->header->method??'null') . "] " . ((($this115->query === null ? $this115->path : ($this115->path??'null') . "?" . ($this115->query??'null')))??'null'), new HxAnon([
									"fileName" => "Server.hx",
									"lineNumber" => 29,
									"className" => "tink.web.routing.Router11",
									"methodName" => "route",
								]))));
							}
						} else {
							#src/Server.hx:29: characters 16-44
							$this116 = $ctx->request->header->url;
							#src/Server.hx:29: characters 16-44
							return Promise_Impl_::ofOutcome(Outcome::Failure(new TypedError(404, "Not Found: [" . ($ctx->request->header->method??'null') . "] " . ((($this116->query === null ? $this116->path : ($this116->path??'null') . "?" . ($this116->query??'null')))??'null'), new HxAnon([
								"fileName" => "Server.hx",
								"lineNumber" => 29,
								"className" => "tink.web.routing.Router11",
								"methodName" => "route",
							]))));
						}
						break;
					case "filesUpdate":
						#/Users/ut/haxe/haxe_libraries/tink_web/0.1.4/github/7c93ab66f476c97e62510c653bb4e58e918e1471/src/tink/web/macros/Routing.hx:143: characters 22-31
						if ($_g3 === true) {
							#/Users/ut/haxe/haxe_libraries/tink_web/0.1.4/github/7c93ab66f476c97e62510c653bb4e58e918e1471/src/tink/web/macros/Routing.hx:143: characters 22-31
							if ($_g2 === false) {
								#src/Server.hx:169: characters 3-8
								return Promise_Impl_::ofSpecific($this->filesUpdate($ctx));
							} else {
								#src/Server.hx:29: characters 16-44
								$this117 = $ctx->request->header->url;
								#src/Server.hx:29: characters 16-44
								return Promise_Impl_::ofOutcome(Outcome::Failure(new TypedError(404, "Not Found: [" . ($ctx->request->header->method??'null') . "] " . ((($this117->query === null ? $this117->path : ($this117->path??'null') . "?" . ($this117->query??'null')))??'null'), new HxAnon([
									"fileName" => "Server.hx",
									"lineNumber" => 29,
									"className" => "tink.web.routing.Router11",
									"methodName" => "route",
								]))));
							}
						} else {
							#src/Server.hx:29: characters 16-44
							$this118 = $ctx->request->header->url;
							#src/Server.hx:29: characters 16-44
							return Promise_Impl_::ofOutcome(Outcome::Failure(new TypedError(404, "Not Found: [" . ($ctx->request->header->method??'null') . "] " . ((($this118->query === null ? $this118->path : ($this118->path??'null') . "?" . ($this118->query??'null')))??'null'), new HxAnon([
								"fileName" => "Server.hx",
								"lineNumber" => 29,
								"className" => "tink.web.routing.Router11",
								"methodName" => "route",
							]))));
						}
						break;
					default:
						#src/Server.hx:29: characters 16-44
						$this119 = $ctx->request->header->url;
						#src/Server.hx:29: characters 16-44
						return Promise_Impl_::ofOutcome(Outcome::Failure(new TypedError(404, "Not Found: [" . ($ctx->request->header->method??'null') . "] " . ((($this119->query === null ? $this119->path : ($this119->path??'null') . "?" . ($this119->query??'null')))??'null'), new HxAnon([
							"fileName" => "Server.hx",
							"lineNumber" => 29,
							"className" => "tink.web.routing.Router11",
							"methodName" => "route",
						]))));
						break;
				}
				break;
			default:
				#src/Server.hx:29: characters 16-44
				$this120 = $ctx->request->header->url;
				#src/Server.hx:29: characters 16-44
				return Promise_Impl_::ofOutcome(Outcome::Failure(new TypedError(404, "Not Found: [" . ($ctx->request->header->method??'null') . "] " . ((($this120->query === null ? $this120->path : ($this120->path??'null') . "?" . ($this120->query??'null')))??'null'), new HxAnon([
					"fileName" => "Server.hx",
					"lineNumber" => 29,
					"className" => "tink.web.routing.Router11",
					"methodName" => "route",
				]))));
				break;
		}
	}


	/**
	 * @param Context $ctx
	 * @param string $status
	 * @param string $id
	 * 
	 * @return FutureObject
	 */
	public function up ($ctx, $status = null, $id = null) {
		#src/Server.hx:103: lines 103-109
		$d = $this->target;
		#/Users/ut/haxe/haxe_libraries/tink_web/0.1.4/github/7c93ab66f476c97e62510c653bb4e58e918e1471/src/tink/web/macros/Routing.hx:313: lines 313-316
		$d1 = null;
		#/Users/ut/haxe/haxe_libraries/tink_web/0.1.4/github/7c93ab66f476c97e62510c653bb4e58e918e1471/src/tink/web/macros/Routing.hx:313: lines 313-316
		if ($status === null) {
			#/Users/ut/haxe/haxe_libraries/tink_web/0.1.4/github/7c93ab66f476c97e62510c653bb4e58e918e1471/src/tink/web/macros/Routing.hx:313: lines 313-316
			$d1 = null;
		} else {
			#src/Server.hx:103: lines 103-109
			$_g = Stringly_Impl_::parse($status, function ($s) {
				#src/Server.hx:103: lines 103-109
				return $s;
			});
			#src/Server.hx:103: lines 103-109
			switch ($_g->index) {
				case 0:
					#/Users/ut/haxe/haxe_libraries/tink_web/0.1.4/github/7c93ab66f476c97e62510c653bb4e58e918e1471/src/tink/web/macros/Routing.hx:313: lines 313-316
					$d1 = $_g->params[0];
					break;
				case 1:
					#src/Server.hx:103: lines 103-109
					return Promise_Impl_::ofOutcome(Outcome::Failure($_g->params[0]));
					break;
			}
		}
		#/Users/ut/haxe/haxe_libraries/tink_web/0.1.4/github/7c93ab66f476c97e62510c653bb4e58e918e1471/src/tink/web/macros/Routing.hx:313: lines 313-316
		$d2 = null;
		#/Users/ut/haxe/haxe_libraries/tink_web/0.1.4/github/7c93ab66f476c97e62510c653bb4e58e918e1471/src/tink/web/macros/Routing.hx:313: lines 313-316
		if ($id === null) {
			#/Users/ut/haxe/haxe_libraries/tink_web/0.1.4/github/7c93ab66f476c97e62510c653bb4e58e918e1471/src/tink/web/macros/Routing.hx:313: lines 313-316
			$d2 = null;
		} else {
			#src/Server.hx:103: lines 103-109
			$_g1 = Stringly_Impl_::parse($id, function ($s1) {
				#src/Server.hx:103: lines 103-109
				return Stringly_Impl_::toInt($s1);
			});
			#src/Server.hx:103: lines 103-109
			switch ($_g1->index) {
				case 0:
					#/Users/ut/haxe/haxe_libraries/tink_web/0.1.4/github/7c93ab66f476c97e62510c653bb4e58e918e1471/src/tink/web/macros/Routing.hx:313: lines 313-316
					$d2 = $_g1->params[0];
					break;
				case 1:
					#src/Server.hx:103: lines 103-109
					return Promise_Impl_::ofOutcome(Outcome::Failure($_g1->params[0]));
					break;
			}
		}
		#src/Server.hx:103: lines 103-109
		return Promise_Impl_::next(Promise_Impl_::ofOutcome(Outcome::Success($d->up($d1, $d2))), Next_Impl_::ofSafeSync(function ($v) {
			#src/Server.hx:103: lines 103-109
			return Response_Impl_::ofHtml($v);
		}));
	}
}


Boot::registerClass(Router11::class, 'tink.web.routing.Router11');
