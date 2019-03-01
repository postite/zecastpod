class TestImage{
    var imapi:ImageApi;
    public  function new()
    {
       trace("olu");
       
    ImageApi.getResizedImage('statics/Capture_d__cran_2018_10_15___13.56_19.png') 
    .flatMap(o->o.log())
    .handle(o->switch(o){
        case Success(path):path.log("wééé");
        case Failure(f):f.toString().log('boooh');
    });
    }

    static public function main()
    {
    new TestImage();

     //Tools.cleanFileName("Capture d’écran 2019-02-23 à 13.51.22.png","").log();
      
    }

}