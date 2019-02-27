class Rec extends sys.db.Object {
	
	public var id:sys.db.Types.SId;
	public var soundUrl:sys.db.Types.SString<256>;
	public var imageUrl:Null<sys.db.Types.SString<256>>;
	public var length:sys.db.Types.SInt;
	public var desc:sys.db.Types.SText;
	public var title:sys.db.Types.SString<256>;
	public var pubdate:sys.db.Types.SFloat;

}