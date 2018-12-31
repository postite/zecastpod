<?php
/**
 * Generated by Haxe 4.0.0 (git build development @ 3018ab1)
 */

namespace tink\web\routing;

use \tink\core\_Promise\Promise_Impl_;
use \php\_Boot\HxClosure;
use \tink\json\Parser19;
use \tink\core\Outcome;
use \tink\querystring\Parser19 as QuerystringParser19;
use \php\Boot;
use \tink\core\TypedError;
use \tink\core\_Future\FutureObject;
use \tink\core\_Future\SyncFuture;
use \tink\_Stringly\Stringly_Impl_;
use \tink\core\_Promise\Next_Impl_;
use \tink\web\routing\_Response\Response_Impl_;
use \tink\querystring\_Pairs\Pairs_Impl_;
use \php\_Boot\HxAnon;
use \tink\core\_Lazy\LazyConst;

class Router27 {
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
		#src/Server.hx:59: lines 59-64
		return Promise_Impl_::next(Promise_Impl_::ofOutcome(Outcome::Success($this->target->cook())), Next_Impl_::ofSafeSync(function ($v) {
			#src/Server.hx:59: lines 59-64
			return $v;
		}));
	}


	/**
	 * @param Context $ctx
	 * 
	 * @return FutureObject
	 */
	public function dbOne ($ctx) {
		#src/Server.hx:138: lines 138-141
		return Promise_Impl_::next(Promise_Impl_::ofOutcome(Outcome::Success($this->target->dbOne())), Next_Impl_::ofSafeSync(function ($v) {
			#src/Server.hx:138: lines 138-141
			return Response_Impl_::ofString($v);
		}));
	}


	/**
	 * @param Context $ctx
	 * 
	 * @return FutureObject
	 */
	public function files ($ctx) {
		#src/Server.hx:96: lines 96-135
		$_gthis = $this;
		#src/Server.hx:96: lines 96-135
		$_g1 = null;
		#src/Server.hx:96: lines 96-135
		$_g = $ctx->request->header->contentType();
		#src/Server.hx:96: lines 96-135
		if ($_g->index === 0) {
			#src/Server.hx:96: lines 96-135
			$v = $_g->params[0];
			#src/Server.hx:96: lines 96-135
			$_g1 = "" . ($v->type??'null') . "/" . ($v->subtype??'null');
		} else {
			#src/Server.hx:96: lines 96-135
			$_g1 = "application/json";
		}
		#src/Server.hx:96: lines 96-135
		$tmp = null;
		#src/Server.hx:96: lines 96-135
		switch ($_g1) {
			case "application/json":
				#src/Server.hx:96: lines 96-135
				$tmp = Promise_Impl_::next($ctx->allRaw(), function ($b) {
					#src/Server.hx:96: lines 96-135
					return new SyncFuture(new LazyConst((new Parser19())->tryParse($b->toString())));
				});
				break;
			case "application/x-www-form-urlencoded":
			case "multipart/form-data":
				#src/Server.hx:96: lines 96-135
				$tmp = Promise_Impl_::next($ctx->parse(), function ($pairs) {
					#src/Server.hx:96: lines 96-135
					return new SyncFuture(new LazyConst((new QuerystringParser19())->tryParse(Pairs_Impl_::ofIterable($pairs))));
				});
				break;
			default:
				#src/Server.hx:96: lines 96-135
				$tmp = Promise_Impl_::ofOutcome(Outcome::Failure(new TypedError(406, "Cannot process Content-Type " . ($_g1??'null'), new HxAnon([
					"fileName" => "tink/web/macros/Routing.hx",
					"lineNumber" => 611,
					"className" => "tink.web.routing.Router27",
					"methodName" => "files",
				]))));
				break;
		}
		#src/Server.hx:96: lines 96-135
		return Promise_Impl_::next($tmp, function ($body)  use (&$_gthis) {
			#src/Server.hx:96: lines 96-135
			return Promise_Impl_::next($_gthis->target->files($body)->map(new HxClosure(Outcome::class, 'Success'))->gather(), Next_Impl_::ofSafeSync(function ($v1) {
				#src/Server.hx:96: lines 96-135
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
		#src/Server.hx:73: lines 73-79
		return Promise_Impl_::next(Promise_Impl_::ofOutcome(Outcome::Success($this->target->getRss())), Next_Impl_::ofSafeSync(function ($v) {
			#src/Server.hx:73: lines 73-79
			return Response_Impl_::ofHtml($v);
		}));
	}


	/**
	 * @param Context $ctx
	 * 
	 * @return FutureObject
	 */
	public function getRssView ($ctx) {
		#src/Server.hx:66: lines 66-71
		return Promise_Impl_::next(Promise_Impl_::ofOutcome(Outcome::Success($this->target->getRssView())), Next_Impl_::ofSafeSync(function ($v) {
			#src/Server.hx:66: lines 66-71
			return Response_Impl_::ofHtml($v);
		}));
	}


	/**
	 * @param Context $ctx
	 * 
	 * @return FutureObject
	 */
	public function hello ($ctx) {
		#src/Server.hx:54: lines 54-56
		return Promise_Impl_::next(Promise_Impl_::ofOutcome(Outcome::Success($this->target->hello())), Next_Impl_::ofSafeSync(function ($v) {
			#src/Server.hx:54: lines 54-56
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
		#src/Server.hx:88: lines 88-91
		$d = $this->target;
		#src/Server.hx:88: lines 88-91
		$_g = Stringly_Impl_::parse($id, function ($s) {
			#src/Server.hx:88: lines 88-91
			return Stringly_Impl_::toInt($s);
		});
		#src/Server.hx:88: lines 88-91
		$d1 = null;
		#src/Server.hx:88: lines 88-91
		switch ($_g->index) {
			case 0:
				#src/Server.hx:88: lines 88-91
				$d1 = $_g->params[0];
				break;
			case 1:
				#src/Server.hx:88: lines 88-91
				return Promise_Impl_::ofOutcome(Outcome::Failure($_g->params[0]));
				break;
		}
		#src/Server.hx:88: lines 88-91
		return Promise_Impl_::next(Promise_Impl_::ofOutcome(Outcome::Success($d->podId($d1))), Next_Impl_::ofSafeSync(function ($v) {
			#src/Server.hx:88: lines 88-91
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
		$_g = $l > 2;
		#/Users/ut/haxe/haxe_libraries/tink_web/0.1.4/github/7c93ab66f476c97e62510c653bb4e58e918e1471/src/tink/web/macros/Routing.hx:143: characters 22-31
		$_g1 = $l > 1;
		#/Users/ut/haxe/haxe_libraries/tink_web/0.1.4/github/7c93ab66f476c97e62510c653bb4e58e918e1471/src/tink/web/macros/Routing.hx:143: characters 22-31
		$_g2 = $l > 0;
		#/Users/ut/haxe/haxe_libraries/tink_web/0.1.4/github/7c93ab66f476c97e62510c653bb4e58e918e1471/src/tink/web/macros/Routing.hx:140: characters 22-41
		$_g3 = $ctx->part(1);
		#/Users/ut/haxe/haxe_libraries/tink_web/0.1.4/github/7c93ab66f476c97e62510c653bb4e58e918e1471/src/tink/web/macros/Routing.hx:140: characters 22-41
		$_g4 = $ctx->part(0);
		#/Users/ut/haxe/haxe_libraries/tink_web/0.1.4/github/7c93ab66f476c97e62510c653bb4e58e918e1471/src/tink/web/macros/Routing.hx:137: characters 22-39
		switch ($ctx->request->header->method) {
			case "GET":
				#/Users/ut/haxe/haxe_libraries/tink_web/0.1.4/github/7c93ab66f476c97e62510c653bb4e58e918e1471/src/tink/web/macros/Routing.hx:143: characters 22-31
				switch ($_g2) {
					case false:
						#src/Server.hx:53: characters 11-14
						return Promise_Impl_::ofSpecific($this->hello($ctx));
						break;
					case true:
						#/Users/ut/haxe/haxe_libraries/tink_web/0.1.4/github/7c93ab66f476c97e62510c653bb4e58e918e1471/src/tink/web/macros/Routing.hx:140: characters 22-41
						switch ($_g4) {
							case "cook":
								#/Users/ut/haxe/haxe_libraries/tink_web/0.1.4/github/7c93ab66f476c97e62510c653bb4e58e918e1471/src/tink/web/macros/Routing.hx:143: characters 22-31
								if ($_g1 === false) {
									#src/Server.hx:58: characters 11-18
									return Promise_Impl_::ofSpecific($this->cook($ctx));
								} else {
									#src/Server.hx:25: characters 22-50
									$this1 = $ctx->request->header->url;
									#src/Server.hx:25: characters 22-50
									return Promise_Impl_::ofOutcome(Outcome::Failure(new TypedError(404, "Not Found: [" . ($ctx->request->header->method??'null') . "] " . ((($this1->query === null ? $this1->path : ($this1->path??'null') . "?" . ($this1->query??'null')))??'null'), new HxAnon([
										"fileName" => "Server.hx",
										"lineNumber" => 25,
										"className" => "tink.web.routing.Router27",
										"methodName" => "route",
									]))));
								}
								break;
							case "dbone":
								#/Users/ut/haxe/haxe_libraries/tink_web/0.1.4/github/7c93ab66f476c97e62510c653bb4e58e918e1471/src/tink/web/macros/Routing.hx:143: characters 22-31
								if ($_g1 === false) {
									#src/Server.hx:137: characters 9-16
									return Promise_Impl_::ofSpecific($this->dbOne($ctx));
								} else {
									#src/Server.hx:25: characters 22-50
									$this11 = $ctx->request->header->url;
									#src/Server.hx:25: characters 22-50
									return Promise_Impl_::ofOutcome(Outcome::Failure(new TypedError(404, "Not Found: [" . ($ctx->request->header->method??'null') . "] " . ((($this11->query === null ? $this11->path : ($this11->path??'null') . "?" . ($this11->query??'null')))??'null'), new HxAnon([
										"fileName" => "Server.hx",
										"lineNumber" => 25,
										"className" => "tink.web.routing.Router27",
										"methodName" => "route",
									]))));
								}
								break;
							case "pod":
								#/Users/ut/haxe/haxe_libraries/tink_web/0.1.4/github/7c93ab66f476c97e62510c653bb4e58e918e1471/src/tink/web/macros/Routing.hx:143: characters 22-31
								if ($_g1 === true) {
									#/Users/ut/haxe/haxe_libraries/tink_web/0.1.4/github/7c93ab66f476c97e62510c653bb4e58e918e1471/src/tink/web/macros/Routing.hx:143: characters 22-31
									if ($_g === false) {
										#src/Server.hx:87: characters 11-21
										return Promise_Impl_::ofSpecific($this->podId($ctx, $_g3));
									} else {
										#src/Server.hx:25: characters 22-50
										$this12 = $ctx->request->header->url;
										#src/Server.hx:25: characters 22-50
										return Promise_Impl_::ofOutcome(Outcome::Failure(new TypedError(404, "Not Found: [" . ($ctx->request->header->method??'null') . "] " . ((($this12->query === null ? $this12->path : ($this12->path??'null') . "?" . ($this12->query??'null')))??'null'), new HxAnon([
											"fileName" => "Server.hx",
											"lineNumber" => 25,
											"className" => "tink.web.routing.Router27",
											"methodName" => "route",
										]))));
									}
								} else {
									#src/Server.hx:25: characters 22-50
									$this13 = $ctx->request->header->url;
									#src/Server.hx:25: characters 22-50
									return Promise_Impl_::ofOutcome(Outcome::Failure(new TypedError(404, "Not Found: [" . ($ctx->request->header->method??'null') . "] " . ((($this13->query === null ? $this13->path : ($this13->path??'null') . "?" . ($this13->query??'null')))??'null'), new HxAnon([
										"fileName" => "Server.hx",
										"lineNumber" => 25,
										"className" => "tink.web.routing.Router27",
										"methodName" => "route",
									]))));
								}
								break;
							case "rss":
								#/Users/ut/haxe/haxe_libraries/tink_web/0.1.4/github/7c93ab66f476c97e62510c653bb4e58e918e1471/src/tink/web/macros/Routing.hx:143: characters 22-31
								if ($_g1 === false) {
									#src/Server.hx:72: characters 11-17
									return Promise_Impl_::ofSpecific($this->getRss($ctx));
								} else {
									#src/Server.hx:25: characters 22-50
									$this14 = $ctx->request->header->url;
									#src/Server.hx:25: characters 22-50
									return Promise_Impl_::ofOutcome(Outcome::Failure(new TypedError(404, "Not Found: [" . ($ctx->request->header->method??'null') . "] " . ((($this14->query === null ? $this14->path : ($this14->path??'null') . "?" . ($this14->query??'null')))??'null'), new HxAnon([
										"fileName" => "Server.hx",
										"lineNumber" => 25,
										"className" => "tink.web.routing.Router27",
										"methodName" => "route",
									]))));
								}
								break;
							case "up":
								#/Users/ut/haxe/haxe_libraries/tink_web/0.1.4/github/7c93ab66f476c97e62510c653bb4e58e918e1471/src/tink/web/macros/Routing.hx:143: characters 22-31
								switch ($_g1) {
									case false:
										#src/Server.hx:80: characters 11-16
										return Promise_Impl_::ofSpecific($this->up($ctx, null));
										break;
									case true:
										#/Users/ut/haxe/haxe_libraries/tink_web/0.1.4/github/7c93ab66f476c97e62510c653bb4e58e918e1471/src/tink/web/macros/Routing.hx:143: characters 22-31
										if ($_g === false) {
											#src/Server.hx:81: characters 11-24
											return Promise_Impl_::ofSpecific($this->up($ctx, $_g3));
										} else {
											#src/Server.hx:25: characters 22-50
											$this15 = $ctx->request->header->url;
											#src/Server.hx:25: characters 22-50
											return Promise_Impl_::ofOutcome(Outcome::Failure(new TypedError(404, "Not Found: [" . ($ctx->request->header->method??'null') . "] " . ((($this15->query === null ? $this15->path : ($this15->path??'null') . "?" . ($this15->query??'null')))??'null'), new HxAnon([
												"fileName" => "Server.hx",
												"lineNumber" => 25,
												"className" => "tink.web.routing.Router27",
												"methodName" => "route",
											]))));
										}
										break;
								}
								break;
							case "viewrss":
								#/Users/ut/haxe/haxe_libraries/tink_web/0.1.4/github/7c93ab66f476c97e62510c653bb4e58e918e1471/src/tink/web/macros/Routing.hx:143: characters 22-31
								if ($_g1 === false) {
									#src/Server.hx:65: characters 12-22
									return Promise_Impl_::ofSpecific($this->getRssView($ctx));
								} else {
									#src/Server.hx:25: characters 22-50
									$this16 = $ctx->request->header->url;
									#src/Server.hx:25: characters 22-50
									return Promise_Impl_::ofOutcome(Outcome::Failure(new TypedError(404, "Not Found: [" . ($ctx->request->header->method??'null') . "] " . ((($this16->query === null ? $this16->path : ($this16->path??'null') . "?" . ($this16->query??'null')))??'null'), new HxAnon([
										"fileName" => "Server.hx",
										"lineNumber" => 25,
										"className" => "tink.web.routing.Router27",
										"methodName" => "route",
									]))));
								}
								break;
							default:
								#src/Server.hx:25: characters 22-50
								$this17 = $ctx->request->header->url;
								#src/Server.hx:25: characters 22-50
								return Promise_Impl_::ofOutcome(Outcome::Failure(new TypedError(404, "Not Found: [" . ($ctx->request->header->method??'null') . "] " . ((($this17->query === null ? $this17->path : ($this17->path??'null') . "?" . ($this17->query??'null')))??'null'), new HxAnon([
									"fileName" => "Server.hx",
									"lineNumber" => 25,
									"className" => "tink.web.routing.Router27",
									"methodName" => "route",
								]))));
								break;
						}
						break;
				}
				break;
			case "POST":
				#/Users/ut/haxe/haxe_libraries/tink_web/0.1.4/github/7c93ab66f476c97e62510c653bb4e58e918e1471/src/tink/web/macros/Routing.hx:140: characters 22-41
				if ($_g4 === "files") {
					#/Users/ut/haxe/haxe_libraries/tink_web/0.1.4/github/7c93ab66f476c97e62510c653bb4e58e918e1471/src/tink/web/macros/Routing.hx:143: characters 22-31
					if ($_g2 === true) {
						#/Users/ut/haxe/haxe_libraries/tink_web/0.1.4/github/7c93ab66f476c97e62510c653bb4e58e918e1471/src/tink/web/macros/Routing.hx:143: characters 22-31
						if ($_g1 === false) {
							#src/Server.hx:95: characters 7-12
							return Promise_Impl_::ofSpecific($this->files($ctx));
						} else {
							#src/Server.hx:25: characters 22-50
							$this18 = $ctx->request->header->url;
							#src/Server.hx:25: characters 22-50
							return Promise_Impl_::ofOutcome(Outcome::Failure(new TypedError(404, "Not Found: [" . ($ctx->request->header->method??'null') . "] " . ((($this18->query === null ? $this18->path : ($this18->path??'null') . "?" . ($this18->query??'null')))??'null'), new HxAnon([
								"fileName" => "Server.hx",
								"lineNumber" => 25,
								"className" => "tink.web.routing.Router27",
								"methodName" => "route",
							]))));
						}
					} else {
						#src/Server.hx:25: characters 22-50
						$this19 = $ctx->request->header->url;
						#src/Server.hx:25: characters 22-50
						return Promise_Impl_::ofOutcome(Outcome::Failure(new TypedError(404, "Not Found: [" . ($ctx->request->header->method??'null') . "] " . ((($this19->query === null ? $this19->path : ($this19->path??'null') . "?" . ($this19->query??'null')))??'null'), new HxAnon([
							"fileName" => "Server.hx",
							"lineNumber" => 25,
							"className" => "tink.web.routing.Router27",
							"methodName" => "route",
						]))));
					}
				} else {
					#src/Server.hx:25: characters 22-50
					$this110 = $ctx->request->header->url;
					#src/Server.hx:25: characters 22-50
					return Promise_Impl_::ofOutcome(Outcome::Failure(new TypedError(404, "Not Found: [" . ($ctx->request->header->method??'null') . "] " . ((($this110->query === null ? $this110->path : ($this110->path??'null') . "?" . ($this110->query??'null')))??'null'), new HxAnon([
						"fileName" => "Server.hx",
						"lineNumber" => 25,
						"className" => "tink.web.routing.Router27",
						"methodName" => "route",
					]))));
				}
				break;
			default:
				#src/Server.hx:25: characters 22-50
				$this111 = $ctx->request->header->url;
				#src/Server.hx:25: characters 22-50
				return Promise_Impl_::ofOutcome(Outcome::Failure(new TypedError(404, "Not Found: [" . ($ctx->request->header->method??'null') . "] " . ((($this111->query === null ? $this111->path : ($this111->path??'null') . "?" . ($this111->query??'null')))??'null'), new HxAnon([
					"fileName" => "Server.hx",
					"lineNumber" => 25,
					"className" => "tink.web.routing.Router27",
					"methodName" => "route",
				]))));
				break;
		}
	}


	/**
	 * @param Context $ctx
	 * @param string $status
	 * 
	 * @return FutureObject
	 */
	public function up ($ctx, $status = null) {
		#src/Server.hx:82: lines 82-85
		$d = $this->target;
		#/Users/ut/haxe/haxe_libraries/tink_web/0.1.4/github/7c93ab66f476c97e62510c653bb4e58e918e1471/src/tink/web/macros/Routing.hx:313: lines 313-316
		$d1 = null;
		#/Users/ut/haxe/haxe_libraries/tink_web/0.1.4/github/7c93ab66f476c97e62510c653bb4e58e918e1471/src/tink/web/macros/Routing.hx:313: lines 313-316
		if ($status === null) {
			#/Users/ut/haxe/haxe_libraries/tink_web/0.1.4/github/7c93ab66f476c97e62510c653bb4e58e918e1471/src/tink/web/macros/Routing.hx:313: lines 313-316
			$d1 = null;
		} else {
			#src/Server.hx:82: lines 82-85
			$_g = Stringly_Impl_::parse($status, function ($s) {
				#src/Server.hx:82: lines 82-85
				return $s;
			});
			#src/Server.hx:82: lines 82-85
			switch ($_g->index) {
				case 0:
					#/Users/ut/haxe/haxe_libraries/tink_web/0.1.4/github/7c93ab66f476c97e62510c653bb4e58e918e1471/src/tink/web/macros/Routing.hx:313: lines 313-316
					$d1 = $_g->params[0];
					break;
				case 1:
					#src/Server.hx:82: lines 82-85
					return Promise_Impl_::ofOutcome(Outcome::Failure($_g->params[0]));
					break;
			}
		}
		#src/Server.hx:82: lines 82-85
		return Promise_Impl_::next(Promise_Impl_::ofOutcome(Outcome::Success($d->up($d1))), Next_Impl_::ofSafeSync(function ($v) {
			#src/Server.hx:82: lines 82-85
			return Response_Impl_::ofHtml($v);
		}));
	}
}


Boot::registerClass(Router27::class, 'tink.web.routing.Router27');
