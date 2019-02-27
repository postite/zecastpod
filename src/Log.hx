import haxe.DynamicAccess;

class Log{


    public static function log<T>(msg:T,?with:String=""):T{
        trace('$with: $msg');
        return msg;
    }

    
}