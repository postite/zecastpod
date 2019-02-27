// typedef Gloss={
//     glossary:{title:String}
// }
typedef Gloss={
    glossary:Dynamic
};
class PhpTest{

    static var pim='{
 "items": [
  {
   "id": 1,
   "title": "%20%20Noel%202k18%20%20",
   "description": "op%20%20%20%20Coucou%20Aurel%2C%20Joyeux%20no%C3%ABl%20%21%20Voila%20mon%20cadeau%2C%20un%20abonnement%20annuel%20au%20son%20de%20ma%20voix%20%21%20%28%20pour%20ton%20plus%20grand%20bonheur%20%3B%29%20%29%20Chaque%20semaine%20gr%C3%A2ce%20a%20ce%20podcast%20tu%20entendras%20la%20douce%20m%C3%A9lodie%20bavarde%20de%20ma%20bouche%20te%20raconter%20tout%20et%20n%27importe%20quoi%2C%20te%20faire%20d%C3%A9c..%09",
   "permalink": "http://zecastpod.postite.com/pod/1",
   "author": "zelote@postite.com (Zélote Kert)",
   "duration": "00:32:16",
   "image": "http://zecastpod.postite.com/noyeuxjoel.jpeg",
   "explicit": "no",
   "sound": {
    "url": "http://zecastpod.postite.com/explication.mp3",
    "length": 2120132,
    "type": "audio/mpeg"
   },
   "date": "Mon, 25 Feb 2019 14:23:52 +0100"
  },
  {
   "id": 2,
   "title": "L%27asmr",
   "description": "opAujourd%27hui%2C%20decouverte%20palpitante%20de%20l%27asmr%20%21%21%21%21%09",
   "permalink": "http://zecastpod.postite.com/pod/2",
   "author": "zelote@postite.com (Zélote Kert)",
   "duration": "00:32:16",
   "image": "http://zecastpod.postite.com/IMG_2166.JPG",
   "explicit": "no",
   "sound": {
    "url": "http://zecastpod.postite.com/asmr.mp3",
    "length": 7524309,
    "type": "audio/mpeg"
   },
   "date": "Mon, 25 Feb 2019 14:23:52 +0100"
  }
 ]
}';

var pom='{
    "glossary": {
        "title": "example glossary"
    }
}';

  public function new(){
     // {pop:"plo"}.log();
     // pim.log();
    // (haxe.Json.parse(pim):haxe.DynamicAccess<Dynamic>).log();
      Log.log( haxe.Json.parse(pom) );
     // Log.log(t);

  }
  static function main(){
      new PhpTest();
  }
}