package command;
import tink.web.proxy.Remote;
import app.IRemoteRoot;
#if js
import js.Browser.document in doc;
import js.jquery.Helper.*;
#end
import tink.web.forms.FormFile;
import haxe.crypto.Base64;

@:keep
class CliUp implements wire.ICommand {

	var remote:Remote<IRemoteRoot>;
    var previewSrc:String;
    #if js
    var preview:js.html.ImageElement;
    var file:js.html.File;
    var arrayBuffer:haxe.io.Bytes;
    #end
	public function new(r) {
		remote = r;
	}

	public function execute<T>(?data:T) {
		#if js
		J(onDom);
		#end
	}

	#if js
	function onDom() {
		var uploadfield:js.html.InputElement = cast doc.querySelector("#file-input");
		preview = cast doc.querySelector('#preview');

		uploadfield.addEventListener("change", function(e:js.html.Event) {
			
			
			file = uploadfield.files[0];
			var reader = new js.html.FileReader();
			
			reader.onload = function() {
			arrayBuffer = haxe.io.Bytes.ofData(reader.result);

				previewSrc = buff2base64(arrayBuffer);
                preview.src=previewSrc;
			}

			reader.readAsArrayBuffer(file);
			e.preventDefault();
			
		});

        doc.querySelector('button#ok').addEventListener("click",function(e){
            preview.src=previewSrc;
             // have to cast FormFile here or it becomes uploadFile  
            remote.uploadFile({file: cast FormFile.ofBlob(file.name, file.type, arrayBuffer)}).handle(function(o) switch o {
					case Success(result):
						js.Browser.alert("Succeed" + result.name);
						previewSrc=preview.src = result.name;
					case Failure(e):
						js.Browser.alert("Failed");
						trace(e);
				});
        });
	}
	#end


    public static function buff2base64(arrayBuffer:haxe.io.Bytes):String {
		return "data:image/png;base64," + Base64.encode(arrayBuffer);
	}
}
