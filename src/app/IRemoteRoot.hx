package app;
import tink.web.forms.FormFile;
using tink.CoreApi;
interface IRemoteRoot{

    @:get('/paf')
    function paf():{arg:String};

    @:post
    function uploadFile(body:{file:FormFile}):Promise<{name:String}>;

}