<?php
/**
 * Generated by Haxe 4.0.0 (git build development @ 3018ab1)
 */

namespace tink\web\forms\_FormFile;

use \tink\json\_Representation\Representation_Impl_;
use \tink\core\OutcomeTools;
use \php\Boot;
use \php\_Boot\HxException;
use \tink\core\TypedError;
use \tink\http\_StructuredBody\UploadedFile_Impl_;
use \tink\io\RealSourceTools;
use \haxe\io\Bytes;
use \php\_Boot\HxAnon;

final class FormFile_Impl_ {
	/**
	 * @param object $v
	 * 
	 * @return object
	 */
	static public function _new ($v) {
		#/Users/ut/haxe/haxe_libraries/tink_web/0.1.4/github/7c93ab66f476c97e62510c653bb4e58e918e1471/src/tink/web/forms/FormFile.hx:20: character 10
		return $v;
	}


	/**
	 * @param string $name
	 * @param string $type
	 * @param Bytes $data
	 * 
	 * @return object
	 */
	static public function ofBlob ($name, $type, $data) {
		#/Users/ut/haxe/haxe_libraries/tink_web/0.1.4/github/7c93ab66f476c97e62510c653bb4e58e918e1471/src/tink/web/forms/FormFile.hx:46: characters 5-49
		return UploadedFile_Impl_::ofBlob($name, $type, $data);
	}


	/**
	 * @param object $rep
	 * 
	 * @return object
	 */
	static public function ofJson ($rep) {
		#/Users/ut/haxe/haxe_libraries/tink_web/0.1.4/github/7c93ab66f476c97e62510c653bb4e58e918e1471/src/tink/web/forms/FormFile.hx:41: characters 5-26
		$data = Representation_Impl_::get($rep);
		#/Users/ut/haxe/haxe_libraries/tink_web/0.1.4/github/7c93ab66f476c97e62510c653bb4e58e918e1471/src/tink/web/forms/FormFile.hx:42: characters 12-76
		return UploadedFile_Impl_::ofBlob($data->fileName, $data->mimeType, $data->content);
	}


	/**
	 * @param object $this
	 * 
	 * @return object
	 */
	static public function toJson ($this1) {
		#/Users/ut/haxe/haxe_libraries/tink_web/0.1.4/github/7c93ab66f476c97e62510c653bb4e58e918e1471/src/tink/web/forms/FormFile.hx:24: characters 17-30
		$this2 = $this1->fileName;
		#/Users/ut/haxe/haxe_libraries/tink_web/0.1.4/github/7c93ab66f476c97e62510c653bb4e58e918e1471/src/tink/web/forms/FormFile.hx:25: characters 17-30
		$this3 = $this1->mimeType;
		#/Users/ut/haxe/haxe_libraries/tink_web/0.1.4/github/7c93ab66f476c97e62510c653bb4e58e918e1471/src/tink/web/forms/FormFile.hx:27: characters 9-31
		$src = $this1->read();
		#/Users/ut/haxe/haxe_libraries/tink_web/0.1.4/github/7c93ab66f476c97e62510c653bb4e58e918e1471/src/tink/web/forms/FormFile.hx:28: characters 9-26
		$chunk = null;
		#/Users/ut/haxe/haxe_libraries/tink_web/0.1.4/github/7c93ab66f476c97e62510c653bb4e58e918e1471/src/tink/web/forms/FormFile.hx:29: characters 9-68
		$write = RealSourceTools::all($src)->handle(function ($c)  use (&$chunk) {
			#/Users/ut/haxe/haxe_libraries/tink_web/0.1.4/github/7c93ab66f476c97e62510c653bb4e58e918e1471/src/tink/web/forms/FormFile.hx:29: characters 50-66
			$chunk = OutcomeTools::sure($c);
		});
		#/Users/ut/haxe/haxe_libraries/tink_web/0.1.4/github/7c93ab66f476c97e62510c653bb4e58e918e1471/src/tink/web/forms/FormFile.hx:26: lines 26-36
		$v = null;
		#/Users/ut/haxe/haxe_libraries/tink_web/0.1.4/github/7c93ab66f476c97e62510c653bb4e58e918e1471/src/tink/web/forms/FormFile.hx:30: lines 30-35
		if ($chunk !== null) {
			#/Users/ut/haxe/haxe_libraries/tink_web/0.1.4/github/7c93ab66f476c97e62510c653bb4e58e918e1471/src/tink/web/forms/FormFile.hx:26: lines 26-36
			$v = $chunk->toBytes();
		} else {
			#/Users/ut/haxe/haxe_libraries/tink_web/0.1.4/github/7c93ab66f476c97e62510c653bb4e58e918e1471/src/tink/web/forms/FormFile.hx:33: characters 11-27
			if ($write !== null) {
				#/Users/ut/haxe/haxe_libraries/tink_web/0.1.4/github/7c93ab66f476c97e62510c653bb4e58e918e1471/src/tink/web/forms/FormFile.hx:33: characters 11-27
				$write->cancel();
			}
			#/Users/ut/haxe/haxe_libraries/tink_web/0.1.4/github/7c93ab66f476c97e62510c653bb4e58e918e1471/src/tink/web/forms/FormFile.hx:34: characters 44-121
			$v1 = "Can only upload files through JSON backed by with sync sources but got a " . (\Std::string($src)??'null');
			#/Users/ut/haxe/haxe_libraries/tink_web/0.1.4/github/7c93ab66f476c97e62510c653bb4e58e918e1471/src/tink/web/forms/FormFile.hx:34: characters 11-16
			throw new HxException(new TypedError(501, $v1, new HxAnon([
				"fileName" => "tink/web/forms/FormFile.hx",
				"lineNumber" => 34,
				"className" => "tink.web.forms._FormFile.FormFile_Impl_",
				"methodName" => "toJson",
			])));
		}
		#/Users/ut/haxe/haxe_libraries/tink_web/0.1.4/github/7c93ab66f476c97e62510c653bb4e58e918e1471/src/tink/web/forms/FormFile.hx:23: lines 23-37
		return new HxAnon([
			"fileName" => $this2,
			"mimeType" => $this3,
			"content" => $v,
		]);
	}
}


Boot::registerClass(FormFile_Impl_::class, 'tink.web.forms._FormFile.FormFile_Impl_');
