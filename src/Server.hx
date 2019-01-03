import tink.http.containers.*;
import tink.http.Response;
import tink.web.routing.*;
import tink.http.middleware.Static;
import tink.http.StructuredBody;

using tink.CoreApi;

import tink.http.Response;
import sys.io.File;
import tink.web.forms.FormFile;
// import api.IRoot;
import sys.FileSystem;

using tink.io.Source;
using views.Layout;

import views.UpView;

using Tools;

class Server {
	static function main() {
		#if php
		var container = PhpContainer.inst;
		#else
		var container = new NodeContainer(8080);
		#end
		var router = new Router<Root>(new Root());
		var handler:tink.http.Handler = function(req) {
			return router.route(Context.ofRequest(req)).recover(OutgoingResponse.reportError);
		}
		handler = handler.applyMiddleware(new Static('./statics', '/'));
		container.run(handler);
	}
}

class Root {
	var rssApi:RssApi;
	var dbApi:DBApi;

	public function new() {
		rssApi = new RssApi();

		dbApi = DBApi.init();
		Layout.footer = views.Footer.render();
		var nav = [{
			url: "/rss",
			title: "abonne toi",
			description: "le flux rss du podcast"
		}];
		Layout.menu = views.Hello.render(nav);
		Layout.header = views.Header.render();
	}

	@:get('/')
	public function hello():tink.template.Html {
	//	Layout.header = views.HeaderHome.render();
		return views.Home.render().withLayout();
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
		return t.withLayout();
	}

	@:get('/modif/$id')
	public function modif(id:Int) {
		var rec = dbApi.get(id);
		return new views.UpdateView(rec).form().withLayout();
	}

	@:get('/delete/$id')
	public function delete(id:Int) {
		dbApi.delete(id);
		return getRssView();
	}

	@:produces('application/xml')//that line does nothing raise issue on tink_web ?
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
	public function up(?status:String,?id:Int) {
		if( id !=null){
			var rec= dbApi.get(id);
			return new views.UpView(status,rec).form().withLayout();
		}
		return new views.UpView(status).form().withLayout();
	}

	@:get('/pod/$id')
	public function podId(id:Int) {
		var sound = dbApi.get(id);
		return new views.PodPage(sound).render().withLayout("podpage");
	}

	@:post
	public function filesRec(body:{
		fileToUpload:FormFile,
		imgToUpload:FormFile,
		desc:String,
		title:String
	}) {
		return saveSound(body.fileToUpload).next(function(sound) return saveImg(body.imgToUpload)
			.next(img -> {sound: sound, img: img}))
			.next(arg -> recData(arg.sound.name, body.title, body.desc, arg.sound.length, arg.img.name)
				.next(i -> up(cool,i))
			).recover(name -> {
					up(pasCool);
					return null;
				} // throw 'upload $name failed'
			);

	}

	@:post
	public function filesUpdate(body:{
        id:Int,
		fileToUpload:Null<FormFile>,
		imgToUpload:Null<FormFile>,
		desc:String,
		title:String
	}) {
		return saveSound(body.fileToUpload)
			.next(function(sound) 
				return saveImg(body.imgToUpload)
				.next(img -> {sound: sound, img: img}))
				.next(arg -> updateData(body.id,arg.sound.name, body.title, body.desc, arg.sound.length, arg.img.name)
					.next(i -> up(cool,i))
				).recover(name -> {
					up(pasCool);
					return null;
				} // throw 'upload $name failed'
				);

	}

	function saveImg(img:Null<FormFile>):Promise<{name:String}> {
		if (img != null)
			return img.read().all().next(function(chunk) {
				var cleanName = img.fileName.underclean();
				sys.io.File.saveBytes("./statics/" + cleanName, chunk.toBytes());
				return {name: cleanName};
			});
		else
			return Promise.lift({name: null});
	}

	function saveSound(sound:Null<FormFile>):Promise<{name:String, length:Int}> {
		if (sound != null)
			return sound.read().all().next(function(chunk) {
				var cleanSoundName = sound.fileName.underclean();
				sys.io.File.saveBytes("./statics/" + cleanSoundName, chunk.toBytes());
				return {name: cleanSoundName, length: chunk.length};
			});
		else
			return Promise.lift({name: null, length: null});
	}

	function recData(name, title, desc, length:Int, img):Promise<Int> {
		return dbApi.saveRec(name,title,desc,length,img);
	}

	function updateData(id:Int,name, title, desc, length:Int, img):Promise<Int> {
		
        return dbApi.updateRec(id,name,title,desc,length,img);
		
	}


}
