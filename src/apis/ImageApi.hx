package apis;

import asys.FileSystem;
import image.Image;

using tink.CoreApi;
using haxe.io.Path;

class ImageApi {
	public function new() {}

	public static function getResizedImage(path:String, ?taille:Taille):Promise<String> {
		if (taille == null)
			taille = Taille.Square;

		if (['gif', 'jpg', 'jpeg', 'png'].indexOf(path.extension().toLowerCase()) == -1 || taille == Taille.Normal)
			return Promise.lift("polo" + path);
		var dir = path.directory().addTrailingSlash() + "thumb";
		var thumbPath = "" + dir + "/" + taille.toName() + path.withoutDirectory();
		var relativeThumbPath = dir + "/" + taille.toName() + path.withoutDirectory();

		return FileSystem.exists(thumbPath)
			.next(exists -> return Promise.inParallel([getModTime("" + path), getModTime(thumbPath)])
				.next(ret -> (!exists || (ret[0] > ret[1]))))
			.next(b -> {
				if (b)
					return FileSystem.createDirectory("" + dir)
				else
					return Promise.lift(Noise);
			})
			.next(p -> return Image.resize("" + path, thumbPath, {
				engine: Engine.GD,
				width: taille.w,
				height: taille.h,
				crop: taille.crop,
				focus: taille.focus
			}))
			.next(p -> relativeThumbPath);
	}

	static function getModTime(path:String):Promise<Float> {
		return FileSystem.stat(path).next((st) -> st.mtime.getTime()).map(function(o) {
			return switch (o) {
				case Success(s): s;
				case Failure(f): .0;
			}
		});
	}
}

@:publicFields
@:structInit
class Resizr {
	var n:String = "nada";
	var w:Int = 2;
	var h:Int = 3;
	var crop:Bool = true; // Defaults to true
	var focus:{x:Float, y:Float} = {x: .5, y: .5};

	public function new(n:String, w:Int, h:Int, ?crop:Bool, ?focus:{x:Float, y:Float}) {
		this.n = n;
		this.w = w;
		this.h = h;
		this.crop = crop;
		this.focus = focus;
	}
}

@:forward
abstract Taille(Resizr) from Resizr to Resizr {
	public static var Square:Taille = {n: "Square", w: 193, h: 193};
	public static var Long:Taille = {
		n: "Long",
		w: 600,
		h: 300,
		crop: false
	};
	public static var Screen:Taille = {
		n: "Screen",
		w: 800,
		h: 600,
		crop: false
	};
	public static var Normal:Taille = {
		n: "Normal",
		w: 0,
		h: 0,
		crop: false
	};

	inline function new(i:Resizr) {
		this = i;
	}

	@:to
	public static function toStr(t:Taille):String {
		return '${t.w}*${t.h}_';
	}

	@:to
	public static function toName(t:Taille):String {
		return t.n + "_";
	}
}
