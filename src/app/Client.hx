package app;
using tink.CoreApi;
import wire.ActionCommand;
import tink.http.clients.JsClient;
import tink.web.proxy.Remote.RemoteEndpoint;
import tink.web.proxy.Remote;
import tink.url.Host;
import command.*;
import wire.*;

class Client {
	var r:Remote<IRemoteRoot>;
	function new(){
		trace( "hello" + Date.now());
		 r = new Remote<IRemoteRoot>(
			new JsClient(),
			new RemoteEndpoint(new Host('zecastpod.local')));
		execute();
	}


	static function main(){
		trace( "je suis le client");
		CompileTime.importPackage("command");
		new Client();
		
	}

	public function execute(){
		
		var t:Map<ActionCommand,Dynamic>= haxe.Unserializer.run(untyped actions);
		for( a in t.keys()){
			Type.createInstance(a,[r]).execute(t.get(a));
		}
	}

}



