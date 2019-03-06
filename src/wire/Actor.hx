package wire;
import views.Layout;
import wire.ILayout;
using Lambda;
class Actor{

    static var actions:Map<String,String>=new Map();

    static  var scripts:Array<String>=[];

    @:isVar public static var defaultLayout(default,set):ILayout;
    public function new(){

    }
    public static function set_defaultLayout(layout:ILayout){
        return defaultLayout=layout;
    }

    public function getAction(){

    }
    public static function addAction<T>(layout:ILayout,a:ActionCommand,?data):ILayout{
       
            writeAction(a,data);
            addAct(layout,haxe.Serializer.run(actions));
            return layout;
       
    }

    static  function addAct(layout:ILayout,actions:String):ILayout{
        init(layout,actions);
        return layout;
    }

    public static function addScript(layout:ILayout,script:String):ILayout{
       
        if (!scripts.has(script))
            scripts.push(script);
            return layout;

    }
    //@todo decouple Head ici....
    public static function init(layout:ILayout,?actions:String){
        layout.head=views.Head.render(scripts,actions);
    }

    static function  writeAction(a:ActionCommand,?data){
        actions.set(a,data);
        return actions;
    }

    public static function withLayout(v:tink.template.Html,?layout:ILayout,?contentid="layout"):ILayout{
       var  _Layout=(layout==null)? defaultLayout : layout;
       init(_Layout);
        _Layout.viewContent=v;
        _Layout.id=contentid;
        return _Layout;

    }


}

