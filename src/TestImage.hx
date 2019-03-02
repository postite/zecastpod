class TestImage{
    var imapi:ImageApi;
    public  function new()
    {
       trace("olu");
       
    ImageApi.getResizedImage('statics/Capture_d__cran_2019_01_31___16_50_41.png') 
    .flatMap(o->o.log())
    .handle(o->switch(o){
        case Success(path):path.log("wééé");
        case Failure(f):f.toString().log('boooh');
    });
    }
    static public function main()
    {
     //   var input =4;
    new TestImage();
    //  var createFrom = 'imagecreatefrom';
	// var sroc = php.Syntax.code('{0}({1})',createFrom,input).log();
						
	// var src = untyped __php__('{0}({1})',createFrom,input).log();
     //Tools.cleanFileName("Capture d’écran 2019-02-23 à 13.51.22.png","").log();
      
    }

}