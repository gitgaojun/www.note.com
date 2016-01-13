<!DOCTYPE HTML>
<html lang="ch_CN">
<head>
	<meta charset="UTF-8">
	<title>redis做注册功能</title>
	<link rel="stylesheet" style="text/css" href="../../js/bootstrap-3.3.5-dist/css/bootstrap.css" />
	<link rel="stylesheet" style="text/css" href="app.css" />
    <link rel="stylesheet" style="text/css" href="validate.css" />

</head>
<body>
<div class="container">
	<div class="sign-up">
		<form id="signForm">
			<h2 class="form-signup-heading">注册</h2>
			<label class="sr-only" for="inputName"></label>
			<input id="inputName" class="form-control" type="text" name="user_name" placeholder="用户名">
			<label class="sr-only" for="inputEmail">邮箱地址</label>
			<input id="inputEmail" class="form-control" type="text" name="user_email" placeholder="邮箱地址">
			<label class="sr-only" for="inputPassword">密码</label>
			<input id="inputPassword" class="form-control" type="password" name="user_pwd" placeholder="密码">
			<div class="checkbox">
				<label>
					<input type="checkbox" name="tongyi" value="1" id="tongyi">
					<span style="font-weight: 300;">同意条款</span>
				</label>
			</div>
			<input type="submit" class="btn btn-lg btn-primary btn-block" value="注 册"/>
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

function showModel(title,content,status=false,u=''){

    $("#guangbi").bind('click', function(){
        $('#myModel').modal('hide');// 点击关闭按钮的时候关闭模态框
    });
    if(status)
    {// 成功那么跳转
        $("#queding").bind('click', function(){
            window.location.href=u;
        });
    } else
    {// 失败只显示关闭按钮
        $('#queding').css('display','none');
    }
    $(".modal-title").text(title); // 模态框标题
    $(".modal-body").text(content);//模态框内容
    $("#myModel").modal('show');//  手动打开模态框

}

$(document).ready(function(){
	
	$("#signForm").validate({
        /*validate 插件靠的是name来定位的*/
		rules:{
			user_name:{
				required:true
			},
			user_email:{
				required:true,
				email:true
			},
			user_pwd:{
				required:true
			},
			tongyi:{
				required:true
			}
		},
		messages:{
			user_name:{
				required:"请输入用户名"
			},		
			user_email:{
				required:"请输入邮箱地址",
				email:"不是合法邮箱格式"
			},
			user_pwd:{
				required:"请输入密码"
			},
			tongyi:{
				required:"您未同意条款"
			}
		},
		submitHandler:function(form){
			$.ajax({
				url:'http://www.note.com/redis/redisAdmin/add.php',
					type:"post",
					dataType:"json",
					data:$("#signForm").serialize(),
					success:function(data){
						if(data.status){
                            var u="http://www.note.com/redis/redisAdmin/home.php";
                            showModel('注册','恭喜你！注册成功,关闭页面即可进入登录页面',true, u);
							//window.location.href="http://www.note.com/redis/redisAdmin/login.php";
						}else{
                            showModel('注册',data.msg);
						}
						return false;
					}
			});
		}
	});
});
</script>
</body>
</html>
