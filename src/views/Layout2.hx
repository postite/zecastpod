package views;

 class Layout2 extends Layout{
  
  public function new (){
      super();
      this.header=views.Header.render();
      
  }

    @:template("layout2.tt")
  override public function render():tink.template.Html;

    
}