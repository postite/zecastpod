import views.Layout;

class Actor{
    static var actions:Map<String,String>=new Map();
    public function new(){

    }

    public function getAction(){

    }
    public static function addAction<T>(layout:Layout,a:ActionCommand,?data):Layout{
       
            writeAction(a,data);
            layout.addAct(haxe.Serializer.run(actions));
            return layout;
       
    }

   static function  writeAction(a:ActionCommand,?data){
        actions.set(a,data);
        return actions;
    }


}

