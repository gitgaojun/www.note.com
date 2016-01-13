<?php
/**
 * 保存图片
 *
 * @since	2015-11-9
 * @author	jun
 * @package saveImgApi
 *
 */
class Img
{
	protected $img_path;        // 图片地址
	protected $img_type;		// 图片类型
	protected $web_site;
	protected $img_str;
	protected $img_url_list;

	public function __construct($list, $img_path, $img_type='jpg')
	{
		$this->web_site = isset($list['website']) ? trim($list['website']) : '';
		$this->img_str = isset($list['imgstr']) ? trim($list['imgstr']) : '';
		$this->img_path = $img_path;
		$this->img_type = $img_type;
	}

	public function mkdir_save_path($path)
	{
		if( !is_dir($path) )
		{
			if(!$this->mkdir_save_path(dirname($path))){
				return false;
			}
			if(!mkdir($path, 0777)){
				return false;
			}
		}
		return true;
	}

	public function save_img()
	{
		$result = array('status'=>false, 'msg'=>'', 'data'=>'');
		if(empty($this->web_site))
		{
			$result['msg'] = 'web_site is empty';
			return $result;
		}
		if(empty($this->img_str))
		{
			$result['msg'] = 'img_str is empty';
			return $result;
		}
		$img_str = $this->img_str;
		$img_arr = explode('||||', $img_str);
		for($i=0; $i<count($img_arr); $i++)
		{
			list($min, $sc) = explode(' ',microtime());
			$time_path = date('Y/m/d');
			$micro = str_replace('.', '', $min+$sc);
			$img_url_list = $this->img_path . '/'. $time_path . '/';
			@$this->mkdir_save_path($img_url_list);
			$img_url_list .= date('Ymd'). $micro .'.'.$this->img_type;
			$handle = fopen($img_url_list, 'w');
			if( fwrite($handle, base64_decode($img_arr[$i])) === false)
			{
				$result['msg']='图片保存失败';
				return $result;	
			}else{
				$this->img_url_list[] = $img_url_list;
			}
			fclose($handle);
		}
		$result['data']=$this->img_url_list;
		$result['status'] = true;
		return $result;
	}

}

$img = new Img($_POST, 'kkk');
$result = $img->save_img();

echo json_encode($result, JSON_UNESCAPED_SLASHES);

