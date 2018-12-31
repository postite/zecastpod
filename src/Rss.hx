typedef PodRss={
    title:String,
    logo:String,
    url:String,
    langage:String,
    subtitles:String,
    author:String,
    summary:String,
    description:String,
    owner:PodOwner,
    explicit:String,
    category:String,
    items:Array<PodRssItem>
}

typedef PodOwner={
    name:String,
    mail:String,
}
typedef PodRssItem={
    ?id:Int,
    ?title:String,
    ?description:String,
    ?permalink:String,
    ?sound:PodSound,
    ?date:String,
    ?author:String,
    ?image:String,
    ?duration:String,
    ?explicit:String
}

typedef PodSound={
    ?url:String,
    ?type:String,
    ?length:Int
}

class Rss {

public var logo:String;
public var title:String;
public var url:String;
public var langage:String;
public var subtitles:String;
public var authoe:String;
public var summary:String;
public var description:String;
public var owner:String;
public var explicit:String;
public var category:String;
public var items:Array<PodRssItem>;

  public function new(  ) {
    
    items = new Array();
  }
  @:template public function rssTemplate();// <---- this bit is new!
}

