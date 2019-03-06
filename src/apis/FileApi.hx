package apis;

using tink.CoreApi;
import tink.web.forms.FormFile;
using tink.io.Source;
using Tools;
import tink.http.StructuredBody.UploadedFile;
class FileApi{


    public static function saveImg(img:Null<FormFile>):Promise<{name:String}> {
		if (img != null){
			var cleanName = img.fileName.underclean();
		return 	img.saveTo("./statics/" + cleanName)
			.next(noise->ImageApi.getResizedImage('statics/${cleanName}'))
			.next(path->{name:path});
		}else{
			return Promise.lift({name: null});
		}
	}


	public static function saveFile(img:Null<FormFile>):Promise<Noise> {
		if (img != null){
			var cleanName = img.fileName.underclean();
		return 	img.saveTo("./statics/" + cleanName);
		
		}else{
			return Promise.lift({name: null});
		}
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