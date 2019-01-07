
abstract ActionCommand(String) from String to String{

    @:from public static function toString(c:Class<ICommand>):ActionCommand{
        //return Std.string(c);
        return Type.getClassName(c);
    }

    @:to public static function toClass(a:ActionCommand):Class<ICommand>{
        return cast Type.resolveClass(a);
    }
}