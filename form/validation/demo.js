$(document).ready(function(){

	/**
	 * 添加错误提示
	 *
	 * @param e element 节点
	 * @param t 错误提示文字
	 * @param s 如果s为真那么错误提示改变
	 * @since 2015-10-1
	 * @author jun
	 * @return bool
	 */
	function addError(e, t, s){
        if(!arguments[2]) s=false;
		if(s){
			t='请填写该项';
		}
		var m = '<td class="status"><label id="user_name-error" class="error" for="user_name">'+t+'</label></td>';
		$(e).parent().parent().append(m); // 添加错误提示
		$(e).addClass('error');// 错误input状态
		return true;
	}

	function removeError(e){
		$(e).parent().next().remove(); // 去除错误提示
		$(e).removeClass('error'); // 错误input状态
		return true;
	}

	/**
	 * 判断是否填写
	 * 如果s是false那么默认提示不变，
	 * 如果s是true那么提示字符改变
	 * 
	 * @param e element节点
	 * @param t 错误提示文字
	 * @param s 如果s为真那么错误提示改变
	 * @since 2015-10-1
	 * @author jun
	 * @return bool
	 */
	function noEmpty(e, t, s){
        if(!arguments[2]) s=false;
		var text = $(e).val().length;
		removeError(e);
		if(text){
			return true;
		}else{
			if(s) addError(e, t);
			else addError(e);
			return false;
		}
	}

	/**
	 * 判断是否email
	 * 如果s是false那么默认提示不变，
	 * 如果s是true那么提示字符改变
	 *
	 * @param e element节点
	 * @param t 错误提示文字
	 * @param s 如果s为真那么错误提示改变
	 * @since 2015-10-6
	 * @author jun
	 * @return boolear
	 */
	function isEmail(e, t, s){
        if(!arguments[2]) s=false;
		var text = $(e).val();
		var er = /^[a-zA-Z0-9]+@[a-zA-Z0-9]+\.[a-zA-Z0-9]+$/g;
		var isOk = er.test(text);
		if(isOk){
			return true;
		}else{
			if(s) addError(e, t);
			else addError(e);
			return false;
		}
	}

	/**
	 * 判断是否是手机号码
	 * 如果s是false那么默认提示不变，
	 * 如果s是true那么提示字符改变
	 *
	 * @param e element节点
	 * @param t 错误提示文字
	 * @param s 如果s为真那么错误提示改变
	 * @since 2015-10-7
	 * @author jun
	 * @return boolear
	 */
	function isPhone(e, t, s){
        if(!arguments[2]) s=false;
		var text = $(e).val();
		var er=/^1\d{10}$/g;
		var isOk = er.test(text);
		if(isOk){
			return true;
		}else{
			if(s) addError(e, t);
			else addError(e);
			return false;
		}

	}

	/**
	 * 判断字符长度是否在规定范围内
	 * 
	 * @param e element节点
	 * @param start 起始长度
	 * @param end 结束长度
	 * @since 2015-10-7
	 * @author jun
	 * @return boolear
	 */
	function isLength(e, start, end){
		var text = $(e).val();
		var m = start + '-' + end + '个字符';
		isOk = (text.length >= start  && text.length <=end ) ? true : false;
		if(isOk){
			return true;
		}else{
			addError(e, m);
			return false;
		}
	}
		
	function isBlank(e, t, s){
        var text = $(e).val();
        var er = text.indexOf(" ");
        alert(er);
        var isOk = er > 0 ? false : true;
        if(isOk){
            return true;
        }else{
            if(s) addError(e, t);
            else addError(e);
            return false;
        }
	}

	$("#sub").click(function(){
		noEmpty("#u_name",'请填写用户名',true);
		noEmpty("#u_email", '请填写e-mail地址', true) && isEmail("#u_email", '请填写正确的邮箱地址', true);
		noEmpty("#u_phone", '请填写手机号码', true) && isPhone("#u_phone", '手机格式错误', true);
		/*密码：6-14个字符，数字大小写字母和标点符号，不允许有空格*/
		noEmpty("#u_pwd", '请填写密码', true) && isLength('#u_pwd', 6, 14) && isBlank("#u_pwd", '不允许有空格', true);
		
	});
});
