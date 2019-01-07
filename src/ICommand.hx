interface ICommand {

    public function execute<T>(?data:T):Void;
}