package views;
import model.Rec;
class PodPage{

    public var rec:Rec;
    public function new(rec:Rec){
        this.rec=rec;
    }
    @:template('podPage.tt')
    public function render();

}