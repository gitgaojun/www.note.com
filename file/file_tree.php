<?php
header('content-type:text/html;charset=utf-8');
echo <<<EOF

遍历目录结构
<br> 
/home/wwwroot/www.note.com文件权限全部是可写和可读的
<br>
/etc/php5/ 部分权限是不可读的


EOF;

function whileFileDir($dir_name)
{
	$dir_file_resource = dir($dir_name);
	echo "<ul><br>";
	while(false !==($file = $dir_file_resource->read())){

		if(is_dir("$dir_name/$file") && !in_array($file, array('.', '..')))
		{
			echo "<li>$file</li><br>";
			whileFileDir("$dir_name/$file");
		}else{
			if(!in_array( $file, array('.', '..'))){
				echo "<li>$file</li><br>";
			}
		}
	}
	echo "</ul><br>";
	$dir_file_resource->close();
	return true;
}


whileFileDir('/home/wwwroot/www.note.com');	

whileFileDir('/etc/php5');
