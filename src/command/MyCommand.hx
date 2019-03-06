package command;
import wire.ICommand;

#if js
import js.jquery.Helper.*;
#end
@:keep
class MyCommand implements ICommand{

    public function execute<T>(?data:T){
   #if js     
        trace("execute commando");
        J(onDom);
    #end
    }

    #if js

    function onDom(){

       // J("#logo").css({"width":'10px'});

    }

    #end

}