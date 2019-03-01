import haxe.DynamicAccess;

class Log{


    public static function log<T>(msg:T,?with:String="",?pos:haxe.PosInfos):T{
        trace('${pos.className} ${pos.lineNumber} $with: $msg');
        return msg;
    }

    
}