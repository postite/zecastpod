package app;
import apis.RssApi;
import apis.DBApi;
import apis.FileApi;
using tink.CoreApi;
import tink.web.forms.FormFile;
using wire.Actor;
import command.*;
import tink.http.Response;
import views.UpView; //for status Enum;

class Root implements app.IRemoteRoot {
	var rssApi:RssApi;
	var dbApi:DBApi;

	public function new() {
		rssApi = new RssApi();

		dbApi = DBApi.init();
		
		var nav = [{
			url: "/rss",
			title: "abonne toi",
			description: "le flux rss du podcast"
		}];
		Actor.defaultLayout.menu = views.Menu.render(nav);
		
	}

	@:get('/')
	public function hello():tink.template.Html {
		//	Layout.header = views.HeaderHome.render();
		return views.Home.render()
			.withLayout()
			.addAction(MyCommand)
			.addAction(MyCommand2, "bingo")
			.render();
	}
	@:get('/layout2')
	public function hello2():tink.template.Html {
		var lay2=new views.Layout2();
		lay2.menu=views.Menu.render([]);
		return views.Home.render()
			.withLayout(lay2)
			.addAction(MyCommand)
			.addAction(MyCommand2, "binga")
			.render();
	}

	@:get('/dbinit')
	public function db():Bool {
		DBApi.init();
		return true;
	}

	@:get('/json')
	public function json():String {
		return rssApi.getJson();
	}

	@:get('/backup')
	public function fromjson() {
		return dbApi.fromJson("/json").next(z -> asys.io.File.saveContent("backjson.json", z));

	}

	@:get('/restore')
	public function restore() {
		return asys.io.File.getContent("backjson.json").next(c -> dbApi.recsfromJson(c));
	}

	@:get('/cook')
	public function cook() {
		var a:OutgoingResponse = "aaaaa";
		var b = tink.http.Header.HeaderField.setCookie("popo", "papa", null);
		a.header.concat([b]);
		return a;
	}

	@:get('/viewrss')
	public function getRssView() {
		var rss = rssApi.getRss();

		var t = views.Coolrss.render(rss);
		
		return t.withLayout()
		.addAction(MyCommand2).render();
	}


	@:get('/modif/$id')
	public function modif(id:Int) {
		var rec = dbApi.get(id);
		return new views.UpdateView(rec).form().withLayout().render();
	}

	@:get('/delete/$id')
	public function delete(id:Int) {
		dbApi.delete(id);
		return getRssView();
	}

	@:get('/clean/')
	public function clean()
		return dbApi.clean();

	@:produces('application/xml') // that line does nothing raise issue on tink_web ?
	@:get('/rss')
	public function getRss() {
		var rss = rssApi.getRss();
		#if debug
		var t = rss.rssTemplate();
		sys.io.File.saveContent("./rss.rss", t);
		#end
		var t = rss.render().toString();
		return OutgoingResponse.blob(OK, t, 'application/xml');
	}

	@:get('/up')
	@:get('/up/$status/$id')
	public function up(?status:String, ?id:Int) {
		if (id != null) {
			var rec = dbApi.get(id);
			return new views.UpView(status, rec).form().withLayout().render();
		}
		return new views.UpView(status).form().withLayout().render();
	}

	@:get('/pod/$id')
	public function podId(id:Int) {
		var sound = dbApi.get(id);
		return new views.PodPage(sound).render().withLayout("podpage").render();
	}

	@:get('/cliup')
	public function cliup(){
		return  views.UpPage.render().withLayout()
		.addAction(CliUp)
		.render();
	}

	@:get('/paf')
	public function paf():{arg:String}
	{
	   return {arg:"paf"};
	}
	@:post
	public function uploadFile(body:{file:FormFile}):Promise<{name:String}>
	{
	   return FileApi.saveImg(body.file);
	}

	@:post
	public function filesRec(body:{
		fileToUpload:FormFile,
		?imgToUpload:Null<FormFile>,
		desc:String,
		title:String
	}) {
		return FileApi.saveSound(body.fileToUpload)
			.next(function(sound) return FileApi.saveImg(body.imgToUpload)
				.next(img -> {sound: sound, img: img}))
			.next(arg -> recData(arg.sound.name, body.title, body.desc, arg.sound.length, arg.img.name)
				.next(i -> up(cool, i)))
			.recover(name -> {
				up(pasCool);
				return null;
			} // throw 'upload $name failed'
			);
	}

	@:post
	public function filesUpdate(body:{
		id:Int,
		fileToUpload:Null<FormFile>,
		?imgToUpload:Null<FormFile>,
		desc:String,
		title:String
	}){
		return FileApi.saveSound(body.fileToUpload)
			.next(function(sound) return FileApi.saveImg(body.imgToUpload)
				.next(img -> {sound: sound, img: img}))
			.next(arg -> updateData(body.id, arg.sound.name, body.title, body.desc, arg.sound.length, arg.img.name)
				.next(i -> up(cool, i)))
			.recover(name -> {
				up(pasCool);
				return null;
			} // throw 'upload $name failed'
			);
	}

	function recData(name, title, desc, length:Int, img):Promise<Int> {
		return dbApi.saveRec(name, title, desc, length, img);
	}

	function updateData(id:Int, name, title, desc, length:Int, img):Promise<Int> {
		return dbApi.updateRec(id, name, title, desc, length, img);
	}
}
