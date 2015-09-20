<!doctype html>
<html lang="ch_CN">
<head>
    <meta charset="UTF-8">
    <title>redis登录</title>
    <link style="text/css" rel="stylesheet" href="../../js/bootstrap-3.3.5-dist/css/bootstrap.css"/>
    <link style="text/css" rel="stylesheet" href="home.css" />
</head>
<body>
<div class="container">
    <div class="log-in">
        <form id="logForm">
            <h2 class="form-signin-heading">请登录</h2>
            <label class="sr-only" for="inputEmail">邮箱地址</label>
            <input id="inputEmail" class="form-control" type="text" name="user_email" autofocus="" required="" placeholder="邮箱地址">
            <label class="sr-only" for="inputPassword">密码</label>
            <input id="inputPassword" class="form-control" type="password" name="user_pwd" required="" placeholder="Password">
            <div class="checkbox">
                <label>
                    <input type="checkbox" value="remember-me">
                    记住30天
                </label>
            </div>
            <input type="submit" class="btn btn-lg btn-primary btn-block" value="登 录"/>
        </form>
    </div>
</div>
<script src="../../form/jquery-1.11.2.js"></script>
<script src="../../js/bootstrap-3.3.5-dist/js/bootstrap.js"></script>
<script src="../../form/validation/jquery.validate.js"></script>
<script>
$(document).ready(function(){


    $("#logForm").validate({
        rules:{
            user_email:{
                required:true,
                email:true
            },
            user_pwd:{
                required:true
            }
        },
        messages:{
            user_email:{
                required:"请输入邮箱地址",
                email:"不是合法邮箱格式"
            },
            user_pwd:{
                required:"请输入密码"
            }
        },
        submitHandler:function(form){
            // ajax 提交
            //alert(22221212);return false;
            $.ajax({
                url:'/form/validation/index.html',
                type:"post",
                dataType:"json",
                data:$("#addForm").serialize(),
                success:function(data){
                    alert('ok');
                    return false;
                }

            });
        }
    });
})
</script>
</body>
</html>
