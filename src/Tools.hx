class Tools{


    public static function underclean(str:String,separator:String="_"):String{
    var extension=haxe.io.Path.extension(str);
    str =haxe.io.Path.withoutExtension(str);
   //	str=~/[\.]/.replace(str,"alaplacedupoint");
    var nonWordChar= ~/[\xC0-\xFF\s\W]/g;
    str= nonWordChar.replace(str,separator);
   // str=~/alaplacedupoint/.replace(str,".");
    return str+"."+extension;
   }


   public static function cleanFileName(str:String,?sep:String){
     return  Deburr.deburr( underclean(str,sep));
   }


}