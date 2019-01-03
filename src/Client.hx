using tink.CoreApi;
import js.jquery.Helper;

class Client {
	
	function new(){
		trace( "hello" + Date.now());
	}


	static function main(){

		new Client();

	}

	public function execute(){
		trace("execute");
	}

}



