<?php
function makeimg($img,$name){
			/*以下为获取头像*/
		$filename ="{$name}.jpg";//要生成的图片名字
		$jpg = $img;//得到post过来的二进制原始数据
		//以下为sae的sotrage
		$domain = 'img';
		$filename = $filename;
		$file_contents = $jpg;
		$s = new SaeStorage();
		$s->write($domain, $filename ,$file_contents);
		$imgurl=$s->getUrl($domain, $filename );
		/*获取结束*/
		return $imgurl;
	}
