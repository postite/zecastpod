package app;

import tink.http.containers.*;
import tink.web.routing.*;
import tink.http.middleware.Static;
import tink.http.Response;

using wire.Actor;

class Server {
	static function main() {
		Actor.defaultLayout = new views.Layout();
		#if php
		var container = PhpContainer.inst;
		
		#else
		var container = new NodeContainer(8080);
		#end
		var router = new Router<Root>(new Root());
		
		var handler:tink.http.Handler = function(req) {
			return router.route(Context.ofRequest(req)).recover(OutgoingResponse.reportError);
		}
		handler = handler.applyMiddleware(new Static('./statics', '/'));
		container.run(handler);
	}
}
