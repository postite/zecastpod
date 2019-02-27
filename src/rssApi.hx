import Credits.*;

class RssApi {
	public function new() {}

	public static var days = ["Sun", "Mon", "Tue", "Wed", "Thu", "Fri", "Sat"];
	public static var months = [
		"Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"
	];

	public function getRss():Rss {
		// var db = DBApi.instance.getAll();
		var rss = new Rss();
		rss.items = [];
		var counter = 1;
		DBApi.instance.getAll().map(function(it) {
			var item:Rss.PodRssItem = cast {};
			item.id = it.id;
			item.title = StringTools.htmlEscape(it.title);
			item.description = StringTools.htmlEscape(it.desc);
			item.permalink = '$baseUrl/pod/' + it.id;
			item.author = '$mail ($prenom $nom)';
			item.duration = "00:32:16";
			item.image = '$baseUrl/${it.imageUrl}';
			item.explicit = "no";

			item.sound = {
				url: '$baseUrl/${it.soundUrl}',
				length: it.length,
				type: "audio/mpeg"
			}

			var date = Date.fromTime(it.pubdate);
			// date = DateTools.delta(date, -10000000 * counter);
			item.pubdate = DateTools.format(date, '${days[date.getDay()]}, %d ${months[date.getMonth()]} %Y %H:%M:%S +0100');
			// counter = counter + 1;
			rss.items.push(item);
		});
		rss.logo = "$baseUrl/logo.png";
		rss.title = "zecastpod";
		rss.author = {nom: Credits.nom, prenom: Credits.prenom, mail: Credits.mail};
		return rss;
	}

	public function getJson():String {
		var rss = cast {};
		rss.items = [];

		DBApi.instance.getAll().map(function(it) {
			var item:Rss.PodRssItem = cast {};
			item.id = it.id;
			item.title = StringTools.urlEncode(it.title);
			item.description =  StringTools.urlEncode(it.desc);
			item.permalink = '$baseUrl/pod/' + it.id;
			item.author = '$mail ($prenom $nom)';
			item.duration = "00:32:16";
			item.image = '$baseUrl/${it.imageUrl}';
			item.explicit = "no";

			item.sound = {
				url: '$baseUrl/${it.soundUrl}',
				length: it.length,
				type: "audio/mpeg"
			}
			var date = Date.fromTime(it.pubdate);
			// date = DateTools.delta(date, -10000000 * counter);
			item.pubdate = DateTools.format(date, '${days[date.getDay()]}, %d ${months[date.getMonth()]} %Y %H:%M:%S +0100');
			// counter = counter + 1;
			//item.pubdate=Date.fromTime(it.pubdate);
			rss.items.push(item);
		});
			 return haxe.Json.stringify(rss,null," ");
			
	}
}
