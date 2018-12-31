package views;
import tink.template.Html;
using Lambda;
class Layout{

    static var viewContent:tink.template.Html;
   
    public static var footer:Html;
    public static var header:Html;
    public static var head:Html;
    public static var menu:Html;
    public static var id:String;
    public static var scripts:Array<String>=[];

    public static function withLayout(v:tink.template.Html,?contentid="layout"){
        init();
        viewContent=v;
        id=contentid;
        return render();
    }

    public function addScript(script:String){
       
        if ( !scripts.has(script) )
            scripts.push(script);
    }

    public static function init(){
        head=views.Head.render(scripts);
    } 

    @:template("layout.tt")
    public static function render();
}