<?php
header('content-type:text/html;charset=utf8');
echo "<pre>";

echo <<<EOF

	substr 的用法

substr 第一个参数是目标字符串
第二个参数是 起始位置
第三个参数是 截取字符串的长度

EOF;

$name='www.note.com';


echo substr($name, 3, strlen($name) );


echo <<<EOF

如何设置多站的 cookie 共享

v.qq.com
music.qq.com
现在还不会，以后想想吧

EOF;

