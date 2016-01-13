<?php
header('content-type:text/html;charset=utf-8');
echo "<pre>";

echo <<<EOF

setcookie中的时间是时间戳，一般是当前的时间戳加上需要设置的过期时间

EOF;


setcookie('a', 'aaa', time()+60, '.note.com');
var_dump($_COOKIE);

?>
<!doctype html>
<html lang="ch_CN">
<head>
    <meta charset="UTF-8">
    <title>COOKIE多站点共享cookie</title>
    <script type="text/javascript" src="../form/jquery-1.11.2.js"></script>
    <script type="text/javascript">

    </script>
</head>
<body>
    <?php var_dump($_COOKIE); ?>
</body>
</html>
