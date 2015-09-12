<?php
/**
 * Prinemps Framework 数据处理类
 * (C)2015 Printemps Framework All rights reserved.
 */
class DataProcess{
	/**
	 * 快速引入 css/js/图片
	 * @param  string/array $filename 文件名
	 * @return none/boolean
	 */
	public function import($filename){
		$link = Printemps::parseURL();
		$assetPath = str_replace(APP_ROOT_PATH.'/',"",APP_STATIC_PATH);
		if(!is_array($filename)){
			$this->importChildren($link,$assetPath,$filename);
		}
		else{
			foreach($filename as $value){
				$this->importChildren($link,$assetPath,$value);
			}
		}
	}
	/**
	 * $this->import 子函数
	 * @param  string $link  网址
	 * @param  string $assetPath 静态文件目录
	 * @param  string $filename  文件名
	 * @return none/string
	 */
	private function importChildren($link,$assetPath,$filename){
		if(preg_match("/(.*?)(\.css)$/",$filename))
			echo '<link rel="stylesheet" type="text/css" href="'."{$link}{$assetPath}css/{$filename}".'">'."\n";
		elseif(preg_match("/(.*?)(\.js)$/", $filename))
			echo '<script src="'."{$link}{$assetPath}js/{$filename}".'"></script>'."\n";
		elseif(preg_match("/(.*?)(\.(png|jpg|jpeg|bmp|ico|tiff|gif))$/",$filename))
			echo '<img src="'."{$link}{$assetPath}img/{$filename}".'">'."\n";
		else
			return false;
	}
}