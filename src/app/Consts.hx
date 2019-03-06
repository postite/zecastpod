package app;
class Consts{

    //public static var baseUrl:String="http://zecastpod.postite.com";
   // public static var baseUrl:String;//="http://zecastpod.postite.com";

    @:isVar
    public static var baseUrl(get,never):String;

    public static function get_baseUrl():String{
        
        #if php
        return 'http://'+php.Web.getHostName();
        #elseif js
        return js.Browser.window.location.host;
        #end
        return null;

    }

}