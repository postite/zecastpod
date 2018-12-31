package views;
import views.UpView;
using tink.CoreApi;


class UpdateView{
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

