<!DOCTYPE HTML>
<html lang="ch_CN">
<head>
	<meta charset="UTF-8">
	<title>redis做注册功能</title>
	<link rel="stylesheet" style="text/css" href="../../js/bootstrap-3.3.5-dist/css/bootstrap.css" />
	<link rel="stylesheet" style="text/css" href="app.css" />
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
					<input type="checkbox" value="1" id="tongyi">
					同意条款
				</label>
			</div>
			<input type="submit" class="btn btn-lg btn-primary btn-block" value="注 册"/>
		</form>
	</div>
</div>
<script src="../../form/jquery-1.11.2.js"></script>
<script src="../../js/bootstrap-3.3.5-dist/js/bootstrap.js"></script>
<script src="../../form/validation/jquery.validate.js"></script>
<script>
$(document).ready(function(){
	
	$("#signForm").validate({
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
							window.location.href="www.note.com/redis/redisAdmin/app.php";
						}else{
							alert('注册失败！');
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
