using tink.CoreApi;
import tink.web.forms.FormFile;
using tink.io.Source;
using Tools;
class FileApi{


    public static function saveImg(img:Null<FormFile>):Promise<{name:String}> {
		if (img != null)
			return img.read().all().next(function(chunk) {
				var cleanName = img.fileName.underclean();
				sys.io.File.saveBytes("./statics/" + cleanName, chunk.toBytes());
				return {name: cleanName};
			})
			.next(cleanNameObject->ImageApi.getResizedImage('statics/${cleanNameObject.name}'))
			.next(path->{name:path.log()});
		else
			return Promise.lift({name: null});
	}

	//todo check Mime 
	public static function saveSound(sound:Null<FormFile>):Promise<{name:String, length:Int}> {
		if (sound != null)
			return sound.read().all().next(function(chunk) {
				var cleanSoundName = sound.fileName.underclean();
				sys.io.File.saveBytes("./statics/" + cleanSoundName, chunk.toBytes());
				return {name: cleanSoundName, length: chunk.length};
			});
		else
			return Promise.lift({name: null, length: null});
	}



}