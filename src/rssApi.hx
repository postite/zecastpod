class RssApi {
    
	public function new() {}

	public static var days = ["Sun", "Mon", "Tue", "Wed", "Thu", "Fri", "Sat"];
	public static var months = [
		"Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"
	];

	public function getRss():Rss {
		var db = DBApi.instance.getAll();
		var rss = new Rss();
		rss.items = [];
		var counter = 1;
		DBApi.instance.getAll().map(function(it) {
			var item:Rss.PodRssItem = cast {};
            item.id=it.id;
			item.title = it.title;
			item.description = it.desc;
			item.permalink = '$baseUrl/pod/'+it.id;
			item.author = "zelote@postite.com (zel kert)";
			item.duration = "00:32:16";
            item.image='$baseUrl/${it.imageUrl}';
			item.explicit = "no";
			item.sound = {
				url: '$baseUrl/${it.soundUrl}',
				length: it.length,
				type: "audio/mpeg"
			}

			var date = Date.now();
			date = DateTools.delta(date, -10000000 * counter);
			item.date = DateTools.format(date, '${days[date.getDay()]}, %d ${months[date.getMonth()]} %Y %H:%M:%S +0100');
			counter = counter + 1;
			rss.items.push(item);
		});
        rss.logo="$baseUrl/logo.png";
		rss.title = "zecastpod";
		return rss;
	}
}
