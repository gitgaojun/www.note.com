<!doctype html>
<html lang="ch_CN">
<head>
    <meta charset="UTF-8">
    <title></title>
</head>
<body>
    <form method="get">
        <input type="text" name="u_name" />
        <input type="submit" value="提交"/>
    </form>
    <pre>
    magic_quotes_gpc = On 自动对 get post cookie的内容进行转义

    get_magic_quotes_gpc（）检测是否打开magic_quotes_gpc
    </pre>
</body>
</html>

<?php

var_dump($_GET);

var_dump(get_magic_quotes_gpc());exit;