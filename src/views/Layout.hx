package views;
import tink.template.Html;
using Lambda;


class Layout{

    var viewContent:tink.template.Html;
   
    public  var footer:Html;
    public  var header:Html;
    public  var head:Html;
    public  var menu:Html;
    public  var id:String;
    public  var scripts:Array<String>=[];
   

    static var _instance:Layout;

    static public var instance(get,never):Layout;

    static public function get_instance():Layout{
        if (_instance==null)
            _instance = new Layout();
        return _instance;
    }

    public function new(){}

    public static function withLayout(v:tink.template.Html,?contentid="layout"):Layout{

        Layout.instance.init();
        Layout.instance.viewContent=v;
        Layout.instance.id=contentid;
        return Layout.instance;

    }

    public function addScript(script:String):Layout{
       
        if ( !scripts.has(script) )
            scripts.push(script);
            return this;

    }
    public function addAct(actions:String):Layout{

        head=views.Head.render(scripts,actions);
        return this;

    }

    public function init():Layout{
        head=views.Head.render(scripts,null);
        return this;
    } 

    @:template("layout.tt")
    public  function render();
}