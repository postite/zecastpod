package views;
using tink.CoreApi;
enum Status{
    Nib;
    Cool;
    PasCool(er:Error);
}
@:forward
@:enum abstract StrStatus(String) from String to String{
  var nib="Nib";
  var cool="Cool";
  var pasCool="PasCool";
}

class UpView{
  var status:Status;
  var note:String= "boooo";
  var rec:Rec=null;
  var mod:Bool=false;
  public function new(?_status:StrStatus, ?rec:Rec=null){
    if( rec!=null){
      this.rec=rec;
      mod=true;
    }
    if(_status==null)_status= nib;
    note= switch( _status){
      case nib: "nib";
      case cool: "cool";
      case pasCool:"pas cool";
    }
  }

  @:template('updateform.tt')
  public function form():tink.template.Html;

}

