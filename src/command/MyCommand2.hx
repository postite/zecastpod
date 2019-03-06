package command;
import wire.ICommand;
@:keep
class MyCommand2 implements ICommand{

    public function execute<T>(?data:T){
        trace("execute command2" +data);
    }
}