import tink.http.Fetch;
using tink.CoreApi;
import haxe.crypto.Md5;
class Fetcher{
    
    var tok:String;
    public var authorisationUrl:String;
    public var clientId:String;
    //public var clientSecret:String;
    public var redirectUrl:String;
    public var scope:String;
    public var state:String;
    public function new (){

    }
    public function fetch(url:String):Promise<tink.http.CompleteResponse>{

        if(tok!=null)
         return Fetch.fetch(url).all();

        return auth();
        
    }
    

    public function auth(){
        
       js.Browser.window.open(buildAuthUrl(
            authorisationUrl
            ,clientId
            ,{
                redirectUri:redirectUrl,
                scope:scope,
                state:nonce()
                }
            ),"_blank");
        return null;
    }

    public static inline function buildAuthUrl (baseUri:String, clientId:String, ?opts:{ ?redirectUri:String, ?scope:String, ?state:String }, ?additionalParams:Map<String, String>):String {
		var uri = '$baseUri?response_type=code&client_id=${StringTools.urlEncode(clientId)}';
		
		if (opts != null) {
			if (opts.redirectUri != null) uri += '&redirect_uri=${StringTools.urlEncode(opts.redirectUri)}';
			if (opts.scope != null) uri += '&scope=${StringTools.urlEncode(opts.scope)}';
			if (opts.state != null) uri += '&state=${StringTools.urlEncode(opts.state)}';
		}
		
		if (additionalParams != null) {
			for (i in additionalParams.keys()) {
				uri += '&$i=${StringTools.urlEncode(additionalParams.get(i))}';
			}
		}
		
		return uri;
	}

    public function storeTok(tok:String):Promise<Noise>{
        return Future.sync(Success(Noise));
    }
    public function getTok():Promise<String>{
        return Future.sync(Success("polo"));
    }

    public static inline function nonce ():String {
		return Md5.encode(Std.string(Math.random()));
	}



}