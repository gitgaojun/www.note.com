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
<!--模态框start-->
<div class="modal fade" id="myModel" tabindex="-1" role="dialog"
     aria-labelledby="myModelLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close"
                        data-dismiss="modal" aria-hidden="true">&times;
                </button>
                <h4 class="modal-title" id="myModalLabel">
                    注册
                </h4>
            </div>
            <div class="modal-body">

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default"
                        data-dismiss="model" id="guangbi">
                    关闭
                </button>
                <button type="button" class="btn btn-primary" id="queding">
                    确定
                </button>
            </div>
        </div>
    </div>
</div>

<!--模态框end-->
<script src="../../form/jquery-1.11.2.js"></script>
<script src="../../js/bootstrap-3.3.5-dist/js/bootstrap.js"></script>
<script src="../../form/validation/jquery.validate.js"></script>
<script>
$(document).ready(function(){
    function showTime(){
        t -= 1;
        document.getElementById('showtimes').innerHTML= t;
        if(t==0){
            location.href='error404.asp';
        }
        //每秒执行一次,showTime()
        setTimeout("showTime()",1000);
    }
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
                url:'http://www.note.com/redis/redisAdmin/login.php',
                type:"post",
                dataType:"json",
                data:$("#logForm").serialize(),
                success:function(data){
                    if(data.status)
                    {
                        window.location.href = 'http://www.note.com/redis/redisAdmin/app.php';
                        $("#guangbi").bind('click', function(){
                            $('#myModel').modal('hide');// 点击关闭按钮的时候关闭模态框
                        });

                        $('#queding').css('display','none');

                        $(".modal-title").text('用户你好'); // 模态框标题
                        $(".modal-body").text("登录成功页面即将（5s）跳转首页");//模态框内容
                        var i=5
                        $("#myModel").modal('show');//  手动打开模态框
                        function showTime()
                        {
                            --i;
                            if(i>0){
                                $(".modal-body").html("登录成功页面即将\<span style='color:red;font-weight: bold;'>（"+i+"s）</span>跳转首页");
                                setTimeout("showTime",1000);
                            }else{
                                $('#myModel').modal('hide');
                                return false;
                            }
                        }
                        return true;
                    }else
                    {
                        alert(data.msg);
                        return false;
                    }
                }

            });
        }
    });
})
</script>
</body>
</html>
