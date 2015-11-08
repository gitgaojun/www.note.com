<?php
header('content-type:text/html;charset=utf-8');

echo "<pre>";

//var_dump($_FILES['ima']['tmp_name']);exit;

$fp = fopen($_FILES['ima']['tmp_name'], "rb");


$buf = fread($fp, $_FILES['ima']['size']);

// $buf = addslashes(fread($fp, $_FILES['ima']['size'])); 是错误写法，那么的图片流转义后，不能被使用，会导致图片不能正常被访问

//var_dump($buf);

// $buf 就是二进制文件流


/**
 * 二进制文件保存成图片
 *
 * @since 2015-11-9
 * @author jun
 * @param string $dxycontent 二进制文件流
 * @param string $filepath   文件存放位置
 * @param string $filename   文件保存名字
 * @return bool
 */
function imgSave($dxycontent, $filepath, $filename)
{
	$file = fopen($filepath . $filename, "w+"); //打开文件准备写入
	fwrite($file, $dxycontent); //写入
	fclose($file); // 关闭
	
	return true;

}
if(imgSave($buf, '/home/jun/下载/img/', 'hello.jpg'))
{
	echo "成功";
}else{
	echo "失败";
}






