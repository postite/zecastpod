import sys.db.Sqlite;
using tink.io.Source;
using tink.CoreApi;
typedef JsonRss={
    items:Array<Dynamic>
}

class DBApi{

    static final  sqlFileName="dibase.db";
   static var cnx:sys.db.Connection;
   static var _instance:DBApi;
    public function new(){
      
     // deleteTable(Rec);
      //createFile();
     // init();

    }
    public static var instance(get,never):DBApi;

    public static  function get_instance():DBApi{
        if (_instance==null)
        _instance= new DBApi();
        return _instance;
    }
    public function getAll():List<Rec>{
        return Rec.manager.all();
    }
    public function get(id:Int):Rec{
        return Rec.manager.get(id);
    }
    public function delete(id:Int){
        Rec.manager.get(id).delete();
    }

    
    
    public function saveRec(filename,title,desc,length,img):Promise<Int>{
        var rec=new Rec();
        rec.title=title;
        rec.soundUrl=filename;
        rec.desc=desc;
        rec.length=length;
        rec.imageUrl=img;
        rec.pubdate=Date.now().getTime();
        rec.insert();
        return Promise.lift(rec.id);
    }

    public function updateRec(id:Int,filename:Null<String>,title:String,desc:String,length:Int,img:String):Promise<Int>{
        var rec=Rec.manager.get(id);
        rec.title=title;
        rec.desc=desc;

        if( filename !=null){
        rec.soundUrl=filename;
        rec.length=length;
        }

        if( img!=null)
        rec.imageUrl=img;     
        rec.update();

        return Promise.lift(rec.id);
    }

    public function testit(){
        var rec=new Rec();
        rec.soundUrl="broummm";
        rec.desc="paglop";
        rec.insert();
    }

    public function clean(){
        var list=Rec.manager.search($id>2);
        list.map(rec->rec.delete());
        return true;
    }

    static public function deleteTable(m:Class<sys.db.Object>){
        var manager= Reflect.field(m,"manager");
		cnx.request('DROP TABLE '+manager.dbInfos().name);
	}

	static public function createFile(){
		sys.io.File.saveContent('./$sqlFileName',"");
	}

    // static function duplicateTable(){
    //     var manager= Reflect.field(m,"manager");
    //     var tablename:String=manager.dbInfos().name;
    //     cnx.request('ALTER TABLE ${tablename} RENAME TO ${tablename}_old');
        
    // }

    

    public function getasJson():String{
       return haxe.Json.stringify( Rec.manager.all());
    }
    public function fromJson(s:String):Promise<String>{
        return tink.http.Fetch.fetch(s).all().next(res->{
            var str = res.body.toString();
            return str;
        })
        .next(s->{
        //var t=haxe.Json.parse(s);
        //return t.items[0].title;
        //return {items:[]};
        return s;
        });   
    }

    public function recsfromJson(a:String){
        var json:JsonRss= haxe.Json.parse(a);
        json.items.length.log();
         for (_rec in json.items){
        var rec= new Rec();
        rec.title=StringTools.urlDecode(_rec.title);
        rec.soundUrl=_rec.sound.url;
        rec.desc=StringTools.urlDecode(_rec.description);
        rec.length=_rec.sound.length;
        rec.imageUrl=_rec.image;
        rec.pubdate=Date.fromString(_rec.date).getTime();
        rec.insert();
       
         }
        return true;
    }

    public static function init(){
    cnx = Sqlite.open(sqlFileName);
		sys.db.Manager.cnx = cnx;

	
    if ( !sys.db.TableCreate.exists(Rec.manager) )
    {
    sys.db.TableCreate.create(Rec.manager);
    }
		sys.db.Manager.initialize();
        return  DBApi.instance;
    }
}