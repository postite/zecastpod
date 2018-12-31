class Tools{


    public static function underclean(str:String):String{
   	str=~/[\.]/.replace(str,"alaplacedupoint");
    var nonWordChar= ~/[\xC0-\xFF\s\W]/g;
    str= nonWordChar.replace(str,"_");
    str=~/alaplacedupoint/.replace(str,".");
    return str;
   }
}